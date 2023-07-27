<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function login(){
        return view('client.user.login');
    }
    public function register(){
        return view('client.user.register');
    }
    public function forgot(){
        return view('client.user.forgot');
    }
    public function sendResetLinkEmail(Request $request){
        $request->validate(['email' => 'required|email']);
        $email = $request->input('email');
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email'=>$email,
            'token' => $token,
            'created_at' => now()
        ]);
        $resetLink = url('/reset-password/'.$token);
        Mail::to($email)->send(new ResetPasswordMail($resetLink));
        return redirect()->back()->withInput()->with('message', 'Yêu cầu đặt lại mật khẩu đã được gửi đến email của bạn.');
    }
    public function showResetPasswordForm($token){
        return view('client.user.resend_password_mail', compact('token'));
    }
    public function resetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $token = $request->input('token');
        $email = DB::table('password_reset_tokens')
        ->where('token', $token)->value('email');
        if (!$email) {
            return redirect()->back()->withErrors(['error' => 'Mã xác thực không hợp lệ']);
        }
        // Cập nhật mật khẩu mới trong cơ sở dữ liệu
        User::where('email', $email)
        ->update([
            'password' => Hash::make($request->input('password'))
        ]);
        // Xóa mã xác thực trong cơ sở dữ liệu sau khi đã đặt lại mật khẩu
        DB::table('password_reset_tokens')->where('token', $token)->delete();
        return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function createUser(CreateUserRequest $request){
        $data = $request->validated();
        $passwordConfirmation = $request->input('password_confirmation');
        if ($data['password'] !== $passwordConfirmation) {
            return redirect()->back()
                ->withErrors(['password_confirmation' => 'Password confirmation does not match.'])
                ->withInput();
        }
        $data['password'] = bcrypt($request->password);
        $user=User::create($data);
        $user->sendEmailVerificationNotification();
        return redirect()->to('/email/verify');
    }
    public function loginUser(Request $request){
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember_token');
        if (Auth::attempt($credentials, $remember)){
            $user = Auth::user();
            if ($user->status == 0) {
                return redirect($user->role === 'admin' ? '/dashbroad-home' : '/home');
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Tài khoản đã bị khóa!');
            }
        } else {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng!');
        }
    }
    public function updateProfile(){
        $user =Auth::user();
        return view('client.user.update-profile',compact('user'));
    }
    public function editprofile(Request $request ,$id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->to('/home')->with('success','Update thành công !');
    }
    public function editprofilebill(Request $request ,$id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->back()->with('success','Update dữ liệu thành công !');
    }
    public function delete($id){
       $user= User::findOrFail($id);
       Bill::where('user_id',$user['id'])->delete();
       Cart::where('user_id',$user['id'])->delete();
       Comment::where('user_id',$user['id'])->delete();
       $user->delete();     
        return redirect()->back()->with('success','Xóa người dùng thành công !');
    }
    public function arrayDelete(Request $request){
        $array = $request->input('arraydelete');
        if (!empty($array)) {
            $users = User::whereIn('id', $array)->get();
            $userIds = $users->pluck('id');
            Bill::whereIn('user_id', $userIds)->delete();
            Cart::whereIn('user_id', $userIds)->delete();
            Comment::whereIn('user_id', $userIds)->delete();
            $users->each(function ($user) {
            $user->delete();
            });
            return redirect()->back()->with('success', 'Đã xóa thành công');
        } else {
            return redirect()->back()->with('error', 'User không tồn tại hoặc chưa được lựa chọn');
        }
    }
    public function editUser(){
        $id = request()->id;
        $user = User::findOrFail($id);
        return view('admin.users.edit-user',compact('user'));
    }
    public function updateUser(Request $request,$id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->to('/user-table')->with('success','Update dữ liệu thành công !');
    }
    public function tableUser(){
        $users = User::all();
        $perPage = 5;
        $users = User::paginate($perPage);
        return view('admin.users.user',compact('users'));
    }
    public function search(Request $request){
        $perPage = 5;
        $currentPage = Paginator::resolveCurrentPage('page'); 
        $searchKeyword = $request->input('search');
        $query = User::query();
            if (!empty($searchKeyword)) {
                $query->where('name', 'LIKE', '%' . $searchKeyword . '%');
            }
            $users = $query->paginate($perPage, ['*'], 'page', $currentPage);
            return view('admin.users.user', compact('users'));
    }
}