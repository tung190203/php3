@extends('template')
@section('content')
<div class="page-heading about-page-heading" id="top">
</div>
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form action="{{route('addUser')}}" method="post">
                    @csrf
                    <div class="heading">
                        Register
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label"> Name</label> <span></span>
                        <span>
                            @if($errors->has('name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </span>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">Email </label>
                        <span>
                            @if($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </span>
                        <input type="email" name="email" class="form-control" value="{{old('email')}}" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <span>
                            @if($errors->has('password'))
                            <div class="alert alert-danger">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </span>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label">Confirm Password</label>                        
                            <span>
                                @if($errors->has('password_confirmation'))
                                <div class="alert alert-danger">
                                {{ $errors->first('password_confirmation') }}
                                </div>
                                @endif
                            </span>
                        <input type="password" name="password_confirmation" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-dark btn-block mb-4">Register</button>
                    <div>
                        <p style="margin-bottom: 10px;">Have a account? <a href="/login">Login</a></p>
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