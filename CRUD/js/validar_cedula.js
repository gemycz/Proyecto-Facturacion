/**
 * 
 */

document.getElementById('cedula').addEventListener('input', function() {
	    campo = event.target;
	    boton = document.getElementById('boton');
	    var cad = document.getElementById("cedula").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;
        
    
    //Se muestra un texto a modo de ejemplo
    if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
              total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }

          total = total % 10 ? 10 - total % 10 : 0;

          if (cad.charAt(longitud-1) == total) {
        	  document.getElementById("mensaje").innerHTML = ("Cedula Correcta");
        	  boton.disabled = false;
            
          }else{
            
            document.getElementById("mensaje").innerHTML = ("Cedula Inválida");
            boton.disabled = true;
          }
        }
      }
);
