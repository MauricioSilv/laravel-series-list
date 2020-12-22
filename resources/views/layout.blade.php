<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Séries</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5d979b1ced.js" crossorigin="anonymous"></script>
    <style>
        .banner {
            width: 100%;
            height: 400px;
            background-image: url({{ asset('./img/streaming.jpg') }}); /* não estava achando a imagem */
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .title {
            margin-left: 15px;
            font-family: sans-serif;
            font-weight: bold;
            color: #fff;
            background: #333;
            padding: 5px;
            box-shadow: 10px 29px 38px rgba(0,0,0,0.30);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="banner">
            <h1 class="title">@yield('title')</h1>
        </div>

        @yield('content')
    </div>
</body>
</html>
