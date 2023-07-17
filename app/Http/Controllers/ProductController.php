<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Brand;
use App\Models\Category;
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
        $totalProducts = Product::count('id');
        $products = Product::with('brand','category')->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.products.product',['products'=> $products,'totalproducts'=>$totalProducts]);
    }
    public function product(){
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.products.add-product',['categories'=>$categories,'brands'=>$brands]);
    }
    public function createproduct(CreateProductRequest $request)
{
    // Kiểm tra sự tồn tại của sản phẩm
    $productExists = Product::where('name', $request->name)->exists();
    if ($productExists) {
        return redirect()->back()->withInput()->with('error', 'Sản phẩm đã tồn tại. Thêm sản phẩm không thành công!');
    }
    $product = new Product();
    $product->name = $request->name;
    $product->amount = $request->amount;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->gender = $request->gender;
    $product->brand_id = $request->brand_id;
    $product->category_id = $request->category_id;
    $product->size = $request->size;
    // Kiểm tra xem có tệp ảnh được gửi lên hay không
    if ($request->hasFile('images')) {
        $image = $request->file('images');
        if (!$image->isValid() || !in_array($image->getClientOriginalExtension(), ['jpg', 'png'])) {
            return redirect()->back()->with('error', 'Tệp tin không hợp lệ. Chỉ chấp nhận tệp tin JPEG , JPG hoặc PNG.');
        }
        $imagePath = time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imagePath);
        $product->images = $imagePath;
    }else {
        return redirect()->back()->with('error', 'Vui lòng tải lên tệp tin ảnh.');
    }
    $product->save();
    return redirect()->back()->with('success', 'Đã thêm sản phẩm thành công!');
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
        $brand = Brand::whereNotIn('id', [$product['brand_id']])->get();
        $category = Category::whereNotIn('id',[$product['category_id']])->get();
        return view('admin.products.edit-product',['product'=>$product,'brand'=>$brand,'category'=>$category]);
    }
    public function updateProduct(Request $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->gender = $request->gender;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        if($request->hasFile('images')){
            //Nếu có lấy đối tượng file ảnh từ request và lưu trữ vào biến $images.
            $images =$request->file('images');
            //tạo tên file mới($imagePath) bằng cách kết hợp thời gian hiện tại và phần mở rộng của file ảnh (extension).
            $imagePath = time().'.'.$images->extension();
            //di chuyển file ảnh vào thư mục public/assets/images() của project, lưu trữ dưới tên $imagePath.
            $images->move(public_path('uploads'),$imagePath);
            $product->images = $imagePath;
        }
        $product->save();
        return redirect()->to('/product-table')->with('success','Update dữ liệu thành công !');
    }

}