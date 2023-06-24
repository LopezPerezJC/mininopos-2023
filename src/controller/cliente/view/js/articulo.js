var tabla;

//funcion que se ejecuta al inicio
function init(){
   listar();
}

//funcion limpiar
function limpiar(){
	$("#Total").val("");
	
}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
        "searching": false, 
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
		],
		"ajax":
		{
			url:'../ajax/articulo.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":4,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}



//funcion para Eliminar
function desactivar(id_compra){
	bootbox.confirm("¿Esta seguro de ELIMINAR este producto?", function(result){
		if (result) {
			$.post("../ajax/articulo.php?op=desactivar", {id_compra : id_compra}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}
//funcion para Eliminar
function Cancela(){
	bootbox.confirm("¿Esta seguro Eliminar tu lista de compras?", function(result){
		if (result) {
			$.post("../ajax/articulo.php?op=cancela", 
			function(e){
				bootbox.alert(e);
				limpiar();
				recargarPagina();
			});
		}
	})
	
}

function recargarPagina() {
	location.reload(); // Recargar la página actual
}



init();