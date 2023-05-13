<x-layouts.app>
    <x-slot name="google">
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-SKD4N6PH2E"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SKD4N6PH2E');
        </script>
    </x-slot>
<div class="mdb-skin-custom "  data-mdb-spy="scroll" data-mdb-target="#scrollspy" data-mdb-offset="250" >

<div class="area" >
    <section class="background-radial-gradient overflow-hidden">
        <ul class="circles">
        <style>
          .background-radial-gradient {
          background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                hsl(218, 41%, 35%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%),
              radial-gradient(1250px circle at 100% 100%,
                hsl(218, 41%, 45%) 15%,
                hsl(218, 41%, 30%) 35%,
                hsl(218, 41%, 20%) 75%,
                hsl(218, 41%, 19%) 80%,
                transparent 100%);
          }

          #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#FF6600, #FFA500);
            overflow: hidden;
          }

          #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#FF6600, #FFA500);
            overflow: hidden;
          }

          .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
          }

          ol, ul {
              padding-left: 1rem;
              /* padding-left: 2rem; */
          }
        </style>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start ">
          <div class="row align-items-center">

            <div class="imagen col-lg-6 mb-5 mb-lg-0 text-center" id="imagen" style="z-index: 1">
              <center><img class="img-fluid" src="./images/logo1_1.png" alt=""></center>

              <p><h1 class="my-2 display-7 fw-bold ls-tight" style="color:
              #FFFFFF
              ">SIRET</h1></p>
              <p><h2 class="fw-bold"><span style="color:#FFFFFF">Sistema Informatico de Registro de Empleo Temporal</span></h2></p>
            </div>


            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
              <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
              <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

              <div id="show_error" style="color: red"> </div>

              <div class="card bg-glass">
                <div class="card-body px-4 py-5 px-md-5">

                  <!-- <form id="form-login"> -->
                  {!! Form::open(array('route' => 'web.store', 'method'=>'POST', 'autocomplete'=>'off', 'id' => 'form-login')) !!}
                  {{-- <form action="https://siret.chuquisaca.gob.bo/web/store" method="POST"> --}}
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example3">Carnet de Identidad</label>
                      <input type="text" id="nro_documento" name="nro_documento" class="form-control" value=""  maxlength="12" placeholder="Carnet de Identidad" />
                      <div id="" class="invalid-feedback">
                        Proporcione una Carnet de Identidad válida.
                      </div>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example4">Fecha de Nacimiento</label>
                      <input type="date" id="fecha_nac" name="fecha_nac" class="form-control" value=""/>
                      <div id="" class="invalid-feedback">
                        Proporcione Fecha de Nacimiento.
                      </div>
                    </div>

                    <div class="row text-center">
                        <small id="" class="text-danger">
                          <label class="form-check-label" id="texto_error" for="form2Example33">
                          </label>
                        </small>

                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-warning mb-2" style="width:100%" id="entrar">
                          Entrar
                        </button>
                      </div>
                    </div>
                    <!-- Register buttons -->
                    <div class="text-center">
                        <p><a href="{{ route('person.create') }}" class="" style="color:#D38118;">Registrarse</a></p>
                        <a href="https://www.facebook.com/GobChuquisaca" style="color:#D38118;" target="_blank" type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/GobChuquisaca" style="color:#D38118;" target="_blank" type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                        </a>
                        <a href="{{ asset('pdf/manual.pdf') }}" style="color:#D38118;" target="_blank" type="button" alt="manual" class="btn btn-link btn-floating mx-1">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        <a href="{{ route('login') }}" style="color:#D38118;" type="button" alt="manual" class="btn btn-link btn-floating mx-1">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>

      </ul>

    </section>

</div >
</div>

</x-layouts.app>
