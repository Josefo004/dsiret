@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Requerimientos de las Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Requerimientos"
    subtitulo=""
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')

	@include('sempresas.partials.requEmpresa')

@stop
