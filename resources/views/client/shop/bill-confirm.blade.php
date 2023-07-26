@extends('template')
@section('content')
<div class="page-heading about-page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Bill Confirm</h2>
                    <span>Thanks for ordering</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container mb-5 mt-3">
                            <div class="row d-flex align-items-baseline">
                                <div class="col-xl-8">
                                    <p style="color: #7e8d9f;font-size: 20px;">Invoice >>
                                        <strong>ID:#{{$bill->id}}</strong></p>
                                </div>
                                <div class="col-xl-4 float-end">
                                    <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                            class="fa fa-print text-primary"></i> Print</a>
                                            <input type="hidden" name="bill_id" value="{{$bill->id}}">
                                   <a href="{{route('bill.export',['bill_id'=>$bill->id])}}" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                            class="fa fa-file text-danger"></i>Export</a>     
                                </div>
                                <hr>
                            </div>
                            <div class="container">
                                <div class="col-md-12" style="margin-bottom:100px;margin-top:50px">
                                    <div class="text-center">
                                        <img src="assets/images/logo.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-8">
                                        <ul class="list-unstyled">
                                            <li class="text-muted">To: <span
                                                    style="color:#5d9fc5 ;">{{Auth::user()->name}}</span></li>
                                            <li class="text-muted"><i class="fa fa-envelope"></i> {{Auth::user()->email}}</li>
                                            <li class="text-muted"><i class="fa fa-map-marker"></i> {{Auth::user()->address}}</li>
                                            <li class="text-muted"><i class="fa fa-phone"></i> {{Auth::user()->phone}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="text-muted">Invoice</p>
                                        <ul class="list-unstyled">
                                            <li class="text-muted"><i class="fa fa-circle" style="color:#84B0CA ;"></i>
                                                <span class="fw-bold">ID:</span>#{{$bill->id}}</li>
                                            <li class="text-muted"><i class="fa fa-circle" style="color:#84B0CA ;"></i>
                                                <span class="fw-bold">Creation Date: </span>{{$bill->created_at}}</li>
                                            <li class="text-muted"><i class="fa fa-circle" style="color:#84B0CA ;"></i>
                                                <span class="me-1 fw-bold">Status: </span><span
                                                    class="badge bg-success text-white fw-bold">
                                                    {{$bill->status_bill}}</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row my-2 mx-1 justify-content-center" style="margin-top: 30px;">
                                    <table class="table table-striped table-borderless" style="margin-top: 30px;">
                                        <thead style="background-color:#84B0CA ;" class="text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Size</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cart as $ct)
                                            <tr>
                                                <th scope="row">{{$ct->id}}</th>
                                                <td>{{$ct->name}}</td>
                                                <td><img width="100" src="uploads/{{$ct->images}}" alt=""></td>
                                                <td>{{$ct->product_amount}} products</td>
                                                <td>${{$ct->price}}</td>
                                                <td>{{$ct->product_size}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xl-8">
                                        <p class="ms-3"></p>
                                    </div>
                                    <div class="col-xl-3">
                                        <ul class="list-unstyled">
                                            <li class="text-muted ms-3"><span class="text-black me-4">Shipping:
                                                @php
                                                $count = count($cart);
                                                @endphp
                                                </span>${{$count *3}}</li>
                                        </ul>
                                        <p class="text-black float-start"><span class="text-black me-3">Total
                                                Amount:</span>
                                            <span style="font-size: 25px;">${{$bill->total}}</span>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-9">
                                        <p>Thank you for your purchase</p>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="/"><button type="button" class="Orderbutton text-capitalize ">Back to home</button></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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