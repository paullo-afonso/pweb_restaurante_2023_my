<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$model = new Produto(2);
// $model->valor_un = 15;
// $model->save();
// $config->save(['name'=>'Root_User','value'=>'Paulo']);
// $model->delete();

pre($model->getData()); 

function all($model){
    $configs = $model->all();
    array_walk($configs, function ($config) {
    echo $config->id. " | " . $config->nome . " | " .$config->valor_un. "<hr>";
    });
}

