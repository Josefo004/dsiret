@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Empresas' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Empresas"
    subtitulo="Gestión de empresas del sistema SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop


@section('content')
<x-encabezado-seccion2
    icono="fa fa-address-card"
    titulo="LISTADO DE EMPRESAS"
    botontexto="NUEVA EMPRESA"
    ruta="{{ route('users.create') }}"
    >
</x-encabezado-seccion2>

<table id="users" class="table table-responsive table-bordered table-striped table-hover" style="width:100%">
	<thead>
		<tr>
			<th width="10px">#</th>
			<th>MUNICIPIO</th>
			<th>ACTIVIDAD ECONOMICA</th>
            <th>REGIMEN IMPOSITIVO</th>
            <th>RAZON SOCIAL</th>
            <th>NIT</th>
            <th>TELEFONO</th>
            <th>REPRESENTANTE LEGAL</th>
			<th>VER</th>
		</tr>
	</thead>
</table>

@stop

@section('js')
<script>
        const dataUsers = [
            { data: 'DT_RowIndex', name: 'DT_Row_Index', orderable: false, searchable: false},
            { data: 'name' },
            { data: 'username', },
            { data: 'rol', orderable: false, searchable: false},
            { data: 'estado', orderable: false},
            { data: 'action', orderable: false, searchable: false},
        ];
        const apiUsers = '{!! route('users.apiUsers') !!}';
        let tabla = $('#users').DataTable({
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
