<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<h5>FOTO DE PERFIL</h5>
					@if(isset($user))
						@if($user->imagen!=null)
							<img id="userpic" class="profile-user-img img-responsive img-circle" src="{{ asset('images/users/'.$user->imagen) }}" alt="{{ $user->name }}">
						@else
							<img id="userpic" class="profile-user-img img-responsive img-circle" src="{{ asset('images/users/user.png') }}" alt="">
						@endif
					@else
						<img id="userpic" class="profile-user-img img-responsive img-circle" src="{{ asset('images/users/user.png') }}" alt="">
					@endif
				</div>
				@if(isset($user))
				<div class="row" style="margin-top: 16px;">
					<div class="col-md-6">
						@can('photo-users')
						<input type="file" name="image" class="image btn btn-dark" style="width: 250px;">
						@endcan
					</div>
					<div class="col-md-6">
						@can('character-users')
						<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#cmodal"><i class="fa fa-camera"></i> Seleccionar personaje</button>
						@endcan
					</div>
				</div>
				@endif
				<hr/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h5>DATOS DE ACCESO</h5>
				<div class="form-group">
					{{ Form::label('roles','Rol') }}
					{{ Form::select('roles[]',$roles, null ,['class'=>'form-control select sel2w', 'id'=>'roles','multiple' => 'multiple']) }}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					{{ Form::label('password', 'Contraseña') }} <i>(*)</i>
					{{ Form::text('password','',['class'=> 'form-control', 'placeholder'=>'**********', 'id'=>'password']) }}
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif

					<br/>
					<!-- Generador de contraseñas -->
					<p>
						<a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							Generador de contraseñas
						</a>
					</p>
					<div class="collapse" id="collapseExample">
						<div class="card card-body">
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-3 col-form-label">Longitud : </label>
								<div class="col-sm-2">
									<input value="6" name="plength" class="lp-custom-range__number" step="1" id="plength" type="number" min="6" max="16" />
								</div>
								<div class="col-sm-7">
									<input type="range" id="points" value="6" name="points" min="6" max="16" style="width: 100%;">
								</div>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="ABC" id="chABC" checked>
								<label class="form-check-label" for="chABC">
								Mayúsculas (ej. ABCDEFG)
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="chabc" checked>
								<label class="form-check-label" for="chabc">
								Minúsculas (ej. abcdefg)
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="ch123" checked>
								<label class="form-check-label" for="ch123">
								Números (ej. 123456)
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="chsim" checked>
								<label class="form-check-label" for="chsim">
								Símbolos (ej. @#$% )
								</label>
							</div>
							<br/>
							<div class="form-group row">
								<div class="col-sm-12">
									<a href="#" onclick="generatePass(); return false;" class="btn btn-danger">Generar contraseña</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Generador de contraseñas:end -->

				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }} text-center">
					<div class="row">
						<div class="col-md-6">
							<label>
								{{ Form::radio('estado','A') }} ACTIVAR CUENTA
							</label>
						</div>
						<div class="col-md-6">
							<label>
								{{ Form::radio('estado','D') }} DESACTIVAR CUENTA
							</label>
						</div>
					</div>
					@if ($errors->has('estado'))
						<span class="help-block">
							<strong>{{ $errors->first('estado') }}</strong>
						</span>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="row">
			<h5>DATOS PERSONALES</h5>
			<div class="col-md-12">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					{{ Form::label('name', 'Nombre') }} <i>(*)</i>
					{{ Form::text('name',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO']) }}
					@error('name')
						<span class="help-block">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
					{{ Form::label('username', 'Usuario') }} <i>(*)</i>
					{{ Form::text('username', null,['class'=> 'form-control', 'placeholder'=>'NOMBRE DE USUARIO']) }}
					@if ($errors->has('username'))
						<span class="help-block">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group{{ $errors->has('ci') ? ' has-error' : '' }}">
					{{ Form::label('ci', 'Carnet de Identidad') }}
					{{ Form::text('ci', null,['class'=> 'form-control', 'placeholder'=>'DOCUMENTO DE IDENTIDAD']) }}
					@if ($errors->has('ci'))
						<span class="help-block">
							<strong>{{ $errors->first('ci') }}</strong>
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					{{ Form::label('email', 'Correo Electronico') }}
					{{ Form::text('email', null,['class'=> 'form-control', 'placeholder'=>'CORREO ELECTRONICO']) }}
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
					{{ Form::label('telefono', 'Telefono') }}
					{{ Form::text('telefono', null,['class'=> 'form-control', 'placeholder'=>'NUMERO DE TELEFONO']) }}
					@if ($errors->has('telefono'))
						<span class="help-block">
							<strong>{{ $errors->first('telefono') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
					{{ Form::label('direccion', 'Domicilio') }}
					{{ Form::text('direccion', null,['class'=> 'form-control', 'placeholder'=>'DIRECCION']) }}
					@if ($errors->has('direccion'))
						<span class="help-block">
							<strong>{{ $errors->first('direccion') }}</strong>
						</span>
					@endif
				</div>
			</div>

		</div>



	</div>
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR EMPRESA', ['class'=>'btn btn-primary']) }}
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
