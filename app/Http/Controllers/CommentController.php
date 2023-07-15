<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
        $perPage = 5; // số bản ghi trên mỗi trang
        $currentPage = Paginator::resolveCurrentPage('page'); 
        $comments = Comment::with('user','product')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.comments.comment',['comments'=>$comments]);
    }
    public function delete($id){     
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('success','Xóa bình luận thành công');
    }
}
