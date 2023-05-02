<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><strong>DATOS DE LA EMPRESA</strong></div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        {{ Form::label('municipio_id','Municipio') }}
                        {{ Form::select('municipio_id', $municipios, null,[ 'class'=>'form-control js-example-basic-multiple select2', 'required'=>'required' ]) }}
                        @error('municipio_id')
                            <br><small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        {{ Form::label('eactividade_id','Actividad Economica') }}
                        {{ Form::select('eactividade_id', $eactividades, null,[ 'class'=> 'form-control js-example-basic-multiple', 'required' => 'required']) }}
                        @error('eactividade_id')
                            <br><small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('regime_id','Régimen') }}
                        {{ Form::select('regime_id', $regimenes, null,[ 'class'=> 'form-control js-example-basic-multiple', 'required' => 'required']) }}
                        @error('regime_id')
                            <br><small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        {{ Form::label('razon_social', 'Razón Social') }}
                        {{ Form::text('razon_social','',['class'=> 'form-control text-uppercase']) }}
                        @error('razon_social')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        {{ Form::label('NIT', 'NIT') }}
                        {{ Form::text('NIT',null,[ 'type'=>'number', 'class'=> 'form-control' , 'maxlength'=>'20', 'pattern'=>'[0-9]+']) }}
                        @error('NIT')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('nro_roe', 'Nro ROE') }}
                        {{ Form::text('nro_roe',null,[ 'type'=>'number', 'class'=> 'form-control' , 'maxlength'=>'10', 'pattern'=>'[0-9]+']) }}
                        @error('nro_roe')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        {{ Form::label('emp_direccion', 'Dirección') }}
                        {{ Form::text('emp_direccion',null,[ 'type'=>'text', 'class'=> 'form-control text-uppercase']) }}
                        @error('emp_direccion')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        {{ Form::label('emp_telefono', 'Teléfono') }}
                        {{ Form::text('emp_telefono',null,[ 'type'=>'number', 'class'=> 'form-control', 'pattern'=>'[0-9]+']) }}
                        @error('emp_telefono')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><strong>DATOS DEL REPRESENTANTE LEGAL</strong></div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {{ Form::label('nro_documento', 'Nro. Documento') }}
                        {{ Form::text('nro_documento',null,[ 'type'=>'number', 'class'=> 'form-control text-uppercase' , 'maxlength'=>'10']) }}
                        @error('nro_documento')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('department_id','Expedido') }}
                        {{ Form::select('department_id', $departments, null,[ 'class'=>'form-control js-example-basic-multiple', 'required'=>'required' ]) }}
                        @error('department_id')
                            <br><small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('gender_id','Sexo') }}
                        {{ Form::select('gender_id', $genders, null,[ 'class'=>'form-control js-example-basic-multiple', 'required'=>'required' ]) }}
                        @error('gender_id')
                            <br><small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('nro_celular', 'Nro. Celular') }}
                        {{ Form::text('nro_celular',null,[ 'type'=>'number', 'class'=> 'form-control text-uppercase' , 'maxlength'=>'10']) }}
                        @error('nro_celular')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        {{ Form::label('nombres', 'Nombres') }}
                        {{ Form::text('nombres',null,[ 'type'=>'number', 'class'=> 'form-control text-uppercase', 'maxlength'=>'50']) }}
                        @error('nombres')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('paterno', 'Apellido Paterno') }}
                        {{ Form::text('paterno',null,[ 'type'=>'number', 'class'=> 'form-control text-uppercase', 'maxlength'=>'50']) }}
                        @error('paterno')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        {{ Form::label('materno', 'Apellido Materno') }}
                        {{ Form::text('materno',null,[ 'type'=>'number', 'class'=> 'form-control text-uppercase', 'maxlength'=>'50']) }}
                        @error('materno')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group text-center">
	{{ Form::submit('GUARDAR', ['class'=>'btn btn-primary']) }}
	<a href="{{ route('sempresas.index') }}" class="btn btn-danger">CANCELAR</a>
</div>

@section('js')
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@stop
