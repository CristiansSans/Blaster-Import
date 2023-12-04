<div style="height: 10vh;z-index: 1000;" class="container-fluid">
<?php
include 'cabezera.php';
?>


</div>
	
<div style="margin-top: 50px;" class="container-fluid enter">
  
    <div class="row">
 
  <div class="col-sm-4 tablas">

    <input class="inputVenta inputCodig" type="text"  value="" autofocus placeholder="Codigo...">
  <table class="table">
    <thead class="thead-dark" style="">
      <tr style="text-align: center;">
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Cant</th>
        <th>Precio</th>
        <th>CD</th>
      </tr>
    </thead>

    <tbody>
      <?php 
        $resultado= new gestorPeliculasController;
        $resultado->vistaVentas();
      ?>    </tbody>
  </table>
</div>
<div class="listaClientVent">

    <input id="myInput1" oninput="w3.filterHTML('#id01', '.item', this.value)" class="inputClient" type="text" value="" autofocus placeholder="Buscar...">
  <table id="id01" class="table">
    <thead class="thead-dark" style="">
      <tr style="text-align: center;">
        <th>Nombre del cliente</th>
        <th>Cedula</th>
      </tr>
    </thead>

    <tbody>
      <?php 
        $resultado= new ingresoClienteController;
        $resultado->gestorClientesListaVentas();
      ?>    </tbody>
  </table>
</div>

  <div class="col-sm-4 tablas">
    <input style="width: 20%;" class="inputVenta inputVent" type="text" value="0" placeholder="Venta...">
    <button class="cleanVenta">Limpiar <i class="fas fa-check-circle"></i></button>
  <table class="table">
    <thead class="thead-dark">
      <tr style="text-align: center;">
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody class="tbody">
    </tbody>
  </table>
  
</div>
  <div class="col-sm-4 tablas">
    <?php 
        $resultado= new gestorPeliculasController;
        $resultado->vistaVentaInput();
      ?>
        <p class="cleanVentass">Total del dia <i class="fas fa-tag"></i></p>           
  <table class="table">
    <thead style="background-color: #2274a5 !important" >
      <tr style="text-align: center;">
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cliente</th>
      </tr>
    </thead>

    <tbody class="bodyTotal">
      <?php 
        $resultado= new gestorPeliculasController;
        $resultado->vistaVendidas();
      ?>
    </tbody>
  </table>
</div>
 </div>
</div>