const opcionesToastr = {
    "closeButton" : true,
    "debug" : false,
    "newestOnTop" : false,
    "progressBar" : true,
    "positionClass" : "toast-top-center",
    "preventDuplicates" : true,
    "onclick" : null,
    "showDuration" : "300",
    "hideDuration" : "1000",
    "timeOut" : "5000",
    "extendedTimeOut" : "1000",
    "showEasing" : "swing",
    "hideEasing" : "linear",
    "showMethod" : "fadeIn",
    "hideMethod" : "fadeOut"
}
toastr.options = opcionesToastr;

let direccion = location.origin;

if(direccion === 'http://localhost')
    direccion +='/template_app9/public'; //Esto se debe cambiar al nombre de la app


/**
 * Metodo para eliminar cualquier dato de cualquier modulo
 * @param ruta
 * @param nmbre
*/
const eliminar = (ruta,nombre,tabla) =>{
  data = {}
  Swal.fire({
      title: `Eliminar ${nombre}`,
      text: `SEGURO QUE DESEA ELIMINAR ESTE(A) ${nombre.toUpperCase()}?. ESTA ACCION NO SE PUEDE DESHACER`,
      type: 'warning',
      icon: 'warning',
      showCancelButton: true,      
      confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',   
      confirmButtonText: 'Eliminar',
      cancelButtonText: "Cancelar"
  }).then((result) => {    
        if(result.value){//true  
          $.ajax({
            url: ruta,					
            method: 'DELETE',
            data: { _token: $('meta[name="csrf-token"]').attr('content') },
            dataType: 'json',
            success:function(data){						
              if(data.status=='exito'){                            
                  Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.title,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                  });
                tabla.ajax.reload(null,false);
              }
            }
          }).fail( function(jqXHR, textStatus, errorThrown ) {
                  mostrarErrorAjax(jqXHR, textStatus, errorThrown);
          });
          
        }      
  });
};

/**
 * 
*/
const generatePassword = (ABC,abc,num,sim,max,txt) =>{
  var pwdChars = "";		

  if(ABC == true ){
    pwdChars += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  }

  if(abc == true ){
    pwdChars += "abcdefghijklmnopqrstuvwxyz";
  }

  if(num == true ){
    pwdChars += "0123456789";
  }

  if(sim == true ){
    pwdChars += "@#$%/-_.!:+?(){&}*,[]";
  }
  
  var pwdLen = parseInt(max);

  if(pwdChars){
    var randPassword = Array(pwdLen).fill(pwdChars).map(function(x) { 
      return x[Math.floor(Math.random() * x.length)] 
    }).join('');
    txt.val(randPassword);			
  }else{			
    Swal.fire({
                  type: 'error',
                  icon: 'error',
                  title: "Error",
                  text: "No se puede generar password. Por favor intente nuevamente.",
                  showConfirmButton: false,
                  timer: 1500
                });
  }		
};


/**
 * Errores AJAX
*/
function mostrarErrorAjax(jqXHR, textStatus, errorThrown){
    if (jqXHR.status === 0) {
        alert('Not connect: Verify Network.');    
      } else if (jqXHR.status == 404) {    
        alert('No se encontró la página solicitada [404]');    
      } else if (jqXHR.status == 500) {    
        alert('Internal Server Error [500].');    
      } else if (textStatus === 'parsererror') {    
        alert('Requested JSON parse failed.');    
      } else if (textStatus === 'timeout') {    
        alert('Time out error.');    
      } else if (textStatus === 'abort') {    
        alert('Ajax request aborted.');    
      } else if(jqXHR.textStatus === 422){
        alert( 'Entidades no procesables [422]' );
      }else {    
        alert(jqXHR.textStatus + 'Error desconocido: ' + jqXHR.responseText);    
      }
}