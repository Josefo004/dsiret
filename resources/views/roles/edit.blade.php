@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Editar rol de usuario' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-address-card" 
    titulo="Edición de Rol de Usuario" 
    subtitulo="Gestión de roles del sistema" 
    modoTitulo='L'>
    {{ Breadcrumbs::render('rolesedit') }}
</x-encabezado-pagina>
@stop

@section('content')    
<x-encabezado-seccion 
    icono="fa fa-address-card" 
    titulo="FORMULARIO DE EDICION"
    botontexto="" 
    ruta="#">
</x-encabezado-seccion>

    {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
		@include('roles.partials.form')
	{!! Form::close() !!}
@stop