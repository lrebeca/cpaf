
    <center><h2>Lista del evento: {{$event->evento}}</h2></center>

<div>
    <h4>Total de participantes rechazados: {{$count}}</h4><br>

</div>

<div class="car">
    <div class="car-body">
        <table style="border: 1px solid black;">
            <thead class="table-dark">
                <th style="border: 1px solid black;">N°</th>
                <th style="border: 1px solid black;">Sufix</th>
                <th style="border: 1px solid black;">Nombre</th>
                <th style="border: 1px solid black;">Apellido Paterno</th>
                <th style="border: 1px solid black;">Apellido Materno</th>
                <th style="border: 1px solid black;">Email</th>
                <th style="border: 1px solid black;">C.I.</th>
                <th style="border: 1px solid black;">C.U.</th>
                <th style="border: 1px solid black;">Estado</th>
                <th style="border: 1px solid black;">N° Celular</th>
                <th style="border: 1px solid black;">N° Deposito</th>
                <th style="border: 1px solid black;">Estado</th>
            </thead>
            <tbody>
                @foreach ($students as $student)
                        <tr>
                            <td style="border: 1px solid black;">{{$n= $n+1}}</td>
                            <td style="border: 1px solid black;">{{$student->sufix}}</td>
                            <td style="border: 1px solid black;">{{$student->nombre}}</td>
                            <td style="border: 1px solid black;">{{$student->apellido_paterno}}</td>
                            <td style="border: 1px solid black;">{{$student->apellido_materno}}</td>
                            <td style="border: 1px solid black;">{{$student->email}}</td>
                            <td style="border: 1px solid black;">{{$student->carnet_identidad}}</td>
                            <td style="border: 1px solid black;">{{$student->carnet_universitario}}</td>
                            <td style="border: 1px solid black;">{{$student->estado}}</td>
                            <td style="border: 1px solid black;">{{$student->n_celular}}</td>
                            <td style="border: 1px solid black;">{{$student->n_deposito}}</td>  
                            <td style="border: 1px solid black;">{{$student->progreso}}</td>
                        </tr>
                @endforeach
            </tbody>
        </table><br>
    </div>
</div>
