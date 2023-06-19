/* MODALES HOME */
export function lanzarModalHome() {
  let body = document.getElementById("modal");
  body.innerHTML = "";
  let modal = document.createElement("div");
  modal.setAttribute("class", "window_emer");
  modal.setAttribute("id", "window_emer");
  modal.innerHTML = `
      <div class="contenedor-info">
          <i class="fa-solid fa-circle-info fa-2xl" style="color: #455dfc;"></i>
          <p>Ya estas en el módulo de Inicio 🐱</p>
      </div>
      <a href="#" class="btn btn-primary" id="done">Aceptar</a>
      `;
  body.appendChild(modal);

  document.getElementById("done").addEventListener("click", function (e) {
    document.getElementById("modal").innerHTML = "";
  });
}

/* ++++++++++++++++++++++++
    MODALES INVENTARIO
    ++++++++++++++++++++++++ */

export function lanzarModalInventario() {
  let body = document.getElementById("modal");
  body.innerHTML = "";
  let modal = document.createElement("div");
  modal.setAttribute("class", "window_emer");
  modal.setAttribute("id", "window_emer");
  modal.innerHTML = `
      <div class="contenedor-info">
          <i class="fa-solid fa-circle-info fa-2xl" style="color: #455dfc;"></i>
          <p>Ya estas en el módulo de Inventario 🐱</p>
      </div>
      <a href="#" class="btn btn-primary" id="done">Aceptar</a>
      `;
  body.appendChild(modal);

  document.getElementById("done").addEventListener("click", function (e) {
    document.getElementById("modal").innerHTML = "";
  });
}

/*NUEVO PRODUCTO*/
export function modalNuevoProducto() {
  let modal = document.getElementById("modal");
  modal.innerHTML = "";
  let form_nuevoProducto = document.createElement("div");
  form_nuevoProducto.setAttribute("class", "form_emer");
  form_nuevoProducto.setAttribute("id", "form_emer");
  form_nuevoProducto.innerHTML = `
    <form class="form" id="form-new-producto" action="./upload.php" method="post" enctype="multipart/form-data">
        <h2 style="font-size:20px;">Agrega un nuevo producto</h2>
        <div class="contenedor-img-inputs">
            <div class="contenedor-inputs-form">
                <li>
                    <span style="font-size:15px;">Código</span>
                    <input type="text" name="codigo_producto"  class="form-control" value="" id="codigo_producto" required>
                </li>
                <li>            
                    <span style="font-size:15px;">Nombre</span>
                    <input type="text" name="nombre_producto"  class="form-control" value="" id="nombre_producto" required>
                </li>

                <div class="subcontenedor-inputs">
                    <li>            
                        <span style="font-size:15px;">Precio</span>
                        <input type="number" min="0" name="precio_producto"  class="form-control" value="" id="precio_producto" required>
                    </li>
                    <li>            
                        <span style="font-size:15px;">Existencias</span>
                        <input type="number" min="0" name="existencias_producto"  class="form-control" value="" id="existencias_producto" required>
                    </li>
                </div>

                <li>            
                    <span style="font-size:15px;">Descripción</span>
                    <textarea type="text" name="descripcion_producto"  class="form-control" value="" id="descripcion_producto" cols="10" rows="3" style="resize: none;"></textarea>
                </li>
            </div>

            <div class="file-upload">
                <div class="image-upload-wrap">
                    <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                    <div class="drag-text">
                        <h3>Arrastre y suelte una imagen</h3>
                    </div>
                </div>
                <div class="file-upload-content">
                    <img class="file-upload-image" src="#" alt="your image" />
                </div>
                <div class="contenedor-botones-subir-img">
                    <button class="btn btn-primary file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Añadir imagen</button>
                    
                    <div class="file-upload-content">
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="btn btn-danger remove-image">Eliminar  <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p>*Todos los campos deben estar rellenados</p>
        <div class="contenedor-botones-form">
            <a src="#" class="btn btn-danger" id="leave">Cancelar</a>
            <a src="#" class="btn btn-primary" id="create-producto" >Registrar</a>
        </div>
    </form>
    `;
  modal.appendChild(form_nuevoProducto);

  document.getElementById("leave").addEventListener("click", function (e) {
    document.getElementById("modal").innerHTML = "";
  });

  document.getElementById("create-producto").addEventListener("click", function (e) {
    alert('funcionando')
  });  
}

/*MODAL EDITAR PRODUCTO*/
export function modalEditarProducto() {
  let modal = document.getElementById("modal");
  modal.innerHTML = "";
  let form_EditarProducto = document.createElement("div");
  form_EditarProducto.setAttribute("class", "form_emer");
  form_EditarProducto.setAttribute("id", "form_emer");
  form_EditarProducto.innerHTML = `
      <form class="form" id="form-edit-product" action="" method="post">
          <h2 style="font-size:20px;">Editar dato del producto</h2>
          <div class="contenedor-img-inputs">
              <div class="contenedor-inputs-form">
                  <li>
                      <span style="font-size:15px;">Código</span>
                      <input type="text" name="codigo_producto"  class="form-control" value="" id="codigo_producto" required>
                  </li>
                  <li>            
                      <span style="font-size:15px;">Nombre</span>
                      <input type="text" name="nombre_producto"  class="form-control" value="" id="nombre_producto" required>
                  </li>
  
                  <div class="subcontenedor-inputs">
                      <li>            
                          <span style="font-size:15px;">Precio</span>
                          <input type="number" min="0" name="precio_producto"  class="form-control" value="" id="precio_producto" required>
                      </li>
                      <li>            
                          <span style="font-size:15px;">Existencias</span>
                          <input type="number" min="0" name="existencias_producto"  class="form-control" value="" id="existencias_producto" required>
                      </li>
                  </div>
  
                  <li>            
                      <span style="font-size:15px;">Descripción</span>
                      <textarea type="text" name="descripcion_producto"  class="form-control" value="" id="descripcion_producto" cols="10" rows="3" style="resize: none;"></textarea>
                  </li>
              </div>
  
              <div class="file-upload">
                  <div class="image-upload-wrap">
                      <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                      <div class="drag-text">
                          <h3>Arrastra y suelta una imagen</h3>
                      </div>
                  </div>
                  <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                  </div>
                  <div class="contenedor-botones-subir-img">
                      <button class="btn btn-primary file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Cambiar imagen</button>
                      
                      <div class="file-upload-content">
                          <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()" class="btn btn-danger remove-image">Eliminar  <span class="image-title">Uploaded Image</span></button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="contenedor-botones-form">
              <a src="#" class="btn btn-danger" id="leave">Cancelar</a>
              <a src="#" class="btn btn-primary" id="create" >Guardar cambios</a>
          </div>
      </form>
      `;
  modal.appendChild(form_EditarProducto);

  document.getElementById("leave").addEventListener("click", function (e) {
    document.getElementById("modal").innerHTML = "";
  });
}


/*MODAL ELIMINAR */

export function modalMensageEliminar() {
    let modal = document.getElementById("modal");
    modal.innerHTML = "";
    let contenidoMensajeEliminar = document.createElement("div");
    contenidoMensajeEliminar.setAttribute("class", "window_emer");
    contenidoMensajeEliminar.setAttribute("id", "window_emer");
    contenidoMensajeEliminar.innerHTML = `

        <h3>¿Esta usted seguro de esta acción? 🤔</h3>
        <div class="contenedor-botones-modal-mensaje">
              <a src="#" class="btn btn-danger" id="leave">Si</a>
              <a src="#" class="btn btn-primary" id="create" >No</a>
          </div>
        `;
    modal.appendChild(contenidoMensajeEliminar);
  
    document.getElementById("leave").addEventListener("click", function (e) {
      document.getElementById("modal").innerHTML = "";
    });
  }
