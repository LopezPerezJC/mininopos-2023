function cargarPanelPrincipal() {
  limpiarModulo();
  crearHome();
}

function limpiarModulo() {
  let contenedor_main = document.getElementById("contenedor-main");
  contenedor_main.innerHTML = "";
}

/* MÓDULO INICIO */
function crearHome() {
  let contenedor_modulo = document.getElementById("contenedor-main");
  contenedor_modulo.innerHTML = "";

  let modulo_inicio = document.createElement("div");
  modulo_inicio.setAttribute("id", "container-modulo-inicio");
  modulo_inicio.setAttribute("class", "container-modulo-inicio");
  modulo_inicio.innerHTML = `
            <div class="contenedor-targetas">
                <div class="targeta tiendas-registrados">
                  <i class="fa-solid fa-money-bills fa-2xl" style="color: #ffffff;"></i>
                    <p>Tiendas registradas</p>
                    <p id="numero-tiendas">
                    <?php obtenerNumTiendas(); ?>                    
                    </p>
                </div>
                <div class="targeta targeta-usuarios">
                  <i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i>
                  <p>Usuarios</p>  
                  <p>345</p>
                </div>
                <div class="targeta targeta-productos-registrados">
                  <i class="fa-solid fa-layer-group fa-2xl" style="color: #ffffff;"></i>
                  <p>Productos registrados</p>  
                  <p>345</p>
                </div>
                <div class="targeta tareta-ventas">
                  <i class="fa-solid fa-money-bill-trend-up fa-2xl" style="color: #ffffff;"></i>
                  <p>Ventas realizadas</p>  
                  <p>865,288</p>
                </div>
            </div>
    `;

  contenedor_modulo.appendChild(modulo_inicio);
}

/* Obteniendo datos de la bd para el módulo */
function getDataHomeModule() {
    /*Aquí el código relacionado con la base de datos */
}

// document.getElementById("btn-home").addEventListener("click", function (e) {
//   cargarPanelPrincipal();
// });


// Window.onload = cargarPanelPrincipal();
