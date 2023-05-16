@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Trabajos' )

@section('content_header')
<x-encabezado-pagina
    icono="fa fa-users"
    titulo="Registros"
    subtitulo="Buscar por Ocupación o Profesion SIRET"
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
            <th>FORM. ACADEMICA</th>
            <th>IDIOMAS</th>
            <th>PROFESIÓN U OCUPACIÓN</th>
            <th></th>
		</tr>
	</thead>
</table>
@stop
@section('js')
<script>
    const dataUsers = [
        { data: 'idf', orderable: false, searchable: false},
        { data: 'cedula', orderable: false, searchable: false},
        { data: 'nombre_completo', searchable: false },
        { data: 'sexo', name:'gender.gen_descripcion', orderable: false, searchable: true},
        { data: 'birth', orderable: false, searchable: false},
        { data: 'edad', orderable: false, searchable: false},
        { data: 'nro_celular', orderable: false, searchable: false},
        { data: 'formacion', name:'forms.record.for_descripcion', orderable: false, searchable: true},
        { data: 'idiomas', name:'forms.languages.descripcion', orderable: false, searchable: true},
        { data: 'profesion', name:'forms.professions.pro_descripcion', orderable: false, searchable: true},
        { data: 'action', orderable: false, searchable: false},
    ];
    const apiUsers = '{!! route('api.trabajos') !!}';
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
