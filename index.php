<?php  
require_once 'models/conexion.php';
require_once 'models/consulta.php';
require_once 'models/enlaces.php';
require_once 'models/gestorPeliculas.php';
require_once 'models/gestorGeneros.php';
require_once 'models/gestordescargas.php';

require_once 'controllers/enlaces.php';
require_once 'controllers/template.php';
require_once 'controllers/gestorPeliculas.php';
require_once 'controllers/gestorGeneros.php';
require_once 'controllers/gestordescargas.php';
require_once 'controllers/descargando.php';

$template = new templateControllers();
$template -> template();