<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    /**
     * Show the form for creating a new resource.
     */
    public function createUser(Request $request)
    {
        $data = $request->only(['name','email','confirm-password']);
        $data['password'] = hash('sha256',$request->password);
        if($data['password'] = $data['confirm-password'] ){
            User::create($data);
            return redirect()->to('/login')->with('success','Đăng kí thành công!');
        }else{
            return redirect()->to('/register')->with('false','Mật khẩu không trùng khớp');
        }
    }
    public function loginUser(Request $request){
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            // Đăng nhập thành công
            $role = DB::table('users')->where('email',$data['email'])->value('role');
            $status = DB::table('users')->where('email',$data['email'])->value('status');
            if($status == 0){
                    if($role == 'admin'){
                        return Redirect::to('/dashbroad-home')->with('role',$role);
                    }else{
                        return Redirect::to('/home')->with('role',$role);
                    }    
            }else{
            return redirect()->back()->with('false',' Tài khoản đã bị khóa !');
            }
        }else{
            return redirect()->back()->with('false',' Tài khoản hoặc mật khẩu không đúng !');
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
    public function delete($id){
        User::findOrFail($id)->delete();
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