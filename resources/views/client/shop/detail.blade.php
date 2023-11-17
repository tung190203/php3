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
                        <img height="500" src="uploads/{{$product->images}}" alt="">
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
                                    <strong style="color:black">{{$product->category->name}}</strong>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p style="margin-bottom:20px">Author:
                                    <strong style="color:black">{{$product->author->name}}</strong>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Số lượng</label>
                                <div>
                                    <button type="button" class="buttonAmount" onclick="decreaseQuantity()">-</button>
                                    <input class="inputAmount" id="quantity" type="text" value="1" min="1"
                                        name="product_amount">
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
                                    <button type=" submit" class="Orderbutton">Order</button>
                                    @else
                                    <a href="/login"><button class="Orderbutton" type="button"
                                            value="">Login</button></a>
                                    @endauth
                                </div>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="container">
            <div class="row" style="margin-bottom: 30px;">
                <div class="col-lg-12 mt-5">
                    <h4>Review</h4>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if(Auth::user())
            <div class="row">
                <div class=" col-lg-12">
                    <div style="max-height:500px;overflow-y:auto; border:1px solid #efefef;border-radius:5px">
                        @foreach($comment as $cm)
                        <div class="card-body col-lg-11"
                            style="margin-top: 20px;margin-left:40px;margin-bottom:15px; border:1px solid white ; border-radius:5px ;box-shadow:0 0 3px black;">
                            <div class="align-items-center">
                                <div>
                                    <h6 class="fw-bold mb-1">{{$cm->user->name}}</h6>
                                    <p class="text-muted small">
                                        {{$cm->created_at}}
                                    </p>
                                </div>
                            </div>
                            <p class="mt-2 mb-2 pb-1">
                                {{$cm->content}}
                            </p>
                            <div class="small d-flex justify-content-start">
                                <a href="#!" style="margin-right: 20px;" class="d-flex align-items-center me-3">
                                    <i style="margin-right: 2px;" class="fa fa-thumbs-up me-3"></i>
                                    <p class="mb-0">Like</p>
                                </a>
                                <a href="#!" style="margin-right: 20px;" class="d-flex align-items-center me-3">
                                    <i style="margin-right: 2px;" class="fa fa-comment me-3"></i>
                                    <p class="mb-0">Comment</p>
                                </a>
                                <div id="replyForm" style="display: none;"></div>
                                <a href="#!" class="d-flex align-items-center me-3">
                                    <i style="margin-right: 2px;" class="fa fa-share me-3"></i>
                                    <p class="mb-0">Share</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                    <div class="card">
                        <form action="{{route('comment.add')}}" method="post">
                            @csrf
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class=" w-100">
                                    <div class="form-outline w-100">
                                        <label class="form-label" for="textAreaExample">Message</label>
                                        <textarea class="form-control" id="textAreaExample" rows="4"
                                            style="background: #fff;" name="content"></textarea>
                                    </div>
                                </div>
                                <div class="float-end mt-2 pt-1">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="Orderbutton">Post comment</button>
                                    <button type="reset" class="Orderbutton">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <p>Khách hàng vui lòng <a href="/login">Đăng nhập</a> để bình luận</p>
                        </div>
                        <div class="col-lg-4"></div>
            </div>
            @endif
        </div>
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