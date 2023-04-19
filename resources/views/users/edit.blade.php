@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Edición de usuarios' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-users" 
    titulo="Edición de Usuario" 
    subtitulo="Gestión de usuarios del sistema" 
    modoTitulo='L'>
    {{ Breadcrumbs::render('usersedit') }}
</x-encabezado-pagina>
@stop

@section('content')    
<x-encabezado-seccion 
    icono="fa fa-address-card" 
    titulo="FORMULARIO DE EDICION"
    botontexto="" 
    ruta="#">
</x-encabezado-seccion>
    
    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
        @include('users.partials.form')
    {!! Form::close() !!}
@stop