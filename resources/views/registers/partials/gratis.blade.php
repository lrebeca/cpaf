{{-- Nombre Y apellidos --}}

<div class="form-group mb-3">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
</div>

    @error('nombre')
        <span class="text-danger">{{$message}}</span>
    @enderror

<div class="form-group mb-3">
    {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
    {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder'=>'Primer apellido ']) !!}
</div>

    @error('apellido_paterno')
        <span class="text-danger">{{$message}}</span>
    @enderror    

<div class="form-group mb-3">
    {!! Form::label('apellido_materno', 'Apellido Materno') !!}
    {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder'=>'Segundo apellido']) !!}
</div>
    
    @error('apellido_materno')
        <span class="text-danger">{{$message}}</span>
    @enderror
        
{{-- Email --}}
<div class="form-group mb-3">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
</div>

    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Numero C.I. --}}
<div class="form-group mb-3">
    {!! Form::label('carnet_identidad', 'Numero C.I.') !!}
    {!! Form::text('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ','required pattern' =>'[0-9]*']) !!}
</div>

    @error('carnet_identidad')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Numero de Celular --}}
<div class="form-group mb-3">
    {!! Form::label('n_celular', 'Numero de Celular') !!}
    {!! Form::text('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ','required pattern' =>'[0-9]*']) !!}
</div>

    @error('n_celular')
        <span class="text-danger">{{$message}}</span>
    @enderror