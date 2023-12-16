<?php

namespace Core;

use BadFunctionCallException;

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

    private $params = array();

    private function __construct($url, $controller, $action, $method)
    {
        $this->url = (substr($url,0,1) == '/') ? substr_replace($url, '', 0, 1):$url;
        $this->controller = $controller;
        $this->action = $action;
        $this->method = $method;
        $this->params = array_fill_keys($this->getUrlParameters(),null);
        if($method == "GET"){
            self::$get[$url] = $this;
        } else {
            self::$post[$url] = $this;
        }
    }

    public function getUrlParameters(){
        $expression = "(\{[a-z0-9_]{1,}\})";
        if(preg_match_all($expression,$this->url,$matches)){
            return preg_replace("(\{|\})","",$matches[0]);
        }
        return [];
    }

    public static function get($url, $controller, $action = 'index'){
        return new Router($url, $controller, $action, 'GET');
    }
    public static function post($url, $controller, $action = 'index'){
        return new Router($url, $controller, $action, 'POST');
    }

    public static function getRouterByUrl($url, $method="GET"){
        $url = (substr($url,0,1) == '/') ? substr_replace($url, '', 0, 1):$url;
        $routers = ($method == "GET") ? self::$get : self::$post;

        foreach($routers as $router){
            $expression = preg_replace("(\{[a-z0-9_]{1,}\})","([a-zA-Z0-9_\-|\száàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{1,})",$router->url);
            if(preg_match("#^($expression)*$#i",$url,$matches)===1){
                
                array_shift($matches);
                array_shift($matches);

                foreach($router->params as &$param){
                    $param = array_shift($matches);
                }
                return $router;
            }
        }
        return false;
    }

    public static function getRouterByController($controller,$action='index',$method='GET',$parameteres=[]){
        $routers = ($method == "GET") ? self::$get : self::$post;
        foreach($routers as $router) {
            if($router->controller == $controller && $router->action == $action){
                if(count($router->params)== count($parameteres)){
                    foreach($router->params as &$param){
                        $param = array_shift($parameteres);
                    }
                    return $router;
                }
                
            }
        }
        return false;
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function getParameteres(){
        return $this->params;
    }

    public function getUrl(){
        $url = $this->url;
        foreach($this->params as $var => $param){
            $url = str_replace("{{$var}}", urlencode($param), $url);
        }
        return $url;
    }

}