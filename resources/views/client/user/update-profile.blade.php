@extends('template')
@section('content')
<section class="loginf">
    <div class="form-box">
        <div class="form-value">
            <form action="{{route('user.editprofile',['id'=>$user->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <h2>Update Profile</h2>
                <div class="inputbox">
                    <ion-icon name="people-outline"></ion-icon>
                    <input type="name" name="name" value="{{$user->name}}" required>
                    <label for="name">Name</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" value="{{$user->email}}" required>
                    <label for="email">Email</label>
                </div>  
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" value="{{$user->password}}" required>
                    <label for="password">Password</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="call-outline"></ion-icon>
                    <input type="phone" name="phone" value="{{$user->phone}}" required>
                    <label for="phone">Phone</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="planet-outline"></ion-icon>
                    <input type="address" name="address" value="{{$user->address}}" required>
                    <label for="address">Address</label>
                </div>
                <input type="hidden" name="first_login" value="1">
                <button type="submit">Update</button>
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
