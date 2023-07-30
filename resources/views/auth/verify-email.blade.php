
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
            transition: 0.5s;
            border: none;
        }
        .verify-button:hover{
            background-color: #fff;
            color: #007bff;
            transition: 0.5s;
            border: 1px solid #007bff;
        }
    </style>
</head>

    <div class="container">
        <div class="header">Email Verification</div>
        <div class="content">
        Thank you for registering!
        <p>
            <br> Please check your email and click on the verification link to verify your email address.</p>
        <p>If you didn't receive the email, please check your spam folder or request a new verification link.</p>
        <form action="{{route('verification.send')}}" method="POST">
            @csrf
            <button type="submit" class="verify-button">Verify Again</button>
        </form>
        </div>
    </div>


