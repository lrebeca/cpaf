<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <title>Registro | CPCF</title>
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <div class="container-fluid p-5 bg-dark"></div>

    <style type="text/css">
        #form_s, #form_gratis_s{
            display: none;
        }
        #form_p, #form_gratis_p{
            display: none;
        }

        .bienvenida h1{
            color: rgb(4, 4, 70);
            padding-top: 3%;
            padding-bottom: 2%;
            text-align: center;
            font-weight: 500;
            font-size: 30px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        #imagen{
            width: 60%;
            transition: 0.5;
            object-fit: cover;
        }
        #imagen:hover{
            transform: scale(1.2);
        }
        #perfil{
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
        tr a{
            text-decoration:none;
            font-size: 40px;
            color: black;
        }
        tr a:hover{
            color: red;
        }
    </style>
<body>
    
    {{-- Bienvenida a la pagina de registro --}}
<div class="alert text-center bienvenida">
    <h1>{{$perfil->suffix}} {{$user->name}}</h1>
</div>

<div class="card">
    <div class="card-body">
        @isset($perfil)
            
            @isset($perfil->foto)
                <center><img src="{{Storage::url($perfil->foto)}}" id="perfil" class="img-fluid"></center>
            @else
                No tiene una foto de perfil
            @endisset
            <hr>
        <center style="padding-left: 25%; padding-right: 25%;">
            <table class="table table-striped table-hover">
                <tr><th><center>Nombre</center></th></tr>
                <tr><td><center>{{ $user->name }}</center></td></tr>

                <tr><th><center>Biografía</center></th></tr>
                <tr><td><center>{!!strip_tags($perfil->biography)!!}</center></td></tr>

                <tr>
                    <th><center>
                        <a href="https://wa.me/{{$perfil->num_celular}}" class="fab fa-whatsapp" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{$perfil->facebook}}" class="fab fa-facebook" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{$perfil->youtube}}" class="fab fa-youtube" ></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="{{$perfil->website}}" class="fas fa-globe" ></a>
                    </center></th>
                </tr>

            </table>      

        </center>
        @endisset
    </div>
</div>

{{-- Js de los botones --}}

<script>
    
</script>
</body>

@extends('layouts.footer')

</html>