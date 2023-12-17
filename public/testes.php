<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$config = new Config(1);
echo $config->name . " = " . $config->value; 



//SELECT * FROM CLIENTES WHERE ID = :ID