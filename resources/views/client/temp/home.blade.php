 @extends('template')
 @section('content')
 <!-- ***** Main Banner Area Start ***** -->
 <div class="main-banner" id="top">
     <div class="container-fluid">
         <div class="row">
             <img src="assets/images/banner_sach.webp" alt="">
         </div>
     </div>
 </div>
 <!-- ***** Main Banner Area End ***** -->
         <!-- ***** Men Area Starts ***** -->
         <section class="section" id="men">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="section-heading">
                             <h2>Sách Mới Nhất</h2>
                             <span>Details to details is what makes Hexashop different from the other themes.</span>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="men-item-carousel">
                             <div class="owl-men-item owl-carousel">
                                 @foreach($products as $pr)
                                 <div class="item">
                                     <div class="thumb">
                                         <div class="hover-content">
                                             <ul>
                                                 <li><a href=""><i class="fa fa-eye"></i></a></li>
                                                 <li><a href="{{route('product.detail',['id'=> $pr->id])}}"><i
                                                             class="fa fa-shopping-cart"></i></a></li>
                                             </ul>
                                         </div>
                                         <img width="350" height="368.91" src="uploads/{{$pr->images}}" alt="">
                                     </div>
                                     <div class="down-content">
                                         <h4 class="prname">{{$pr->name}}</h4>
                                         <span>$ {{$pr->price}}</span>
                                         <ul class="stars">
                                             <em>Amount ({{$pr->amount}})</em>
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
         <!-- ***** Men Area Ends ***** -->

         <!-- ***** Women Area Starts ***** -->
         <section class="section" id="women">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="section-heading">
                             <h2>Sách Tiên Hiệp</h2>
                             <span>Details to details is what makes Hexashop different from the other themes.</span>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="women-item-carousel">
                             <div class="owl-women-item owl-carousel">
                                 @foreach($productw as $prw)
                                 <div class="item">
                                     <div class="thumb">
                                         <div class="hover-content">
                                             <ul>
                                                 <li><a href=""><i class="fa fa-eye"></i></a></li>
                                                 <li><a href="{{route('product.detail',['id'=> $prw->id])}}"><i
                                                             class="fa fa-shopping-cart"></i></a></li>
                                             </ul>
                                         </div>
                                         <img width="350" height="368.91" src="uploads/{{$prw->images}}" alt="">
                                     </div>
                                     <div class="down-content">
                                         <h4 class="prname">{{$prw->name}}</h4>
                                         <span>$ {{$prw->price}}</span>
                                         <ul class="stars">
                                             <em>Amount: ({{$prw->amount}})</em>
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
         <!-- ***** Women Area Ends ***** -->
         <section class="section" id="women">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="section-heading">
                             <h2>Sách Trinh thám</h2>
                             <span>Details to details is what makes Hexashop different from the other themes.</span>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="women-item-carousel">
                             <div class="owl-women-item owl-carousel">
                                 @foreach($productt as $prt)
                                 <div class="item">
                                     <div class="thumb">
                                         <div class="hover-content">
                                             <ul>
                                                 <li><a href=""><i class="fa fa-eye"></i></a></li>
                                                 <li><a href="{{route('product.detail',['id'=> $prt->id])}}"><i
                                                             class="fa fa-shopping-cart"></i></a></li>
                                             </ul>
                                         </div>
                                         <img width="350" height="368.91" src="uploads/{{$prt->images}}" alt="">
                                     </div>
                                     <div class="down-content">
                                         <h4 class="prname">{{$prt->name}}</h4>
                                         <span>$ {{$prt->price}}</span>
                                         <ul class="stars">
                                             <em>Amount: ({{$prt->amount}})</em>
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
         <!-- ***** Explore Area Starts ***** -->
         <section class="section" id="explore">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="left-content">
                             <h2>Explore Our Products</h2>
                             <span>You are allowed to use this HexaShop HTML CSS template. You can feel free to modify
                                 or edit
                                 this layout. You can convert this template as any kind of ecommerce CMS theme as you
                                 wish.</span>
                             <div class="quote">
                                 <i class="fa fa-quote-left"></i>
                                 <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                             </div>
                             <p>There are 5 pages included in this HexaShop Template and we are providing it to you for
                                 absolutely free of charge at our TemplateMo website. There are web development costs
                                 for us.
                             </p>
                             <p>If this template is beneficial for your website or business, please kindly <a
                                     rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a
                                 little via PayPal.
                                 Please also tell your friends about our great website. Thank you.</p>
                             <div class="main-border-button">
                                 <a href="/">Discover More</a>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="right-content">
                             <div class="row">
                                 <div class="col-lg-6">
                                     <div class="leather">
                                         <h4>Tri thức</h4>
                                         <span> Tri thức là vô hạn</span>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="first-image">
                                         <img height="255px" src="assets/images/trithuc.jpeg" alt="">
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="second-image">
                                         <img height="255px" src="assets/images/trithuc2.jpeg" alt="">
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="types">
                                         <h4>Khác Biệt</h4>
                                         <span>Sự khác biệt nhất</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- ***** Explore Area Ends ***** -->
         <!-- ***** Subscribe Area Starts ***** -->
         <div class="subscribe">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-8">
                         <div class="section-heading">
                             <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                             <span>Details to details is what makes Hexashop different from the other themes.</span>
                         </div>
                         <form id="subscribe" action="" method="get">
                             <div class="row">
                                 @if(Auth::user())
                                 <div class="col-lg-5">
                                     <fieldset>
                                         <input name="name" type="text" id="name" placeholder="Your Name"
                                             value="{{Auth::user()->name}}" required>
                                     </fieldset>
                                 </div>
                                 <div class="col-lg-5">
                                     <fieldset>
                                         <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                             placeholder="Your Email Address" required value="{{Auth::user()->email}}">
                                     </fieldset>
                                 </div>
                                 @else
                                 <div class="col-lg-5">
                                     <fieldset>
                                         <input name="name" type="text" id="name" placeholder="Your Name" required>
                                     </fieldset>
                                 </div>
                                 <div class="col-lg-5">
                                     <fieldset>
                                         <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                             placeholder="Your Email Address" required>
                                     </fieldset>
                                 </div>
                                 @endif
                                 <div class="col-lg-2">
                                     <fieldset>
                                         <button type="submit" id="form-submit" class="main-dark-button"><i
                                                 class="fa fa-paper-plane"></i></button>
                                     </fieldset>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <div class="col-lg-4">
                         <div class="row">
                             <div class="col-6">
                                 <ul>
                                     <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                     <li>Phone:<br><span>(+84) 869-888-319</span></li>
                                     <li>Office Location:<br><span>Trịnh Văn Bô - FPT Polytechnic</span></li>
                                 </ul>
                             </div>
                             <div class="col-6">
                                 <ul>
                                     <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                     <li>Email:<br><span>Hexashop.team@gmail.com</span></li>
                                     <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a
                                                 href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         @endsection