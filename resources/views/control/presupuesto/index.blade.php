@extends('layouts.app')

@section('content')
<v-card class="m-5 p-2">
    <v-card-title>Resumen de presupuesto</v-card-title>

    <v-card-text>
        <v-btn class="mb-2" href="{{ route('presupuestos.create') }}">Crear Presupuesto</v-btn>
        <index-component :headers="[
                                       { text: 'Obra', value: 'obra.name' },
                                        { text: 'Presupuesto Cargado', value: 'obra.presupuesto' },
                                       { text: 'Acciones', value: 'actions' }
                                       ]" :items='@json($presupuestos)'></index-component>
    </v-card-text>
</v-card>
@endsection
