@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Editar medio de pago</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('medios-pago.update', $medioPago) }}">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ $medioPago->nombre }}">
                    @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </v-card-text>
    </v-card>
</div>
@endsection
