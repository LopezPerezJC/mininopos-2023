/*NUEVA TIENDA*/
export function modalNuevaTienda() {
  let modal = document.getElementById("modal");
  modal.innerHTML = "";
  let form_nuevaTienda = document.createElement("div");
  form_nuevaTienda.setAttribute("class", "form_emer");
  form_nuevaTienda.setAttribute("id", "form_emer");
  form_nuevaTienda.innerHTML = `
        <form class="form" id="form-new-tienda" action="./acciones/registrarTienda.php" method="post" enctype="multipart/form-data">
          <h2 style="font-size:20px;">Registra una tienda</h2>
          <li>
              <span style="font-size:15px;">Nombre</span>
              <input type="text" name="nombre_tienda" class="form-control" value="" id="nombre_tienda" required>
          </li>
          <li>
              <span style="font-size:15px;">Dirección</span>
              <input type="text" name="direccion_tienda" class="form-control" value="" id="direccion_tienda required>
          </li>

          <div class="tienda-info">
              <li>
                  <span style="font-size:15px;">Telefono</span>
                  <input type="text" name="telefono_tienda" class="form-control" value="" id="telefono_tienda" required>
              </li>
              <li>
                  <span style="font-size:15px;">Correo</span>
                  <input type="email" name="correo_tienda" class="form-control" value="" id="correo_tienda" required>
              </li>
          </div>
          <p>*Todos los campos deben estar rellenados</p>
          <div class="contenedor-botones-form">
              <a src="#" class="btn btn-danger" id="leave">Cancelar</a>
              <button type="submit" class="btn btn-primary" id="create-tienda">Registrar</button>
          </div>
      </form>
    `;
  modal.appendChild(form_nuevaTienda);

  document.getElementById("leave").addEventListener("click", function (e) {
    document.getElementById("modal").innerHTML = "";
  });
}

document
  .getElementById("btn-nueva-tienda")
  .addEventListener("click", function (e) {
    modalNuevaTienda();
  });





/*NUEVA TIENDA*/
export function modalEditarTienda() {
  let modal = document.getElementById("modal");
  modal.innerHTML = "";
  let form_editarTienda = document.createElement("div");
  form_editarTienda.setAttribute("class", "form_emer");
  form_editarTienda.setAttribute("id", "form_emer");
  form_editarTienda.innerHTML = `
        <form class="form" id="form-new-tienda" action="./acciones/editarTienda.php?id=<?= $row['id'] ?>" method="post" enctype="multipart/form-data">
          <h2 style="font-size:20px;">Edita los datos de la tienda</h2>
          <li>
              <span style="font-size:15px;">Nombre</span>
              <input type="text" name="nombre_tienda" class="form-control" value="" id="nombre_tienda" required>
          </li>
          <li>
              <span style="font-size:15px;">Dirección</span>
              <input type="text" name="direccion_tienda" class="form-control" value="" id="direccion_tienda required>
          </li>

          <div class="tienda-info">
              <li>
                  <span style="font-size:15px;">Telefono</span>
                  <input type="text" name="telefono_tienda" class="form-control" value="" id="telefono_tienda" required>
              </li>
              <li>
                  <span style="font-size:15px;">Correo</span>
                  <input type="email" name="correo_tienda" class="form-control" value="" id="correo_tienda" required>
              </li>
          </div>
          <p>*Todos los campos deben estar rellenados</p>
          <div class="contenedor-botones-form">
              <a src="#" class="btn btn-danger" id="leave">Cancelar</a>
              <button type="submit" class="btn btn-primary" id="create-tienda">Guardar</button>
          </div>
      </form>
    `;
  modal.appendChild(form_editarTienda);

  document.getElementById("leave").addEventListener("click", function (e) {
    document.getElementById("modal").innerHTML = "";
  });
}

// document.getElementsByClassName("btn-editar-tienda").addEventListener("click", function (e) {
//     modalEditarTienda();
//   });


// $('.btn-editar-tienda').click(function(e){
//   modalEditarTienda();
//  });
