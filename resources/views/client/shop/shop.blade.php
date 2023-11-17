@extends('template')
@section('content')
<style>

</style>
<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>All Products</h2>
                    <span>All fashion items are here</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Products Area Starts ***** -->
<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Latest Products</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">   
            <div class="col-lg-3 col-sm-12" style="text-align:center;">
                <h1 style="font-size:40px;margin-bottom:40px"><em>Filters</em></h1>
                <form action="{{route('product.filter')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-12">
                        <input type="text" style="width: 209.5px;" name="search" class="form-input" placeholder="Tìm kiếm sản phẩm..." >
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-lg-12">
                            <select class="form-select form-select-sm" name="category">
                            <option selected>Tìm theo danh mục</option>
                            @foreach($category as $ct)
                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                   <div class="row" style="margin-bottom: 20px;">
                   <div class="col-lg-12">
                    <button class="btn btn-primary" style="height: 39px;">Tìm kiếm</button>
                    </div>
                   </div>
                    
                </form>
            </div>
            <div class="col-lg-8 col-sm-12">
            <div class="row">      
            @foreach($products as $pr)
            <div class="col-lg-4">
                <div class="item">
                    <div class="thumb">
                        <div class="hover-content">
                            <ul>
                            <li><a href=""><i class="fa fa-eye"></i></a></li>
                            <li><a href="{{route('product.detail',['id'=> $pr->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <img class="imgg" src="uploads/{{$pr->images}}" alt="">
                    </div>
                    <div class="down-content">
                        <h4>{{$pr->name}}</h4>
                        <span>${{$pr->price}}</span>
                        <em>Amount: {{$pr->amount}}</em>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                {{$products->links()}}
            </div>
        </div>
            </div>
        </div>
        
    </div>
</section>
<script>
function importCSS(url) {
    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = url;
    document.getElementsByTagName("head")[0].appendChild(link);
}
importCSS("assets/css/textcontent.css");
importCSS("assets/css/tailwind.output.css");
</script>
@endsection