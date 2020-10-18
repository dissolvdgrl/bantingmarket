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
            <h1 style="font-size: 32px;">Mark vendor aansoek</h1>
            <p><strong>Stalletjie:</strong> {{ $stall_name }}</p>
            <p><strong>Naam & van:</strong> {{ $name_surname }}</p>
            <p><strong>Kar registrasie:</strong> {{ $car_reg }}</p>
            <p><strong>Telefoon:</strong> {{ $phone }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Addres:</strong> {{ $address }}</p>
            <p><strong>Website:</strong> {{ $website }}</p>
            @if ($facebook)
                <p><strong>Facebook:</strong> {{ $facebook }}</p>
            @endif
            @if ($instagram)
                <p><strong>Instagram:</strong> {{ $instagram }}</p>
            @endif
            <p><strong>Maak self my eie produkte?</strong> {{ $produce_self }}</p>
            <p><strong>Produkte:</strong> </p>
            <ul>
                @foreach ($products as $product)
                    <li>{{ $product['name'] }}: {{ $product['ingredients'] }}</li>
                @endforeach
            </ul>
            <p><strong>Stalletjie:</strong> {{ $stand_type }}</p>
            @if ($appliances)
                <p><strong>Appliance(s):</strong> {{ $appliances }}</p>
            @endif
            @if ($use_gas)
                <p><strong>Gebruik gas?</strong> ja</p>
            @endif
            <p><strong>Volg mark se social media?</strong> {{ $social_media }}</p>

            <p>Groete,</p>
            <p>Annsoekvorm Robot</p>
        </div>
    </body>
</html>