@extends('layouts.app')
@section('content')
<div class="col-md-8 mx-auto">
    <v-card>
        <v-card-title>Cargar Presupuesto</v-card-title>
        <v-card-text>
            <create-presupuesto
                :clientes='@json($clientes)'
                :obras='@json($obras)'
                :cuentas='@json($cuentas)'
                presupuesto-store="{{ route('presupuestos.store') }}"></create-presupuesto>
        </v-card-text>
    </v-card>
</div>@endsection
