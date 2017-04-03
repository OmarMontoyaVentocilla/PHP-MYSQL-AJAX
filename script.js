//cuando el DOM cargue mostrara el listar
$(document).ready(function(){
listar();
});
//-----------------------------------------------------------
   
 //esta es la funcion listar   
  function listar(){
           __ajax("listar.php","")
		   .done(function(info){
            var productos=JSON.parse(info);
            var html='';
          for (var i in productos.data) {
            html+=`<tr>  
      <td align="center" valign="middle">${productos.data[i].producto}</td>
       <td align="center" valign="middle">${productos.data[i].precio}</td>
        <td align="center" valign="middle">${productos.data[i].stock}</td>
        <td align="center" valign="middle"><img src="${productos.data[i].imagen}" width="120" height="80" ></td>
        <td align="center" valign="middle">
    <button class="open-Modal btn-info" onClick="editar(${productos.data[i].idproducto});"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
        </td>
        <td align="center" valign="middle">
    <button class="btn-danger" onClick="borrar(${productos.data[i].idproducto});"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
        </td>
       </tr>`;
      }
   $('tbody').html(html);
		   });
		 }

//-----------------------------------------------------------

 // $('#form').submit(function(e){
 //         e.preventDefault();
 //         __ajax1("guardar.php",$('#form').serialize())
 //        .success(function(info){
 //        if(info){
 //        great(info);
 //           listar();
 //            limpiar();
 //       $('#myModal').modal('hide');
         
 //           }else{
 //           bad();
 //          }
 //        })
 //        .error(function(){
 //         bad();
 //       }); 
 //     });

//-----------------------------------------------------------
//script que hace la insercion
$('#form').submit(function(event) {
event.preventDefault();
var parametros=new FormData($('#form')[0]);
$.ajax({
type:'POST',
datatype:'json',
data:parametros,
url:'guardar.php',
contentType:false,
processData:false,
success:function(info){
   if(info){
pacejs();
great(info);
 listar();
       limpiar();
      $('#myModal').modal('hide');
    }else{
      bad();
      limpiar();
   }
},
error:function(info){
  bad();
}
});
});



  
  //-----------------------------------------------------------      
//funcion editar 
function editar(id){
$('#myModal2').modal('show');
$.ajax({
      url: 'leerUno.php',
      type: 'POST',
      data: 'id='+id,
      dataType: 'json'
})
.done(function(data){
$(".modal-body #idproducto").val(data.idproducto); 
$(".modal-body #nombre").val(data.producto); 
$(".modal-body #precio2").val(data.precio); 
$(".modal-body #stock2").val(data.stock);
$(".modal-body #imagen_pro").attr("src",data.imagen);
var data_img=data.imagen;
var res = data_img.split("/");
$(".modal-body #data_texto").html(res[1]);
$(".modal-body #data_texto").css("color","red");
$(".modal-body #data_texto").css("margin-left","20px");
});
}

//-----------------------------------------------------------
//funcion borrar
function borrar(id){
 var url= 'eliminar.php';
swal({
  title: "¿Estás seguro?",
  text: "Borraras esta registro con ID Nro: "+id,
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#e20707",
  confirmButtonText: "Borrar!",
  cancelButtonText: "Cancelar",

  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
 $.ajax({
type:'POST',
url:url,
data:'id='+id,
success: function(data){
swal({
    title: "Excelente!...",
    text: data,
    type:"success",
    timer: 500,
    showConfirmButton: true
  });
listar();
}
});
return false;
  } else {
    swal("Cancelado", "Tu registro esta a salvo :)", "error");
  }
});
}
//-----------------------------------------------------------

//funcion editar
$('#formProducto').submit(function(event) {
event.preventDefault();
var parametros_editar=new FormData($('#formProducto')[0]);
$.ajax({
type:'POST',
dataType:'json',
url:'editar.php',
// data:$('#formProducto').serialize(),
data:parametros_editar,
contentType:false,
processData:false,
success:function(data){
// swal({
//     title: "Excelente!...",
//     text: data,
//     type:"success",
//     timer: 500,
//     showConfirmButton: true
//   });
$.toast({
    text: data, 
    heading: "Excelente!", 
    icon: 'success', 
    showHideTransition: 'fade',
    allowToastClose: true, 
    hideAfter: 1000, 
    stack: 5, 
    position:'top-right', 
    textAlign: 'left', 
    loader: true,  
    loaderBg: '#9ec600'
   
});
listar();
$('#foto2').filestyle('clear');
$('#myModal2').modal('hide');

}
});
return false;
});

//-----------------------------------------------------------
 function __ajax(url,data){
			var ajax= $.ajax({
        "method":"POST",
			  "url":url,
			  "data":data
			 });
          return ajax;
		 }
//-----------------------------------------------------------
        function __ajax1(url,data){
      var ajax= $.ajax({
        "method":"post",
        "datatype":"json",
        "url":url,
        "data":data
       });
          return ajax;
     }

 //-----------------------------------------------------------
   //function data buena 
            

     function great(info){

    Push.create("Excelente!", {
    body: info,
    icon: 'buena.png',
    timeout: 4000,
    onClick: function () {
        window.focus();
        this.close();
    }
     });
   }
//-----------------------------------------------------------
  //function data mala 
            
   function bad(){
    Push.create("Error!", {
    body: "Ingresa los datos completos",
    icon: 'mala.png',
    timeout: 2000,
    onClick: function () {
        window.focus();
        this.close();
    }
    });
    }       

//-----------------------------------------------------------
//fucion eliminar

function limpiar(){
$('#producto').val('');
$('#stock').val('');
$('#precio').val('');
$('#foto').filestyle('clear');
}

//----------------------------------
//barra de progreso

function pacejs(){
Pace.start();
Pace.bar.render();
Pace.stop();
}