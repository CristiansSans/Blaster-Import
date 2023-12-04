<?php
include 'cabezera.php';
?>
<div class="modals" style="position:absolute;top:20%;left:25%;">
    
          <div class="wrap-login100 agregarPeliculaTwo">
            <form class="login100-form validate-form" method="post" id="formIngreso" enctype="multipart/form-data">
              <span class="login100-form-title ">
                Editar Tipo y Precio
              </span>
              <span class="login100-form-title p-b-18">
                <i class="zmdi zmdi-font"></i>
              </span>

              <div class="wrap-input100 validate-input">
                <input class="input100 editNameTipo" type="text" name="tipo" placeholder="Nombre..."  required>
              </div>
              <div class="wrap-input100 validate-input">
                <input class="input100 editPrecio" type="text" name="precio" placeholder="Precio..."  required>
              </div>
              <input class="input100 editNameTipoAnterior" type="text" hidden name="tipoAnterior" placeholder="Nombre..."  required>

              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn EditadoTipo" >
                    Editar Tipo y Precio
                  </button>
                </div>
              </div>
            </form>
             <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn cerrarEditado" type="button">
                    Cerrar
                  </button>
                </div>
              </div>
          </div>
</div>

<div class="modalsNew">
    
          <div class="wrap-login100 agregarPeliculaTwo">
            <form class="login100-form validate-form" method="post" id="formIngreso" enctype="multipart/form-data">
              <span class="login100-form-title ">
                Nuevo tipo
              </span>
              <span class="login100-form-title p-b-18">
                <i class="zmdi zmdi-font"></i>
              </span>

              <div class="wrap-input100 validate-input">
                <input class="input100 createNameTipo" type="text" name="tipoCreado" placeholder="Nombre..."  required>
              </div>
              <div class="wrap-input100 validate-input">
                <input class="input100 createPrecio" type="text" name="precioCreado" placeholder="Precio..."  required>
              </div>

              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn CrearTipo" type="submit">
                    Crear Tipo
                  </button>
                </div>
              </div>
            </form>
             <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn cerrarEditado" type="button">
                    Cerrar
                  </button>
                </div>
              </div>
          </div>
</div>
<div class="container">
	<center><h1>Editar Precios</h1></center>
	<table class="table">
    <thead class="thead-dark">
      <tr style="text-align: center;">
        <th>Tipo</th>
        <th>Precio</th>
        <th>Editar</th>
        <th>Borrar</th>
      </tr>
    </thead>
    <tbody>
      <?php 
				$resultado= new gestorTiposController;
				$resultado->vistaTipos();
 			?>
    </tbody>
  </table>

 
</div>