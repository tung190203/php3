@extends('template')
@section('content')
 <!-- ***** Main Banner Area Start ***** -->
 <div class="page-heading1" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Woman Products</h2>
                        <span>Women's fashion paradise</span>
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
                @foreach($products as $pr)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="single-product.html"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img  class="imgg" src="uploads/{{$pr->images}}" alt="">
                        </div>
                        <div class="down-content">
                            <h4 >{{$pr->name}}</h4>
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
    <!-- ***** Products Area Ends ***** -->
@endsection