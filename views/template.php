<!DOCTYPE html>
<html lang="es">
<head>
<title>BlasterImport</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="views/images/favicon.png"/>
<link href="views/css/css.css" rel="stylesheet">

<link href="views/plugins/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css">
<script>
  

</script>


<link rel="stylesheet" href="views/css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="views/css/main.css">
<link rel="stylesheet" type="text/css" href="views/css/sweetalert.css">
<script src="views/js/sweetalert-u.min.js"></script>

</head>

<body onload= "offf()">

	 <?php 
        $modulos = new Enlaces();
        $modulos -> enlacesController();
    ?>


<!--====================================================================================-->

<script src="views/js/jquery.min.js"></script>

<script src="views/js/materialize.min.js"></script>

  
  <script>

  function openCity(evt, cityName , nombre) {

    const datos = {"CodigoCard":cityName} 
        $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,

        })
        .then(function(data){
          $('.cardos').remove();
          var datos = Object.values(data);
          
          if (datos[0].peso) {
            if (datos[0].cantidad <= 0) {
                var mostrar= `<div id="${datos[0].codigo}" class="col l4 cardos tabcontent" style="padding: 0;" onclick="on('${datos[0].trailer}')">
                <img class="caratula" src="backend/views/media/caratulas/${datos[0].caratula}" alt="">

                <p> <strong>${datos[0].nombrePelicula}</strong>  <br> <b>Genero:</b> ${datos[0].genero} &nbsp&nbsp&nbsp <b>Precio:</b> ${datos[0].precioTipo} Bs.S &nbsp&nbsp&nbsp <br> <b>Cantidad:</b> Por Taquilla &nbsp&nbsp&nbsp <b>Peso:</b> ${datos[0].peso.substr(0 ,4)} &nbsp&nbsp&nbsp <b>Tipo:</b>${datos[0].tipo} </p>
                <button class="trailer"><h4>Ver trailer&nbsp&nbsp&nbsp<i class="fa fa-play-circle"></i></h4></button>
              </div>`

            }
            else{
              var mostrar= `<div id="${datos[0].codigo}" class="col l4 cardos tabcontent" style="padding: 0;" onclick="on('${datos[0].trailer}')">
                <img class="caratula" src="backend/views/media/caratulas/${datos[0].caratula}" alt="">

                <p> <strong>${datos[0].nombrePelicula}</strong>  <br> <b>Genero:</b> ${datos[0].genero} &nbsp&nbsp&nbsp <b>Precio:</b> ${datos[0].precioTipo} Bs.S &nbsp&nbsp&nbsp <br> <b>Cantidad:</b> ${datos[0].cantidad} &nbsp&nbsp&nbsp <b>Peso:</b> ${datos[0].peso.substr(0 ,4)} &nbsp&nbsp&nbsp <b>Tipo:</b>${datos[0].tipo} </p>
                <button class="trailer"><h4>Ver trailer&nbsp&nbsp&nbsp<i class="fa fa-play-circle"></i></h4></button>
              </div>`
            }
                
            }else{
              var mostrar= `<div id="${datos[0].codigo}" class="col l4 cardos tabcontent" style="padding: 0;" onclick="on('${datos[0].trailer}')">
                      <img class="caratula" src="backend/views/media/caratulas/${datos[0].caratula}" alt="">

                      <p> <strong>${datos[0].nombrePelicula}</strong>  <br> <b>Genero:</b> ${datos[0].genero} &nbsp&nbsp&nbsp <b>Precio:</b> ${datos[0].precioTipo} Bs.S  <br> <b>Cantidad:</b> ${datos[0].cantidad} &nbsp&nbsp&nbsp <b>Tipo:</b>${datos[0].tipo}</p>
                      <button class="trailer"><h4>Ver trailer&nbsp&nbsp&nbsp<i class="fa fa-play-circle"></i></h4></button>
              </div>`
            }
            $(".salvadora").append(mostrar)
            $('.cardos').show();
        })
 

  }




          

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
    function touch1(){
       $('.active').click();

        
    }
     function touch2(){
       $('.active').click();
        
    }
     function touch3(){
       $('.active').click();
       setTimeout(function(){ $('.active').click();}, 500);
       setTimeout(function(){ $('.active').click();}, 1000);
       setTimeout(function(){ $('.active').click();}, 1500);
        
    }
    function myFunction(x) {
        x.classList.toggle("change");
    }

  


function off() {
    document.getElementById("modalNota").style.display = "none";
}
function offf() {
  setTimeout(()=>{
    document.getElementById("overlayy").style.display = "none";
    var todas = "peliculas"

        const datos = {"todasLasPeliculas":todas} 
        $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,

        })
        .then(function(data){
            var datos = Object.values(data);
            $('.cardos').remove();
            $('.tablinks').remove();
            $('.carousel-item').remove();
            var g =0;
            for (var i = 0; i < datos.length; i++) {
                if (g==0) { 
                    g++;
                var mostrar2=` 
                <button class="tablinks"  onclick="openCity(event, '${datos[i].codigo}' ,'${datos[i].codigo}' , '${i}') " id="defaultOpen">${datos[i].codigo} &nbsp|&nbsp  ${datos[i].nombrePelicula} <input hidden type="text" value="${i}"></button>`
            } else {
                var mostrar2=` 
                <button class="tablinks"  onclick="openCity(event, '${datos[i].codigo}' ,'${datos[i].codigo}', '${i}')">${datos[i].codigo} &nbsp|&nbsp  ${datos[i].nombrePelicula} <input hidden type="text" value="${i}"></button>`
            }
                

                var mostrar3= `<a class="carousel-item" onclick="openCity(event, '${datos[i].codigo}')" ><img src="backend/views/media/caratulas/${datos[i].caratula}" alt=""></a>`
                
                $(".tabButt").eq(i).append(mostrar2)
                $("#carru").append(mostrar3)
                $('.carousel').carousel();
            }
            if (datos[0].peso) {
                var mostrar= `<div id="${datos[0].codigo}" class="col l4 cardos tabcontent" style="padding: 0;" onclick="on('${datos[0].trailer}')">
                <img class="caratula" src="backend/views/media/caratulas/${datos[0].caratula}" alt="">

                <p> <strong>${datos[0].nombrePelicula}</strong>  <br> <b>Genero:</b> ${datos[0].genero} &nbsp&nbsp&nbsp <b>Precio:</b> ${datos[0].precioTipo} Bs.S &nbsp&nbsp&nbsp <b>Cantidad:</b> ${datos[0].cantidad} <br> <b>Peso:</b> ${datos[0].peso.substr(0 ,4)} &nbsp&nbsp&nbsp <b>Tipo:</b>${datos[0].tipo} </p>
                <button class="trailer"><h4>Ver trailer&nbsp&nbsp&nbsp<i class="fa fa-play-circle"></i></h4></button>
              </div>`
            }else{
              var mostrar= `<div id="${datos[0].codigo}" class="col l4 cardos tabcontent" style="padding: 0;" onclick="on('${datos[0].trailer}')">
                      <img class="caratula" src="backend/views/media/caratulas/${datos[0].caratula}" alt="">

                      <p> <strong>${datos[0].nombrePelicula}</strong>  <br> <b>Genero:</b> ${datos[0].genero} &nbsp&nbsp&nbsp <b>Precio:</b> ${datos[0].precioTipo} Bs.S  <br> <b>Cantidad:</b> ${datos[0].cantidad} &nbsp&nbsp&nbsp <b>Tipo:</b>${datos[0].tipo}</p>
                      <button class="trailer"><h4>Ver trailer&nbsp&nbsp&nbsp<i class="fa fa-play-circle"></i></h4></button>
              </div>`
            }
            $(".salvadora").append(mostrar)
            $("#defaultOpen").click()
          })
    document.getElementById("culoooo").style.display = "block";
    $('.carousel').carousel();
  },2500)
   
}

function loader(tiempo) {
    document.getElementById("overlay").style.display = "block";
    clearTimeout(tiempo);
}
  


var esta;
function timerTrailer(){

  esta = setTimeout(function(){
   if ($(".miDetector").val() == "pasa") {
    
      document.getElementsByClassName("trailerContenido")[0].style.display = "block";
      
      trailerSolito();
   } 

 }, 10000);
}



document.body.onclick = function() {
    clearTimeout( esta )
    timerTrailer()
    // re-invoke invocation()
}

var trailers = 0;
var validation = 0;
function trailerSolito(){

  if (validation == 2) {
    location.reload()
  }
  
  if (document.getElementsByClassName("trailerContenido")[0].style.display == "block") {
    var todos = "trailer"
        const datos = {"todosLosTrailers":todos} 
        $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,

        })

        .then(function(data){
          var datos = Object.values(data);

  var trailerArmado = datos[validation].trailer
    $('.sour').attr('src', "backend/views/media/trailers/"+trailerArmado);
      document.getElementById("videoTrail").style.display = "block";
      document.getElementById("videoTrail").load();
      document.getElementById("videoTrail").play();
      validation++;
        })
     }
 else{
              $(".miDetector").val("pasa")
              document.getElementById("videoTrail").style.display = "none";
              document.getElementById("videoTrail").load();
              document.getElementById("videoTrail").pause();
              clearTimeout( esta )
              timerTrailer();
      }
}



$(".trailersTodos").on("click" , function(){
  if (document.getElementsByClassName("trailerContenido")[0].style.display == "block") {
    location.reload()
  }
  timerTrailer();
    document.getElementsByClassName("trailerContenido")[0].style.display = "none";
    $(".miDetector").val("pasa")
          document.getElementById("videoTrail").style.display = "none";
              document.getElementById("videoTrail").load();
              document.getElementById("videoTrail").pause();
              clearTimeout( esta )
              timerTrailer()
              document.getElementById("overlayy").style.display = "none";
              
})

timerTrailer();
function on(trailer) {
      clearTimeout( esta )
      document.getElementById("overlayy").style.display = "block";
      $('.sour').attr('src', "backend/views/media/trailers/"+trailer);
      document.getElementById("videoTrail").style.display = "block";
      document.getElementById("videoTrail").load();
      document.getElementById("videoTrail").play();
      $(".miDetector").val("epa")
    }

    var vidcarga = document.getElementById("videoTrail");
    vidcarga.onloadeddata = function(){
      document.getElementById("overlayy").style.display = "none";
    }

  






    
  </script>

<script src="views/js/main.js"></script>
<script>
  $(".tabButt").on('click' , function(){
    
        $('.carousel').carousel('set' , $(this).children().children().val());
    })
  </script>
</body>

</html>
