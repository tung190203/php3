<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function tableCategory(){
        $categories = Category::all();
        return view('admin.categories.category', compact('categories'));
    }  
    public function category(){
        return view('admin.categories.add-category');
    }
    public function createcategory(CreateCategoryRequest $request){
        $data = $request->only('name');
        $categoryExists = Category::where('name',$data['name'])->exists();
        if(!$categoryExists){
            $data = new Category();
            $data->name = $request->name;
            $data->description = $request->description;
            $data->save();
            return redirect()->back()->with('success','Thêm danh mục thành công');
        }else{
            return redirect()->back()->withInput()->with('error',' Danh mục đã tồn tại \n Thêm danh mục không thành công');
        }
    }
    public function delete($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('success','Đã xóa thành công !');
    }
    public function editCategory(){
        $id  =request()->id;
        $category = Category::findOrFail($id);
        return view('admin.categories.edit-category',compact('category'));
    }
    public function updateCategory(Request $request ,$id){
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->to('/category-table')->with('success','Update dữ liệu thành công !');
    }
    public function arrayDelete(Request $request ){
        $array = $request->input('arraydelete');
        if(!empty($array)){
        Category::whereIn('id',$array)->delete();
        }else{
            return redirect()->back()->with('error','Comment không tồn tại hoặc chưa được lựa chọn');    
        }
        return redirect()->back()->with('success','Đã xóa thành công');
    }
}