
    <center><h2>Lista del evento: {{$event->evento}}</h2></center>

<div>
    <h4>Total de participantes aceptados: {{$count}}</h4><br>

</div>

<div class="car">
    <div class="car-body">
        <table style="border: 1px solid black;">
            <thead class="table-dark">
                <th style="border: 1px solid black; height: 40px">N°</th>
                @foreach ($students as $student)
                @isset($student->sufix)
                <th style="border: 1px solid black; height: 40px">Sufix</th>
                @endisset
                @endforeach
                <th style="border: 1px solid black; height: 40px">Nombre</th>
                <th style="border: 1px solid black; height: 40px">Apellido Paterno</th>
                <th style="border: 1px solid black; height: 40px">Apellido Materno</th>
                <th style="border: 1px solid black; height: 40px">Email</th>
                <th style="border: 1px solid black; height: 40px">C.I.</th>
                <th style="border: 1px solid black; height: 40px">C.U.</th>
                <th style="border: 1px solid black; height: 40px">Estado</th>
                <th style="border: 1px solid black; height: 40px">N° Celular</th>
                @foreach ($students as $student)
                @isset($student->n_deposito)
                <th style="border: 1px solid black; height: 40px">N° Deposito</th>
                @endisset
                @endforeach
                <th style="border: 1px solid black; height: 40px">Estado</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                        <tr>
                            <td style="border: 1px solid black; height: 40px">{{$n= $n+1}}</td>
                            @isset($student->sufix)
                            <td style="border: 1px solid black; height: 40px">{{$student->sufix}}</td>
                            @endisset
                            <td style="border: 1px solid black; height: 40px">{{$student->nombre}}</td>
                            <td style="border: 1px solid black; height: 40px">{{$student->apellido_paterno}}</td>
                            <td style="border: 1px solid black; height: 40px">{{$student->apellido_materno}}</td>
                            <td style="border: 1px solid black; height: 40px">{{$student->email}}</td>
                            <td style="border: 1px solid black; height: 40px">{{$student->carnet_identidad}}</td>
                            <td style="border: 1px solid black; height: 40px">{{$student->carnet_universitario}}</td>
                            <td style="border: 1px solid black; height: 40px">{{$student->estado}}</td>
                            <td style="border: 1px solid black; height: 40px">{{$student->n_celular}}</td>
                            @isset($student->n_deposito)
                            <td style="border: 1px solid black; height: 40px">{{$student->n_deposito}}</td>  
                            @endisset
                            <td style="border: 1px solid black; height: 40px">{{$student->progreso}}</td>
                        </tr>
                @endforeach
            </tbody>
        </table><br>
    </div>
</div>
