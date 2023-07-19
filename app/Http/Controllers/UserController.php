<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Comment;
class UserController extends Controller
{
    public function login()
    {
        return view('client.user.login');
    }
    public function register()
    {
        return view('client.user.register');
    }
    public function forgot()
    {
        return view('client.user.forgot');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function createUser(CreateUserRequest $request)
    {
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
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->status == 0) {
                if ($user->role == 'admin') {
                    return redirect()->to('/dashbroad-home');
                } else {
                    return redirect()->to('/home');
                }
            } else {
                Auth::logout();
                return redirect()->back()->with('error', 'Tài khoản đã bị khóa!');
            }
        } else {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng!');
        }
    }
    public function updateProfile(){
        $user  =Auth::user();
        return view('client.user.update-profile',['user'=>$user]);
    }
    public function editprofile(Request $request ,$id){
        $user = User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =$request->password;
        $user->phone = $request->phone;
        $user->address  =$request->address;
        $user->first_login  =$request->first_login;
        $user->save();
        return redirect()->to('/home')->with('success','Update thành công !');
    }
    public function editprofilebill(Request $request ,$id){
        $user = User::find($id);
        $user->phone = $request->phone;
        $user->address  =$request->address;
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
        $user = User::where('id',$id)->first();
        return view('admin.users.edit-user',['user'=>$user]);
    }
    public function updateUser(Request $request,$id){
        $user = User::find($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =$request->password;
        $user->phone = $request->phone;
        $user->address  =$request->address;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return redirect()->to('/user-table')->with('success','Update dữ liệu thành công !');
    }
}