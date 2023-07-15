@extends('template')
@section('content')
<div class="page-heading about-page-heading" id="top">
</div>
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{route('userLogin')}}" method="post">
            @csrf
            <div class="heading">
                Login
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Email </label>
               
                <input type="email" name="email" class="form-control"/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control"/>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-dark btn-block mb-4">Register</button>
            <div>
            <p style="margin-bottom: 10px;">Not a member? <a href="/register">Register</a></p>
            </div>
            <div class="text-center">
                <p style="margin-bottom: 20px;">or sign in with:</p>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fa fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-info btn-floating mx-1">
                    <i class="fa fa-google"></i>
                </button>

                <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fa fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-secondary btn-floating mx-1">
                    <i class="fa fa-github"></i>
                </button>
            </div>
        </form>
            </div>
            <div class="col-lg-3"></div>
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
importCSS("assets/css/app.css");
</script>
@endsection
