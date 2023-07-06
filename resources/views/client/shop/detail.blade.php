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
                    <h6>${{$product->price}}</h6>
                    <em>Amount:{{$product->amount}}</em>
                    <div style="margin-top: 10px; margin-bottom:10px">
                        <p>{{$product->description}}</p>
                    </div>
                    <p style="margin-bottom: 10px">Category:
                    <h6>{{$product->category_id}}</h6>
                    </p>
                    <p style="margin-bottom:40px">Brand:
                    <h6>{{$product->brand_id}}</h6>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection