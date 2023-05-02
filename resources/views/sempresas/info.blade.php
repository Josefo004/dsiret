@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Creación de Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo=""
    subtitulo=""
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')

	@include('sempresas.partials.dataEmpresa')

@stop
