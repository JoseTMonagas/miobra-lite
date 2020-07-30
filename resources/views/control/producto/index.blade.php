@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de productos</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('productos.create') }}">Crear producto</v-btn>
            <index-component :headers="[
                { text: 'Codigo', value: 'nombre' },
                { text: 'Nombre', value: 'nombre' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($productos)'></index-component>
        </v-card-text>
    </v-card>
@endsection
