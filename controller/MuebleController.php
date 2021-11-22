<?php
require_once "./model/MuebleModel.php";
require_once "./view/MuebleView.php";
require_once "./controller/CategoriaController.php";
require_once "./model/CategoriaModel.php";
require_once "./controller/AuthController.php";
require_once "./API/CommentController.php";

class MuebleController
{
    private $model;
    private $view;
    private $catCont;
    private $catModel;
    private $auth;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new MuebleView();
        $this->catCont = new CategoriaController();
        $this->catModel = new CategoriaModel();
        $this->auth = new AuthController();
    }

    //traigo todos los muebles
    function getMuebles()
    {
        $muebles = $this->model->getMuebles();
        return $muebles;
    }

    function getMueble($id)
    {
        $mueble = $this->model->getMueble($id);
        $listaCat = $this->catModel->getCategoriasList();
        $this->view->showMueble($mueble, $listaCat);
    }

    function getMueblesConCategoria()
    {
        $muebles = $this->getMuebles();
        $this->catCont->getCategorias($muebles);
    }

    function addMueble()
    {
        $this->model->insertMueble($_POST['furn'], $_POST['desc'], $_POST['price'], $_POST['cat']);
        header('Location:' . BASE_URL . 'home');
    }

    function editMueble($id)
    {
        $this->model->updateMueble($_POST['furn'], $_POST['desc'], $_POST['price'], $_POST['cat'], $id);
        header('Location:' . BASE_URL . 'home');
    }

    function delMueble($id)
    {
        $this->model->deleteMueble($id);
        header('Location:' . BASE_URL . 'home');
    }
}
