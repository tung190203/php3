<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    //
    public function category(){
        return view('admin.categories.add-category');
    }
    public function createcategory(Request $request){
        $data = $request->only('name');
        $categoryExists = Category::where('name',$data['name'])->exists();
        if(!$categoryExists){
            $data = new Category();
            $data->name = $request->name;
            $data->description = $request->description;
            $data->save();
            return redirect()->back()->with('success','Thêm danh mục thành công');
        }else{
            return redirect()->back()->with('false',' Danh mục đã tồn tại \n Thêm danh mục không thành công');
        }
    }
    public function delete($id)
    {
        // Xóa dữ liệu trong cơ sở dữ liệu
        Category::findOrFail($id)->delete();
        // Chuyển hướng về trang danh sách dữ liệu
        return redirect()->back()->with('success','Đã xóa thành công !');
    }
}