@extends('layouts.app')

@section('content')
<v-card class="m-5 p-2">
    <v-card-title>Resumen de estados de pago</v-card-title>

    <v-card-text>
        <v-btn class="mb-2" href="{{ route('pagos.create') }}">Crear estado de pago</v-btn>
        <index-component :headers="[
                                       { text: 'Obra', value: 'obra.nombre' },
            { text: 'Folio', value: 'id' },
            { text: 'Monto', value: 'monto' },
                                       { text: 'Acciones', value: 'actions' }
                                       ]" :items='@json($pagos)'></index-component>
    </v-card-text>
</v-card>
@endsection
