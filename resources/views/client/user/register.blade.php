@extends('template')
@section('content')
<section class="loginf">
        <div class="form-box">
        @if(Session::has('false'))
            <script>
                alert("{{Session::get('false')}}");
            </script>
            @endif
            <div class="form-value">
                <form method="POST" action="{{ route('addUser') }}" >
                @csrf
                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="name" name="name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-open-outline"></ion-icon>
                        <input type="password" name="confirm-password" required>
                        <label for="cpassword">Confirm password</label>
                    </div>
                    
                    <div class="forget">
                        <label for=""><input type="checkbox" name="rmb">Remember Me</label>
                    </div>
                    <button type="submit">Register</button>
                    <div class="register">
                        <p style="color:white"> Have a account <a href="/login">Login</a></p>
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