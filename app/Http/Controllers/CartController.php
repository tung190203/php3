<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function addCart(Request $request){
    $data = $request->only('product_id','product_amount');
    $user = Auth::user();
    $data['user_id'] = $user->id;
    $cart = Cart::where('product_id', $data['product_id'])->where('user_id',$user->id)->where('status_cart',0)->first();
    if ($cart){
        $cart->product_amount += $data['product_amount'];
        $cart->save();
    } else {
        Cart::create($data);
    }
    return redirect()->to('/order');
}
public function delete($id){
    Cart::find($id)->delete();
    return redirect()->back()->with('success','Xóa thành công');
}
}
