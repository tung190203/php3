<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\CreateAuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function tableAuthor(){
        $authors = Author::all();
        return view('admin.authors.author',compact('authors'));
    }
    public function author(){
        return view('admin.authors.add-author');
    }
    public function createauthor(CreateAuthorRequest $request)
    {
        $data = $request->only('name');
        $authorExists = Author::where('name',$data['name'])->exists();
        if(!$authorExists){
            $data = new Author();
            $data->name = $request->name;
            $data->information = $request->information;
            $data->save();
            return redirect()->back()->with('success','Thêm tác giả thành công');
        }else{
            return redirect()->back()->withInput();
        }
    }
    public function delete($id){
        Author::findOrFail($id)->delete();
        return redirect()->back()->with('success','Đã xóa thành công');
    }
    public function editAuthor(){
        $id = request()->id;
        $author = Author::findOrFail($id);
        return view('admin.authors.edit-author',compact('author'));
    }
    public function updateAuthor(Request $request,$id){
        $author = Author::find($id);
        $author->update($request->all());
        return redirect()->to('/author-table')->with('success','Update dữ liệu thành công !');
    }
}
