@extends('adminlte::page')

@section('title', 'Crear lista')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Lista {{$event->evento}}</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model($ready, ['route'=>['admin.readys.update', $ready], 'method' => 'put']) !!}

            {!! Form::hidden('event_id', $event->id) !!}

        {{-- Nombre lista --}}
        <div class="form-group">
            {!! Form::label('nombre', 'Lista') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Lista 1']) !!}
        </div>

        @error('nombre')
            <span class="text-danger">{{$message}}</span>
        @enderror


         {{-- Detalle --}}
         <div class="form-group">
            {!! Form::label('detalle', 'Detalle de la lista') !!}
            {!! Form::text('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el detalle ']) !!}
        </div>

        @error('detalle')
            <span class="text-danger">{{$message}}</span>
        @enderror
        
        {!! Form::submit('Actualizar', ['class' => 'btn btn-outline-primary']) !!}

        {!! Form::close() !!}
    </div>        
</div>

{{-- Parte de la lista  --}}


    <table class="table table-striped">
        <thead class="table-dark">
            <th>Id</th>
            <th>Participante</th>
            <th>Estado</th>
            <th>{{$ready->nombre}}</th>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                     <td>{{$student->id}}</td>
                    <td>{{$student->nombre}} {{$student->apellido_paterno}} {{$student->apellido_materno}}</td>
                        @if($attendances->where('student_id', $student->id)->first())
                            @foreach ($attendances as $attendance)
                                @if ($student->id == $attendance->student_id)
                    <td>{{$attendance->estado}}</td>
                    <td>
                                    @if($attendance->estado == 'presente')
                                        <div style="display: inline-block">
                                            {!! Form::model($attendance, ['route'=>['admin.attendances.editfalta', $attendance], 'method' => 'put']) !!}
                                                {!! Form::hidden('ready_id', $ready->id) !!}
                                                {!! Form::hidden('student_id', $student->id) !!}
                                                {!! Form::hidden('estado', 'falta') !!}
                                                {!! Form::submit('F', ['class' => 'btn btn-outline-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="display: inline-block">
                                            {!! Form::model($attendance, ['route'=>['admin.attendances.editfalta', $attendance], 'method' => 'put']) !!}
                                                {!! Form::hidden('ready_id', $ready->id) !!}
                                                {!! Form::hidden('student_id', $student->id) !!}
                                                {!! Form::hidden('estado', 'licencia') !!}
                                                {!! Form::submit('L', ['class' => 'btn btn-outline-success']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    @elseif($attendance->estado == 'falta')
                                        <div style="display: inline-block">
                                            {!! Form::model($attendance, ['route'=>['admin.attendances.editpresente', $attendance], 'method' => 'put']) !!}
                                                {!! Form::hidden('ready_id', $ready->id) !!}
                                                {!! Form::hidden('student_id', $student->id) !!}
                                                {!! Form::hidden('estado', 'presente') !!}
                                                {!! Form::submit('P', ['class' => 'btn btn-outline-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="display: inline-block">
                                            {!! Form::model($attendance, ['route'=>['admin.attendances.editpresente', $attendance], 'method' => 'put']) !!}
                                                {!! Form::hidden('ready_id', $ready->id) !!}
                                                {!! Form::hidden('student_id', $student->id) !!}
                                                {!! Form::hidden('estado', 'licencia') !!}
                                                {!! Form::submit('L', ['class' => 'btn btn-outline-success']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    @else
                                        <div style="display: inline-block">
                                            {!! Form::model($attendance, ['route'=>['admin.attendances.editpresente', $attendance], 'method' => 'put']) !!}
                                                {!! Form::hidden('ready_id', $ready->id) !!}
                                                {!! Form::hidden('student_id', $student->id) !!}
                                                {!! Form::hidden('estado', 'presente') !!}
                                                {!! Form::submit('P', ['class' => 'btn btn-outline-primary']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div style="display: inline-block">
                                            {!! Form::model($attendance, ['route'=>['admin.attendances.editfalta', $attendance], 'method' => 'put']) !!}
                                                {!! Form::hidden('ready_id', $ready->id) !!}
                                                {!! Form::hidden('student_id', $student->id) !!}
                                                {!! Form::hidden('estado', 'falta') !!}
                                                {!! Form::submit('F', ['class' => 'btn btn-outline-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @else
                        {!! Form::open(['route'=>'admin.attendances.presente']) !!}
                            {!! Form::hidden('ready_id', $ready->id) !!}
                            {!! Form::hidden('student_id', $student->id) !!}
                            {!! Form::hidden('estado', 'presente') !!}
                            {!! Form::submit('presente', ['class' => 'btn btn-outline-primary']) !!}
                        {!! Form::close() !!}
                    
                        {!! Form::open(['route'=>'admin.attendances.falta', 'style' => 'display:inline-block']) !!}
                            {!! Form::hidden('ready_id', $ready->id) !!}
                            {!! Form::hidden('student_id', $student->id) !!}
                            {!! Form::hidden('estado', 'falta') !!}
                            {!! Form::submit('falta', ['class' => 'btn btn-outline-danger']) !!}
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-header">
        <a href="{{route('admin.readys.show', $event->id)}}">Volver</a><br><br>
    </div>

@stop

@section('css')

@stop

@section('js')

@stop