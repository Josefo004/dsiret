@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Registros' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Registros"
    subtitulo="Registros del sistema SIRET"
    modoTitulo='L'>
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado-seccion
    icono="fa fa-address-card"
    titulo="LISTADO DE FORMULARIOS REGISTRADOS"
    botontexto="NUEVO USUARIO"
    ruta="#">
</x-encabezado-seccion>

<table id="formularios" class="table table-responsive table-bordered table-striped table-hover" style="width:100%">
	<thead>
		<tr>
			<th width="10px">#</th>
			<th>CI</th>
			<th>NOMBRE COMPLETO</th>
            <th>SEXO</th>
            <th>FECHA NAC.</th>
            <th>EDAD</th>
            <th>CELULAR</th>
            <th>MUNICIPIO</th>
            <th>DIRECCION</th>
            <th>CORREO</th>
            <th>REGISTRO</th>
            <th></th>
		</tr>
	</thead>
</table>
@stop
@section('js')
<script>
        const dataUsers = [
            { data: 'idf', orderable: false, searchable: false},
            { data: 'cedula', name:'persons.nro_documento', orderable: false, searchable: true},
            { data: 'nombre_completo', name:'persons.paterno', searchable: true },
            { data: 'sexo', name:'gender.gen_descripcion', orderable: false, searchable: true},
            { data: 'birth', orderable: false, searchable: false},
            { data: 'edad', orderable: false, searchable: false},
            { data: 'nro_celular', orderable: false, searchable: false},
            { data: 'municipio', name:'municipio.mun_descripcion', orderable: false, searchable: true},
            { data: 'direccion', name:'persons.direccion', orderable: false, searchable: true},
            { data: 'email', orderable: false, searchable: false},
            { data: 'regis', orderable: false, searchable: false},
            // { data: 'ver', orderable: false, searchable: false},
            { data: 'action', orderable: false, searchable: false},
        ];
        const apiUsers = '{!! route('api.formularios') !!}';
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
