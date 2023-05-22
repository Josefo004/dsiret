@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Contratos SIRET' )

@section('content_header')
<x-encabezado-pagina
    icono="fa"
    titulo="Registros"
    subtitulo="Registros de Contratos SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado2-seccion
    icono="fa home"
    titulo="LISTADO DE CONTRATOS"
    botontexto="NUEVO CONTRATO"
    ruta="{{ route('contratos.crear') }}">
</x-encabezado2-seccion>

<table id="formularios" class="table table-responsive table-bordered table-striped table-hover table-sm" style="width:100%">
	<thead>
		<tr>
			<th>ID</th>
            <th>BENEFICIARIO</th>
			<th>CI</th>
            <th>EMPRESA</th>
            <th>NIT</th>
            <th>FECHA INICIO</th>
            <th>FECHA FIN</th>
            <th></th>
		</tr>
	</thead>
</table>
@stop
@section('js')
<script>
    const dataUsers = [
        { data: 'id', orderable: false, searchable: false},
        { data: 'beneficiario',  orderable: false, searchable: false},
        { data: 'ci',  orderable: false, searchable: false},
        { data: 'empresa',  orderable: false, searchable: false},
        { data: 'nit',  orderable: false, searchable: false},
        { data: 'fech_i',  orderable: false, searchable: false},
        { data: 'fech_f',  orderable: false, searchable: false},
        { data: 'action', orderable: false, searchable: false},
    ];
    const apiUsers = '{!! route('api.contratos') !!}';
    let tabla = $('#formularios').DataTable({
        "serverSide" : true,
        "ajax" : apiUsers,
        "columns": dataUsers,
        "responsivle" :true,
        "autoWidth":true,
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
