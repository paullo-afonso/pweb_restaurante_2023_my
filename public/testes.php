<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$model = new Produto(1);
// $config->save(['name'=>'Root_User','value'=>'Paulo']);
// $model->delete();

all($model); 

function all($model){
    $configs = $model->all();
    array_walk($configs, function ($config) {
    echo $config->id. " | " . $config->nome . " | " .$config->valor_un. "<hr>";
    });
}

