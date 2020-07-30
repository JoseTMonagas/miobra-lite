@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Editar estado de obra</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('estados-obra.update', $estadoObra) }}">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $estadoObra->nombre }}">
                    @error('nombre')
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
