<?php

namespace Controllers;
use Core\Controller;
use Core\View;

class Produtos extends Controller{
    public function index()
    {  
        $view = new View('produtos.lista');
        $view->nome = 'x-salada';
        $view->valor = 55.5;
        $view->show();


    }

    public function produto($id = 0){
        $view = new View('produtos.item');
        $view->nome = 'x-tudo';
        $view->valor = 22.39;
        $view->id = $id;
        $view->show();
    }
}