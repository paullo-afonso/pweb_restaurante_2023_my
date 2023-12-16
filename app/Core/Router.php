<?php

namespace Core;

/**
 * Gerencia todas as rotas do meu sistema.
 */

class Router{

    /**
     * armazena todas as requisições get do sistema.
     * @var array
     */

    private static $get = array();

    private static $post = array();
    private $url;

    private $controller;

    private $action;

    private $method;

    private function __construct($url, $controller, $action, $method)
    {
        $this->url = $url;
        $this->controller = $controller;
        $this->action = $action;
        $this->method = $method;
        if($method == "GET"){
            self::$get[$url] = $this;
        } else {
            self::$post[$url] = $this;
        }
    }

    private static function get($url, $controller, $action = 'index'){
        return new Router($url, $controller, $action, 'GET');
    }
    private static function post($url, $controller, $action = 'index'){
        return new Router($url, $controller, $action, 'POST');
    }

}