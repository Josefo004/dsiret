@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Roles de usuario' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-addrss-card" 
    titulo="Roles" 
    subtitulo="Gestión de roles del sistema" 
    modoTitulo='L'>
    {{ Breadcrumbs::render('roles') }}
</x-encabezado-pagina>
@stop

@section('content')
<x-encabezado-seccion 
    icono="fa fa-address-card" 
    titulo="LISTADO DE ROLES DISPONIBLES"     
    botontexto="CREAR ROL" 
    ruta="{{ route('roles.create') }}"
    permisoboton="create-roles">
</x-encabezado-seccion>

<table id="roles" class="table table-responsive table-bordered table-striped table-hover" style="width:100%">
	<thead>
		<tr>
			<th width="10px">#</th>
            <th>NOMBRE</th>
            <th>SLUG</th>
            <th>DESCRIPCION</th>			
            <th>GUARD NAME</th>	
			<th>PERMISOS</th>
			<th>USUARIOS</th>
			<th width="8%">&nbsp;</th>
		</tr>
	</thead> 
</table>
@stop

@section('js')
<script>
    const dataRoles = [
		{ data: 'DT_RowIndex'},
        { data: 'longname'},
        { data: 'name'},
        { data: 'description'},	
        { data: 'guard_name' , orderable: false, searchable: false},	
		{ data: 'permisos', searchable: false},
		{ data: 'usuarios', searchable: false},
		{ data: 'action', orderable: false, searchable: false},
	];
    const apiRoles = '{!! route('roles.apiRoles') !!}';
    
    let tabla = $('#roles').DataTable({
        "serverSide" : true,
        "ajax" : apiRoles,
        "columns": dataRoles,
        "responsivle" :true,
        "autoWidth":false,
        language: {
            url: `${direccion}/plugins/datatables.net/Spanish.json`,
            searchPlaceholder: `Buscar...`,            
        },      
    });    

    const eliminarRole = id => {
		let ruta = `${direccion}/administracion/roles/${id}/delete`
		eliminar(ruta,'rol',tabla)
    };

</script>
@stop