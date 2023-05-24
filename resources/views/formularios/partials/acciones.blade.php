{{-- @if($id>1) --}}
{{-- @canany(['edit-users','delete-users']) --}}
<div class="btn-group pull-right">
	<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
	<div class="dropdown-menu dropdown-menu-right">
		{{-- @can('edit-users')  --}}
            <a href="{{ route("formularioMostrar", $person_id) }}" return false; class="dropdown-item"><i class="fa fa-eye"></i> Ver</a>
		{{-- @endcan
		@can('delete-users')  --}}
            <a href="{{ route("formularioEditar", $person_id) }}" class="dropdown-item"><i class="fa fa-edit"></i> Editar</a>
		{{-- @endcan --}}
            <a href="{{ route("printFormulario", $person_id) }}" return false; class="dropdown-item" target="_blank"><i class="fa fa-print"></i> Imprimir</a>
	</div>
</div>
{{-- @endcanany --}}
{{-- @endif --}}
