@extends('layouts.app')

@section('content')
    <empresa-component :empresa='@json($empresa)'></empresa-component>
@endsection
