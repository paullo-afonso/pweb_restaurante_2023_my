<?php
/**
 * Esse classe vai gerenciar as views da nossa aplicação.
 */

 namespace Core;

 class View{
    private $view;

    private $template;

    private $data;

    public function __construct($view,$template = TEMPLATES_DEFAULT, $data = []){
        $this->view = $view;
        $this->template = $template;
        $this->data = $data;
    }

    private function createStringRequireView(){


        $view = (substr($this->view,-9,9) == ".view.php") ?
            substr_replace($this->view,"",-9,9) : $this->view;
        $view = str_replace('.', '/', $view);
        return VIEWS_PATH."/".$view.".view.php";
    }
    private function createStringRequireTemplate(){

        $template = (substr($this->template,-13,13) == ".view.php") ?
            substr_replace($this->template,"",-13,13) : $this->template;
            $template = str_replace('.', '/', $template);
        return TEMPLATES_PATH."/".$template.".template.php";
    }

    public function __set($name, $value){
        $this->data[$name] = $value;
    }

    public function __get($name){
        return (isset($this->data[$name]))?$this->data[$name]:null;
    }

    public function show($data = []){
        $data = array_merge($this->data, $data);
        extract($data);
        ob_start();
        require $this->createStringRequireView();
        $view = ob_get_clean();
        require $this->createStringRequireTemplate();
    }
 }