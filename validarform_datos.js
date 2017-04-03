$(function() {
 
  $("form[name='form']").validate({
   
    rules: {
    
      producto: {
        required: true
     },

     stock:{

        required:true
     },

      precio:{
        required:true
      },

       foto:{
         required:true
      }

    },
  
    messages: {
      
      producto: {
        required: "Por favor, ingrese un producto"
        // minlength: "Tu contraseña debe tener almenos 5 caracteres"
      },
        stock: {
        required: "Por favor, ingrese un stock"
        // minlength: "Tu contraseña debe tener almenos 5 caracteres"
      },

       precio:{
        required:"Por favor, ingrese una precio"
      },
      
       foto:{
        required:"Por favor, ingrese una foto"
      }
     },
   
  });
});

