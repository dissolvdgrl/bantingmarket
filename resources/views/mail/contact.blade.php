<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body style="background-color: #e2e2e2">
        <div style="background-color:#ffffff; width:100%; max-width:640px;margin:100px auto;font-family:Arial, Helvetica, sans-serif;padding:20px;">
            <h1 style="font-size: 32px;">New message!</h1>
            <p><strong>From:</strong> {{ $firstname }}</p>
            <p><strong>Email:</strong> {{ $email_address }}</p>
            <p><strong>Subject:</strong> {{ $msg_subject }}</p>
            <p><strong>Message:</strong><br> {{ $msg_body }}</p>
        </div>
    </body>
</html>