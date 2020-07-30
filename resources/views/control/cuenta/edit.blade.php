@extends('layouts.app')
@section('content')
    <v-card class="mx-5 mt-5 p-2">
        <v-card-title>Editar cuenta</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('cuentas.update', $cuenta) }}">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $cuenta->nombre }}">
                    @error('razon_social')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tipo_cuenta">Tipo de Cuenta</label>
                    <select class="form-control" name="tipo_cuenta_id" @error('tipo_cuenta_id') is-invalid @enderror>
                        @foreach($tipos as $tipo)
                            <option @if($cuenta->tipo_trato_id == $tipo->id) selected @endif value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                    @error('tipo_cuenta_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </v-card-text>
    </v-card>
@endsection
