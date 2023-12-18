<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$config = new Config(7);
$config->name = 'Professor';
$config->save(['name'=>'Desenvolvedor Principal','value'=>'Paulo Afonso']);

all($config->where('value','like','Paul%')); 

function all($model){
    $configs = $model->all();
    array_walk($configs, function ($config) {
    echo $config->id. " | " . $config->name . " | " .$config->value. "<hr>";
    });
}

