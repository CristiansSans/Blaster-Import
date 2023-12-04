
(function ($) {

    "use strict";

    
    
    
    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }
        
    });

    $('#ingresoProduct').on('click', function(){
        $('#tablaVentas').hide('fast');
        $('#FormularioProduct').show('slow');
    });
    $('.addCart').on('click', function(e){
        e.preventDefault();
        var data = $(this).children().val();

        $.ajax({
            url: 'addCart.php',
            type: 'get',
            dataType: 'json',
            data:data,
            
        })
        .done(function(){
            console.log('success');
        })
        .fail(function(){
            console.log('error');
        })
        .always(function(){
            console.log('complete');
        })
    });
    
    $('.tab').on('scroll', function(){
        if ($('.activoLista').val()== "true") {
        
        var windowHeight = parseInt($(this).scrollTop())
        var height = parseInt($(this).outerHeight())
        var height2 =   $(this).prop('scrollHeight')
        
        
        if (height + windowHeight - 1 == height2 || height + windowHeight - 2 == height2 || height + windowHeight - 3 == height2 || height + windowHeight - 4 == height2 || height + windowHeight - 5 == height2 || height + windowHeight - 6 == height2 || height + windowHeight - 7 == height2) {
            $('.activoLista').val("false")
            setTimeout(function(){$('.activoLista').val("true")},2000);
            var cantidad = $(".tablinks").length;
            var g= cantidad;
             var dataString = cantidad
             var tab =$('.tab').attr('id')
             console.log(tab)
            var datos = {
                "cantidadLista":dataString,"tab":tab
            };

            $.ajax({
                type: "POST",
                url: "views/ajax/ficcion.php",
                data: datos,
            })

            .then(function(data){
                var datos = Object.values(data);
                
                for (var i = 0; i < datos.length; i++) {
                    var mostrar2=`

                <button class="tablinks"  onclick="openCity(event, '${datos[i].codigo}' ,'${datos[i].codigo}', '${g}')">${datos[i].codigo} &nbsp|&nbsp  ${datos[i].nombrePelicula} <input hidden type="text" value="${g}"></button>`

                    var mostrar3= `<a class="carousel-item ${datos[i].codigo}" onclick="openCity(event, '${datos[i].codigo}')" ><img src="backend/views/media/caratulas/${datos[i].caratula}" alt=""><p hidden>${datos[i].nombrePelicula}</p></a>`
                    
                    
                   
                $(".tabButt").eq(g).append(mostrar2)
                $("#carru").append(mostrar3)
                
                $('.carousel').carousel();
                g++;
                }
            })
        }
    }
        
    })

   
    $('.categorias').on('click', function() {
         if($(this).hasClass('activo')){
           $('.categorias').css("background-color","rgba(47, 72, 88,0.6)");
           $(this).css("background-color","#0B2642");

           $(this).removeClass('activo');
         }
         $(this).addClass('activo');
         var image = $(this).children().next().val();

         $('body').css('background-image' , 'url("backend/views/media/fondos/'+image+'")');

    });

    $('.carousel').carousel();
      

     $('.menu').on('click', function(){
        $('.categories').toggle();
     
     });

    $('.categorias').on('click', function(e){
        e.preventDefault();

       
        
        var dataString = $(this).text();
        $('.tab').attr('id', dataString);
        var datos = {"genero":dataString};
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
            
            $('.alfabetico').remove();
            $('.antiguas').remove();
            $('.nuevas').remove();

            $('.input').remove();

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
            
                
        var mostrar4 = `<input class="input" hidden value="${datos[i].genero}">`
        var mostrar3= `<a class="carousel-item" onclick="openCity(event, '${datos[i].codigo}')" ><img src="backend/views/media/caratulas/${datos[i].caratula}" alt=""></a>`

       
        
        $(".tabButt").eq(i).append(mostrar2)
        $("#carru").append(mostrar3)
        
        $("#defaultOpen").click()
        $('.carousel').carousel();
            }

        $('.antiguoGenero').show();
        $('.alfabeticoGenero').show();
        $('.nuevasGenero').show();

        $('.antiguoGenero').append(mostrar4);
        $('.alfabeticoGenero').append(mostrar4);
        $('.nuevasGenero').append(mostrar4);
                    
        })
        .fail(function(data){
                console.log(data);
        })
         
    });

    $('.down').on('click', function(e){
        e.preventDefault();

       
        
        var dataString = $(this).text();
        $('.tab').attr('id', dataString);
        var datos = {"tipo":dataString};
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
            
            $('.alfabetico').remove();
            $('.antiguas').remove();
            $('.nuevas').remove();

            $('.input').remove();

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
            
                
        var mostrar4 = `<input class="input" hidden value="${datos[i].tipo}">`
        var mostrar3= `<a class="carousel-item" onclick="openCity(event, '${datos[i].codigo}')" ><img src="backend/views/media/caratulas/${datos[i].caratula}" alt=""></a>`

       
        
        $(".tabButt").eq(i).append(mostrar2)
        $("#carru").append(mostrar3)
        
        $("#defaultOpen").click()
        $('.carousel').carousel();
            }

        $('.antiguoGenero').show();
        $('.alfabeticoGenero').show();
        $('.nuevasGenero').show();

        $('.antiguoGenero').append(mostrar4);
        $('.alfabeticoGenero').append(mostrar4);
        $('.nuevasGenero').append(mostrar4);
                    
        })
        .fail(function(data){
                console.log(data);
        })
         
    });   

    $('.alfabetico').on('click', function(){
        var dataString = $(this).text();
        
        var datos = {"alfabetico":dataString};

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
                
                $("#defaultOpen").click()
                $('.carousel').carousel();
            }
                 
        })
        .fail(function(data){
            alert("lo siento tenemos fallas tecnicas")
        })
        

    }) 
    $('.antiguas').on('click', function(){
        var dataString = $(this).text();
       
        var datos = {"antiguas":dataString};

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
                
                $("#defaultOpen").click()
                $('.carousel').carousel();
            }
                 
        })
        .fail(function(data){
            alert("lo siento tenemos fallas tecnicas")
        })
        

    }) 
    $('.nuevas').on('click', function(){
        var dataString = $(this).text();
        
        var datos = {"nuevas":dataString};

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
  
                $("#defaultOpen").click()
                $('.carousel').carousel();
            }
                 
        })
        .fail(function(data){
            alert("lo siento tenemos fallas tecnicas")
        })
        

    }) 
    $('.alfabeticoGenero').on('click', function(){
        
        var dataString = $(this).text();
        var dataStringDos = $(this).children().next().val();
        
        var datos = {
            "alfabeticoGenero":dataString,
            "generoOrden":dataStringDos
        };

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
                $("#defaultOpen").click()
                $('.carousel').carousel();
            }
                 
        })
        .fail(function(data){
            alert("lo siento tenemos fallas tecnicas")
        })
        

    })
    $('.nuevasGenero').on('click', function(){
        var dataString = $(this).text();
        var dataStringDos = $(this).children().next().val();
        
        var datos = {
            "nuevasGenero":dataString,
            "generoOrden":dataStringDos
        };

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
                
                $("#defaultOpen").click()
                $('.carousel').carousel();
            }
                 
        })
        .fail(function(data){
            alert("lo siento tenemos fallas tecnicas")
        })
        

    })
    $('.antiguoGenero').on('click', function(){
        var dataString = $(this).text();
        var dataStringDos = $(this).children().next().val();
        
        var datos = {
            "antiguoGenero":dataString,
            "generoOrden":dataStringDos
        };

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
                
                $("#defaultOpen").click()
                $('.carousel').carousel();
            }
                 
        })
        .fail(function(data){
            alert("lo siento tenemos fallas tecnicas")
        })
        

    })

    
    $(".todas").on("click" , function(){
        window.location = "home";
    })

    $(document).ready(function(){
        let home = $('.home').val()
        let descargas = $('.descargasTemplate').val()
        if (home === "home") {
            $('body').css('background-image', 'url("backend/views/media/fondos/fondo.jpg")')
        }else{
            $('body').css('background-image', 'none')
            $('body').css('background-color', '#0B2642')
            $('.botondownload').click()


        }
        
    })

    $('.tecladoDescarga').on('click', function(){
        let valor = $(this).text()
        let valoranterior = $('.inputsDescarga').val()
        console.log(valor)
        $('.inputsDescarga').val(valoranterior+valor)

    })
    $('.borrar').on('click', function(){
        $('.inputsDescarga').val('')
    })
    var val = 0;
    $('.botondownload').on('click', function(e){
        e.preventDefault()
        
        
            
           
            if ($('.inputsDescarga').val() !== '') {
                
            var cedula = $('.inputsDescarga').val() 

            const datos = {"cedulaDescarga":cedula};
            
            $.ajax({
                type: "POST",
                url: "views/ajax/ficcion.php",
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
                    console.log(cedula)

                   if (data == "si") {
                        window.location = "http://localhost?cedula="+cedula+"&valid=0"
                   }
                }

                
            })
            
            }
       
         
    })

$(".cardos").on("click", function(){
    $(".miDetector").val("epa")
})
    
  



    

})(jQuery);





