import { 
    form_register,
    verify_register,
    postulant_register,
    postulant_department,
   // _postulant_department
   soloNumeros,
   
   
} from './register_form.js';

if(document.getElementById("registrar_form") !== null){
    document.querySelector('#registrar_form').addEventListener('click', form_register);
}

if(document.getElementById("regiter_verify") !== null){
    document.querySelector('#regiter_verify').addEventListener('click', verify_register);
}

if(document.getElementById("register_postulant") !== null){
    document.querySelector('#register_postulant').addEventListener('click', postulant_register);
}


if(document.getElementById("form_nro_celular") !== null){
    document.querySelector('#form_nro_celular').addEventListener("keypress", function(event){ 
        return soloNumeros(event);
    }, false);
}


/*-------------------- Mayuculas----------------------- */
 document.getElementById('form_nombres').addEventListener("keyup", function(){
    var Max_Length = 50;
    this.value = this.value.toUpperCase();
 });
 document.getElementById('form_paterno').addEventListener("keyup", function(){
    this.value = this.value.toUpperCase();
 });
 document.getElementById('form_materno').addEventListener("keyup", function(){
    this.value = this.value.toUpperCase();
 });
 document.getElementById('form_direccion').addEventListener("keyup", function(){
    this.value = this.value.toUpperCase();
 });

//  document.getElementById('form_nro_documento').addEventListener("keyup", function(){
//     this.value = this.value.toUpperCase();
//  });
 /*-------------------------------------------     */




// document.querySelector("#form_condiciones").addEventListener('change', function() {
//     if (this.checked) {
//       console.log(this.checked);
//     } else {
//       console.log(this.checked);
//     }
//   });

//document.querySelector("#condiciones").addEventListener('change', condiciones);

// document.querySelector("#condiciones").addEventListener('change', function() {
//     if (this.checked) {
//       console.log("Checkbox is checked..");
//     } else {
//       console.log("Checkbox is not checked..");
//     }
//   });

window.addEventListener('load', postulant_department);