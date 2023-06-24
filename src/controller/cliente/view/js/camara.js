let scanner;
let cameras = [];
let activeCameraIndex = 0;
let isCameraActive = false;

function InicaScanner() {
  if (cameras.length > 0) {
    scanner = new Instascan.Scanner({
      video: document.getElementById('camscaner'),
      backgroundScan: false // Deshabilita el escaneo en segundo plano mientras la cámara está inactiva
    });

    scanner.addListener('scan', function (c) {
      document.getElementById('nombre').value = c;
      Sonido();
      buscar_datos(c);
    });

    scanner.start(cameras[activeCameraIndex]);
    isCameraActive = true;
  } else {
    alert('No cameras found');
  }
}

function DetenerScanner() {
  if (isCameraActive && scanner) {
    scanner.stop();
    isCameraActive = false;
  }
}


function Sonido() {
  const beepSound = new Audio('../public/barcode.wav'); // Ruta al archivo de sonido del pitido
  beepSound.play();
}

Instascan.Camera.getCameras().then(function (camerasList) {
  cameras = camerasList;

  if (cameras.length > 0) {
    // Mostrar la primera cámara disponible como fondo de video inicial
    document.getElementById('camscaner').style.backgroundImage = `url(${cameras[0].image})`;
  } else {
    alert('No se encontro ninguna Camara');
  }
}).catch(function (e) {
  console.error(e);
});

document.getElementById('Inicia').addEventListener('click', function () {
  InicaScanner();
});

document.getElementById('Termina').addEventListener('click', function () {
  DetenerScanner();
});


function buscar_datos(nombre) {
  var parametros =
  {
    "buscar": "1",
    "nombre": nombre
  };
  $.ajax(
    {
      data: parametros,
      dataType: 'json',
      url: '../ajax/consulta.php',
      type: 'post',
      success: function (valores) {
        if (valores.existe == "1") //Aqui usamos la variable que NO use en el vídeo
        {
          $("#precio").val(valores.precio);
          $("#cantidad_prod").val('1');
          $("#subtotal").val(valores.precio);
          // Mostrar la imagen del producto
          $("#imagen").attr("src", "../files/articulos/" + valores.imagen);

        }
        else {
          alert("El Producto  no existe")
        }

      }
    })
}

function limpiar() {
  $("#nombre").val("");
  $("#precio").val("");
  $("#cantidad_prod").val("");
  $("#subtotal").val("");
}

function mas() {
  var contador = document.getElementById("cantidad_prod").value;
  var int = parseInt(contador, 10);
  document.getElementById("cantidad_prod").value = int + 1;
  modificarSubtotales();
}

function menos() {
  var cont = document.getElementById("cantidad_prod").value;
  var counterValue = parseInt(cont, 10);
  var NewCont = (counterValue) ? counterValue - 1 : 0;
  document.getElementById("cantidad_prod").value = NewCont;
  modificarSubtotales();
}


function modificarSubtotales() {
  var precioValue = parseFloat(document.getElementById('precio').value);
  var totalProd = parseInt(document.getElementById('cantidad_prod').value);

  var total = precioValue * totalProd;

  document.getElementById('subtotal').value = total;
}

function Mostar() {
  // Obtenemos los valores del formulario
  var nombre = $("#nombre").val();
  var precio = $("#precio").val();
  var total = $("#cantidad_prod").val();
  var sub = $("#subtotal").val();

}
