<!DOCTYPE html>
<html lang="es">
<head>
<title>BlasterImport</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../images/favicon.png"/>
<link href="../css/css.css" rel="stylesheet">

<link href="../plugins/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css">
<script>
  

</script>


<link rel="stylesheet" href="../css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
<script src="../js/sweetalert-u.min.js"></script>

</head>

<body style="background-color: #0b2642;">

	 <input type="text" class="home" value="nohome" hidden>
<div id="defaultOpen"></div>

<div class="hiddenForm">
	<a href="../../home" ><button class="botonesDescarga">Inicio</button></a>
	<!-- <script>
		 var tiempo = setTimeout(function(){
                    window.location = "http://186.92.155.132/Blasterimport-master1/blaster"
                }, 180000000000000)
	</script> -->	

	
	<a href="https://www.localhost/">gugol</a>
</div>
<div onload="pelis()" style="display: block;" class="clienteOcultar row">
	<a href="../../home" ><button class="botonesDescarga">Inicio</button></a>
	<div id="modalNota" onclick="off()">
	  <div id="notaText">
		<h2>¡LEER CON ATENCION!</h2>
		<p>A continuacion se mostraran todas las peliculas que usted compro en el kiosko, para realizar la transferencia de la pelicula a su PENDRIVE de forma correcta debera seguir los siguientes pasos: <br><br> 1)Presione la pelicula que desee descargar <br>2)No desconecte su PENDRIVE hasta que la maquina le indique que la transferencia se realizo o de un mensaje de error (en tal caso llevar el PENDRIVE al kiosko para su revision).<br>3)La espera puede estimar de 15 a 10 Minutos.</p>
		<h4>Presione en cualquier lado de la pantalla para continuar...</h4>
	  </div>
	  <div style="text-align: center;" id="notaText2">

		<h2>¡Podras ver el progreso de tu descarga en la barra que aparecera donde indica la flecha!</h2>
		<h3 >Tardara unos segundos en mostrar el proceso de descarga.</h3 >
		<h4>Presione en cualquier lado de la pantalla para continuar...</h4>
	  </div>
	  <i id="flecha" class="fas fa-arrow-alt-circle-down flecha"></i>
	</div>
	<div class="col s12 bienvenida">
		
	</div>
	
	

	
</div>

<!--====================================================================================-->

<script src="../js/jquery.min.js"></script>

<script src="../js/materialize.min.js"></script>

  
  <script>

  


function off() {
    document.getElementById("modalNota").style.display = "none";
    
    
    
}


function loader(tiempo) {
    document.getElementById("overlay").style.display = "block";
    clearTimeout(tiempo);
}
pelis()
function pelis(){
			console.log(<?php echo $_GET['cedula'];?>)                    
            var cedula = <?php echo $_GET['cedula'];?> ;

            const datos = {"cedulaDescargas":cedula};
            
            $.ajax({
                type: "POST",
                url: "../ajax/ficcion.php",
                data: datos,

            })
            .then(function(data){
                if (data == null) {
                    swal({
                    title: "¡Error!",
                    text: "¡Usted no esta registrado!",
                    icon: "error",
                    })
                    .then((result) => {
                        if (result) {
                            window.location = "descargas"
                        }else{
                            window.location = "descargas"
                        }
                    }) 
                }else{
                    var datos = Object.values(data);
                    var pelis = datos[0]
                    var nombreCliente = data[1]
                   
                    $(".hiddenForm").hide('slow')
                    $(".clienteOcultar").show()

                    for (var i = 0; i < pelis.length; i++) {
                        
                        if (pelis[i].genero == "Series" || pelis[i].genero == "Anime") {
                            var mostrar = `
                        <a class="seriesD">

                            <div class="cardDescarga col s2">
                              <input type="text" value="${pelis[i].nombrePelicula}" hidden/>
                              <img src="../../backend/views/media/caratulas/${pelis[i].caratula}" alt="John" style="width:100%; height: 35vh;">
                              <h6>${pelis[i].nombrePelicula}</h6>
                              <p class="title">Peso: ${pelis[i].peso.substr(0 ,4)} GB</p> 
                            </div>
                        </a>
                        
                        `



                        }

                        else{
                            var mostrar = `
                        <a onclick="flecha()" href="../../backend/views/media/peliculas/${pelis[i].pelicula}" download>
                            <div class="cardDescarga col s2">

                              <img src="../../backend/views/media/caratulas/${pelis[i].caratula}" alt="John" style="width:100%; height: 35vh;">
                              <h6>${pelis[i].nombrePelicula} fgfgf</h6>
                              <p class="title">Peso: ${pelis[i].peso.substr(0,1) + "." +pelis[i].peso.substr(2,2)} GB</p> 
                            </div>
                        </a>`
                        }
                        

                        $(".clienteOcultar").append(mostrar)



                    }
                    var modal = `<div class="serieDown" hidden>
                        <span style="float:right;font-size:30px;" class="ekis fa fa-times"></span>
                         <table class="table">
                            <thead>
                              <tr style="text-align: center;">
                                <th>Nombre</th>
                                <th>Peso</th>
                              </tr>
                            </thead>
                            <tbody class="tbodySeries">
                                
                            </tbody>
                          </table>
                        </div>`
                    $(".clienteOcultar").append(modal)

                    $('.cardDescarga').on('click',function(){
                        var nombrePeliculaa = $(this).children().val()
                        
                        var datos2 = {"seriesDescargas":nombrePeliculaa}
                        $.ajax({
                            type: "POST",
                            url: "../ajax/ficcion.php",
                            data: datos2,
                        })
                        .then(function(data){
                           $('.trSeries').remove()
                            var datos = Object.values(data);
                            
                            var arreglo = datos[0].pelicula.split(",")
                            var arreglo2 = datos[0].peso.split(",")

                            for (var c = 0; c < arreglo.length; c++) {
                                if (arreglo2 == 0) {
                                    var pesoSerie = arreglo2[c]
                                }
                                else{
                                    var pesoSerie = arreglo2[c].substr(0,1) + "." +pelis[i].peso.substr(2,2)
                                }
                                var mostrar2 = ` 
                                <tr class="trSeries">
                                    <td><a  href="../../backend/views/media/peliculas/${arreglo[c]}" download>${arreglo[c]}</a></td>
                                    <td><a  href="../../backend/views/media/peliculas/${arreglo[c]}" download> ${pesoSerie} GB</a></td>     
                                </tr>`
                                $(".tbodySeries").append(mostrar2)

                        }
                        })


                    })

                    $(".trSeries").on("click", function(){
                        $(this).css("background-color" , "#0b2642")
                        $(this).css("color" , "#fff")
                        
                    })
                    $(".ekis").on("click", function(){
                        $(".serieDown").hide();
                    })

                    $(".seriesD").on("click", function(){
                        $(".serieDown").show();

                    })
                    for (var i = 0; i < nombreCliente.length; i++) {
                        console.log(nombreCliente[i].nombre)
                var mostrarNombre=`<h4 style="color: white;text-align: center;">Hola ${nombreCliente[i].nombre} estas son tus peliculas compradas!</h4>`
                   $(".bienvenida").append(mostrarNombre)
               }
                }

                
            })
            
            
}

	function flecha(){
		document.getElementById("modalNota").style.display = "block";
		document.getElementById("notaText").style.display = "none";
		document.getElementById("notaText2").style.display = "block";
		document.getElementById("flecha").style.display = "block";

		var interval = setInterval(function(){
			$(".flecha").toggle()
		},1100)

		setTimeout(function(){
			clearTimeout(interval)
			document.getElementById("flecha").style.display = "block";
            setTimeout(function(){
                window.location="http://192.168.250.3/Blasterimport-master/blaster"
            },20000)
		},10000)
	}
  
    
  </script>

<script src="../js/main.js"></script>
</body>

</html>





<script>
	

</script>
  


				