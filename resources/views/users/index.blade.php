@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Usuarios' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-users" 
    titulo="Usuarios" 
    subtitulo="Gestión de usuarios del sistema" 
    modoTitulo='L'>
    {{ Breadcrumbs::render('usuarios') }}
</x-encabezado-pagina>
@stop


@section('content')
<x-encabezado-seccion
    icono="fa fa-address-card" 
    titulo="LISTADO DE USUARIOS"     
    botontexto="NUEVO USUARIO" 
    ruta="{{ route('users.create') }}"
    permisoboton="create-users">
</x-encabezado-seccion>

<table id="users" class="table table-responsive table-bordered table-striped table-hover" style="width:100%">
	<thead>
		<tr>
			<th width="10px">#</th>
			<th>NOMBRE</th>
			<th>USUARIO</th>
			<th>ROLES</th>
			<th width="10%">ESTADO</th>
			<th width="8%">&nbsp;</th>
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