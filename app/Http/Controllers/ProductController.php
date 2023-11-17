<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateProductRequest;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tableProduct(){
        $perPage = 5;
        $products = Product::with('author', 'category')->paginate($perPage);
        $totalProducts = Product::count('id');
        return view('admin.products.product',['products'=> $products,'totalproducts'=>$totalProducts]);
    }
    public function search(Request $request)
    {
        $perPage = 5;
        $currentPage = Paginator::resolveCurrentPage('page');
        $totalProducts = Product::count('id');
        $searchKeyword = $request->input('search');
        $productsQuery = Product::with('author', 'category');
        if (!empty($searchKeyword)) {
            $productsQuery->where('name', 'LIKE', '%' . $searchKeyword . '%');
        }
        $products = $productsQuery->paginate($perPage, ['*'], 'page', $currentPage);
        return view('admin.products.product',['products'=> $products,'totalproducts'=>$totalProducts]);
    }
    public function product(){
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.products.add-product',compact('categories','authors'));
    }
    public function createproduct(CreateProductRequest $request){
    // Kiểm tra sự tồn tại của sản phẩm
    $productExists = Product::where('name', $request->name)->exists();
    if ($productExists) {
        return redirect()->back()->withInput()->with('error', 'Sản phẩm đã tồn tại. Thêm sản phẩm không thành công!');
    }
    $product = new Product($request->all());
    // Kiểm tra xem có tệp ảnh được gửi lên hay không
    if ($request->hasFile('images')) {
        $image = $request->file('images');
        if (!$image->isValid() || !in_array($image->getClientOriginalExtension(), ['jpg','jpeg','png'])) {
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
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success','Đã xóa thành công !');
    }
    public function editProduct(){
        $id = request()->id;
        $product = Product::with('author','category')->findOrFail($id);
        $author = Author::whereNotIn('id', [$product['author_id']])->get();
        $category = Category::whereNotIn('id',[$product['category_id']])->get();
        return view('admin.products.edit-product',compact('product','author','category'));
    }
    public function updateProduct(Request $request,$id){
        $product = Product::find($id);
        $product->update($request->all());
        if($request->hasFile('images')){
            $images =$request->file('images');
            $imagePath = time().'.'.$images->extension();
            $images->move(public_path('uploads'),$imagePath);
            $product->images = $imagePath;
        }
        $product->save();
        return redirect()->to('/product-table')->with('success','Update dữ liệu thành công !');
    }
}