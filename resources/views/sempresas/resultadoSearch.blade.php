@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Resultados para el Requerimiento' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Resultados Requerimiento"
    subtitulo=""
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
	@include('sempresas.partials.dataSearch')
@stop
