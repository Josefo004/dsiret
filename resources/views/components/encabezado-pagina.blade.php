<div class="row">
    <div class="col-md-{{$colTitulo}}">        
        @if( $modoTitulo=='L' )
        <h2 class="m-0 text-dark"><i class="{{ $icono }}" aria-hidden="true"></i> {{ $titulo }} <span class="xsb">{{ $subtitulo }}</span></h2>      
        @elseif( $modoTitulo=='ML' )
            <div>
                <h2 class="m-0 text-dark"><i class="{{ $icono }}" aria-hidden="true"></i> {{ $titulo }}</h2>      
            </div>
            <div>
                <span class="xsb">{{ $subtitulo }}</span>
            </div>
        @endif        
    </div>
    <div class="col-md-{{12-$colTitulo}}">
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    {{ $slot }}
                </div>            
            </div>
        </div>        
    </div>
</div>