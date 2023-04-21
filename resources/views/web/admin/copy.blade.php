<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#33b5e5">
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
 
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}


    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    {{-- <link rel='stylesheet' id='roboto-subset.css-css'  href='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5' type='text/css' media='all' /> --}}

    <link rel="stylesheet" media="all" href="../../web/css/style.css" />
    <meta charset="utf-8">
    <title></title>
    
</head>

<body class="mdb-skin-custom "  data-mdb-spy="scroll" data-mdb-target="#scrollspy" data-mdb-offset="250" >

  <header>
  </header>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start ">
          <div class="row align-items-center">            

            <div class="col-lg-12 mb-5 mb-lg-0 position-relative">
              <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
              <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

              <div class="card bg-glass">
                <div class="card-body px-4 py-5 px-md-5">
                  <form>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>Formulario de Registro</h2>
                        </div>
                    </div>                 

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_nombres" name="" class="form-control" value="jesus" />
                                <label class="form-label" for="">Nombre Completo</label>
                                <div id="" class="invalid-feedback">
                                  Proporcione Nombre Completo.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_paterno" name="" class="form-control"  value="Quispe"/>
                                <label class="form-label" for="">Apellido Materno</label>
                                <div id="" class="invalid-feedback">
                                  Proporcione Paterno.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_materno" name="" class="form-control"  value="Mamani"/>
                                <label class="form-label" for="">Apellidos Materno</label>
                                <div id="" class="invalid-feedback">
                                  Proporcione Materno.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_nro_documento" name="" class="form-control"  value="6649190"/>
                                <label class="form-label" for="form3Example3">Canet de Identidad</label>
                                <div id="" class="invalid-feedback">
                                  Proporcione una Canet de Identidad válida.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">                            
                            <select class="form-select" id="form_departamento_id">
                                <option selected disabled value="1"> - Selecciona - </option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            {{-- <input type="text" id="" name="" class="form-control" /> --}}
                            {{-- <label class="form-label" for="form3Example3">Expedido</label> --}}
                            <div class="invalid-feedback">
                                Expedido
                            </div>
                            
                        </div>
                        <div class="col-md-5">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_nro_celular" name="" class="form-control" value="75797174" />
                                <label class="form-label" for="form3Example3">Celular</label>
                                <div id="" class="invalid-feedback">
                                    Proporcione su Celular.
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_direccion" name="" class="form-control" value="Avenida Indu" />
                                <label class="form-label" for="form3Example4">Direccion</label>
                                <div id="" class="invalid-feedback">
                                    Proporcione su Direccion.
                                </div>
                            </div>
                        </div>
                    </div>
                    


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_email" name="" class="form-control" value="jesus@gmail.com"/>
                                <label class="form-label" for="form3Example3">Correo</label>
                                <div id="" class="invalid-feedback">
                                    Proporcione su Correo.
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4">
                                <input type="text" id="form_fecha_nac" name="" class="form-control"  value="12-12-2021"/>
                                <label class="form-label" for="form3Example3">Fecha de Nacimiento</label>
                                <div id="" class="invalid-feedback">
                                    Proporcione Fecha de Nacimiento.
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                      <label class="form-check-label" for="form2Example33">
                        Acepta las codiciones 
                      </label>
                    </div>
                    <div class="row text-center">                        
                        <small id="" class="text-danger">
                          <label class="form-check-label" id="texto_error" for="form2Example33">                       
                          </label>
                        </small>
                     
                    </div>

                   
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <button type="button" class="btn btn-primary btn-block mb-4" id="registrar_form">
                                Registrar
                            </button>
                           
                        </div>
                    </div>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      

    {{-- </section> --}}

    @include('web.admin.modal_confirmar')

    @include('web.admin.modal_verificar')
    @include('web.admin.modal_smdpdf')



<script type="text/javascript" src="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/js/dist/mdb5/standard/core.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script> --}}
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="../../web/js/index.js" type="module"></script>