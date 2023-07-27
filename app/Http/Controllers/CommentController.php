<?php
namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class CommentController extends Controller
{
    //
    public function postComment(Request $request){
        $user = Auth::user();
        $data = new Comment();
        $data->user_id = $user->id;
        $data->content = $request->content;
        $data->product_id =$request->product_id;
        $data->save();
        return redirect()->back()->with('success','Thêm bình luận thành công !');
    }
    public function tableComment(){
        $perPage = 5; 
        $comments = Comment::with('user', 'product')->paginate($perPage);
        return view('admin.comments.comment', compact('comments'));
    }
    public function delete($id){     
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('success','Xóa bình luận thành công');
    }
    public function arrayDelete(Request $request ){
        $array = $request->input('arraydelete');
        if(!empty($array)){
        Comment::whereIn('id',$array)->delete();
        }else{
            return redirect()->back()->with('error','Comment không tồn tại hoặc chưa được lựa chọn');    
        }
        return redirect()->back()->with('success','Đã xóa thành công');
    }
}
