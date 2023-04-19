@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Crear rol de usuario' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-address-card" 
    titulo="Crear Rol de Usuario" 
    subtitulo="Gestión de roles del sistema" 
    modoTitulo='L'>
    {{ Breadcrumbs::render('rolescreate') }}
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado-seccion 
    icono="fa fa-address-card" 
    titulo="CREAR NUEVO ROL"
    botontexto="" 
    ruta="#">
</x-encabezado-seccion>

    {!! Form::open(['route' => 'roles.store']) !!}
		@include('roles.partials.form')
    {!! Form::close() !!}
    
@stop