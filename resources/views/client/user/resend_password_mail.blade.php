<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
        .form{
            border: 1px solid white;
            border-radius: 5px;
            padding: 50px  50px  50px 50px;
            margin-top: 250px;
            box-shadow: 0 0 5px black;
        }
        .heading{
            font-size: 30px;
            text-align: center;
            margin-bottom: 30px;
        }
        .rsb{
            transition: 0.5s;
        }
        .rsb:hover{
            color: black;
            background-color: white;
            transition: 0.5s;
        }
        </style>
    </head>

    <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
            <form action="{{route('user.reset')}}" method="post" class="form">
            @csrf
            <div class="heading">
                Reset Password
            </div>
            <input type="hidden" name="token" value="{{$token}}">
            <div class="form-outline mb-4">
                <label class="form-label">Password </label>
                <input type="password" name="password" class="form-control" required />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Password Confirmation </label>
                <input type="password" name="password_confirmation" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-dark btn-block mb-4 rsb">Reset Password</button>
        </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    </body>
</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>