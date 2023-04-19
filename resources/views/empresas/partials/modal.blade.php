<div class="modal fade modal-slide-in-right" aria-hidden="true" 
role="dialog" tabindex="-1" id="modal-logo">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fa fa-camera"></i> Subir logo de la Empresa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				</button>				
			</div>
			<div class="modal-body">
				<form action="{{ route('empresas.upload',$empresa->id) }}"
					class="dropzone"
					id="mi-dropzone"
                    method="POST"                    
					files="true">
					{{ csrf_field() }}
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="button-upload"><i class="fa fa-upload"></i> Subir Foto</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>    
	</div>
</div>