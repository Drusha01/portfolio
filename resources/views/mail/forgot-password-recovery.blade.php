<!DOCTYPE html>
<html>
<head>
    <!-- not nice - ace dev - https://github.com/Drusha01 -->
    <meta charset="utf-8">
    <title>Account Recovery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .verification-code {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: black;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
            <img src="<?php echo $message->embed(asset('assets/page/dev.png') ); ?>">
            </div>
            <h1>Drusha's portfolio</h1>
        </div>

        <p>Dear {{$email}},</p>

        <p>This is the link to recover your account.</p>
        <a href="<?php if($_SERVER['SERVER_PORT'] == 80){echo 'http://'.$_SERVER['SERVER_NAME'].'/'.'account/recovery/'.$hash;}else{echo 'https://'.$_SERVER['SERVER_NAME'].'/'.'account/recovery/'.$hash;}?>   ">
            <?php if($_SERVER['SERVER_PORT'] == 80){echo 'http://'.$_SERVER['SERVER_NAME'].'/'.'account/recovery/'.$hash;}else{echo 'https://'.$_SERVER['SERVER_NAME'].'account/recovery/'.$hash;}?>
        </a> 
        <p>If you did not request this account recovery, please ignore this email.</p>
        <div class="footer">
            <p>Best Regards,</p>
            <p>Drusha01</p>
        </div>
    </div>
</body>
</html>
