<?php
namespace App\Http\Controllers;
use App\Http\Requests\CreateCouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CouponController extends Controller
{
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
        $coupon = Coupon::all();
        return view('admin.coupons.coupon',compact('coupon'));
    }
    public function search(Request $request){
        $searchKeyword = $request->input('search');
        if(!empty($searchKeyword)){
            $coupon  =Coupon::where('code','LIKE','%'.$searchKeyword.'%')->get();
            return view('admin.coupons.coupon',compact('coupon'));
        }else{
            $coupon = Coupon::all();
            return view('admin.coupons.coupon',compact('coupon'));
        }
    }
    public function coupon(){
        return view('admin.coupons.add-coupon');
    }
    public function createcoupon(CreateCouponRequest $request){
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
            return redirect()->back()->withInput()->with('error','Thêm mã giảm giá không thành công');
        }
    }
    public function editCoupon(){
        $id = request()->id;
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit-coupon',compact('coupon'));
    }
    public function updateCoupon(Request $request ,$id){
        $coupon = Coupon::find($id);
        $coupon->update($request->all());
        return redirect()->to('/coupon-table')->with('success','Update mã giảm giá thành công');
    }
    public function delete($id){
     Coupon::findOrFail($id)->delete();
    return redirect()->back()->with('success','Xóa mã giảm giá thành công');
    }
    public function arrayDelete(Request $request ){
        $array = $request->input('arraydelete');
        if(!empty($array)){
        Coupon::whereIn('id',$array)->delete();
        }else{
            return redirect()->back()->with('error','Coupon không tồn tại hoặc chưa được lựa chọn');    
        }
        return redirect()->back()->with('success','Đã xóa thành công');
    }
}