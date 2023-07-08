<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    //
    public function order(){
        $user = Auth::user();
        
        $cart = Cart::where('user_id', $user->id)->where('status_cart', 0)->get();
        $product = [];
    
        if ($cart->isNotEmpty()) {
            $product = Product::join('carts', 'products.id', '=', 'carts.product_id')
                ->select('products.*', 'carts.*')
                ->whereIn('carts.id', $cart->pluck('id')->toArray())
                ->get();
        }
        return view('client.shop.order', ['user' => $user, 'product' => $product]);
    }
    
    public function orderConfirm(Request $request ){
        $user = Auth::user();
        $bill = new Bill();
        $bill->name = $user->name;
        $bill->email = $user->email;
        $bill->address = $user->address;
        $bill->phone = $user->phone;
        $bill->total = $request->input('total');
        $bill->pttt = $request->input('pttt');
        $bill->user_id = $user->id;
        $bill->cart_id = $request->input('cart_id');
        $bill->save();
        if($bill->id){
            $cart = Cart::where('user_id',$bill->user_id)->where('status_cart',0)->get();
            if(empty(array_diff($cart->pluck('id')->toArray(),$bill->cart_id))){
                foreach ($cart as $item) {
                    $item->status_cart = 1;
                    $item->save();
                }    
            }
            return redirect()->to('/');
        }else{
            return redirect()->back()->with('false','Đặt đơn không thành công !');
        }
        
    }
    
}