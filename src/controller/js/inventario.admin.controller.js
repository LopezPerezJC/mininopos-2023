/*  MÓDULO INVENTARIO */
import {
  lanzarModalInventario,
  modalNuevoProducto,
  modalEditarProducto,
  modalMensageEliminar
} from "./modales.admin.js";

const modulo_inventario = false;

function limpiarModulo() {
  let contenedor_modulo = document.getElementById("contenedor-modulos");
  contenedor_modulo.innerHTML = "";
}

function crearModuloInventario() {
  let contenedor_modulo = document.getElementById("contenedor-modulos");
  contenedor_modulo.innerHTML = "";

  let modulo_inventario = document.createElement("div");
  modulo_inventario.setAttribute("id", "container-modulo-inventario");
  modulo_inventario.setAttribute("class", "container-modulo-inventario");
  modulo_inventario.innerHTML = `
        <div class="contenedor-buscador-inventario">
            <form class="navbar navbar-light bg-light" id="buscador-inventario">
                <div class="contenedor-elementos-buscador">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar un producto" aria-label="Search">
                    
                    <button class="btn btn-primary btn-buscar-inventario" id="btn-buscar-producto" type="submit">
                        <i class="fa-solid fa-magnifying-glass" style="color: white;"></i> 
                        Buscar
                    </button>
                </div>
            </form>
        </div>

        <div class="contenedor-botones-inventario">
            <button class="btn btn-success my-2 my-sm-0" id="btn-nuevo-producto" type="submit">
                <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                Agregar nuevo
            </button>
            <div class="contenedor-filtros-buscador">
                <button class="btn btn-primary my-2 my-sm-0" id="btn-filtrar-existencia" type="submit">
                    <i class="fa-solid fa-store fa-xl" style="color: white;"></i>
                    En existencia
                </button>

                <button class="btn btn-outline-success my-2 my-sm-0" id="btn-filtrar-agotados" type="submit">
                    <i class="fa-solid fa-circle-exclamation fa-xl" style="color: #455dfc;"></i>
                    Agotados
                </button>
            </div>
        </div>


        <div id="contenedor-tabla-productos" class="contenedor-tabla-productos">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">0123-4567</th>
                <td>Coca cola de 3L</td>
                <td><img src="#" height="50px" width="50px"/></td>
                <td>$50.30</td>
                <td>503</td>
                <td>
                    <a type="" class="btn btn-warning" id="btn-editar-producto">Editar</a>
                    <button type="button" class="btn btn-danger" id="btn-eliminar-producto">Eliminar</button>
                </td>
              </tr>
            </tbody>
          </table>
    </div>

      `;

  contenedor_modulo.appendChild(modulo_inventario);

  prepararEventosInventario();
}

function cargarInventario() {}

function cargarPanelInventario() {
  limpiarModulo();
  crearModuloInventario();
  cargarInventario();
  cambiarEstadoBtn();
}

function cambiarEstadoBtn() {
  document.getElementById("btn-inventario").classList.remove("btn-light");
  document.getElementById("btn-inventario").classList.add("btn-primary");
}

function prepararEventosInventario() {
  document
    .getElementById("btn-nuevo-producto")
    .addEventListener("click", function (e) {
      modalNuevoProducto();
    });

  document
    .getElementById("btn-editar-producto")
    .addEventListener("click", function (e) {
      modalEditarProducto();
    });

  document
    .getElementById("btn-buscar-producto")
    .addEventListener("click", function (e) {
      e.preventDefault();
      alert("se le han quitado las propiedades a este boton!");
    });

  document
    .getElementById("btn-eliminar-producto")
    .addEventListener("click", function (e) {
      e.preventDefault();
      modalMensageEliminar();
    });
}

/*BOTONES INVENTARIO[Revisar árbol de DOM]*/
document
  .getElementById("btn-inventario")
  .addEventListener("click", function (e) {
    cargarPanelInventario();
  });


