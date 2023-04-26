class Person {

    personPostCall = async (ruta,datos) =>{

        var texto_error = document.getElementById('texto_error');
        const _token = 'dfsdf';
        try {
            const { data } = await axios.post('web/store', datos,
                {
                    headers: {
                    'Authorization': `Bearer  ${_token}`
                    }
            })

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


    get val_documento(){
        return this._documento;
    }

    set val_documento(documento){

        if(documento.length == 0) {

            nro_documento.classList.add("is-invalid");
            //valor.focus();
            return false;
          }else{
            nro_documento.classList.remove("is-invalid");
            this._documento=documento; //= document.querySelector("#nro_documento").value;
          }
    }
    get var_fecha_nac(){
        return this._nac;
    }
    set var_fecha_nac(nac){
        //var fecha_nac = document.getElementById("fecha_nac");
        if(nac.length == 0) {
            fecha_nac.classList.add("is-invalid");
            //valor.focus();
            return false;
          }else{
            fecha_nac.classList.remove("is-invalid");
            this._nac=nac;//document.querySelector("#fecha_nac").value;

          }
    }

    resultado(){
        let ruta = 'web/store';
        //let ruta = `./api/personaLG`;
        if(this.val_documento && this.var_fecha_nac){
            let datos = {
                nro_documento: this.val_documento,
                fecha_nac: this.var_fecha_nac
            }

        }

    }

}

export const ingresar = () => {
    const validationPeron =  new ValidationPeron();

    let nro_documento = document.querySelector("#nro_documento").value;
    let fecha_nac = document.querySelector("#fecha_nac").value;
    validationPeron.val_documento=nro_documento;
    validationPeron.var_fecha_nac=fecha_nac;
    validationPeron.resultado();
}

export const direccionar = () => {
    var location = window.location.href;
    var directoryPath = location.substring(0, location.lastIndexOf("/")+1);

}

