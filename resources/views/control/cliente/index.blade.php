@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de Clientes</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('clientes.create') }}">Crear Cliente</v-btn>
            <index-component :headers="[
                                       { text: 'Razon Social', value: 'razon_social' },
                                       { text: 'RUT', value: 'rut' },
                                       { text: 'Comuna', value: 'comuna' },
                                       { text: 'Acciones', value: 'actions' }
                                       ]"
                             :items='@json($clientes)'
            ></index-component>
        </v-card-text>
    </v-card>
@endsection
