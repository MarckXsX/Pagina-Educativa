<?php
require_once 'Controller.php';
require_once './Model/UsuariosModel.php';
require_once './Core/validaciones.php';
//require_once './Model/CuponesModel.php';
// require_once './Model/EmpresaModel.php';

class UsuariosController extends Controller{

    private $model;

    function __construct(){
        $this->model=new UsuariosModel();  
    }


    public function index(){
       
        $this->render("index.php");
    }

    public function login(){
       
        $this->render("login.php");
    }

    public function register(){
       
        $this->render("registro.php");
    }

    public function Administracion(){
       
        $this->render("Administracion.php");
    }

    public function logout(){ //Metodo para cerrar sesion.
        session_unset();
        session_destroy();
        header('location:'.PATH.'/Inicio/index');
    }

    public function validate(){ //Metodo para confirmar el inicio de session
        $model=new UsuariosModel();

        $correo=$_POST['Correo'];
        $pass=$_POST['pass1'];

        $errores=array();
        $viewBag=array();
        
        if(!empty($model->validateUser($correo,$pass))){
            $login_data=$model->validateUser($correo,$pass);
            $login_data=$login_data[0];
            //var_dump($login_data);
            //var_dump($_SESSION['login_data']); //Variable de session que captura los datos del usuario.
            //var_dump($_SESSION['login_data'][0]['id_tipo_usuario']);
            if($login_data['id_tipo_usuario'] == 1 ){
                $_SESSION['login_data']=$login_data; //Variable de session que captura los datos del usuario.
                header('location:'.PATH.'/Administracion/index');
            }elseif($login_data['id_tipo_usuario'] == 2  ){
                $_SESSION['login_data']=$login_data; //Variable de session que captura los datos del usuario.
                header('location:'.PATH.'/Inicio/index');
            } 
        }
        else{
            array_push($errores,"Usuario no Registrado.");
            $viewBag['errores']=$errores;
            $this->render("login.php",$viewBag);
        }
    }



}