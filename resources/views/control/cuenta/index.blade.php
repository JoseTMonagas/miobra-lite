@extends('layouts.app')

@section('content')
<v-card class="m-5 p-2">
    <v-card-title>Resumen de Cuentas</v-card-title>

    <v-card-text>
        <v-btn class="mb-2" href="{{ route('cuentas.create') }}">Crear Cuenta</v-btn>
        <index-component :headers="[
                                       { text: 'Nombre', value: 'nombre' },
                { text: 'Tipo de Cuenta', value: 'tipo_cuenta' },
                                       { text: 'Acciones', value: 'actions' }
                                       ]" :items='@json($cuentas)'></index-component>
    </v-card-text>
</v-card>
@endsection
