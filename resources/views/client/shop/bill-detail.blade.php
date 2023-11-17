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
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-lg-6">
                <label for="" style="margin-bottom: 20px;">
                    <h4>Bill Detail</h4>
                </label>
            </div>
            <div class="col-lg-6 d-flex align-items-end justify-content-end">
            <a href="/bill"><button type="" class="Orderbutton">Back to bills</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <th>Cart ID</th>
                        <th>Product Name</th>
                        <th>Images</th>
                        <th>Amount</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        @foreach($cart as $ct)
                        <tr>
                            <td>{{$ct->id}}</td>
                            <td>{{$ct->name}}</td>
                            <td><img width="100" height="100" src="uploads/{{$ct->images}}"></td>
                            <td>{{$ct->product_amount}} products</td>
                            <td>$ {{$ct->product_amount * $ct->price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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