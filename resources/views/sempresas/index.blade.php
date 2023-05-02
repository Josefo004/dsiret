@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa"
    titulo="Registros"
    subtitulo="Registros de Empresas en el SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado2-seccion
    icono="fa home"
    titulo="LISTADO DE EMPRESAS"
    botontexto="NUEVA EMPRESA"
    ruta="{{ route('sempresas.crear') }}">
</x-encabezado2-seccion>

<table id="formularios" class="table table-responsive table-bordered table-striped table-hover table-sm" style="width:100%">
	<thead>
		<tr>
			<th>id</th>
            <th>MUNICIPIO</th>
			<th>DIRECCIÓN</th>
            <th>RAZON SOCIAL</th>
            <th>REGIMEN</th>
            <th>ACTIVIDAD ECONOMICA</th>
            <th>NRO. ROE</th>
            <th>TELEFONO</th>
            <th>REPRENSENTANTE LEGAL</th>
            <th>VER</th>
		</tr>
	</thead>
</table>
@stop
@section('js')
<script>
        const dataUsers = [
            { data: 'id', orderable: false, searchable: false},
            { data: 'municipio',  orderable: false, searchable: false},
            { data: 'emp_direccion',  orderable: false, searchable: false},
            { data: 'razon_social', name:'sempresas.razon_social', orderable: false, searchable: true},
            { data: 'regimen',  orderable: false, searchable: false},
            { data: 'eactividad', name:'eactividade.act_descripcion', orderable: false, searchable: true},
            { data: 'nro_roe',  orderable: false, searchable: false},
            { data: 'emp_telefono',  orderable: false, searchable: false},
            { data: 'representante',  orderable: false, searchable: false},
            { data: 'ver', orderable: false, searchable: false},
        ];
        const apiUsers = '{!! route('api.empresas') !!}';
        let tabla = $('#formularios').DataTable({
            "serverSide" : true,
            "ajax" : apiUsers,
            "columns": dataUsers,
            "responsivle" :true,
            "autoWidth":false,
            language: {
                url: `${direccion}/plugins/datatables.net/Spanish.json`,
                searchPlaceholder: `Buscar...`
            },
        });

    const eliminarUsuario = id => {
		let ruta = `${direccion}/administracion/usuarios/${id}/delete`
		eliminar(ruta,'usuario',tabla)
    };
</script>
@stop
