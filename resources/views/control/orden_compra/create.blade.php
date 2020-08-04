@extends('layouts.app')
@section('content')
    <orden-compra-component
        :productos='@json($productos)'
        :cuentas='@json($cuentas)'
        store-route="{{ route('ordenes-compra.store') }}"
    ></orden-compra-component>
@endsection
