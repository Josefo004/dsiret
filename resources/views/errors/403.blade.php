@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Error 403' )

@section('content_header')

@stop

@section('content')
<div>

  <div class="row">
    <div class="col-12">
      <p class="text-center" style="color:#B50000; font-size:96px; ">Error 403</p>
      <h4 class="text-center" style="color: #B50000;"><i class="fa fa-exclamation-triangle"></i> Acceso prohibido</h4>
    </div>    
    <div class="col-12">
      <hr/>
      <div class="error-content text-center">
        <p>Usted no tiene permisos de acceso paea realizar esta acción. Por favor abandone la página web</p>        
      </div>
    </div>    
  </div> 

</div>
@stop
