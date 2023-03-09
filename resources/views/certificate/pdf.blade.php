<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}} 

    <style>

        #fondo{
            background-image: url({{Storage::url($image->imagen)}});
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 100% 100%;
        }

        @page {margin:0px;}
        
        .container{
            text-align: center;
            padding: auto;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 30px;
            font-weight: bold;
        }
    </style>

</head>

    <body id="fondo">
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="container">
                {{$nombre}}
            </div>
    
    </body>

</html>