@extends('template')
 @section('content')
 <section class="container">
<h1>Events</h1>
<h3 style="margin-bottom: 30px;">Voucher còn hạn sử dụng</h3>
  <div class="row">
    @foreach($vouchers as $vc)
    <article class="card fl-left">
      <section class="date">
        <time datetime="23th feb">
          <small style="color: black;font-size:20px">Voucher</small>
        </time>
      </section>
      <section class="card-cont">
        <h3>Voucher giảm giá {{$vc->discount}} toàn ngành hàng</h3>
        <h6 style="margin: 10px 15px;color:black">Mã:{{$vc->code}}</h6>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>{{$vc->expiration_time}}</span>
         </time>
        </div>
       
        <a href="shop">tickets</a>
      </section>
    </article>
    @endforeach
  </div>
  <h3 style="margin-bottom: 30px;">Voucher hết hạn sử dụng</h3>
  <div class="row">
    @foreach($voucher as $vc)
    <article class="card fl-left">
      <section class="date">
        <time datetime="23th feb">
          <small style="color: black;font-size:20px">Voucher</small>
        </time>
      </section>
      <section class="card-cont">
        <h3>Voucher giảm giá {{$vc->discount}} toàn ngành hàng</h3>
        <h6 style="margin: 10px 15px;color:black">Mã:{{$vc->code}}</h6>
        <div class="even-date">
         <i class="fa fa-calendar"></i>
         <time>
           <span>{{$vc->expiration_time}}</span>
         </time>
        </div>
       
        <a href="shop">tickets</a>
      </section>
    </article>
    @endforeach
  </div>
</section>
<script>
function importCSS(url) {
    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = url;
    document.getElementsByTagName("head")[0].appendChild(link);
}
importCSS("assets/css/voucher.css");
</script>
 @endsection