<input type="hidden" name="id" value="{{ $person->id }}">
<div class="container mb-5">
    <div class="col-md-12 text-right">
        <a href="javascript:history.back()" class="btn btn-info"> Volver Atrás</a>
    </div>
    <div class="card bg-glass">
        <div class="card-body px-4 py-5 px-md-5">
            <div class="form-row">
                <div class="form-group col-md-4">
                    {{ Form::label('nombres','Nombres') }}
                    {{ Form::text('nombres',$person->nombres,['class'=> 'form-control text-uppercase']) }}
                    @error('nombres')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('paterno','Apellido Paterno') }}
                    {{ Form::text('paterno',$person->paterno,['class'=> 'form-control text-uppercase']) }}
                    @error('paterno')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('materno','Apellido Materno') }}
                    {{ Form::text('materno',$person->materno,['class'=> 'form-control text-uppercase']) }}
                    @error('materno')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    {{ Form::label('nro_documento','Carnet de Identidad') }}
                    {{ Form::text('nro_documento',$person->nro_documento,['class'=> 'form-control text-uppercase', 'readonly']) }}
                    @error('nombres')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('department_id','Expedido') }}
                    {{ Form::select('department_id', $departments, $person->department_id, [ 'class'=> 'form-control']) }}
                    @error('department_id')
                        <br><small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('nro_celular','Número de Celular') }}
                    {{ Form::text('nro_celular',$person->nro_celular,['class'=> 'form-control text-uppercase']) }}
                    @error('nro_celular')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    {{ Form::label('municipio_id','Municipio de Residencia') }}
                    {{ Form::select('municipio_id', $municipios, $person->municipio_id, [ 'class'=> 'form-control']) }}
                    @error('municipio_id')
                        <br><small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-7">
                    {{ Form::label('direccion','Dirección del Beneficiario') }}
                    {{ Form::text('direccion',$person->direccion,['class'=> 'form-control text-uppercase']) }}
                    @error('direccion')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    {{ Form::label('email','Correo Electronico') }}
                    {{ Form::text('email',$person->email,['class'=> 'form-control']) }}
                    @error('email')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('fecha_nac','Apellido Paterno') }}
                    {{ Form::date('fecha_nac',$person->fecha_nac,['class'=> 'form-control text-uppercase']) }}
                    @error('fecha_nac')
                        <small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('gender_id','Sexo') }}
                    {{ Form::select('gender_id', $genders, $person->gender_id, [ 'class'=> 'form-control']) }}
                    @error('gender_id')
                        <br><small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    {{ Form::label('record_id','Nivel de Educación Alcanzado') }}
                    {{ Form::select('record_id', $records, $person->forms->record_id, [ 'class'=> 'form-control']) }}
                    @error('record_id')
                        <br><small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {{ Form::label('language_id','Idiomas') }}
                    {{ Form::select('language_id', $languages, $selectlanguages, [ 'class'=> 'form-control js-example-basic-multiple', 'multiple'=>'multiple', 'name'=>'language_id[]']) }}
                    @error('language_id')
                        <br><small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('profesion_id','Profesiones / Ocupaciones') }}
                    {{ Form::select('profesion_id', $profesions, $selectprofessions, [ 'class'=> 'form-control js-example-basic-multiple', 'multiple'=>'multiple', 'name'=>'profesion_id[]']) }}
                    @error('profesion_id')
                        <br><small class="text-danger">*{{$message}}</small><br>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-primary']) }}
	<a href="{{ route('sempresas.index') }}" class="btn btn-danger">CANCELAR</a>
</div>










