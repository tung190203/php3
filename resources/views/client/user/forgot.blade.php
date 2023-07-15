@extends('template')
@section('content')
<div class="page-heading about-page-heading" id="top">
</div>
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
            <form action="" method="post">
            @csrf
            <div class="heading">
                Forgot
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Email </label>
                <input type="email" name="email" class="form-control" />
            </div>
            <button type="submit" class="btn btn-dark btn-block mb-4">Send</button>
            <div>
            <p style="margin-bottom: 10px;">Back to login <a href="/login">Login</a></p>
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
