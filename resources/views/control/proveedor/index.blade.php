@extends('layouts.app')

@section('content')

    <v-card class="m-5 p-2">
        <v-card-title>Resumen de Proveedores</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('proveedores.create') }}">Crear Proveedor</v-btn>
            <index-component :headers="[
                { text: 'Razon Social', value: 'razon_social' },
                { text: 'Telefono', value: 'telefono' },
                { text: 'Correo', value: 'correo' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($proveedores)'></index-component>
        </v-card-text>
    </v-card>
@endsection
