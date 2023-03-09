
    <center><h2>Lista de asistencia de participantes al evento: {{$event->evento}}</h2></center>

<center>
    <table style="border: 1px solid black;">
        <thead class="table-dark">
            <th style="border: 1px solid black; width: 40px; height: 30px"> N° </th>
            <th style="border: 1px solid black; width: 250px; height: 30px"> Participante </th>
            @isset($readys)
                @foreach ($readys as $ready)
                    <th style="border: 1px solid black; width: 70px; height: 30px"> {{$ready->nombre}} </th>
                @endforeach
            @endisset
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td style="border: 1px solid black; width: 40px; height: 30px"> {{$n= $n+1}} </td>
                <td style="border: 1px solid black; width: 250px; height: 30px"> {{$student->nombre}} {{$student->apellido_paterno}} {{$student->apellido_materno}} </td>
                @isset($readys)
                @foreach ($readys as $ready)
                    <td style="border: 1px solid black; width: 70px; height: 30px">  
                        @isset($attendances)
                            @foreach ($attendances as $attendance)
                                @if ($attendance->student_id == $student->id  && $attendance->ready_id == $ready->id)
                                    {{$attendance->estado}} 
                                @endif
                            @endforeach
                        @endisset
                    </td>
                @endforeach
                @endisset
           </tr>
            @endforeach
        </tbody>
    </table>
</center>