{{-- @if($id>1) --}}
{{-- @canany(['edit-users','delete-users']) --}}
<div class="btn-group pull-right">
	<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</button>
	<div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route("contratosEliminar", $contrato_id ) }}" class="dropdown-item"><i class="fa fa-trash"></i> Borrar Contrato</a>
	</div>
</div>
{{-- @endcanany --}}
{{-- @endif --}}
