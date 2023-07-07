<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function product(){
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.products.add-product',['categories'=>$categories,'brands'=>$brands]);
    }
    public function createproduct(Request $request)
    {
        //lấy thông tin sản phẩm
        $data =$request->only('name');
        //Kiểm tra sản phầm tồn tại hay chưa
        $productExists = Product::where('name', $data['name'])->exists();
        //chưa tồn tại->thêm và ngược lại
        if(!$productExists){
        $data = new Product();
        $data->name = $request->name;
        $data->amount = $request->amount;
        $data->description = $request->description;
        //kiểm tra xem trong request có tồn tại file ảnh với trường 'images' hay không.
        if($request->hasFile('images')){
            //Nếu có lấy đối tượng file ảnh từ request và lưu trữ vào biến $images.
            $images =$request->file('images');
            //tạo tên file mới($imagePath) bằng cách kết hợp thời gian hiện tại và phần mở rộng của file ảnh (extension).
            $imagePath = time().'.'.$images->extension();
            //di chuyển file ảnh vào thư mục public/assets/images() của project, lưu trữ dưới tên $imagePath.
            $images->move(public_path('uploads'),$imagePath);
            $data->images = $imagePath;
        }
        $data->price = $request->price;
        $data->gender = $request->gender;
        $data->brand_id = $request->input('brand_id');
        $data->category_id = $request->input('category_id');
        $data->save();
        return redirect()->back()->with('success', 'Đã thêm sản phẩm thành công !');
        }else{
        return redirect()->back()->with('false', ' Sản phẩm đã tồn tại \n Thêm sản phẩm không thành công ! ');
        }
    }
    public function delete($id)
    {
        // Xóa dữ liệu trong cơ sở dữ liệu
        Product::findOrFail($id)->delete();
        // Chuyển hướng về trang danh sách dữ liệu
        return redirect()->back()->with('success','Đã xóa thành công !');
    }
    public function editProduct(){
        $id = request()->id;
        $product = Product::where('id',$id)->first();
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.products.edit-product',['product'=>$product,'categories'=>$categories,'brands'=>$brands]);
    }
    public function updateProduct(Request $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->hasFile('images')){
            //Nếu có lấy đối tượng file ảnh từ request và lưu trữ vào biến $images.
            $images =$request->file('images');
            //tạo tên file mới($imagePath) bằng cách kết hợp thời gian hiện tại và phần mở rộng của file ảnh (extension).
            $imagePath = time().'.'.$images->extension();
            //di chuyển file ảnh vào thư mục public/assets/images() của project, lưu trữ dưới tên $imagePath.
            $images->move(public_path('uploads'),$imagePath);
            $product->images = $imagePath;
        }
        $product->gender = $request->gender;
        $product->brand_id = $request->input('brand_id');
        $product->category_id = $request->input('category_id');
        $product->save();
        return redirect()->to('/product-table')->with('success','Update dữ liệu thành công !');
    }
}