class Registerperson {

    personPostCall = async (ruta,datos) =>{

        //var texto_error = document.getElementById('texto_error');
        try {
            const { data } = await axios.post(ruta, datos)
            // if(data.status=='exito'){
            //   $('#_confirm_verif').modal('hide');
            //   $('#_reportsms_pdf').modal('show');
              
            //     console.log('exito');
            //     console.log(datos);

            // }else if(data.status=='no_exito'){
            //     //texto_error.innerHTML = "Errro";
            //     console.log('no_exito');
            // }          
            console.log(`data: `, data);
            
          } catch (error) {       
            console.log(`error: `, error)
          }
    }

    personGetCall = async (ruta,datos) => {
        try {
            const { data } = await axios.post(ruta, datos)
            if(data.status=='exito'){
                console.log("exito");
            }
          
            console.log(`data: `, data)
          
          } catch (error) {       
            console.log(`error: `, error)
          }

    }

    
    departamentoGetCall = async () => {
      try {
        const response = await axios.get('/api/departamentos');
        
        
        let datos = [];
        datos = response.data;
        // //console.log(response.data);
        // let datos = [
        //   { "id":"app_uno", "dep_codigo":"Sucre" },
        //   { "id":"app_dos", "dep_codigo":"Potosi" }
        // ];

        return datos;
       
       
      } catch (error) {
        console.error(error);
      }
    }

}
class ValidationPeronRegister extends Registerperson {
    get val_nombres(){
        return this._nombres;
    }

    set val_nombres(nombres){
                
        if(nombres.length == 0) {           
            form_nombres.classList.add("is-invalid");            
            return false;
          }else{             
            form_nombres.classList.remove("is-invalid");            
            this._nombres=nombres;
          }
    }


    get val_paterno(){
        return this._paterno;
    }

    set val_paterno(paterno){
                
        if(paterno.length == 0) {           
            //form_paterno.classList.add("is-invalid");            
            return false;
          }else{             
            form_paterno.classList.remove("is-invalid");            
            this._paterno=paterno;
          }
    }

    get val_materno(){
      return this._materno;
    }

    set val_materno(materno){
                
        if(materno.length == 0) {           
            //form_materno.classList.add("is-invalid");            
            return false;
          }else{             
            form_materno.classList.remove("is-invalid");            
            this._materno=materno;
          }
    }

    get val_nro_documento(){
        return this._nro_documento;
    }

    set val_nro_documento(nro_documento){
                
        if(nro_documento.length == 0) {           
            form_nro_documento.classList.add("is-invalid");            
            return false;
          }else{             
            form_nro_documento.classList.remove("is-invalid");            
            this._nro_documento=nro_documento;
          }
    }

    get val_departamento_id(){
        return this._departamento_id;
    }

    set val_departamento_id(departamento_id){
                
        if(departamento_id.length == 0) {           
            form_departamento_id.classList.add("is-invalid");            
            return false;
          }else{             
            form_departamento_id.classList.remove("is-invalid");            
            this._departamento_id=departamento_id;
          }
    }

    get val_nro_celular(){
        return this._nro_celular;
    }

    set val_nro_celular(nro_celular){
                
        if(nro_celular.length == 0) {           
            form_nro_celular.classList.add("is-invalid");            
            return false;
          }else{             
            form_nro_celular.classList.remove("is-invalid");            
            this._nro_celular=nro_celular;
          }
    }

    get val_direccion(){
        return this._direccion;
    }

    set val_direccion(direccion){
                
        if(direccion.length == 0) {           
            form_direccion.classList.add("is-invalid");            
            return false;
          }else{             
            form_direccion.classList.remove("is-invalid");            
            this._direccion=direccion;
          }
    }


    get val_email(){
        return this._email;
    }

    set val_email(email){
                
        if(email.length == 0) {           
            //form_email.classList.add("is-invalid");            
            return false;
          }else{             
            form_email.classList.remove("is-invalid");            
            this._email=email;
          }
    }

    get val_fecha_nac(){
        return this._fecha_nac;
    }

    set val_fecha_nac(fecha_nac){
                
        if(fecha_nac.length == 0) {           
            form_fecha_nac.classList.add("is-invalid");            
            return false;
          }else{             
            form_fecha_nac.classList.remove("is-invalid");            
            this._fecha_nac=fecha_nac;
          }
    }

    get val_gender_id(){
      return this._gender_id;
    }

    set val_gender_id(gender_id){
                
        if(gender_id.length == 0) {           
            form_gender_id.classList.add("is-invalid");            
            return false;
          }else{             
            form_gender_id.classList.remove("is-invalid");            
            this._gender_id=gender_id;
          }
    }

    get val_record_id(){
      return this._record_id;
    }

    set val_record_id(record_id){
                
        if(record_id.length == 0) {       
            form_record_id.classList.add("is-invalid");        
            return false;
          }else{             
            form_record_id.classList.remove("is-invalid");            
            this._record_id=record_id;
          }
    }

    get val_language_id(){
      return this._language_id;
    }

    set val_language_id(language_id){
                
        if(language_id.length == 0) {          
          const div = document.querySelector("#validar_lenguage"); 
          div.innerHTML = `<div class="alert alert-danger" role="alert">Seleccione Idioma </div>`;
            form_language_id.classList.add("is-invalid");            
            return false;
          }else{ 
            const div = document.querySelector("#validar_lenguage"); 
            div.innerHTML = "";        
            form_language_id.classList.remove("is-invalid");            
            this._language_id=language_id;
          }
    }

    get val_profession_id(){
      return this._profession_id;
    }

    set val_profession_id(profession_id){
                
        if(profession_id.length == 0) {          
          const div = document.querySelector("#validar_profession"); 
          div.innerHTML = `<div class="alert alert-danger" role="alert">Seleccione  profesión</div>`;
            form_profession_id.classList.add("is-invalid");            
            return false;
          }else{ 
            const div = document.querySelector("#validar_profession"); 
            div.innerHTML = "";        
            form_profession_id.classList.remove("is-invalid");            
            this._profession_id=profession_id;
          }
    }

    get val_condiciones(){
      return this._condiciones;
    }

    set val_condiciones(condiciones){
     
      if (condiciones.checked==false) {
        form_condiciones.classList.add("is-invalid");
        console.log(condiciones);
         return false;
      }else{        
        
        form_condiciones.classList.remove("is-invalid");
        console.log(condiciones);
        this._condiciones=condiciones.checked;
      }

      //return condiciones;

    }

    datos_result(){
      let datos = {};
      
      if((this.val_condiciones==true) && this.val_nombres && this.val_nro_documento && this.val_departamento_id && this.val_nro_celular && this.val_direccion && this.val_fecha_nac && this.val_gender_id && this.val_record_id){

        
        if(this.val_paterno || this.val_materno){
                datos = {
                  nombres: this.val_nombres,
                  paterno: this.val_paterno,
                  materno: this.val_materno,
                  nro_documento: this.val_nro_documento,
                  departamento_id: this.val_departamento_id,
                  nro_celular: this.val_nro_celular,
                  direccion: this.val_direccion,
                  email: this.val_email,
                  fecha_nac: this.val_fecha_nac,
                  val_gender_id: this.val_gender_id,
                  val_record_id: this.val_record_id,
                  
              }
          }else{
            datos = {
              error: 'falta_apellido'
            };
            console.log(datos);
          }
        
      }else{
        datos = {
          error: 'no_data'
        };
      }
      return datos;
    }
    

    resultado(valor){
        
        //if(this.val_nombres && this.val_apellidos && this.val_nro_documento && this.val_departamento_id && this.val_nro_celular && this.val_direccion && this.val_email && this.val_fecha_nac){
          let datos = valor;//this.datos_result();
        if(datos.error!='no_data'){

          $('#exampleModal1').modal('show');
          $('#verificar_datos').html("");
          //this.personPostCall(ruta,datos);
          let listar_data = document.getElementById("verificar_datos");
          
            listar_data.innerHTML +=  `   
          <div class="row">
            <div class="col-md-10 offset-md-1">
              <div class="row">
                <div class="col-md-4 text-right">
                  <strong>Nombre:</strong>
                </div>
                <div class="col-md-8">
                ${datos.nombres} ${datos.paterno} ${datos.materno}
                </div>
              </div>
            
            </div>

            <div class="col-md-10 offset-md-1">
              <div class="row">
                <div class="col-md-4 text-right">
                  <strong>CI:</strong>
                </div>
                <div class="col-md-8">
                ${datos.nro_documento} 
                </div>
              </div>             
            </div>
            <div class="col-md-10 offset-md-1">
              <div class="row">
                <div class="col-md-4 text-right">
                  <strong>Celular:</strong>
                </div>
                <div class="col-md-8">
                ${datos.nro_celular}
                </div> 
              </div>            
            </div>
            <div class="col-md-10 offset-md-1">
              <div class="row">
                <div class="col-md-4 text-right">
                    <strong>Correo:</strong>
                  </div>
                  <div class="col-md-8">
                      ${datos.email}
                  </div> 
                </div>               
              </div>            
            </div>
            <div class="col-md-10 offset-md-1">
              <div class="row">
                <div class="col-md-4 text-right">
                  <strong>Fec. de Nac.:</strong>
                </div>
                <div class="col-md-8">                    
                  ${datos.fecha_nac}
                </div> 
              </div>
               
              </div>            
            </div>


            <div class="col-md-10 offset-md-1">
              <div class="row">

                <div class="col-md-4 text-right">
                  <strong>Dirreccion</strong>
                </div>
                <div class="col-md-8">
                  ${ datos.direccion }
                </div>

              </div>
            </div>
           

          </div>`;
          //}
         // console.log(datos); 


        }else if (datos.error!='falta_apellido'){
          // if(materno.length == 0 || paterno.length == 0){
          //   form_paterno.classList.add("is-invalid");
          //   form_materno.classList.add("is-invalid");
          // }else{
          //   form_paterno.classList.remove("is-invalid");
          //   form_materno.classList.remove("is-invalid");
          //}
          console.log("");
            
        }else{
          console.log("error")
        }
            
         
            
           

        // }else{ 
        //     console.log("error");
        // }
         
    }

    result_verify(valor){
      //let ruta = `web/register`;
      let datos = valor;
      if(datos.error!='no_data'){

        $('#_regiser_data').html("");
        //this.personPostCall(ruta,datos);
        let listar_data = document.getElementById("_regiser_data");
        $("#exampleModal1").modal('hide');
        $('#_confirm_verif').modal('show');
        if(datos.error=='no_data'){
          listar_data.innerHTML +=  `<h1>Error Cargo de datos</h1>`;
          //console.log("errr");
        }else{
          listar_data.innerHTML +=  `<p>La persona ${datos.nombres} ${datos.paterno} ${datos.materno} con carnet ${datos.nro_celular}</p>`;
          //console.log('sisisissiis');
        }

      }    
         
      
    }

    register_postulant(valor){
      let ruta = `../../web/register`;
      let datos = valor;

      if(datos.error=='no_data'){
        console.log("eroo"+datos);
      }else{
        //console.log(datos);
        this.personPostCall(ruta,datos);
      } 


    }

    list_departamento(){
      //let datos = this.departamentoGetCall();
      //console.log(datos);
      //return datos;
      return "dsfsdf";
    }

    

    

} 

export const form_register = () => {
    const validationPeronRegister =  new ValidationPeronRegister();

    let nombres = document.querySelector("#form_nombres").value;
    let paterno = document.querySelector("#form_paterno").value;
    let materno = document.querySelector("#form_materno").value;
    let nro_documento = document.querySelector("#form_nro_documento").value;
    let departamento_id = document.querySelector("#form_departamento_id").value;
    let nro_celular = document.querySelector("#form_nro_celular").value;
    let direccion = document.querySelector("#form_direccion").value;
    let email = document.querySelector("#form_email").value;
    let fecha_nac = document.querySelector("#form_fecha_nac").value;
    let gender_id = document.querySelector("#form_gender_id").value;
    let record_id = document.querySelector("#form_record_id").value;
    let language_id = document.querySelector("#form_language_id").value;
    let profession_id = document.querySelector("#form_profession_id").value;
    let condiciones = document.querySelector('#form_condiciones');
   


    validationPeronRegister.val_nombres=nombres;
    validationPeronRegister.val_paterno=paterno;
    validationPeronRegister.val_materno=materno;
    validationPeronRegister.val_nro_documento=nro_documento;
    validationPeronRegister.val_departamento_id=departamento_id;
    validationPeronRegister.val_nro_celular=nro_celular;
    validationPeronRegister.val_direccion=direccion;
    validationPeronRegister.val_email=email;
    validationPeronRegister.val_fecha_nac=fecha_nac;
    validationPeronRegister.val_gender_id=gender_id;
    validationPeronRegister.val_record_id=record_id;
    validationPeronRegister.val_language_id=language_id;
    validationPeronRegister.val_profession_id=profession_id;
    validationPeronRegister.val_condiciones=condiciones;

    console.log("Hola="+condiciones.checked);

    let json = validationPeronRegister.datos_result();
    
    
    validationPeronRegister.resultado(json);
   
}

export const verify_register = () => {
  const validationPeronRegister =  new ValidationPeronRegister();

    let nombres = document.querySelector("#form_nombres").value;
    let paterno = document.querySelector("#form_paterno").value;
    let materno = document.querySelector("#form_materno").value;
    let nro_documento = document.querySelector("#form_nro_documento").value;
    let departamento_id = document.querySelector("#form_departamento_id").value;
    let nro_celular = document.querySelector("#form_nro_celular").value;
    let direccion = document.querySelector("#form_direccion").value;
    let email = document.querySelector("#form_email").value;
    let fecha_nac = document.querySelector("#form_fecha_nac").value;
    let gender_id = document.querySelector("#form_gender_id").value;
    let record_id = document.querySelector("#form_record_id").value;
    let language_id = document.querySelector("#form_language_id").value;
    let profession_id = document.querySelector("#form_profession_id").value;
    let condiciones = document.querySelector('#form_condiciones');
    


    validationPeronRegister.val_nombres=nombres;
    validationPeronRegister.val_paterno=paterno;
    validationPeronRegister.val_materno=materno;
    validationPeronRegister.val_nro_documento=nro_documento;
    validationPeronRegister.val_departamento_id=departamento_id;
    validationPeronRegister.val_nro_celular=nro_celular;
    validationPeronRegister.val_direccion=direccion;
    validationPeronRegister.val_email=email;
    validationPeronRegister.val_fecha_nac=fecha_nac;
    validationPeronRegister.val_gender_id=gender_id;
    validationPeronRegister.val_record_id=record_id;
    validationPeronRegister.val_language_id=language_id;
    validationPeronRegister.val_profession_id=profession_id;
    validationPeronRegister.val_condiciones=condiciones;
    

    let json = validationPeronRegister.datos_result();

    validationPeronRegister.result_verify(json);
   
      
      //$('#_confirm_verif').modal('show');
    //validationPeronRegister.result_verify(json);

}

export const postulant_register = () => {
  const validationPeronRegister =  new ValidationPeronRegister();

    let nombres = document.querySelector("#form_nombres").value;
    let paterno = document.querySelector("#form_paterno").value;
    let materno = document.querySelector("#form_materno").value;
    let nro_documento = document.querySelector("#form_nro_documento").value;
    let departamento_id = document.querySelector("#form_departamento_id").value;
    let nro_celular = document.querySelector("#form_nro_celular").value;
    let direccion = document.querySelector("#form_direccion").value;
    let email = document.querySelector("#form_email").value;
    let fecha_nac = document.querySelector("#form_fecha_nac").value; 
    let gender_id = document.querySelector("#form_gender_id").value;
    let record_id = document.querySelector("#form_record_id").value;
    let language_id = document.querySelector("#form_language_id").value;
    let profession_id = document.querySelector("#form_profession_id").value;
    let condiciones = document.querySelector('#form_condiciones');
    


    validationPeronRegister.val_nombres=nombres;
    validationPeronRegister.val_paterno=paterno;
    validationPeronRegister.val_materno=materno;
    validationPeronRegister.val_nro_documento=nro_documento;
    validationPeronRegister.val_departamento_id=departamento_id;
    validationPeronRegister.val_nro_celular=nro_celular;
    validationPeronRegister.val_direccion=direccion;
    validationPeronRegister.val_email=email;
    validationPeronRegister.val_fecha_nac=fecha_nac;
    validationPeronRegister.val_gender_id=gender_id;
    validationPeronRegister.val_record_id=record_id;
    validationPeronRegister.val_language_id=language_id;
    validationPeronRegister.val_profession_id=profession_id;
    validationPeronRegister.val_condiciones=condiciones;
    

    let json = validationPeronRegister.datos_result();

    validationPeronRegister.register_postulant(json);

}

export const postulant_department = () => {
  const validationPeronRegister =  new ValidationPeronRegister();
  const registerperson =  new Registerperson();
  let applications = validationPeronRegister.list_departamento();
  
 // registerperson.departamentoGetCall().then(x => console.log(x.data)); 

}

export const soloNumeros =(e) => {
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
      //Usando la definición del DOM level 2, "return" NO funciona.
      e.preventDefault();
  }
}

export const convertirMay_Min = () => {
  this.value = this.value.toUpperCase();
}



