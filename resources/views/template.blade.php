@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Titulo de pagina' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-address-card" 
    titulo="Titulo" 
    subtitulo="Subtitulo" 
    modoTitulo='L'>
    [Codigo HTML o Miga de Pan]
</x-encabezado-pagina>
@stop

@section('content')
//Encabezado con boton y ruta
<x-encabezado-seccion 
    icono="fa fa-address-card" 
    titulo="LISTADO DE ROLES DISPONIBLES"     
    botontexto="CREAR ROL" 
    ruta="{{ route('roles.create') }}"
    permisoboton="create-roles">
</x-encabezado-seccion>

//encabezado con boton y metodo js
<x-encabezado-seccion-js 
    icono="fa fa-address-card" 
    titulo="LISTADO DE USUARIOS"     
    botontexto="NUEVO USUARIO" 
    metodojs="mimetodo('Juan')"
    permisoboton="create-users">
</x-encabezado-seccion-js>

<!-- contenido HTML -->

@stop

@section('css')
<!-- link CSS -->
@stop

@section('js')
<!-- contenido JS o link JS -->
function mimetodo(nombre){
    alert('hola ' + nombre);
}
@stop