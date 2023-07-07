<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function brand(){
        return view('admin.brands.add-brand');
    }
    public function createbrand(Request $request)
    {
        $data = $request->only('brand_name');
        $brandExists = Brand::where('brand_name',$data['brand_name'])->exists();
        if(!$brandExists){
            $data = new Brand();
            $data->brand_name = $request->brand_name;
            $data->description = $request->description;
            $data->save();
            return redirect()->back()->with('success','Thêm thương hiệu thành công');
        }else{
            return redirect()->back()->with('false','Sản phẩm đã tồn tại \n Thêm thương hiệu thành công');
        }
    }
    public function delete($id){
        Brand::findOrFail($id)->delete();
        return redirect()->back()->with('success','Đã xóa thành công');
    }
    public function editBrand(){
        $id = request()->id;
        $brand=  Brand::where('id',$id)->first();
        return view('admin.brands.edit-brand',['brand'=>$brand]);
    }
    public function updateBrand(Request $request,$id){
        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->description = $request->description;
        $brand->save();
        return redirect()->to('/brand-table')->with('success','Update dữ liệu thành công !');
    }
}