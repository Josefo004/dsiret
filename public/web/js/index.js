import { 
    ingresar,
    direccionar
 } from './script.js';



// if (document.getElementById("hello") !== null) {
//     document.querySelector('#hello').addEventListener('click', ingresar);
// }

if (document.getElementById("entrar") !== null) {
    document.querySelector('#entrar').addEventListener('click', ingresar);
}


window.addEventListener('load', direccionar);



//if(document.getElementById("form_departamento_id") !== null){
   // document.querySelector("form_departamento_id").addEventListener("change", _postulant_department);
   
//}

/**---------------------------sart Departamento----------------------------------------------- */
// function lista_(options){
//     var modelList = document.getElementById("form_departamento_id");
//     for (var i in options.data) {                
//         var opt = document.createElement("option");
        
//         opt.value = options.data[i].id;        
//         opt.textContent = options.data[i].dep_descripcion;        
//         modelList.options.add(opt);
//      }

// }

// async function departamento() {
//     try {
//         const response = await axios.get('/api/departamentos');        
//         let datos = [];
//         datos = response.data;     
//         lista_(datos);        
//         console.log(datos);
//       } catch (error) {
//         console.error(error);
//       }
    
// }


/**--------------------------- end Departamento----------------------------------------------- */