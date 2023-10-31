<?php
require_once 'Controller.php';
require_once './Model/InicioModel.php';
// require_once './Core/validaciones.php';
//require_once './Model/CuponesModel.php';
// require_once './Model/EmpresaModel.php';

class AdministracionController extends Controller{

    private $model;

    function __construct(){
        //$this->model=new InicioModel();  
    }


    public function index(){
       
        $this->render("index.php");
    }



}