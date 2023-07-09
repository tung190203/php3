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
        <div class="row">
            <label for="" style="margin-bottom: 20px;">
                <h4>Bills Detail</h4>
            </label>
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <th>Bill</th>
                        <th>Total</th>
                        <th>Payment Methods</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)
                        <tr>
                            <td>{{$bill->id}}</td>
                            <td>${{$bill->total}}</td>
                            <td>{{$bill->pttt}}</td>
                            <td>{{$bill->status_bill}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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