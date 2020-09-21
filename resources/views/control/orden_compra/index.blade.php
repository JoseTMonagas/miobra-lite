@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de Ordenes de Compra</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('ordenes-compra.create') }}">Crear Orden de Compra</v-btn>
            <index-component :headers="[
                { text: 'Proveedor', value: 'proveedor_id' },
                { text: 'Obra', value: 'obra_id' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($ordenesCompra)'></index-component>
        </v-card-text>
    </v-card>
@endsection
