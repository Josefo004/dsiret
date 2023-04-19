<div class="row">

    <div class="col-md-6">      
        
        <div class="form-group{{ $errors->has('longname') ? ' has-error' : '' }}">
            {{ Form::label('longname','Nombre de rol') }}
            {{ Form::text('longname',null,['class'=>'form-control','placeholder' => 'NOMBRE ROL']) }}
            @if ($errors->has('longname'))
                <span class="help-block">
                    <strong>{{ $errors->first('longname') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          {{ Form::label('name','Abreviatura') }}
          {{ Form::text('name',null,['class'=>'form-control','placeholder' => 'Ej. colaborador-externo']) }}
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group">
          {{ Form::label('description','Descripción del rol') }}
          {{ Form::textarea('description',null,['class'=>'form-control', 'rows' => '2', 'placeholder' => 'BREVE DESCRIPCION DEL ROL']) }}
      </div>           
      
  </div>
    {{-- Lista de Permisos --}}
  <div class="col-md-6">
      <h5><i class="fa fa-bookmark"></i> LISTADO DE PERMISOS DEL SISTEMA</h5>

      <div class="box-group" id="accordion">
          @foreach ($permisos as $grupo)
          <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
          <div class="panel box box-primary">
              <div class="box-header with-border">
                  <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#{{ $grupo['nombre'] }}" aria-expanded="false" class="collapsed">
                          <i class="fa fa-caret-down"></i> {{ strtoupper( $grupo['nombre'] ) }}
                      </a>
                  </h4>
              </div>
              <div id="{{ $grupo['nombre'] }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                  <div class="box-body">
                      @foreach($grupo['permisos'] as $p)                                                    
                          <div class="checkbox icheck">
                              <label>
                              {{ Form::checkbox('permissions[]', $p->id) }}
                              <b>{{ $p->longname }}</b> <em>({{ $p->description }})</em><br>
                              </label>
                          </div>                          
                      @endforeach
                  </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
</div>
<div class="form-group text-center">
    {{ Form::submit('GUARDAR', ['class'=>'btn btn-primary']) }}
    <a href="{{ route('roles.index') }}" class="btn btn-danger">CANCELAR</a>
</div>