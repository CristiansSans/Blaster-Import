<div style="height: 10vh;z-index: 10;" class="container-fluid">
<?php
include 'cabezera.php';
?>


</div>

				
          <div class="container-fluid cambioPelicula thisHidden">
            <center><h1>Añadir pelicula al cliente</h1></center>
            <input id="myInput1" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Buscar.."><span class="fa fa-search iconoBusqueda"></span>
            <table id="id01" class="table">
              <thead class="thead-dark">
                <tr style="text-align: center;">
                  <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Direccion</th>
                  <th>Añadir Peliculas</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $resultado= new ingresoClienteController;
                  $resultado->gestorClientesListaController();
                ?>
              </tbody>
            </table>


          </div>
			
				<div style="margin-top: 50px;" class="container-fluid clienteOcultar">
  
    <div class="row">
 
  <div class="col-sm-6 tablas">

    <input style="position: fixed;width: 48%;" id="myInput1" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Buscar..">
  <table id="id01" class="table" style="margin-top: 85px;">
    <thead class="thead-dark" style="">
      <tr style="text-align: center;">
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Genero</th>
        <th>Agregar</th>
      </tr>
    </thead>

    <tbody>
      <?php 
        $resultado= new gestorPeliculasController;
        $resultado->vistaDescargas();
      ?>    </tbody>
  </table>
</div>

  <div class="col-sm-6 tablas">
    <input style="width: 20%;background-color: transparent;" readonly class="inputCeduClient inputClient" type="text" value="Prueba" placeholder="Venta...">
  <table class="table">
    <thead class="thead-dark">
      <tr style="text-align: center;">
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Genero</th>
        <th>Quitar</th>
      </tr>
    </thead>

    <tbody class="tbodyCliente">
    </tbody>
  </table>
  
</div>
 </div>
</div>
				