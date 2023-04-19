class Person {

    personPostCall = async (ruta,datos) =>{

        var texto_error = document.getElementById('texto_error');
        try {
            const { data } = await axios.post(ruta, datos)
            if(data.status=='exito'){
                console.log("exito");
            }else if(data.status=='no_exito'){
                texto_error.innerHTML = "Errro";
            }          
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

}

class ValidationPeron extends Person  {

    
    
    val_documento(valor){
        //var nro_documento = document.getElementById("nro_documento");
        
        if(valor.length == 0) {           
            nro_documento.classList.add("is-invalid");
            //valor.focus();
            return false;
          }else{             
            nro_documento.classList.remove("is-invalid");
            //alert("doddo="+valor);
            //console.log("entro"+valor);
            return valor; //= document.querySelector("#nro_documento").value;
          }
    }
    var_fecha_nac(valor){
        //var fecha_nac = document.getElementById("fecha_nac");
        if(valor.length == 0) {
            fecha_nac.classList.add("is-invalid");
            //alert("Por favor, escribe tu fecha de Nacimiento.");
            //valor.focus();
            return false;
          }else{
            fecha_nac.classList.remove("is-invalid");
            //console.log("entro"+valor);
            return valor;//document.querySelector("#fecha_nac").value;
           
          }
    }

    resultado(){
        let ruta = `web/store`;
        let datos = {
            nro_documento: nro_documento,
            fecha_nac: fecha_nac
        } 
         
    }

    
    
}

export const ingresar = () => {
    const person =  new Person();
    const validationPeron =  new ValidationPeron();

    let nro_documento = document.querySelector("#nro_documento").value;
    let fecha_nac = document.querySelector("#fecha_nac").value;    
    validationPeron.val_documento(nro_documento);
    validationPeron.var_fecha_nac(fecha_nac);
       
    //let ruta = "{{ route('web.store') }}";
    // let ruta = `web/store`;
    // let datos = {
    //     nro_documento: nro_documento,
    //     fecha_nac: fecha_nac
    // } 
    // //axiosPostCall(ruta,datos);
    // person.personPostCall(ruta, datos);

}

//export default name;