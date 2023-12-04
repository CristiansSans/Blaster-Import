
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
        $('#tablaProductos').hide('fast');
        $('#FormularioProduct').show('slow');
    });

    $('#verProducto').on('click', function(){
        $('#tablaVentas').hide('fast');
        $('#FormularioProduct').hide('fast');
        $('#tablaProductos').show('slow');
    });

     $('#verVentas').on('click', function(){
        $('#FormularioProduct').hide('fast');
        $('#tablaProductos').hide('fast');
         $('#tablaVentas').show('slow');
    });

     $(".buttons").on("click", function(){
        $(".precio").val("");
     })

     $('.editar').on('click', function() {
        var dataString = $(this).children().val();
        $('.modals').show('slow');
        var datos = {"codigo":dataString};
        

        $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){

            var datos = Object.values(data);
            var datas = Object.values(datos[0])
            const caratula  =  datos[0].caratula;
            const trailer  =  datos[0].trailer;
            const pelicula  =  datos[0].pelicula;
            const fecha  =  datos[0].fecha;
            const size = datos[0].peso;
           
            const CodigoCriminal = datos[0].codigo;

            
                $(".editCodigo").val(datos[0].codigo)

                $(".codigoCriminal").val(datos[0].codigo)
                $(".fechaCriminal").val(datos[0].fecha)
                $(".caratulaCriminal").val(datos[0].caratula)
                $(".trailerCriminal").val(datos[0].trailer)
                $(".peliculaCriminal").val(datos[0].pelicula)
                
                    var pesish = size.toLocaleString(size.substr(0,4))
                    console.log(pesish)
                $(".cara").text("Imagen de caratula: "+caratula)
                $(".tra").text("Trailer: "+trailer)
                $(".pel").text("Pelicula: "+pelicula)
                $(".fech").text("Fecha: "+fecha)
                $(".peso").text("Peso: "+pesish)
                $('.pesoPeliculaa').val(size.substr(0,4))

                $(".editNombre").val(datos[0].nombrePelicula)
                $(".editCantidad").val(datos[0].cantidad)
                $(".editDiscos").val(datos[0].discos)
                $(".editCinavia").prepend(`<option selected value="${datos[0].cinavia}">${datos[0].cinavia} (Seleccionado)</option>`)
                $(".editClasi").prepend(`<option selected value="${datos[0].clasificacion}">${datos[0].clasificacion} (Seleccionado)</option>`)
                $(".editLenguaje").val(datos[0].lenguaje)
                $(".editSelectGeneros").prepend(`<option selected value="${datos[0].genero}">${datos[0].genero} (Seleccionado)</option>`)
                $(".editSelectTipos").prepend(`<option selected value="${datos[0].tipo}">${datos[0].tipo} (Seleccionado)</option>`)

    
                   

            })

        })
     





     $('.cerrarEditado').on('click', () =>{
        location.reload();
     })
     
     $(".EditadoPelicula").on('click', function(event){
        if ( $(".editDiscos").val() < 1 ) {
            $(".editDiscos").val(1)
        }
        
        

        var cantidad = document.getElementById("archivosPelis").files.length; 
        if (cantidad == 0) {
            $(".editPeli").submit()
        }else{
            for (var i = 0; i < cantidad; i++) {
            var peso = document.getElementById("archivosPelis").files[i].size;
            var dat = document.getElementById("archivosPelis").files[i].name;
            if (i == 0) {
                var datt = dat;
                var pesoo = peso;
            }else{
                var datt = datt+","+dat;
                var pesoo = pesoo+","+peso;
            }
            
            }
            
            
            var datos = {"revisarArchivo":datt};
            $.ajax({
                type: "POST",
                url: "views/ajax/ficcion.php",
                data: datos,
            })
            .then(function(data){
               
                if (data=="si") {
                    
                    $('.nombreYaRevisado').val(datt)
                    $('.cantidadRevision').val(cantidad)
                    $('.pesoYaRevisado').val(pesoo)
                    $('#archivosPelis').val('')
                    $(".editPeli").submit()
                    
                    
                }
                else{      
                    console.log(data) 
                    $('.cantidadRevision').val(cantidad) 
                    $(".editPeli").submit()
                }
            })
        }
        
     })

     $(".agregalaPeli").on('click', function(event){
        if (document.getElementById("peliAgrega").files[0].name) {
                event.preventDefault()}  
        var dat = document.getElementById("peliAgrega").files[0].name;
        var peso = document.getElementById("peliAgrega").files[0].size;
        var cantidad = document.getElementById("peliAgrega").files.length;
        console.log(dat);
        var datos = {"revisarArchivo":dat};
        $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){
            if (data=="si") {
                $('.nombreYaRevisado').val(dat)
                $('.pesoYaRevisado').val(peso)
                $('.cantidadRevision').val(cantidad)
                $('#peliAgrega').val('')
                $(".editPeli").submit()
                
                
            }
            else{
                 $('.cantidadRevision').val(cantidad)   
                $(".editPeli").submit()
            }
        })
     })

     $(".editGene").on('click', function(){
        $('.modals').show('slow')
        var dataString = $(this).children().next().val();
        var fondo = $(this).children().next().next().val();
        var icono = $(this).children().next().next().next().val();
        $(".editNameGene").val(dataString)
        $(".inputNombre").val(dataString)
        $(".inputFondo").val(fondo)
        $(".inputIcono").val(icono)
        
     })

     $(".newGene").on('click', function(){
        $('.modalsNew').show('slow')
     })

     $(".editarTipos").on('click', function(){
        $('.modals').show('slow')
        var dataString1 = $(this).children().val();
        var dataString = $(this).children().next().val();
        $(".editNameTipo").val(dataString1)
        $(".editPrecio").val(dataString)
        $(".editNameTipoAnterior").val(dataString1)
        
     })

    

    $(".inputCodig").keypress(function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        var code = $(".inputCodig").val()
        var peliculasVentas = $(".peliculasVentas")
        var inspector = false
        var inputVent = $(".inputVent").val()
        for (var i = 0; i < peliculasVentas.length; i++) {
           if ($(".peliculasVentas").eq(i).hasClass(code)) {
            inspector = true;
            var nombre = $("."+code+"").children().next().children().val()
            var precio = $("."+code+"").children().next().next().next().children().val()
            var disco = $("."+code+"").children().next().next().next().next().children().val()
            var tipo = $("."+code+"").children().next().next().next().next().next().children().val()
            if (disco < 1) {
                var precioPrimero = parseFloat(precio)
            }
            else{
               var precioPrimero = parseFloat(precio) * parseFloat(disco) 
            }
            
            var comprado = `<tr class="ventaTabs" style="text-align: center;">
                            <th><input hidden type="text" value="${code}">${code}</th>
                            <th><input hidden type="text" value="${nombre}">${nombre}</th>
                            <th><input hidden type="text" value="${precioPrimero}">${precioPrimero}</th>
                            <th style="display:none;"><input class="tipoVent" hidden type="text" value="${tipo}">${tipo}</th>
                            <th class="eliminarVent" onclick="dele(${precio})" style="cursor:pointer"><i class="fas fa-trash"></i></th>
                          </tr>`
            $(".tbody").append(comprado)
            if (disco < 1) {
                var total = (parseFloat(precio) + parseFloat(inputVent))
            }
            else{
               var total = (parseFloat(precio) + parseFloat(inputVent)) * parseFloat(disco); 
            }
            
            $(".inputVent").val(total)

            $(".eliminarVent").on("click", function(){
    $(this).parent().remove()

})
           }


        }

        if (inspector==false) {
            swal({
                title: "¡Error!",
                text: "El codigo no existe",
                icon: "error",
            })

        }
        $(".inputCodig").val("")
    }
});



     $(".cleanVenta").on("click" ,function(){
        var pasaber = false
        var codigos = ""
        for (var i = 0; i < $(".ventaTabs").length; i++) {
             if ($(".tipoVent").eq(i).val() == "Descargas" || $(".tipoVent").eq(i).val() == "Descarga" || $(".tipoVent").eq(i).val() == "descargas" || $(".tipoVent").eq(i).val() == "descarga") {
                    pasaber = true
                    if (codigos =="") {
                        codigos = $(".ventaTabs").eq(i).children().children().val()
                    }
                    else{
                        codigos = codigos+","+$(".ventaTabs").eq(i).children().children().val()
                    }

             }
        }
      
        if (pasaber == true) {
            $(".inputCodig").prop('disabled', true)
            $(".listaClientVent").show()
            $(".itemVent").on("click", function(){
                const datosClien= {"codigoIngresoCliente":codigos,"cedulaIngresoCliente":$(this).children().next().text()}
                     $.ajax({
                            type: "POST",
                            url: "views/ajax/ficcion.php",
                            data: datosClien,
                        })
                     .then(function(data){
                console.log(data)
            })
                $(".inputCodig").prop('disabled', false)
                var ceduClient = $(this).children().next().text()
                var conteoVentas = $(".ventaTabs")
        for (var i = 0; i < conteoVentas.length; i++) {
            var codig = $(".ventaTabs").eq(i).children().children().val()
            var nombre =$(".ventaTabs").eq(i).children().next().children().val()
            var precio = $(".ventaTabs").eq(i).children().next().next().children().val()
            var datos = {"codigoVentas":codig ,"nombreVentas":nombre ,"precioVentas":precio,"ceduClient":ceduClient}

            $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
            .then(function(data){
                
            })
            var total =`<tr  style="text-align: center;">
                            <th><input hidden type="text" value="${codig}">${codig}</th>
                            <th><input hidden type="text" value="${nombre}">${nombre}</th>
                            <th><input hidden type="text" value="${precio}">${precio}</th>
                            <th><input hidden type="text" value="${ceduClient}">${ceduClient}</th>
                          </tr>`
                    var inputTotal= $(".inputTotal").val()
                    var  totalVentas = parseFloat(inputTotal) + parseFloat(precio)
                     $(".inputTotal").val(totalVentas + " BsS")
                     $(".bodyTotal").prepend(total)
                     $(".listaClientVent").hide()

        }
        $(".inputVent").val("0")
        $(".ventaTabs").remove();
            })
        }
        else{
            var conteoVentas = $(".ventaTabs")
        for (var i = 0; i < conteoVentas.length; i++) {
            var codig = $(".ventaTabs").eq(i).children().children().val()
            var nombre =$(".ventaTabs").eq(i).children().next().children().val()
            var precio = $(".ventaTabs").eq(i).children().next().next().children().val()
            var datos = {"codigoVentas":codig ,"nombreVentas":nombre ,"precioVentas":precio,"ceduClient":""}

            $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
            .then(function(data){
                
            })
            var total =`<tr  style="text-align: center;">
                            <th><input hidden type="text" value="${codig}">${codig}</th>
                            <th><input hidden type="text" value="${nombre}">${nombre}</th>
                            <th><input hidden type="text" value="${precio}">${precio}</th>
                          </tr>`
                    var inputTotal= $(".inputTotal").val()
                    var  totalVentas = parseFloat(inputTotal) + parseFloat(precio)
                     $(".inputTotal").val(totalVentas + " BsS")
                     $(".bodyTotal").prepend(total)  
                        

        }
        $(".inputVent").val("0")
        $(".ventaTabs").remove();
        }
        
             
        
     });

     $(".delete").on("click" , function(event){
         var codigo = $(this).children().val();
        

         var datos = {"codigoDelete":codigo};

        swal({
              title: "¿Seguro?",
              text: "La pelicula se eliminara del sistema",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){
            if (data == "ok") {
                swal({
                    title: "¡OK!",
                    text: "¡La pelicula ha sido borrada correctamente!",
                    icon: "success",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPeliculas"
                    }else{
                        window.location = "editarPeliculas"
                    }
                })
            }else{
                swal({
                    title: "Error!",
                    text: "Hemos tenido errores tecnicos",
                    icon: "error",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPeliculas"
                    }else{
                        window.location = "editarPeliculas"
                    }
                })
            }
             
        })
              } else {
                swal("No se ha borrado nada");
              }
            });

       
        

        

     })

     
   

     $('.EditadoTipo').on('click', function(event){
        event.preventDefault();
        var tipo = $('.editNameTipo').val()
        var precio = $('.editPrecio').val()
        var TipoAnterior = $('.editNameTipoAnterior').val()
        const datos = {"tipoEditado":tipo,"precioEditado":precio,"tipoEditadoAnterior":TipoAnterior}

         $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){
            if (data == "ok") {
                swal({
                    title: "¡OK!",
                    text: "¡El tipo ha sido editado correctamente!",
                    icon: "success",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPrecio"
                    }else{
                        window.location = "editarPrecio"
                    }
                })
            }else{
                swal({
                    title: "Error!",
                    text: "Ya existe un tipo con este nombre",
                    icon: "error",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPrecio"
                    }else{
                        window.location = "editarPrecio"
                    }
                })
            }
             
        })

     })
      $('.CrearTipo').on('click', function(event){
        event.preventDefault();
        var tipo = $('.createNameTipo').val()
        var precio = $('.createPrecio').val()
        const datos = {"tipoCreado":tipo,"precioCreado":precio}

         $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){
            if (data == "ok") {
                swal({
                    title: "¡OK!",
                    text: "¡El tipo ha sido creado correctamente!",
                    icon: "success",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPrecio"
                    }else{
                        window.location = "editarPrecio"
                    }
                })
            }else{
                swal({
                    title: "Error!",
                    text: "Ya existe un tipo con ese nombre",
                    icon: "error",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPrecio"
                    }else{
                        window.location = "editarPrecio"
                    }
                })
            }
             
        })

     })

    $(".EliminarTipos").on("click" , function(event){

        var tipo = $(this).children().val();
        

        var datos = {"eliminarTipo":tipo};
        
        swal({
              title: "¿Seguro?",
              text: "El tipo sera eliminado",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){
            if (data == "ok") {
                swal({
                    title: "¡OK!",
                    text: "¡La pelicula ha sido borrada correctamente!",
                    icon: "success",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPrecio"
                    }else{
                        window.location = "editarPrecio"
                    }
                })
            }else{
                swal({
                    title: "Error!",
                    text: "Hemos tenido errores tecnicos",
                    icon: "error",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarPrecio"
                    }else{
                        window.location = "editarPrecio"
                    }
                })
            }
             
        })
              } else {
                swal("El tipo no se elimino");
              }
            });
        

     })
    $('.EliminarGene').on('click', function(){
        var nombre = $(this).children().next().val()

        const datos = {"GeneroEliminar":nombre}
        swal({
              title: "¿Seguro?",
              text: "El genero sera eliminado",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })

        .then(function(data){
            if (data == "ok") {
                swal({
                    title: "¡OK!",
                    text: "¡El ha sido borrada correctamente!",
                    icon: "success",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarGeneros"
                    }else{
                        window.location = "editarGeneros"
                    }
                })
            }else{
                swal({
                    title: "Error!",
                    text: "Hemos tenido errores tecnicos",
                    icon: "error",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarGeneros"
                    }else{
                        window.location = "editarGeneros"
                    }
                })
            }
             
        })
              } else {
                swal("El genero no se elimino");
              }
            });

        
    })
    $(".inputCambio").keypress(function(e) {

        var keycode = (e.keyCode ? e.keyCode : e.which);
        if (keycode == '13') {

            var code = $(this).val()
            console.log(code)
            const datos = {"cambioCodigo":code}
            $.ajax({
                type: "POST",
                url: "views/ajax/ficcion.php",
                data: datos,
            })
            .then(function(data){
                if (data === "ok") {
                    $(".thisHidden").hide()
                    $(".cambioOculto").show()
                    $('.inputCambioDos').focus();
                }
            })
            .fail(function(data) {
                console.log(data)
            })
        }
    })
     $(".inputCambioDos").keypress(function(e) {      
        var keycode = (e.keyCode ? e.keyCode : e.which);

        if (keycode == '13') {
            var code = $(this).val()
            console.log(code)
            const datos = {"cambioCodigoDos":code}
            $.ajax({
                type: "POST",
                url: "views/ajax/ficcion.php",
                data: datos,
            })
            .then(function(data){
                if (data == "ok") {
                    swal({
                        title: "¡OK!",
                        text: "¡El cambio se ha hecho correctamente!",
                        icon: "success",
                    })
                    .then((result) => {
                        if (result) {
                            window.location = "cambioPelicula"
                        }else{
                            window.location = "cambioPelicula"
                        }
                    })
                }else{
                    swal({
                        title: "Error!",
                        text: "Hemos tenido errores tecnicos",
                        icon: "error",
                    })
                    .then((result) => {
                        if (result) {
                            window.location = "cambioPelicula"
                        }else{
                            window.location = "cambioPelicula"
                        }
                    })
                }
            })
            
        }
    })
//aquiii
     $(".editarClientePelicula").on('click',function(e) {      

        
            var cedulaCliente = $(this).children().val()
            
            const datos = {"cedulaCliente":cedulaCliente}
            $.ajax({
                type: "POST",
                url: "views/ajax/ficcion.php",
                data: datos,
            })
            .then(function(data){
              if (data == null) {
                swal({
                    title: "¡Error!",
                    text: "¡El cliente no existe :(",
                    icon: "error",
                })
                .then((result) => {
                    if (result) {
                        window.location = "editarCliente"
                    }else{
                        window.location = "editarCliente"
                    }
                }) 
              }else{
                var datos = Object.values(data);
                console.log(datos)
                $(".cambioPelicula").hide()
                $(".clienteOcultar").show()
                $(".inputClient").val(cedulaCliente)
                $(".CeduCliente").val(cedulaCliente)
                for (var i = 0; i < datos.length; i++) {
                     var app = `<tr  style="text-align: center;">
                            <th>${datos[i].codigo}</th>
                            <th>${datos[i].nombrePelicula}</th>
                            <th>${datos[i].genero}</th>
                            <th class="quitarPeli" style="text-align: center;"><input type="text" hidden value="${datos[i].codigo}"><i style="font-size: 20px;cursor: pointer;" class="fa fa-arrow-left"></i></th>
                          </tr>`
                          $(".tbodyCliente").append(app)
                }
                $(".agregarPeli").on("click" , function(){
                    var codigo = $(this).children().next().val()
                    var cedula = $(this).children().val()
                    const datos= {"codigoIngresoCliente":codigo,"cedulaIngresoCliente":cedula}
                     $.ajax({
                            type: "POST",
                            url: "views/ajax/ficcion.php",
                            data: datos,
                        })

                     .then(function(data){
                        var datos = Object.values(data)
                        for (var i = 0; i < datos.length; i++) {
                                 var app = `<tr  style="text-align: center;">
                                        <th>${datos[i].codigo}</th>
                                        <th>${datos[i].nombrePelicula}</th>
                                        <th>${datos[i].genero}</th>
                                        <th class="quitarPeli" style="text-align: center;"><input type="text" hidden value="${datos[i].codigo}"><i style="font-size: 20px;cursor: pointer;" class="fa fa-arrow-left"></i></th>
                                      </tr>`
                                      $(".tbodyCliente").append(app)
                            }
                            $(".quitarPeli").on("click" , function(){
                                var codigo = $(this).children().val()
                                var cedula = $(".inputCeduClient").val()
                                const datos= {"codigoQuitarCliente":codigo,"cedulaQuitarCliente":cedula}
                                var este = $(this)
                                
                                
                                 $.ajax({
                                        type: "POST",
                                        url: "views/ajax/ficcion.php",
                                        data: datos,
                                    })
                                 
                                 .then(function(data){
                                    este.parent().remove()
                                    
                                 })
                             })
                     })
                })
                $(".quitarPeli").on("click" , function(){
                                var codigo = $(this).children().val()
                                var cedula = $(".inputCeduClient").val()
                                const datos= {"codigoQuitarCliente":codigo,"cedulaQuitarCliente":cedula}
                                var este = $(this)
                                
                                
                                 $.ajax({
                                        type: "POST",
                                        url: "views/ajax/ficcion.php",
                                        data: datos,
                                    })
                                 
                                 .then(function(data){
                                    este.parent().remove()
                                    
                                 })
                    })
                
                }         
            })
        

    })

    $('.editarCliente').on('click', function(){

        var cedula = $(this).children().val();
        
        const datos= {"cedulaEditarCliente":cedula}
        $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){

            var datos = Object.values(data);
            console.log(datos[0].nombre)
            $('.thisHidden').hide()
            $('.clienteOcultar').show()
            $('.editNombre').val(datos[0].nombre)
            $('.editCedula').val(datos[0].cedula)
            $('.editCedulaQueTal').val(datos[0].cedula)
            $('.editTelefono').val(datos[0].telefono)
            $('.editCorreo').val(datos[0].correo)
            $('.editDireccion').val(datos[0].direccion)

            $('.EditadoCliente').on('click', function(e){
                e.preventDefault();
                var cedulaVieja = $('.editCedulaQueTal').val()
                var cedulaNueva = $('.editCedula').val()
                var nombre = $('.editNombre').val()
                var telefono = $('.editTelefono').val()
                var correo = $('.editCorreo').val()
                var direccion = $('.editDireccion').val()
                
                const datosDos = 
                            {
                                "cedulaVieja":cedulaVieja,
                                "cedulaNueva":cedulaNueva,
                                "nombre":nombre,
                                "telefono":telefono,
                                "correo":correo,
                                "direccion":direccion
                            }
                            

                $.ajax({
                    type: "POST",
                    url: "views/ajax/ficcion.php",
                    data: datosDos,
                })
                .then(function(data){
                    if (data==false) {
                        swal({
                        title: "¡Error!",
                        text: "¡La cedula esta repetida!",
                        icon: "error",
                    })
                    .then((result) => {
                        if (result) {
                            window.location = "editarCliente"
                        }else{
                            window.location = "editarCliente"
                        }
                    })
                    }
                    else{
                    swal({
                        title: "¡Bien!",
                        text: "¡El cliente se ha editado",
                        icon: "success",
                    })
                    .then((result) => {
                        if (result) {
                            window.location = "editarCliente"
                        }else{
                            window.location = "editarCliente"
                        }
                    })}
                })
            })
        })
    })
    
    $('.deleteCliente').on('click', function(){
        $(this).parent().addClass('este');
        var cedulaCliente = $(this).children().val()
        const datos= {"cedulaEliminarCliente":cedulaCliente}
         $.ajax({
            type: "POST",
            url: "views/ajax/ficcion.php",
            data: datos,
        })
        .then(function(data){
            $('.este').hide('slow');
        })
    })

    




})(jQuery);