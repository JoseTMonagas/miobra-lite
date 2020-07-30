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
                            <option @if($estadoPago->obra_id == $obra->id) selected @endif  value="{{ $obra->id }}">{{ $obra->nombre }}</option>
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
                            <option @if($estadoPago->control_pago_id == $control_pago->id) selected @endif value="{{ $control_pago->id }}">{{ $control_pago->nombre }}</option>
                        @endforeach
                    </select>
                    @error('control_pago_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="porcentaje">Porcentaje:</label>
                    <input type="text" name="porcentaje" class="form-control @error('porcentaje') is-invalid @enderror" value="{{ $estadoPago->porcentaje }}">
                    @error('porcentaje')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ $estadoPago->descripcion }}">
                    @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="monto">Monto:</label>
                    <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror" value="{{ $estadoPago->monto }}">
                    @error('monto')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_emision">Fecha Emision:</label>
                    <input type="date" name="fecha_emision" class="form-control @error('fecha_emision') is-invalid @enderror" value="{{ $estadoPago->fecha_emision }}">
                    @error('fecha_emision')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_pago">Fecha Pago:</label>
                    <input type="date" name="fecha_pago" class="form-control @error('fecha_pago') is-invalid @enderror" value="{{ $estadoPago->fecha_pago }}">
                    @error('fecha_pago')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </v-card-text>
    </v-card>
</div>
@endsection
