@extends('template')
@section('content')
<div class="page-heading detail-page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Detail</h2>
                    <span>Detail this product</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-image">
                    <img src="uploads/{{$product->images}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">

                    <h4>{{$product->name}}</h4>
                    <h6 style="margin-top:10px">${{$product->price}}</h6>
                    <em>Amount:<strong>{{$product->amount}} products</strong></em>
                    <div style="margin-top: 10px; margin-bottom:10px">
                        <p>{{$product->description}}</p>
                    </div>
                    <p >Category:
                        @php
                        $category = '';
                        if($product->category_id==1){
                        $category = 'Man clothes';
                        }elseif($product->category_id ==2){
                        $category= 'Woman clothes';
                        }else{
                        $category = 'Unisex clothes';
                        };
                        $brand = '';
                                if ($product->brand_id == 1) {
                                $brand = 'Dior';
                                } elseif ($product->brand_id == 2) {
                                $brand = 'Dolce';
                                }
                        @endphp
                        <strong style="color:black">{{$category}}</strong>
                    </p>
                    <p style="margin-bottom:20px">Brand:
                        <strong style="color:black">{{$brand}}</strong>
                    </p>
                  
                    <button class="buttonAmount" onclick="decreaseQuantity()">-</button>
                    <input class="inputAmount" id="quantity" type="text" value="1" min="1" name="amount" disabled >
                    <button class="buttonAmount" onclick="increaseQuantity()">+</button>
                    <div class="Order"">
                    @auth
                        <a href=""><button class="Orderbutton">Order</button></a>
                    @else  
                        <a href="/login"><button class="Orderbutton">Login to order</button></a>
                    @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1>Same Products</h1>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <img src="" alt="">
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

     var productAmount = <?php echo  $product->amount ?>;
        function increaseQuantity() {
            var quantityInput = document.getElementById("quantity");
            quantityInput.value = parseInt(quantityInput.value) + 1;
            if (quantityInput.value > productAmount) { // Sử dụng giá trị biến JavaScript
                quantityInput.value = productAmount;
            }
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById("quantity");
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
@endsection