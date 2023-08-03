<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Comment;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $productw = Product::gender('Female')->get();
        $products = Product::gender('Male')->get();       
        return view('client.temp.home', compact('products', 'productw'));
    }
    public function man(){
        $products = Product::gender('Male')->paginate(9);  
        return view('client.shop.man',compact('products'));
    }
    public function woman(){
        $products = Product::gender('Female')->paginate(9); 
        return view('client.shop.woman',compact('products'));
    }
    public function shop(){
        $products = Product::paginate(9);
        return view('client.shop.shop',compact('products'));
    }
    public function detail(){
        $id = request()->id;
        $product = Product::with('brand','category')->findOrFail($id);
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
}