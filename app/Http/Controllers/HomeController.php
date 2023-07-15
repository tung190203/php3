<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Comment;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productw = Product::where('gender','Female')->get();
        $products = Product::where('gender', 'Male')->get();

        return view('client.temp.home',['products'=> $products,'productw'=>$productw]);
    }
    public function man()
    {
        $products = Product::where('gender', 'Male')->paginate(9);
        
        return view('client.shop.man',['products'=>$products]);
    }
    public function woman()
    {
        $products = Product::where('gender','Female')->paginate(9);
        
        return view('client.shop.woman',['products'=>$products]);
    }
    public function shop()
    {
        $products = DB::table('products')->get();
        $products = Product::paginate(9);

        return view('client.shop.shop',['products'=>$products]);
    }
    public function detail(){
        $id = request()->id;
        $product = Product::where('id',$id)->first();
        $sameProducts = Product::where('category_id',$product['category_id'])->get();
        $comment = Comment::with('user')->where('product_id',$id)->get();
        return view('client.shop.detail',['product'=>$product,'sameProducts'=>$sameProducts,'comment'=>$comment]);
    }

    public function about()
    {
        return view('client.temp.about');
    }
    public function contact()
    {
        return view('client.temp.contact');
    }
    
    
}