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
        User::create($data);
        return redirect()->to('/login');
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
        $user->save();
        return redirect()->to('/home')->with('success','Update thành công !');
    }
    public function editprofilebill(Request $request ,$id){
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
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
    public function editUser(){
        $id = request()->id;
        $user = User::findOrFail($id);
        return view('admin.users.edit-user',compact('user'));
    }
    public function updateUser(Request $request,$id){
        $user = User::find($id);
        $user->update($request->all());
        $user->save();
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