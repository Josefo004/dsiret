{{-- @if($id>1) --}}
{{-- @canany(['edit-users','delete-users']) --}}
<div class="btn-group pull-right">
	<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
	<div class="dropdown-menu dropdown-menu-right">
		{{-- @can('edit-users')  --}}
            <a href="{{ route("sempresasMostrar", $empresa_id) }}" return false;" class="dropdown-item"><i class="fa fa-eye"></i> Ver</a>
		{{-- @endcan
		@can('delete-users')  --}}
            <a href="{{ route("sempresasEditar", $empresa_id) }}" class="dropdown-item"><i class="fa fa-edit"></i> Editar</a>
		{{-- @endcan --
        @can('delete-users')  --}}
            <a href="{{ route("sempresasRequerimiento", $empresa_id) }}" class="dropdown-item"><i class="fa fa-briefcase"></i> Requerimiento </a>
		{{-- @endcan --}}
	</div>
</div>
{{-- @endcanany --}}
{{-- @endif --}}
