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
    <h3>Tu inscripción fue completada correctamente</h3>

    <p>El participante <strong>{{$student->sufix}} {{$student->nombre}} {{$student->apellido_paterno}} {{$student->apellido_materno}} </strong>
        a sido aprobado al evento <strong>{{$event->evento}}</strong> exitosamente. </p><br>

    <p>Ya puede acceder al evento con los accesos: <br><br>
        <strong>Usuario: </strong>
        {{$student->email}} <br><br>
        <strong>Password: </strong>
        {{$student->carnet_identidad}}
    </p>

</body>
</html>