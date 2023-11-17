<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $productw = Product::where('category_id','1')->get();
        $products = Product::latest()->take(5)->get();  
        $productt = Product::where('category_id','6')->get();     
        return view('client.temp.home', compact('products', 'productw','productt'));
    }
    public function shop(){
        $products = Product::orderBy('created_at', 'desc')->paginate(9);
        $category = Category::all();
        return view('client.shop.shop',compact('products','category'));
    }
    public function detail(){
        $id = request()->id;
        $product = Product::with('author','category')->findOrFail($id);
        $sameProducts = Product::where('category_id',$product['category_id'])->get();
        $comment = Comment::with('user')->where('product_id',$id)->get();
        return view('client.shop.detail',compact('product','sameProducts','comment'));
    }
    public function about(){
        return view('client.temp.about');
    }
    public function contact(){
        return view('client.temp.contact');
    } 
    public function voucher(){
        $vouchers = Coupon::where('expiration_time', '>', now())->get();
        $voucher = Coupon::where('expiration_time', '<', now())->get();
        return view('client.temp.voucher',compact('vouchers','voucher'));
    }
    public function filterOrSearch(Request $request){
        $query = $request->input('search');
        $categoryQuery = $request->input('category');
        $category = Category::all();
        if (!empty($query)) {
            $products = DB::table('products')
    ->select('products.*', 'authors.name as author_name')
    ->join('authors', 'products.author_id', '=', 'authors.id')
    ->where('products.name', 'like', "%$query%")
    ->orWhere('authors.name', 'like', "%$query%")
    ->orderBy('products.created_at', 'desc')
    ->paginate(9);

        }
         elseif ($categoryQuery && $categoryQuery != 'Tìm theo danh mục') {
            $products = Product::where('category_id', $categoryQuery)
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        } else {
            $products = Product::orderBy('created_at', 'desc')->paginate(9);
        }
        return view('client.shop.shop', compact('products', 'category'));
    }
}