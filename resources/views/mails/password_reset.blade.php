<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px 0;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #333333;
        }

        .content {
            text-align: center;
            margin: 20px 0;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #666666;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #218838;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #999999;
        }

        .footer a {
            color: #999999;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Reset Your Password</h1>
        </div>
        <div class="content">
            <p>Hi there,</p>
            <p>Click on the button below to reset your password!</p>
            <a href="{{ $link }}"><button class="btn">Reset your password</button></a>
            <p>If you didn't create an account, you can safely ignore this email.</p>
        </div>
        <div class="footer">
            <p>© Pakistan Security Printing Corporation. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
