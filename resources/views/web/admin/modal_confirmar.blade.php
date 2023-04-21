<div class="modal fade" id="_confirm_verif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <div class="row text-center">
                <strong><h5 class="modal-title" id="exampleModalLabel">ATENCION </h5></strong> 
            </div>          
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
            <div class="row">
                {{-- <div id="_regiser_data">       
                </div> --}}
                <div class="col-md-10 offset-md-1 text-center">
                    Una ver que envíada su información a SIRET (sistema informático de registro de empleo temporal) esta no podrá ser modificada, ¿estas seguro de enviar su información?
                </div>
                
            </div>
            <br>
                <hr>
            <div class="row text-center">
                <div class="col-md-6">                    
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
                <div class="col-md-6">
                    <!-- <button type="button" class="btn btn-success" id="register_postulant">Registrar</button> -->
                    {{ Form::submit('ENVIAR INFORMACION', ['class'=>'btn btn-success']) }}
                </div>
            </div>
          
        </div>
       
      </div>
    </div>
    </div>