<?php

/**
* / linux
* \ windows
*/

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__FILE__)) . DS);
define("APP_PATH", ROOT . "" . DS);

//Imprimir ruta del proyecto
//echo ROOT;

require_once(APP_PATH . "config.php");
require_once(APP_PATH . "request.php");
require_once(APP_PATH . "bootstrap.php");
require_once(APP_PATH . "controller.php");
require_once(APP_PATH . "model.php");
require_once(APP_PATH . "view.php");
require_once(APP_PATH . "database.php");
require_once(ROOT . "libs".DS."Flashmessages.php");


//Comprobar que los archivos se estan cargando correctamente
//echo "<pre>";print_r(get_required_files());

if (!session_id()) @session_start();

try{
	Bootstrap::run(new Request);
}catch(Exception $e){
	echo $e->getMessage();
}
