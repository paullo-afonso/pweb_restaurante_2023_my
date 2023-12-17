<?php

namespace Core;

class Configs{
    private function __construct(){}
    private static $configs = array();

    public static function getConfig($config){
        $file_name = preg_replace("(\.php$)", '', $config);
        $parameteres = explode('.', $file_name);
        $file_name = array_shift($parameteres);
        if(!array_key_exists($file_name,self::$configs)){
            self::$configs[$file_name] = require(CONFIGS_PATH . "/$file_name.php");
        }
        $configs = self::$configs[$file_name];
        foreach($parameteres as $param){
            if(is_array($configs) && array_key_exists($param, $configs)) {
                $configs = $configs[$param];
            }else{
                $configs = null;
                break;
            }
        }
        return $configs;
    }
}