<div style="height: 10vh;z-index: 10;" class="container-fluid">
<?php
include 'cabezera.php';
?>


</div>

<div class="modals">
    
          <div style="display:inline-block; width:100%;" class="wrap-login100 agregarPeliculaTwo">
            <form class="login100-form validate-form editPeli" method="post" id="formIngreso" enctype="multipart/form-data">
              <span class="login100-form-title ">
                Editar Pelicula
              </span>
              
              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Codigo:</span>
                <input  class="input100 editCodigo" type="number" name="codigo" placeholder="Codigo..."  required>
               
              </div>
                                
              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Nombre de la Pelicula:</span>
                <input  class="input100 editNombre" type="text" name="nombrePelicula" placeholder="Nombre..."  required>
                
              </div>
              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input ">
                <span class="files">Generos:</span>
                <select name="generos" class="editSelectGeneros" >
                  <?php 
                    $resultado = new ingresopeliculaController();
                    $respuesta = $resultado -> gestorGenerosController();
                    echo $respuesta;
                  ?>
                </select>
              </div>

              
              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Cantidad:</span>
                <input class="input100 editCantidad" type="text" name="cantidad" value="" placeholder="Cantidad..."  required>
                
              </div>

              <div style="width:33%;display:inline-block;" class="wrap-input100 ">
                <span class="files">Discos:</span>
                <input class="input100 editDiscos" min="1" required placeholder ="Discos..." type="text" name="discos">
                <span class="focus-input100" ></span>
              </div>
              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Tipo:</span>
                <select name="tipo" class="editSelectTipos" >
                  <?php 
                    $resultado = new ingresopeliculaController();
                    $respuesta = $resultado -> gestorTiposController();
                    echo $respuesta;
                  ?>
                </select>
                
              </div>
              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Cinavia:</span>
                <select name="cinavia" class="editCinavia" required >
                  <option disabled selected>Cinavia</option>
                  <option value="No">No</option>
                  <option value="Si">Si</option>
                </select>
                
              </div>
              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Lenguaje:</span>
                <input class="input100 editLenguaje" type="text" placeholder="Lenguaje..." name="lenguaje"  required>
                <span class="focus-input100"></span>
              </div>

              <div style="width:33%;display:inline-block;" class="wrap-input100 validate-input">
                <span class="files">Clasificación:</span>
                <select name="clasificacion" class="editClasi" required >
                  <option disabled selected>Clasificación</option>
                  <option value="G">G (todo espectador)</option>
                  <option value="PG">PG (menores acompañados de sus padres)</option>
                  <option value="14A">14A (menores de 14 años acompañados por adultos)</option>
                  <option value="18A">18A (menores de 18 años acompañados por adultos)</option>
                  <option value="R">R (restringido, ningún menor de 18 años puede ver esta película)</option>
                  <option value="A">A (mayores de 18 años)</option>
                </select>
                
              </div>

              <span class="files cara">Imagen caratula</span>
              <div style="width:100%;display:inline-block;" class="wrap-input100">
                <input class="input100 editCaratula" type="file" name="caratula"  value="">
              </div>
              <span class="files tra">Trailer</span>
              <div style="width:100%;display:inline-block;" class="wrap-input100">
                <input class="input100 editTrailer" type="file" name="trailer" value="">
              </div>

              <span class="files pel">Pelicula</span>
              <span style="margin-left: 30px;" class="files peso">Peso:</span>
              <input class="pesoPeliculaa" type="hidden" name="pesoPelicula">
              <div style="width:100%;display:inline-block;" class="wrap-input100">
                <input id="archivosPelis" multiple class="input100 editPelicula" type="file" name="pelicula[]" value="">
              </div>
              
              
              <div style="width:100%;display:inline-block;" class="wrap-input100">
              <span class="fech"></span>
                <input class="input100 editFecha" type="date" name="fecha" >
              </div>
              <input class="codigoCriminal" type="number" name="codigoCriminal"  value="" hidden>
              <input class="fechaCriminal" type="text" name="fechaCriminal"  value="" hidden>
              <input class="caratulaCriminal" type="text" name="caratulaCriminal"  value="" hidden>
              <input class="trailerCriminal" type="text" name="trailerCriminal"  value="" hidden>
              <input class="peliculaCriminal" type="text" name="peliculaCriminal"  value="" hidden>
              <input type="text" hidden="" name="nombreYaRevisado" class="nombreYaRevisado">
              <input type="text" hidden="" name="pesoYaRevisado" class="pesoYaRevisado">
              <input type="text" hidden="" name="cantidadRevision" class="cantidadRevision">
  
              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn EditadoPelicula" type="submit">
                    Editar pelicula
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
          <?php 
            $ingreso = new gestorPeliculasController();
            $ingreso ->editarPeliculasFormulario();
          ?>


</div>


<div class="container-fluid">
	<center><h1>Editar Peliculas</h1></center>
  <input id="myInput1" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Buscar.."><span class="fa fa-search iconoBusqueda"></span>
	<table id="id01" class="table">
    <thead class="thead-dark">
      <tr style="text-align: center;">
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Genero</th>
        <th>Cantidad</th>
        <th>Discos</th>
        <th>Tipo</th>
        <th>Cinavia</th>
        <th>Lenguaje</th>
        <th>Clasificacion</th>
        <th>Fecha</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <?php 
				$resultado= new gestorPeliculasController;
				$resultado->vistaPeliculas();
 			?>
    </tbody>
  </table>


</div>
<script>
</script>