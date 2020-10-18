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
    </head>
    <body style="background-color: #e2e2e2">
        <div style="background-color:#ffffff; width:100%; max-width:640px;margin:100px auto;font-family:Arial, Helvetica, sans-serif;padding:20px;">
            <p><strong>Hi {{ $name_surname }},</strong></p>
            <p>Thank you for your interest in selling your products at the Banting Market. We will review your application shortly and get back to you with the verdict in about 5 working days.</p>
            <p>Please note that any deviation from the products specified in your application is subject to review, since we are a strictly banting/keto/low-carb market and work with dieticians to ensure our customers can trust us to allow only sugar-free, real food at the market. You will need to contact us with any additional products not listed here so we can go through the approval process with our experts.</p>
            <p>Below is a copy of the application details you've submitted.</p>
            <p><strong>Stand name:</strong> {{ $stall_name }}</p>
            <p><strong>Name & surname:</strong> {{ $name_surname }}</p>
            <p><strong>Car registration:</strong> {{ $car_reg }}</p>
            <p><strong>Phone number:</strong> {{ $phone }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Address:</strong> {{ $address }}</p>
            <p><strong>Website:</strong> {{ $website }}</p>
            @if ($facebook)
                <p><strong>Facebook:</strong> {{ $facebook }}</p>
            @endif
            @if ($instagram)
                <p><strong>Instagram:</strong> {{ $instagram }}</p>
            @endif
            <p><strong>I produce my own products:</strong> {{ $produce_self }}</p>
            <p><strong>Products:</strong> </p>
            <ul>
                @foreach ($products as $product)
                    <li>{{ $product['name'] }}: {{ $product['ingredients'] }}</li>
                @endforeach
            </ul>
            <p><strong>Stand type:</strong> {{ $stand_type }}</p>
            @if ($appliances)
                <p><strong>Appliance(s):</strong> {{ $appliances }}</p>
            @endif
            @if ($use_gas)
                <p><strong>I use gas</strong></p>
            @endif
            <p><strong>Do you follow our social media pages?</strong> {{ $social_media }}</p>

            <p>Kind regards,</p>
            <p>Karin Loots</p>
            <p>Organiser | 079 527 4902</p>
            <a href="https://realfoodmarket.info/">www.realfoodmarket.info/</a>
        </div>
    </body>
</html>