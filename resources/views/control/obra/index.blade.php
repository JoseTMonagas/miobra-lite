@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de Obras</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('obras.create') }}">Crear Obras</v-btn>
            <index-component :headers="[
                { text: 'Cliente', value: 'cliente.nombre' },
                { text: 'Nombre', value: 'nombre' },
                { text: 'Fecha Inicio', value: 'fecha_inicio' },
                { text: 'Fecha Termino', value: 'fecha_termino' },
                { text: 'Estado', value: 'estado' },
                { text: 'Acciones', value: 'actions' },
                ]" :items='@json($obras)'></index-component>
        </v-card-text>
    </v-card>
@endsection
