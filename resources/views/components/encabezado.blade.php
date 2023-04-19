<div class="row">
    <div class="col-md-8">        
        <h2 class="m-0 text-dark"><i class="{{ $icono }}" aria-hidden="true"></i> {{ $titulo }} <span class="xsb">{{ $subtitulo }}</span></h2>
    </div>
    <div class="col-md-4">        
        @if(!empty($migadepan))
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    {{ Breadcrumbs::render($migadepan) }}                        
                </div>            
            </div>
        </div>
        @endif
    </div>
</div>