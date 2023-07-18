<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $bill->total = $request->input('total');
        $bill->pttt = $request->input('pttt');
        $bill->user_id = $user->id;
        $bill->cart_id = $request->input('cart_id');
          if(empty($user->phone) || empty($user->address)){
        return redirect()->back()->with('error','Vui lòng nhập đầy đủ thông tin điện thoại và địa chỉ.');
    }
        $bill->address = $user->address;
        $bill->phone = $user->phone;
        $bill->save();
        if($bill->id){
            $cart = Cart::where('user_id',$bill->user_id)->where('status_cart',0)->get();
            if(empty(array_diff($cart->pluck('id')->toArray(),$bill->cart_id))){
                foreach ($cart as $item) {
                    $item->status_cart = 1;
                    $item->save();
                    $product = Product::find($item->product_id);
                if ($product) {
                    $product->amount = $product->amount - $item->product_amount;
                    $product->save();
                }
                }    
            }
            return redirect()->to('/');
        }else{
            return redirect()->back()->with('false','Đặt đơn không thành công !');
        }
    }  
    public function billDetail(){
        $id = request()->id;
        $bill = Bill::findOrFail($id);
        $cart = DB::table('carts')->join('products','carts.product_id','=','products.id')
        ->select('products.name','products.images','products.price','carts.id','carts.product_size','carts.product_amount')
        ->whereIn('carts.id',$bill->cart_id)->get();
        
        return view('client.shop.bill-detail',['cart'=>$cart,'bill'=>$bill]);
    }
    public function billDetailAdmin(){
        $id = request()->id;
        $bill = Bill::findOrFail($id);
        $cart = DB::table('carts')->join('products','carts.product_id','=','products.id')
        ->select('products.name','products.images','products.price','carts.id','carts.product_size','carts.product_amount')
        ->whereIn('carts.id',$bill->cart_id)->get();
        
        return view('admin.bills.bill-admin',['cart'=>$cart,'bill'=>$bill]);
    }
    public function delete($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();
        $cart = Cart::whereIn('id', $bill->cart_id)->where('user_id', $bill->user_id)->where('status_cart', 1)->get();
        //nếu không trống
        if ($cart->isNotEmpty()) {
            //Lặp lại từng cart->xóa
            $cart->each(function ($item) {
                $item->delete();
            });
        }
        return redirect()->back()->with('success', 'Xóa Bill thành công');
    }
    public function editBill(){
        $id = request()->id;
        $bill = Bill::where('id',$id)->first();
        return view('admin.bills.edit-bill',['bill'=>$bill]);
    }
    public function updateBill(Request $request ,$id){
        $bill = Bill::find($id);
        $bill->status_bill = $request->status_bill;
        $bill->save();
        return redirect()->to('/bill-table')->with('success','Cập nhật bill thành công !');
    }
    public function myBill(){
    $user = Auth::user();
    if(Auth::check()){
        $bills = Bill::whereIn('status_bill', ['Đơn hàng mới', 'Đang giao'])->where('user_id', $user->id)->get();
        return view('client.shop.bill', ['bills' => $bills]);
    }else{
        return redirect()->to('/login');
    }
   
}
 
}