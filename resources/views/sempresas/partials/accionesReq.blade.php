{{-- @if($id>1) --}}
{{-- @canany(['edit-users','delete-users']) --}}
<div class="btn-group pull-right btn-block">
	<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $item->profession->pro_descripcion }}</button>
	<div class="dropdown-menu dropdown-menu-right">
		{{-- @can('edit-users')  --}}
            <a href="{{ route("sempresasBuscarRequerimiento", $item->id )}}" return false;" class="dropdown-item"><i class="fa fa-search"></i> Buscar Candidatos</a>
		{{-- @endcan
        @can('delete-users')  --}}
            @if(count($item->listas)<1)
                <a href="{{ route("sempresasEliminarRequerimiento", $item->id ) }}" class="dropdown-item"><i class="fa fa-trash"></i> Borrar </a>
            @endif
		{{-- @endcan --}}
	</div>
</div>
{{-- @endcanany --}}
{{-- @endif --}}
