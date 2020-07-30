@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de Bancos</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('bancos.create') }}">Crear Banco</v-btn>
            <index-component :headers="[
                { text: 'Nombre', value: 'nombre' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($bancos)'></index-component>
        </v-card-text>
    </v-card>
@endsection
