<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        h1{
            color: darkblue;
        }
    </style>
</head>
<body>
    <center><h1>Facultad de Contaduría Pública y Ciencias Financieras</h1></center>

    <span class="fas fa-bars"></span>
    <h3>Tu inscripción fue rechazado</h3>

    <p>El participante <strong>{{$student->sufix}} {{$student->nombre}} {{$student->apellido_paterno}} {{$student->apellido_materno}} </strong>
        a sido rechazado al evento <strong>{{$event->evento}}</strong> por las siguientes observaciones: </p><br>

    {!! $student->observation->body !!}

    <p>Debe corregir las observaciones inmediatamente.</p>

</body>
</html>