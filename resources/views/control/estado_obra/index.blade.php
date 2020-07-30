@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de estados de obra</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('estados-obra.create') }}">Crear estado de obra</v-btn>
            <index-component :headers="[
                { text: 'Nombre', value: 'nombre' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($estadoObras)'></index-component>
        </v-card-text>
    </v-card>
@endsection
