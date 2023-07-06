@extends('template')
@section('content')
<section class="loginf">
        <div class="form-box">
            <div class="form-value">
                <form action="" method="">
                    <h2>Forgot</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <button type="submit">Send Require</button>
                    <div class="register">
                        <p>Back to login page <a href="/login">Login</a></p>
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