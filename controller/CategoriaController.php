<?php
require_once "./model/CategoriaModel.php";
require_once "./view/CategoriaView.php";

class CategoriaController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    //traigo todas las categorias
    function getCategorias()
    {
        $categorias = $this->model->getCategorias();
        $this->view->showCategorias($categorias);
    }
}