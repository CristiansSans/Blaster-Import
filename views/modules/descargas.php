<input type="text" class="home" value="nohome" hidden>
<div id="defaultOpen"></div>

<div class="hiddenForm">
	<button class="botonesDescarga">Inicio</button>
	<script>
		 var tiempo = setTimeout(function(){
                    window.location = "http://192.168.250.3/Blasterimport-master/blaster"
                }, 180000)
	</script>	

	<div class="container descargasForm">
		<form>
		    <label class="psw">Cedula</label>
		    <input type="number" placeholder="Introduzca su cedula" name="psw" class="inputsDescarga" style="color: #fff !important;" required>

		    <button type="submit" onclick="on()" class="botondownload">Ingresar</button>
		</form>    
	</div>
	<div class="teclado">
		
		<button class="tecladoDescarga">1</button>
		<button class="tecladoDescarga">2</button>
		<button class="tecladoDescarga">3</button>
		<button class="tecladoDescarga">4</button>
		<button class="tecladoDescarga">5</button>
		<button class="tecladoDescarga">6</button>
		<button class="tecladoDescarga">7</button>
		<button class="tecladoDescarga">8</button>
		<button class="tecladoDescarga">9</button>
		<button class="tecladoDescarga">0</button>

		<button class="borrar"><i class="fa fa-times"></i></button>
	</div>
</div>
<div onload="pendrive" class="clienteOcultar row">
	<button class="botonesDescarga">Inicio</button>
	<div id="modalNota" onclick="off()">
	  <div id="notaText">
		<h2>¡LEER CON ATENCION!</h2>
		<p>A continuacion se mostraran todas las peliculas que usted compro en el kiosko, para realizar la transferencia de la pelicula a su PENDRIVE de forma correcta debera seguir los siguientes pasos: <br><br> 1)No desconecte su PENDRIVE hasta que la maquina le indique que la transferencia se realizo o de un mensaje de error (en tal caso llevar el PENDRIVE al kiosko para su revision).<br>2)La espera puede estimar de 15 a 10 Minutos.</p>
		<h4>Presione en cualquier lado de la pantalla para continuar...</h4>
	  </div>
	</div>
	<div class="col s12 bienvenida">
		
	</div>
	
	
<div id="overlay">
  <div id="text">
<center>
<div class="loader"></div> <br>
<h4>Espere mientras se transfiere su pelicula</h4></center>
</div>
</div>
<?php 
		
	$descargas = new Descargando();

	$descargas -> descargandoController();

 ?>
	
</div>
  


				