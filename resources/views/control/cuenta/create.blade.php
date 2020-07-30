@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Crear nueva cuenta</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('cuentas.store') }}">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror">
                    @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tipo_cuenta">Tipo de Cuenta</label>
                    <select class="form-control" name="tipo_cuenta_id" @error('tipo_cuenta_id') is-invalid @enderror>
                        @foreach($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                    @error('tipo_cuenta_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" name="continue" value="0" class="btn btn-primary">Guardar y Salir</button>
                <button type="submit" name="continue" value="1" class="btn btn-primary">Guardar y Continuar</button>
            </form>
        </v-card-text>
    </v-card>
</div>
@endsection
