/* Variables*/
const modulo_inicio = false;

function cargarPanelPrincipal() {
  limpiarModulo();
  crearModuloInicio();
}

function limpiarModulo() {
  let contenedor_modulo = document.getElementById("contenedor-modulos");
  contenedor_modulo.innerHTML = "";
}

/* MÓDULO INICIO */
function crearModuloInicio() {
  let contenedor_modulo = document.getElementById("contenedor-modulos");
  contenedor_modulo.innerHTML = "";

  let modulo_inicio = document.createElement("div");
  modulo_inicio.setAttribute("id", "container-modulo-inicio");
  modulo_inicio.setAttribute("class", "container-modulo-inicio");
  modulo_inicio.innerHTML = `
            <div class="contenedor-targetas">
                <div class="targeta targeta-dinero-caja">
                <i class="fa-solid fa-money-bills fa-2xl" style="color: #ffffff;"></i>
                    <p>En caja</p>
                    <p>$389,785.40</p>
                </div>
                <div class="targeta targeta-agotados">
                <i class="fa-solid fa-exclamation fa-2xl" style="color: #ffffff;"></i>
                    <p>45 productos agotados</p>
                </div>
            </div>
            <div id="contenedor-grafica-ventas">
                Aqui van los graficos de las ventas
            </div>
    `;

  contenedor_modulo.appendChild(modulo_inicio);
  modulo_inicio = true;
}

/* Obteniendo datos de la bd para el módulo */
function getDataHomeModule() {
    /*Aquí el código relacionado con la base de datos */
}

document.getElementById("btn-home").addEventListener("click", function (e) {
  cargarPanelPrincipal();
});


Window.onload = cargarPanelPrincipal();
