<?php

namespace App\Http\Controllers;
use App\Models\Coupon;
use Cron\DayOfWeekField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CouponController extends Controller
{
    //
    public function apply(Request $request)
    {
        $couponCode = $request->input('code');
        $coupon = Coupon::where('code', $couponCode)->first();
    
        if ($coupon) {
            //chuyển đổi thành đối tượng carbon
            $expirationTime = Carbon::parse($coupon->expiration_time);
            //lấy carbon now
            $currentDate = Carbon::now();
            //so sánh nếu ngày hết hạn lớn hơn thì còn hạn < thì hết hạn
            if ($expirationTime->greaterThan($currentDate)) {
                $couponValue = $coupon->discount;
                return redirect()->back()->with('success', 'Mã coupon đã được áp dụng thành công!')->with('couponValue', $couponValue);
            } else {
                return redirect()->back()->with('error', 'Mã coupon đã hết hạn!');
            }
        } else {
            return redirect()->back()->with('error', 'Mã coupon không hợp lệ!');
        }
    }
    
    public function tableCoupon(){
        $coupon = DB::table('coupons')->get();
        return view('admin.coupons.coupon',['coupon'=>$coupon]);
    }
    public function coupon(){
        return view('admin.coupons.add-coupon');
    }
    public function createcoupon(Request $request){
        $data = $request->only('code','discount','expiration_time');
        $couponExists = Coupon::where('code',$data['code'])->exists();
        if(!$couponExists){
            $data = new Coupon();
            $data->code = $request->code;
            $data->discount =$request->discount;
            $data->expiration_time = $request->expiration_time;
            $data->save();
            return redirect()->back()->with('success','Thêm mã giảm giá thành công');
        }else{
            return redirect()->back()->with('error','Thêm mã giảm giá không thành công');
        }
    }
    public function editCoupon(){
        $id = request()->id;
        $coupon =Coupon::where('id',$id)->first();
        return view('admin.coupons.edit-coupon',['coupon'=>$coupon]);
    }
    public function updateCoupon(Request $request ,$id){
        $coupon = Coupon::find($id);
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->expiration_time = $request->expiration_time;
        $coupon->save();
        return redirect()->to('/coupon-table')->with('success','Update mã giảm giá thành công');
    }
    public function delete($id){
     Coupon::findOrFail($id)->delete();
    return redirect()->back()->with('success','Xóa mã giảm giá thành công');
    }

}