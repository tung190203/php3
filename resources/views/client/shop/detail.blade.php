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
        <form action="{{route('product.addcart')}}" method="post">
            @csrf
            <div class="row">

                <div class="col-lg-6">
                    <div class="left-image">
                        <img height="600" src="uploads/{{$product->images}}" alt="">
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
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Category:
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
                            </div>
                            <div class="col-lg-6">
                                <p style="margin-bottom:20px">Brand:
                                    <strong style="color:black">{{$brand}}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Size</label>
                                <div>
                                    <select name="product_size" class="form-size">
                                        @foreach($product->size as $size)
                                        <option value="{{$size}}">{{$size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Số lượng</label>
                                <div>
                                    <button type="button" class="buttonAmount" onclick="decreaseQuantity()">-</button>
                                    <input class="inputAmount" id="quantity" type="text" value="1" min="1" name="product_amount">
                                    <button type="button" class="buttonAmount" onclick="increaseQuantity()">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="Order"">
                                @auth
                                <input type="submit" class=" Orderbutton" value="Order"></input>
                                    @else
                                    <a href="/login"><button class="Orderbutton">Login to order</button></a>
                                    @endauth
                                </div>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4 mt-5">
                <h1 class="align-center">Same Products</h1>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
        <div class="row">
            <section class="section" id="men">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="men-item-carousel">
                                <div class="owl-men-item owl-carousel">
                                    @foreach($sameProducts as $prs)
                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li><a href="{{route('product.detail',['id'=> $prs->id])}}"><i
                                                                class="fa fa-eye"></i></a></li>
                                                    <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <img width="350" height="368.91" src="uploads/{{$prs->images}}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4 class="prname">{{$prs->name}}</h4>
                                            <span>$ {{$prs->price}}</span>
                                            <ul class="stars">
                                                <em>Amount ({{$prs->amount}})</em>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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