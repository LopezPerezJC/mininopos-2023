
  function suma(id_compra) {
    var cantidadInput = $("#cantidad_prod_" + id_compra);
    var cantidad = parseInt(cantidadInput.val()) + 1;
    cantidadInput.val(cantidad);
    modificarSubtotales(id_compra);

  }

  function resta(id_compra) {
    var cantidadInput = $("#cantidad_prod_" + id_compra);
    var cantidad = parseInt(cantidadInput.val()) - 1;
    if (cantidad < 0) {
      cantidad = 0;
    }
    cantidadInput.val(cantidad);
    modificarSubtotales(id_compra);
  }


  function modificarSubtotales(id_compra) {
    var cantidadInput = $("#cantidad_prod_" + id_compra);
    var cantidad = parseInt(cantidadInput.val());
    var precioInput = $("#precio" + id_compra);
    var precio = parseFloat(precioInput.val());
    var subtotalInput = $("#subtotal_" + id_compra);
    var subtotal = precio * cantidad;
  
    subtotalInput.val(subtotal);
    calcularTotales();
  }
  
  function calcularTotales(){
	var sub = document.getElementsByName("subtotal");
	var total=0.0;

    for (var i = 0; i < sub.length; i++) {
        total += parseFloat($(sub[i]).val());
      }
    

	$("#Total").val(total);
}
