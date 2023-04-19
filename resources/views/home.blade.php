@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Principal' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-home" 
    titulo="Principal" 
    subtitulo="" 
    modoTitulo='L'>
    [Codigo HTML]
</x-encabezado-pagina>
@stop

@section('content')
    
    <div class="row">
        <div class="col-12">

            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-info-circle"></i> BANDEJA DE ENTRADA</h3>
            </div>

            <!-- demo -->
            <div class="box-body">
                <div>
                    <a href="{{ route('crear.pdf') }}" target="_blanck">Crear PDF</a>
                </div>
                <div>
                    <a href="{{ route('crear.xls') }}" target="_blanck">Exportar Excel</a>
                </div>
                <div>                    
                    <a href="{{ route('formato.fechas') }}" target="_blanck">Formato fechas</a>
                </div>
                <div>                    
                    <a href="{{ route('registrar.actvidad') }}">Registrar actividad</a>
                </div>
                <div>
                    {!! QrCode::generate('Hola mundo cruel!!!'); !!}
                </div>
            </div>
            <div><!--
                <div id="app">
                    <example-component></example-component>
                </div>-->
            </div>
            <!-- demo:end -->

        </div>
    </div>        
@stop


