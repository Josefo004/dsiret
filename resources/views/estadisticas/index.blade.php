@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-chart-pie"
    titulo="Estadisticas"
    subtitulo="Estadisticas Formularios SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado2-seccion
    icono="fa fa-chart-bar"
    titulo="ESTADÍSTICAS DEL SISTEMA"
    botontexto=""
    ruta="#">
</x-encabezado2-seccion>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <x-estadistica-card
            titulo="FORMULARIOS POR SEXO"
            total={{$formsTotal}}
            :lista="$formsByGenero"
            >
            </x-estadistica-card>
        </div>
        <div class="col-md-6">
            <x-estadistica-card
            titulo="FORMULARIOS POR MUNICIPIO"
            total={{$formsTotal}}
            :lista="$formsByMunicipio"
            >
            </x-estadistica-card>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-estadistica-card
            titulo="FORMULARIOS POR NIVEL DE EDUCACIÓN ALCANZADA"
            total={{$formsTotal}}
            :lista="$formsByNivelE"
            >
            </x-estadistica-card>
        </div>
        <div class="col-md-6">
            <x-estadistica-card
            titulo="FORMULARIOS POR 1ER IDIOMA QUE DOMINA"
            total={{$formsTotal}}
            :lista="$formsByLanguaje"
            >
            </x-estadistica-card>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-estadistica-card
            titulo="FORMULARIOS POR RANGOS DE EDAD"
            total={{$formsTotal}}
            :lista="$formsByEdad"
            >
            </x-estadistica-card>
        </div>
        <div class="col-md-6">
            <x-estadistica-card
            titulo="FORMULARIOS POR 1RA PROFESIÓN / OCUPACIÓN"
            total={{$formsTotal}}
            :lista="$formsByOcupaciones"
            >
            </x-estadistica-card>
        </div>
    </div>
</div>


@stop

