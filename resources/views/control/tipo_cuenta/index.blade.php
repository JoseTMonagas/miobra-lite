@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de tipos de cuenta</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('tipos-cuenta.create') }}">Crear tipo de cuenta</v-btn>
            <index-component :headers="[
                { text: 'Nombre', value: 'nombre' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($cuentas)'></index-component>
        </v-card-text>
    </v-card>
@endsection
