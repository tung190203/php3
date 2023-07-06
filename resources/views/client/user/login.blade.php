@extends('template')
@section('content')
<section class="loginf">
@if(Session::has('false'))
            <script>
                alert("{{Session::get('false')}}");
            </script>
            @endif
    <div class="form-box">
        <div class="form-value">
            <form action="{{route('userLogin')}}" method="POST">
                @csrf
                <h2>Login</h2>

                <div class="inputbox">
                
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required>
                    <label for="email">Email</label>  
                </div>
                <span></span>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me</label>
                </div>
                <button type="submit">Login</button>
                <div class="register">
                    <label for=""><a href="/forgot">Forget Password</a></label>
                    <p>Don't have a account <a href="/register">Register</a></p>
                </div>
            </form>
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
importCSS("assets/css/app.css");
</script>
@endsection