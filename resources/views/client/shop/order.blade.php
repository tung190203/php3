@extends('template')
@section('content')
<div class="page-heading about-page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Order</h2>
                    <span>Order this product</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us">
    <div class="container">
        <div class="row">
            <label for="" style="margin-bottom: 20px;">
                <h4>Product Detail</h4>
            </label>
            <div class="col-lg-12">
                @if(empty($product))
                <table class="table">
                    <thead>
                    <th>ID Cart</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Size</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <tr>
                       <td style="text-align:center" colspan="7">Không có sản phẩm nào</td>
                    </tr>
                </tbody>
                </table>
                <div class="row">
            <div class="col-lg-6">
                <label for="" style="margin-bottom: 20px">
                    <h4>User Information</h4>
                </label>
                <form class="forminfo">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" disabled value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" disabled value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" disabled value="{{$user->phone}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" disabled value="{{$user->address}}">
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label for="" style="margin-bottom: 20px;">
                    <h4>Order Detail</h4>
                </label>
                <form class="forminfo1" action="" method="">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-lg-9">
                                <label for="">Product</label>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Price</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-9">
                                <p>Shipping</p>
                            </div>
                            <div class="col-lg-3">
                                <p>$0</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <hr>
                        <div class="row">
                            <div class="col-lg-9">
                                <p>Total</p>
                            </div>
                            <div class="col-lg-3">
                                <p>$0</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" checked name="pttt" value="Thanh toán khi nhận hàng">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                        </div>
                        <div class="payment_item active mt-2 ">
                            <div class="radion_btn">
                                <input type="radio" name="pttt" value="Chuyển tiền online">
                                <label for="f-option6">Paypal </label>
                                <div class="check"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="/"><button type="submit" class="Orderbutton" >Purchase</button></a>
                    </div>
                </form>
                @else
                <table class="table">
                    <thead>
                        <th>ID Cart</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Size</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($product as $pro)
                        <tr>

                            <td>{{$pro->id}}</td>
                            <td class="bill_name">{{$pro->name}}</td>
                            <td><img width="100" src="uploads/{{$pro->images}}" alt=""></td>
                            <td>{{$pro->price}}</td>
                            <td>{{$pro->product_amount}}</td>
                            <td>{{$pro->product_size}}</td>
                            <td>
                                <form action="{{route('cart.delete',['id'=>$pro->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="Orderbutton">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="" style="margin-bottom: 20px">
                    <h4>User Information</h4>
                </label>
                <form class="forminfo">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" disabled value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" disabled value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" disabled value="{{$user->phone}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" disabled value="{{$user->address}}">
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label for="" style="margin-bottom: 20px;">
                    <h4>Order Detail</h4>
                </label>
                <form class="forminfo1" action="{{route('bill.order',['id'=>$pro->user_id])}}" method="post">
                    @csrf
                    @foreach($product as $pro)
                    <input type="hidden" name="cart_id[]" value="{{$pro->id}}">
                    @endforeach
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-lg-9">
                                <label for="">Product</label>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Price</label>
                            </div>
                        </div>
                    </div>
                    <!--list hàng-->
                    @foreach($product as $pro)
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-9">
                                <p>{{$pro->name}}(x{{$pro->product_amount}})({{$pro->product_size}})</p>
                            </div>
                            <div class="col-lg-3">
                                <p>${{$pro->product_amount * $pro->price}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--tổng tiền-->
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-9">
                                <p>Shipping</p>
                            </div>
                            <div class="col-lg-3">
                                <p>$3</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <hr>
                        <div class="row">
                            <div class="col-lg-9">
                                <p>Total</p>
                            </div>
                            @php
                            $totalAmount = 0;
                            @endphp

                            @foreach($product as $pro)
                            @php
                            $price = ($pro->product_amount * $pro->price) + 3; // Tính giá trị của sản phẩm
                            $totalAmount += $price; // Cộng giá trị sản phẩm vào tổng
                            @endphp
                            @endforeach
                            <div class="col-lg-3">
                                <input type="hidden" name="total" value="{{$totalAmount}}">
                                <p>${{$totalAmount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" checked name="pttt" value="Thanh toán khi nhận hàng">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                        </div>
                        <div class="payment_item active mt-2 ">
                            <div class="radion_btn">
                                <input type="radio" name="pttt" value="Chuyển tiền online">
                                <label for="f-option6">Paypal </label>
                                <div class="check"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="Orderbutton">Order Confirmation</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
function importCSS(url) {
    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = url;
    document.getElementsByTagName("head")[0].appendChild(link);
}
importCSS("assets/css/textcontent.css");
</script>
@endsection