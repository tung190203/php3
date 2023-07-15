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
}
