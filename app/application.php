<?php

/**
 * responsável pela inicialização do sistema
 */

use Core\Router;

date_default_timezone_set("America/Belem");
 require_once('Configs/framework.php');
 require_once(COMPOSER_PATH. '/autoload.php');
 \Core\Configs::createConfigsDB();
 require_once('Configs/app.php');
 require_once('Core/helpers.php');
require_once('Configs/routers.php');
