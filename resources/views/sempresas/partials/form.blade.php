<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<hr/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h5>DATOS FORMULARIO</h5>
				<div class="form-group">
					{{ Form::label('municipio_id','Municipio') }}
					{{ Form::select('municipio_id', $municipios, null,[ 'class'=> 'form-control text-uppercase','id'=>'form_municipio_id', 'placeholder'=>'MUNICIPIO', 'required' => 'required']) }}
                    @if ($errors->has('municipio_id'))
						<span class="help-block">
							<strong>{{ $errors->first('municipio_id') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-group">
					{{ Form::label('eactividade_id ','Actividad Economica') }}
					{{ Form::select('eactividade_id', $eactividades, null,[ 'class'=> 'form-control text-uppercase','id'=>'form_eactividade_id', 'placeholder'=>'ACTIVIDAD ECONOMICA', 'required' => 'required']) }}
                    @if ($errors->has('eactividade_id'))
						<span class="help-block">
							<strong>{{ $errors->first('eactividade_id') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-group">
					{{ Form::label('regime_id', 'TIPO DE REGIMEN') }}
					{{ Form::select('regime_id', $regimenes, null,[ 'class'=> 'form-control text-uppercase','id'=>'form_regime_id', 'placeholder'=>'REGIMEN IMPÓSITIVO', 'required' => 'required']) }}
                    @if ($errors->has('regime_id'))
						<span class="help-block">
							<strong>{{ $errors->first('regime_id') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-group">
					{{ Form::label('emp_direccion', 'DIRECCION DE LA EMPRESA') }}
					{{ Form::text('emp_direccion','',['class'=> 'form-control text-uppercase', 'id'=>'form_emp_direccion', 'placeholder'=>'DIRECCION ENPRESA']) }}
                    @if ($errors->has('emp_direccion'))
						<span class="help-block">
							<strong>{{ $errors->first('emp_direccion') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-group">
					{{ Form::label('razon_social', 'RAZON SOCIAL') }}
					{{ Form::text('razon_social','',['class'=> 'form-control text-uppercase', 'id'=>'form_razon_social', 'placeholder'=>'RAZON SOCIAL']) }}
                    @if ($errors->has('razon_social'))
						<span class="help-block">
							<strong>{{ $errors->first('razon_social') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-group">
					{{ Form::label('NIT', 'NIT') }}
					{{ Form::text('NIT','',['class'=> 'form-control text-uppercase', 'id'=>'form_NIT', 'placeholder'=>'NIT']) }}
                    @if ($errors->has('razon_social'))
						<span class="help-block">
							<strong>{{ $errors->first('razon_social') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-group">
					{{ Form::label('emp_email', 'CORREO ELECTRONICO') }}
					{{ Form::text('emp_email','',['class'=> 'form-control text-uppercase', 'id'=>'form_emp_email', 'placeholder'=>'NIT']) }}
                    @if ($errors->has('emp_email'))
						<span class="help-block">
							<strong>{{ $errors->first('emp_email') }}</strong>
						</span>
					@endif
				</div>
                <div class="form-group">
					{{ Form::label('person_id', 'PERSONA ID') }}
					{{ Form::text('person_id','',['class'=> 'form-control text-uppercase', 'id'=>'form_person_id', 'placeholder'=>'ID']) }}
                    @if ($errors->has('person_id'))
						<span class="help-block">
							<strong>{{ $errors->first('person_id') }}</strong>
						</span>
					@endif
				</div>
            </div>
        </div>
	</div>
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-primary']) }}
	<a href="{{ route('users.index') }}" class="btn btn-danger">CANCELAR</a>
</div>

@include('users.partials.cropmodal')
@include('users.partials.charactermodal')

@section('js')
<script>

	var p = document.getElementById("points");
	p.addEventListener("input", function() {
		$('#plength').val(p.value);
	}, false);

	const generatePass = () => {
		generatePassword(
						document.getElementById("chABC").checked,
						document.getElementById("chabc").checked,
						document.getElementById("ch123").checked,
						document.getElementById("chsim").checked,
						$('#plength').val(),
						$('#password')
						);
    };


	$('.select').select2({
		placeholder: "Seleccione rol"
	});

	@if(isset($user))
		//Si tiene valores anteriores, carga en el select
		//$('.select').val($roles_usuario);
		//$('.select').trigger('change');
	@endif

	$('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' // optional
	});

	@if(isset($user))
	/**
	* Crop and Upload Image
	*/
	var $modal = $('#modal');
	var image = document.getElementById('image');
	var cropper;
	//para el cambio de imagen
	$("body").on("change", ".image", function(e){
		var files = e.target.files;
		var done = function (url) {
		  image.src = url;
		  $modal.modal('show');
		};
		var reader;
		var file;
		var url;

		if (files && files.length > 0) {
		  file = files[0];

		  if (URL) {
			done(URL.createObjectURL(file));
		  } else if (FileReader) {
			reader = new FileReader();
			reader.onload = function (e) {
			  done(reader.result);
			};
			reader.readAsDataURL(file);
		  }
		}
	});
	//inicializa variables cropper y al cerrar destruye objeto cropper
	$modal.on('shown.bs.modal', function () {
		cropper = new Cropper(image, {
		  aspectRatio: 1,
		  viewMode: 3,
		  preview: '.preview',
		});
	}).on('hidden.bs.modal', function () {
	   cropper.destroy();
	   cropper = null;
	});
	//corte y envio de imagen al servidor
	let ruta = `${direccion}/administracion/usuarios/{{$user->id}}/upload`
	$("#crop").click(function(){
		canvas = cropper.getCroppedCanvas({
			width: 260,
			height: 260,
		  });

		canvas.toBlob(function(blob) {
			url = URL.createObjectURL(blob);
			var reader = new FileReader();
			 reader.readAsDataURL(blob);
			 reader.onloadend = function() {
				var base64data = reader.result;

				$.ajax({
					type: "POST",
					dataType: "json",
					url: ruta,
					data: {'_token': '{{csrf_token()}}', 'image': base64data},
					success: function(data){
						$modal.modal('hide');
						if(data.status=='exito'){
							$('#userpic').attr('src', `${direccion}/images/users/`+data.message);
						}else{
							//error
						}
					}
				  });
			 }
		});
	})

	/**
	* personajes
	*/
	var $modalc = $('#cmodal');
	$("#upcharacter").click(function(){

		let ruta = `${direccion}/administracion/usuarios/{{$user->id}}/uploadcharacter`
		var pic = document.querySelector('input[name="personajes"]:checked').value;

		$.ajax({
			type: "POST",
			dataType: "json",
			url: ruta,
			data: {'_token': '{{csrf_token()}}', 'image': pic},
			success: function(data){
				if(data.status=='exito'){
					$('#userpic').attr('src', `${direccion}/images/users/`+pic+'.png');
				}
				$('#cmodal').modal('hide');
				//$("[data-dismiss=modal]").trigger({ type: "click" });
			}
			});
		});


	@endif
</script>
@stop
