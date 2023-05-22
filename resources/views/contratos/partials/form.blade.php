<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">IDENTIFICADORES DE REQUERIMIENTO Y FORMULARIO</div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="id_requerimiento" class="col-sm-4 col-form-label">ID Requerimiento</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="id_requerimiento" placeholder="ID REQUERIMIENTO">
                    </div>
                    <div class="col-sm-3">
                        <button id="buscar_requerimiento" type="button" class="btn btn-block btn-success">Buscar</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_formulario" class="col-sm-4 col-form-label">ID Formulario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="id_formulario" placeholder="ID Formulario">
                    </div>
                    <div class="col-sm-3">
                        <button id="buscar_formulario" type="button" class="btn btn-block btn-success">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card bg-light">
            <div class="card-header">RESULTADOS</div>
            <div class="card-body">
                <div id="REQ">
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">ID REQUERIMIENTO</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="idreq">
                        </div>
                    </div>
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">Requerimiento</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="requerimiento">
                        </div>
                    </div>
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">Cantidad</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="cantidad">
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">Municipio</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="municipio">
                        </div>
                    </div>
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">Empresa</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="empresa">
                        </div>
                    </div>
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">NIT</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="nit">
                        </div>
                    </div>
                </div>
                <hr>
                <div id="FRM">
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">ID FORMULARIO</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="idfrm">
                        </div>
                    </div>
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">CEDULA</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="cedula">
                        </div>
                    </div>
                    <div class="form-group row p-0 m-0">
                        <label class="col-sm-4 col-form-label p-0 m-0">BENEFICIARIO</label>
                        <div class="col-sm-8 p-0 m-0">
                          <input type="text" readonly class="form-control-plaintext p-0 m-0" id="beneficiario">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="contrato">
            <hr>
            {!! Form::open(['route' => 'contratos.store', 'autocomplete'=>'off']) !!}
                @csrf
                {{ Form::hidden('requerimiento_id', 0, ['id'=>'requerimiento_id']) }}
                {{ Form::hidden('form_id', 0, ['id'=>'form_id']) }}
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {{ Form::label('fecha_inicio','Inicio de Contrato') }}
                        {{ Form::date('fecha_inicio', null,['class'=> 'form-control']) }}
                        @error('fecha_inicio')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('fecha_fin','Fin de Contrato') }}
                        {{ Form::date('fecha_fin', null,['class'=> 'form-control']) }}
                        @error('fecha_fin')
                            <small class="text-danger">*{{$message}}</small><br>
                        @enderror
                    </div>
                </div>
                <div class="form-row col-md-4">
                    <div class="form-group text-center">
                        {{ Form::submit('GUARDAR CONTRATO', ['class'=>'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@section('js')
<script>
    $(document).ready(function() {
        $('#REQ').hide();
        $('#FRM').hide();
        $('#contrato').hide();

        function ver (){
            var x1 = $("#requerimiento_id").val();
            var x2 = $("#form_id").val();
            console.log(x1);
            console.log(x2);
            if ((x1>0) && (x2>0)) { $('#contrato').show(); }
            else { $('#contrato').hide(); }
        }

        $("#buscar_requerimiento").click(function () {
            $.ajax({
                url: '/siret/api/requerimiento/'+$("#id_requerimiento").val(),
                method: 'GET',
            }).done(function(res){
                if (res != 'null') {
                    var arreglo = JSON.parse(res);
                    $("#REQ").show();
                    $("#idreq").val(arreglo.id);
                    $("#requerimiento").val(arreglo.profession.pro_descripcion);
                    $("#cantidad").val(arreglo.cantidad);
                    $("#municipio").val(arreglo.sempresa.municipio.mun_descripcion);
                    $("#empresa").val(arreglo.sempresa.razon_social);
                    $("#nit").val(arreglo.sempresa.NIT);
                    console.log(arreglo);
                    $("#requerimiento_id").val(arreglo.id);
                    ver();
                }
                else {
                    $("#REQ").hide();
                    $("#requerimiento_id").val('0');
                    ver();
                }
            });
        });

        $("#buscar_formulario").click(function () {
            $.ajax({
                url: '/siret/api/formulario/'+$("#id_formulario").val(),
                method: 'GET',
            }).done(function(res){
                if (res != 'null') {
                    var arreglo2 = JSON.parse(res);
                    $("#FRM").show();
                    $("#idfrm").val(arreglo2.id);
                    $("#cedula").val(arreglo2.person.nro_documento+' '+arreglo2.person.department.dep_descripcion);
                    $("#beneficiario").val(arreglo2.person.paterno+' '+arreglo2.person.materno+' '+arreglo2.person.nombres)
                    console.log(arreglo2);
                    $("#form_id").val(arreglo2.id);
                    ver();
                } else {
                    $("#FRM").hide();
                    $("#form_id").val('0');
                    ver();
                }
            });
        });
    });
</script>
@stop
