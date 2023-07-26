
<!DOCTYPE html>
<html>
<head>
    <title> Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 5px;
            text-align: center;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .verify-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Send Email Password</div>
        <div class="content">
            
            <p>Hello</p>
            <p>You have asked to reset your password. Please click the link below to reset your password:</p>
        </div>
        <a href="{{$resetLink}}" class="verify-button">Reset Password</a>
    </div>
</body>
</html>

