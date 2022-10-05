{{-- Nombre Y apellidos --}}

<div class="form-group mb-3">
    {!! Form::label('nombre', 'Nombres') !!}
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
    {!! Form::email('email', null , ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
</div>

    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Numero C.I. --}}
<div class="form-group mb-3">
    {!! Form::label('carnet_identidad', 'N° Carnet Identidad') !!}
    {!! Form::text('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
</div>

    @error('carnet_identidad')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Numero de Celular --}}
<div class="form-group mb-3">
    {!! Form::label('n_celular', 'Numero Celular') !!}
    {!! Form::text('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
</div>

    @error('n_celular')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Numero de Celular de referencia --}}
<div class="form-group mb-3">
    {!! Form::label('n_celular2', 'Numero celular de referencia') !!}
    {!! Form::text('n_celular2', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
</div>

@error('n_celular2')
    <span class="text-danger">{{$message}}</span>
@enderror

{{-- Tipo de pago --}}
<div class="form-group mb-3">
    {!! Form::label('pago', 'Tipo de pago ') !!} <br>
    {!! Form::label('pago', 'Deposito') !!}
    {!! Form::radio('pago', 'deposito') !!}
    {!! Form::label('pago', 'Transferencia') !!}
    {!! Form::radio('pago', 'transferencia') !!}
</div>

    @error('pago')
        <span class="text-danger">{{$message}}</span>
    @enderror
                        
{{-- Numero de Deposito --}}
<div class="form-group mb-3" >
    {!! Form::label('n_deposito', 'Numero de Deposito o Transferencia') !!}
    {!! Form::text('n_deposito', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su descripcion si es necesario ']) !!}
</div>

@error('n_deposito')
    <span class="text-danger">{{$message}}</span>
@enderror

{{-- Imagen de Deposito --}}
@isset ($student->img_deposito)
<center>
    <img id="img" src="{{Storage::url($student->img_deposito)}}" alt="" width="600px">
</center>
@endisset 

<div class="form-group">
    {!! Form::label('img_deposito', 'Comprobante') !!} <br><br>
    {!! Form::file('img_deposito', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
</div>

@error('img_deposito')
    <span class="text-danger">{{$message}}</span>
@enderror
<br>


