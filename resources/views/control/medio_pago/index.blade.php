@extends('layouts.app')

@section('content')
    <v-card class="m-5 p-2">
        <v-card-title>Resumen de medios de pago</v-card-title>

        <v-card-text>
            <v-btn class="mb-2" href="{{ route('medios-pago.create') }}">Crear medio de pago</v-btn>
            <index-component :headers="[
                { text: 'Nombre', value: 'nombre' },
                { text: 'Acciones', value: 'actions' }
                ]" :items='@json($pagos)'></index-component>
        </v-card-text>
    </v-card>
@endsection
