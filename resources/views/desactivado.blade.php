@extends('adminlte::page')

@section('title',  config('adminlte.title', 'nombre APP') . ' - Cuenta desactivada' )

@section('content_header')

@stop

@section('content')
<div>

  <div class="row">
    <div class="col-12">
      <p class="text-center" style="color:#B50000; font-size:96px; ">Error 403</p>
      <h4 class="text-center" style="color: #B50000;"><i class="fa fa-exclamation-triangle"></i> Acceso prohibido. Su cuenta se encuentra desactivada</h4>
    </div>    
    <div class="col-12">
      <hr/>
      <div class="error-content text-center">
        <p>Estimado usuario le informamos que sus privilegios de acceso han sido revocados.</p>
        <p>Si cree que es un error, por favor comuniquese con el administrador del sistema.</p>
      </div>
    </div>    
  </div> 

</div>
@stop
