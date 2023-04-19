@if($id>1)
@canany(['edit-roles', 'delete-roles'])
<div class="btn-group pull-right">
	<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
	<div class="dropdown-menu dropdown-menu-right">		
		@can('edit-roles') 
			<a href="{{ route('roles.edit',$id) }}" class="dropdown-item "><i class="fa fa-edit"></i> Editar</a>				
		@endcan
		@can('delete-roles')
			<a href="#" class="dropdown-item " onclick="eliminarRole({{ $id }}); return false;"><i class="fa fa-trash"></i> Eliminar</a>
		@endcan
    </div>
</div>
@endcanany
@endif			