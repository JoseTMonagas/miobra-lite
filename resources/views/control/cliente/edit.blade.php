@extends('layouts.app')
@section('content')
    <v-card class="mx-5 mt-5 p-2">
        <v-card-title>Editar cliente</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                @method("PUT")
                @csrf

                <div class="form-group">
                    <label for="razon_social">Razón Social:</label>
                    <input type="text" name="razon_social" class="form-control @error('razon_social') is-invalid @enderror" value="{{ $cliente->razon_social }}">
                    @error('razon_social')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rut">RUT:</label>
                    <input type="text" name="rut" class="form-control @error('rut') is-invalid @enderror" value="{{ $cliente->rut }}">
                    @error('rut')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="comuna">Comuna:</label>
                    <input type="text" name="comuna" class="form-control @error('comuna') is-invalid @enderror" value="{{ $cliente->comuna }}">
                    @error('comuna')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar y Salir</button>
            </form>
        </v-card-text>
    </v-card>
@endsection
