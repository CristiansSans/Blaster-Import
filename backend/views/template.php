<!DOCTYPE html>
<html lang="es">
<head>
<title>BlasterImport - Admin</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Blaster Import">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="views/images/icons/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="views/css/styles/bootstrap4/bootstrap.min.css">
<link href="../views/plugins/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="views/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="views/vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="views/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="views/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="views/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="views/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="views/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="views/css/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="views/css/styles/responsive.css">
<link rel="stylesheet" href="views/plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="views/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="views/css/styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="views/css/styles/categories_responsive.css">
<link rel="stylesheet" type="text/css" href="views/css/styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="views/css/styles/single_responsive.css">
<link rel="stylesheet" type="text/css" href="views/css/util.css">
<link rel="stylesheet" type="text/css" href="views/css/main.css">
<link rel="stylesheet" type="text/css" href="views/css/sweetalert.css">
<script src="views/js/sweetalert-u.min.js"></script>

</head>

<body>

	<?php 
        $modulos = new Enlaces();
        $modulos -> enlacesController();
    ?>


<script src="views/js/jquery-3.2.1.min.js"></script>
<script src="views/vendor/animsition/js/animsition.min.js"></script>
<script src="views/css/styles/bootstrap4/popper.js"></script>
<script src="views/css/styles/bootstrap4/bootstrap.min.js"></script>

<!--====================================================================================-->
<script src="views/vendor/select2/select2.min.js"></script>
<script src="views/vendor/daterangepicker/moment.min.js"></script>
<script src="views/vendor/daterangepicker/daterangepicker.js"></script>
<script src="views/vendor/countdowntime/countdowntime.js"></script>
<!--====================================================================================-->
<script src="views/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="views/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="views/plugins/easing/easing.js"></script>
<script src="views/js/custom.js"></script>
<script src="views/js/filtro.js"></script>
<script src="views/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="views/js/categories_custom.js"></script>
<script src="views/js/main.js"></script>
<script>function verificar(){
		var r = confirm("Seguro?");
		console.log(r);
		if (r == true) {
			
		}
		else{
			 $(".fios").on('submit', function(evt){
    		evt.preventDefault();  
    			// tu codigo aqui
 			});
		}

     }

     function	focus(){
     	setTimeout(function(){
     	$(".inputCodig").focus()
     	focus();
     }, 2000)
     	
     }

     focus();



     

     function dele(precio){
        var vent = $(".inputVent").val()
        var total = parseFloat(vent) - parseFloat(precio)
        $(".inputVent").val(total)
     }


     

     </script>


</body>

</html>
