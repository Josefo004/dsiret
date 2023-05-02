@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Un Registro' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo=""
    subtitulo=""
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
    @include('formularios.partials.info')
@stop
