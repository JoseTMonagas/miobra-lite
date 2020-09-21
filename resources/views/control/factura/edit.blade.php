@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Editar cobranza de factura</v-card-title>
        <v-card-text>
            <form method="POST" action="{{ route('cobranzas.update') }}">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for="tipo_pago">Tipo Pago:</label>
                    <select class="form-control @error('tipo_pago') is-invalid @enderror" name="tipo_pago">
                        <option @if($factura->tipo_pago == "TRANSFERENCIA") selected @endif value="TRANSFERENCIA">Transferencia</option>
                        <option @if($factura->tipo_pago == "EFECTIVO") selected @endif value="EFECTIVO">Efectivo</option>
                        <option @if($factura->tipo_pago == "TARJETA") selected @endif value="TARJETA">Tarjeta</option>
                        <option @if($factura->tipo_pago == "VALE VISTA") selected @endif value="VALE VISTA">Vale Vista</option>
                        <option @if($factura->tipo_pago == "CHEQUE") selected @endif value="CHEQUE">Cheque</option>
                    </select>
                    @error('tipo_pago')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fecha_documento">Fecha Documento:</label>
                    <input type="text" name="fecha_documento" class="form-control @error('fecha_documento') is-invalid @enderror" value="{{ $factura->fecha_documento }}">
                    @error('fecha_documento')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="folio_documento">Folio Documento:</label>
                    <input type="text" name="folio_documento" class="form-control @error('folio_documento') is-invalid @enderror" value="{{ $factura->folio_documento }}">
                    @error('folio_documento')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="banco_id">Banco:</label>
                    <select class="form-control @error('banco_id') is-invalid @enderror" name="banco_id">
                        @foreach($bancos as $banco)
                            <option @if($banco->id == $factura->banco_id) selected @endif value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                        @endforeach
                    </select>
                    @error('banco_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </v-card-text>
    </v-card>
</div>
@endsection
