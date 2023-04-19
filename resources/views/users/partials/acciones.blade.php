@if($id>1)
@canany(['edit-users','delete-users'])
<div class="btn-group pull-right">
	<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
	<div class="dropdown-menu dropdown-menu-right">		
		@can('edit-users') 
			<a href="{{ route('users.edit',$id) }}" class="dropdown-item"><i class="fa fa-edit"></i> Editar</a>
		@endcan
		@can('delete-users') 
			<a href="#" onclick="eliminarUsuario({{ $id }}); return false;" class="dropdown-item"><i class="fa fa-trash"></i> Eliminar</a>
		@endcan
	</div>
</div>
@endcanany
@endif	