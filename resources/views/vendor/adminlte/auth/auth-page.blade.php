@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@if($last_users->count()>0)
    @section('classes_body') {{ ($auth_type ?? 'login') . '-page2' }}@stop    
    @section('body')
    <div style="height: 120px;"></div>
    <div class="container">
    <div class="row">
        <div class="col-md-7">

            {{-- Logo --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="{{ $auth_type ?? 'login' }}-logo2">
                        <a href="{{ $dashboard_url }}">
                            <img src="{{ asset(config('adminlte.logo_img')) }}" height="50">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <h3>Inicios de sesión recientes</h3>
                        <div style="font-size: 16px; ">Haz clic en tu foto para ingresar</div>
                    </div>
                </div>            
            </div>
            
            <div class="row">
                @foreach($last_users as $key => $user)
                <div class="col-sm-3">
                    <div class="card border-secondary h-100">                          
                        @if($user->imagen!=null)
                           <a href="#" onclick="login( '{{ $user->username }}', '{{ $user->name}}', '{{ $user->imagen }}' ); return false;">
                               <img class="card-img-top" src="{{ asset('images/users/'.$user->imagen) }}" alt="{{ $user->name }}"></a>
                        @else
                            <a href="#" onclick="login( '{{ $user->username }}', '{{ $user->name}}', '{{ $user->imagen }}' ); return false;"><img class="card-img-top" src="{{ asset('images/users/user.png') }}" alt="{{ $user->name }}"></a>
                        @endif                         
                        <div class="card-body align-middle" style="padding-top:0; padding-bottom:0;" >
                            <div class="card-text text-center align-middle" style="padding-top:12px; text-align: center; font-size:11px;">{{ $user->name }}</div>
                        </div>
                    </div>
                </div>    
                @endforeach
            </div>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div style="height: 100px; "></div>
            <div class="{{ $auth_type ?? 'login' }}-box">
                {{-- Card Box --}}
                <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">
        
                    {{-- Card Header --}}
                    @hasSection('auth_header')
                        <div class="" style="background-color: #FFF; padding: 1.75rem 1.25rem 0.75rem 1.25rem; text-align: center;">                        
                            <h3 class="card-title float-none text-center">
                                Autenticarse para iniciar sesión
                            </h3>
                        </div>
                    @endif
        
                    {{-- Card Body --}}
                    <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">                    
                        @yield('auth_body')
                    </div>
        
                    {{-- Card Footer --}}
                    @hasSection('auth_footer')
                        <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                            @yield('auth_footer')
                        </div>
                    @endif
        
                </div>
        
            </div>

        </div>
    </div>
    </div>
    @stop
@else
@section('classes_body') {{ ($auth_type ?? 'login') . '-page' }}@stop    
@section('body')
    <div class="{{ $auth_type ?? 'login' }}-box">

        {{-- Logo --}}
        <div class="{{ $auth_type ?? 'login' }}-logo">
            <a href="{{ $dashboard_url }}">
                <img src="{{ asset(config('adminlte.logo_img')) }}" height="50">
                {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
            </a>
        </div>

        {{-- Card Box --}}
        <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="" style="background-color: #FFF; padding: 1.75rem 1.25rem 0.75rem 1.25rem; text-align: center;">
                    <img class="img-circle" src="{{ asset(config('adminlte.user_login_img')) }}" height="120">
                    <h3 class="card-title float-none text-center">Identificate para iniciar sesión</h3>
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif

        </div>

    </div>
@stop
@endif

@section('js')
<script>
const login = (un, nam, pic) => {
    let ruta = `${direccion}/login`
    if(pic==''){
        pic = 'user.png';
    }
    Swal.fire({        
        text: nam,
        type: 'info',
        imageUrl: `${direccion}/images/users/${pic}`,
        imageWidth: 200,
        imageHeight: 200,
        input: 'password',
        inputPlaceholder:'Contraseña',
        showCancelButton: false,        
        showConfirmButton:true,
        confirmButtonColor: '#3085d6',        
        confirmButtonText: 'Iniciar sesión',        
        showCloseButton:true,
        customClass: {
            confirmButton: 'btn-login',
            image: 'pic-circle',
            closeButton: 'btn-closex',
        },
        preConfirm: () => {
            if ( !$('.swal2-input').val() ) {
                Swal.showValidationMessage('Debe escribir su contraseña')                 
            }
        }
    }).then((result) => {	            					
        if(result.value){//true                
            $.ajax({
                url: ruta,					
                method: 'POST',
                data: { username:un, password: $('.swal2-input').val() , _token: '{{csrf_token()}}' },
                dataType: 'json',
                success:function(data){						
                    if(data.status=='exito'){                        
                        location.reload();
                    }else{          
                        login(un, nam, pic);              
                        Swal.showValidationMessage(data.message)
                    }
                }
            }).fail( function(jqXHR, textStatus, errorThrown ) {
                mostrarErrorAjax(jqXHR, textStatus, errorThrown);
            });
        }
    });	
};
</script>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
