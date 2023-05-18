{{-- @if($id>1) --}}
{{-- @canany(['edit-users','delete-users']) --}}
<div class="btn-group pull-right btn-block">
	<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listas Generadas</button>
	<div class="dropdown-menu dropdown-menu-right">
        @foreach ($item->listas as $lista )
            <a href="{{ route("fpdf.seleccionadosById", $lista->id )}}" return false;" class="dropdown-item" target="_blank"><i class="target="_blank""></i> Lista {{ $lista->id }}</a>
        @endforeach
	</div>
</div>
{{-- @endcanany --}}
{{-- @endif --}}
