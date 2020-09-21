@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Crear nueva cobranza de factura</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('cobranzas.store') }}">
                @csrf

                <div class="form-group">
                    <label for="tipo_pago">Tipo Pago:</label>
                    <select class="form-control @error('tipo_pago') is-invalid @enderror" name="tipo_pago">
                        <option value="TRANSFERENCIA">Transferencia</option>
                        <option value="EFECTIVO">Efectivo</option>
                        <option value="TARJETA">Tarjeta</option>
                        <option value="VALE VISTA">Vale Vista</option>
                        <option value="CHEQUE">Cheque</option>
                    </select>
                    @error('tipo_pago')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fecha_documento">Fecha Documento:</label>
                    <input type="text" name="fecha_documento" class="form-control @error('fecha_documento') is-invalid @enderror">
                    @error('fecha_documento')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="folio_documento">Folio Documento:</label>
                    <input type="text" name="folio_documento" class="form-control @error('folio_documento') is-invalid @enderror">
                    @error('folio_documento')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="banco_id">Banco:</label>
                    <select class="form-control @error('banco_id') is-invalid @enderror" name="banco_id">
                        @foreach($bancos as $banco)
                            <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                        @endforeach
                    </select>
                    @error('banco_id')
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
