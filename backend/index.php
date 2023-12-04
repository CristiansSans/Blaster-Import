<?php  
require_once 'models/conexion.php';
require_once 'models/consulta.php';
require_once 'models/login.php';
require_once 'models/gestorGeneros.php';
require_once 'models/gestorTipos.php';
require_once 'models/gestorPeliculas.php';
require_once 'models/enlaces.php';
require_once 'models/ingresoPelicula.php';
require_once 'models/ingresoCliente.php';


require_once 'controllers/enlaces.php';
require_once 'controllers/login.php';
require_once 'controllers/ingresoPelicula.php';
require_once 'controllers/ingresoCliente.php';
require_once 'controllers/template.php';
require_once 'controllers/gestorGeneros.php';
require_once 'controllers/gestorTipos.php';
require_once 'controllers/gestorPeliculas.php';

$template = new templateControllers();
$template -> template();