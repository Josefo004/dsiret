<div class="row" style="margin-bottom:10px;">
    <div class="col-md-8">        
        <h4 class="m-0 text-dark"><i class="{{ $icono }}" aria-hidden="true"></i> {{ $titulo }}</h4>
    </div>
    <div class="col-md-4">         
            @can($permisoboton)
            <div class="row"> 
                <div class="col-md-12">
                <a href="#" onclick="{{ $metodojs }}; return false;" class="btn btn-primary float-right">
                    <i class="fa fa-plus-circle"></i> {{ $botontexto }}
                </a>
                </div>
            </div>             
            @endcan        
    </div>
</div>