@extends('layouts.app')
@section('content')
    <facturar-component
        :productos='@json($productos)'
        :cuentas='@json($cuentas)'
        :ordenes-compra='@json($ordenes)'
    ></facturar-component>
@endsection
