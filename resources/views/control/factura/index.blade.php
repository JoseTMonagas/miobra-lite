@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de Cobranzas</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('cobranzas.create') }}">Crear Cobranza de Factura</v-btn>
            <index-component :headers="[
                { text: 'Fecha Docto', value: 'fecha_documento' },
                { text: 'Monto', value: 'monto' },
                { text: 'Tipo de Pago', value: 'tipo_pago' },
                { text: 'Bando', value: 'banco.nombre' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($facturas)'></index-component>
        </v-card-text>
    </v-card>
@endsection
