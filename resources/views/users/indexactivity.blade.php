@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Actividad' )

@section('content_header')
<x-encabezado-pagina 
    icono="fa fa-users" 
    titulo="Actvidad" 
    subtitulo="Registro de actividades" 
    modoTitulo='ML'>
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
			<th>TIPO</th>
            <th>EVENTO</th>
			<th>DESCRIPCION</th>
			<th width="25%%">PROPIEDADES</th>
			<th width="12%">FECHA</th>			
		</tr>
	</thead> 
</table>

@stop

@section('js')
<script> 
        const dataTable = [
            { data: 'DT_RowIndex', name: 'DT_Row_Index', orderable: false, searchable: false},
            { data: 'causer_type' },
            { data: 'event' },
            { data: 'description', },            
            { data: 'properties', orderable: false},
            { data: 'created_at', orderable: false, searchable: false},
        ];
        const apiUsers = '{!! route('users.apiActivity') !!}';        
        let tabla = $('#users').DataTable({
            "serverSide" : true,
            "ajax" : apiUsers,
            "columns": dataTable,   
            "responsivle" :true,
            "autoWidth":false,
            language: {
                url: `${direccion}/plugins/datatables.net/Spanish.json`,
                searchPlaceholder: `Buscar...`
            },      
        });      
    /*
    const eliminarUsuario = id => {
		let ruta = `${direccion}/administracion/usuarios/${id}/delete`
		eliminar(ruta,'usuario',tabla)
    };*/
</script>
@stop