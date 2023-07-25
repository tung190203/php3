<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    public function tableBrand(){
        $brands = Brand::all();
        return view('admin.brands.brand',compact('brands'));
    }
    public function brand(){
        return view('admin.brands.add-brand');
    }
    public function createbrand(CreateBrandRequest $request)
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
            return redirect()->back()->withInput();
        }
    }
    public function delete($id){
        Brand::findOrFail($id)->delete();
        return redirect()->back()->with('success','Đã xóa thành công');
    }
    public function editBrand(){
        $id = request()->id;
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit-brand',compact('brand'));
    }
    public function updateBrand(Request $request,$id){
        $brand = Brand::find($id);
        $brand->update($request->all());
        return redirect()->to('/brand-table')->with('success','Update dữ liệu thành công !');
    }
}