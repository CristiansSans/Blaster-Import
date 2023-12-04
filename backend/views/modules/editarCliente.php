<div style="height: 10vh;z-index: 10;" class="container-fluid">
<?php
include 'cabezera.php';
?>


</div>

				
          <div class="container-fluid cambioPelicula thisHidden">
            <center><h1>Editar Clientes</h1></center>
            <input id="myInput1" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Buscar.."><span class="fa fa-search iconoBusqueda"></span>
            <table id="id01" class="table">
              <thead class="thead-dark">
                <tr style="text-align: center;">
                  <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Direccion</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $resultado= new ingresoClienteController;
                  $resultado->gestorClientesListaEditarController();
                ?>
              </tbody>
            </table>


          </div>
          <div style="margin-top: 50px;" class="container-fluid clienteOcultar">
  
          <div class="row">
            <div class="container">
              
    
          <div style="display:inline-block; width:100%;" class="wrap-login100 agregarPeliculaTwo">
            <form class="login100-form validate-form editPeli" method="post" id="formIngreso" enctype="multipart/form-data">
              <span class="login100-form-title ">
                Editar Cliente
              </span>
              
              <div style="width:100%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Nombre:</span>
                <input  class="input100 editNombre" type="text" name="nombre" placeholder="Nombre..."  required>
               
              </div>
                                
              <div style="width:100%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Cedula:</span>
                <input  class="input100 editCedula" type="number" name="cedula" placeholder="Cedula..."  required>
                
              </div>
              <div style="width:100%;display:inline-block;" class="wrap-input100">
                <span class="files">Telefono:</span>
                <input  class="input100 editTelefono" type="text" name="telefono" placeholder="Telefono..."  required>
                
              </div>

              <div style="width:100%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Correo:</span>
                <input class="input100 editCorreo" type="text" name="Correo" value="" placeholder="Correo..."  required>
                
              </div>

              <div style="width:100%;display:inline-block;" class="wrap-input100 ">
                <span class="files">Direccion:</span>
                <input class="input100 editDireccion" placeholder ="Direccion..." type="text" name="direccion"  >
                <span class="focus-input100" ></span>
              </div>  
              <input class="input100 editCedulaQueTal" placeholder ="cedula..." type="text" hidden name="cedulaQueTal"  >                          
  
              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn EditadoCliente" type="">
                    Editar Cliente
                  </button>
                </div>
              </div>
            </form>
             <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn cerrarEditado" >
                    Cerrar
                  </button>
                </div>
              </div>
          </div>


        </div>
      </div>
    </div>
  
			
				
				