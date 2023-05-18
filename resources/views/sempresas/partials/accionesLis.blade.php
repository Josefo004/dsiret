{{-- @if($id>1) --}}
{{-- @canany(['edit-users','delete-users']) --}}
<div class="btn-group pull-right btn-block">
	<button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listas Generadas</button>
	<div class="dropdown-menu dropdown-menu-right">
        @foreach($item->listas as $i => $lista)
            <a href="{{ route("fpdf.seleccionadosById", $lista->id )}}" return false;" class="dropdown-item" target="_blank"><i class="target="_blank""></i> Lista {{ $i+1 }} para {{ $item->profession->pro_descripcion }}</a>
        @endforeach
	</div>
</div>
{{-- @endcanany --}}
{{-- @endif --}}
