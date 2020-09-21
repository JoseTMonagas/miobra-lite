@extends('layouts.app')
@section('content')
<v-card class="mx-5 mt-5 p-2">
    <v-card-title>Editar cliente</v-card-title>
    <v-card-text>
        <form method="POST" action="{{ route('clientes.update', $cliente) }}">
            @method("PUT")
            @csrf

            <div class="form-group ">
                <label for="razon_social">Razon Social:</label>

                <input type="text" name="razon_social" class="form-control @error('razon_social') is-invalid @enderror" value="{{ $cliente->razon_social }}">
                @error('razon_social')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="giro">Giro:</label>

                <input type="text" name="giro" class="form-control @error('giro') is-invalid @enderror"  value="{{ $cliente->giro }}">
                @error('giro')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="rut">Rut:</label>

                <input type="text" name="rut" class="form-control @error('rut') is-invalid @enderror" value="{{ $cliente->rut }}">
                @error('rut')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="comuna">Comuna:</label>

                <input type="text" name="comuna" class="form-control @error('comuna') is-invalid @enderror"  value="{{ $cliente->comuna }}">
                @error('comuna')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="direccion">Direccion:</label>

                <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"  value="{{ $cliente->direccion }}">
                @error('direccion')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="telefono">Telefono:</label>

                <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"  value="{{ $cliente->telefono }}">
                @error('telefono')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group ">
                <label for="correo">Correo:</label>

                <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror"  value="{{ $cliente->correo }}">
                @error('correo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar y Salir</button>
        </form>
    </v-card-text>
</v-card>
@endsection
