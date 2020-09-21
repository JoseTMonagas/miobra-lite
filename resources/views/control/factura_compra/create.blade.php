@extends('layouts.app')
@section('content')
    <facturar-component
        :productos='@json($productos)'
        :cuentas='@json($cuentas)'
        :ordenes-compra='@json($ordenes)'
        store-route="{{ route('facturas.store') }}"
        get-route="{{ route('cliente-obra') }}"
    ></facturar-component>
@endsection
