<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tableProduct(){
        $perPage = 5; // số bản ghi trên mỗi trang
        $currentPage = Paginator::resolveCurrentPage('page'); 
        $products = Product::with('brand','category')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.products.product',['products'=> $products]);
    }
    public function product(){
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.products.add-product',['categories'=>$categories,'brands'=>$brands]);
    }
    public function createproduct(Request $request){
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
        $data->size = $request->input('size');
        $data->save();
        return redirect()->back()->with('success', 'Đã thêm sản phẩm thành công !');
        }else{
        return redirect()->back()->with('error', ' Sản phẩm đã tồn tại \n Thêm sản phẩm không thành công ! ');
        }
    }
    public function delete($id){
        // Xóa dữ liệu trong cơ sở dữ liệu
        Product::findOrFail($id)->delete();
        // Chuyển hướng về trang danh sách dữ liệu
        return redirect()->back()->with('success','Đã xóa thành công !');
    }
    public function editProduct(){
        $id = request()->id;
        $product = Product::with('brand','category')->where('id',$id)->first();
        return view('admin.products.edit-product',['product'=>$product]);
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
        $product->size = $request->input('size');
        $product->save();
        return redirect()->to('/product-table')->with('success','Update dữ liệu thành công !');
    }

}