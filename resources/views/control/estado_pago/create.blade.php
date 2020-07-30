@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Crear nuevo estado de pago</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('pagos.store') }}">
                @csrf

                <div class="form-group">
                    <label for="obra_id">Obra:</label>
                    <select class="form-control" name="obra_id" @error('obra_id') is-invalid @enderror>
                        @foreach($obras as $obra)
                            <option value="{{ $obra->id }}">{{ $obra->nombre }}</option>
                        @endforeach
                    </select>
                    @error('obra_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="control_pago_id">Estado:</label>
                    <select class="form-control" name="control_pago_id" @error('control_pago_id') is-invalid @enderror>
                        @foreach($controles as $control_pago)
                            <option value="{{ $control_pago->id }}">{{ $control_pago->nombre }}</option>
                        @endforeach
                    </select>
                    @error('control_pago_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="porcentaje">Porcentaje:</label>
                    <input type="text" name="porcentaje" class="form-control @error('porcentaje') is-invalid @enderror">
                    @error('porcentaje')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror">
                    @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="monto">Monto:</label>
                    <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror">
                    @error('monto')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_emision">Fecha Emision:</label>
                    <input type="date" name="fecha_emision" class="form-control @error('fecha_emision') is-invalid @enderror">
                    @error('fecha_emision')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_pago">Fecha Pago:</label>
                    <input type="date" name="fecha_pago" class="form-control @error('fecha_pago') is-invalid @enderror">
                    @error('fecha_pago')
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
