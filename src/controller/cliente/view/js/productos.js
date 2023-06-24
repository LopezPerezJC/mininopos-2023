
function Guardar() {
     // Obtén los valores del formulario
  var nombre = $("#nombre").val();
  var precio = $("#precio").val();
  var cantidad_prod = $("#cantidad_prod").val();
  var subtotal = $("#subtotal").val();  
  // Realizamos la petición AJAX para guardar o editar los datos
  $.ajax({
    url: "../ajax/lista.php?op=guardar",
    type: "POST",
    data: {
      nombre: nombre,
      precio: precio,
      cantidad_prod: cantidad_prod,
      subtotal: subtotal
    },
    success: function(datos){
      bootbox.alert(datos);
    }
    
  });
  }
