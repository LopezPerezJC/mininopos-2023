/*NUEVA TIENDA*/
export function modalNuevoUsuario() {
    let modal = document.getElementById("modal");
    modal.innerHTML = "";
    let form_nuevoUsuario = document.createElement("div");
    form_nuevoUsuario.setAttribute("class", "form_emer");
    form_nuevoUsuario.setAttribute("id", "form_emer");
    form_nuevoUsuario.innerHTML = `
          <form class="form" id="form-new-user" action="./acciones/usuarios/registrarUsuario.php" method="post" enctype="multipart/form-data">
            <h2 style="font-size:20px;">Registra una usuario</h2>
            <li>
                <select name="rol_usuario" id="rol-usuario">
                    <option value="super-admin">Super Admin</option>
                    <option value="administrador">Administrador</option>
                    <option value="empleado">Empleado</option>
                </select>
            </li>
            
            <li>
                <span style="font-size:15px;">Nombre</span>
                <input type="text" name="nombre_usuario" class="form-control" value="" id="nombre_usuario" required>
            </li>
            <li>
                <span style="font-size:15px;">username</span>
                <input type="text" name="username_usuario" class="form-control" value="" id="username_usuario" required>
            </li>
  
            <div class="tienda-info">
                <li>
                    <select name="tienda_usuario" id="tienda-usuario">
                        <option value="1">Tres coronas</option>
                        <option value="2">3 mixtecas</option>
                    </select>
                </li>
                <li>
                    <span style="font-size:15px;">Contraseña</span>
                    <input type="text" name="contrasenia_usuario" class="form-control" value="" id="contrasenia_usuario" required>
                </li>
                
                <li>
                    <span style="font-size:15px;">Foto de perfil</span>
                    <input type="file" name="img_usuario" class="form-control" value="" id="img_usuario" required>
                </li>
            </div>
            <p>*Todos los campos deben estar rellenados</p>
            <div class="contenedor-botones-form">
                <a src="#" class="btn btn-danger" id="leave">Cancelar</a>
                <button type="submit" class="btn btn-primary" id="create-tienda">Registrar</button>
            </div>
        </form>
      `;
    modal.appendChild(form_nuevoUsuario);
  
    document.getElementById("leave").addEventListener("click", function (e) {
      document.getElementById("modal").innerHTML = "";
    });
  }
  
//   document
//     .getElementById("btn-nuevo-usuario")
//     .addEventListener("click", function (e) {
//       modalNuevoUsuario();
//     });