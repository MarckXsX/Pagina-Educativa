<?php
require_once 'Controller.php';
require_once './Model/ForoModel.php';
//require_once './Model/InicioModel.php';
// require_once './Core/validaciones.php';
//require_once './Model/CuponesModel.php';
// require_once './Model/EmpresaModel.php';

class ForoController extends Controller{

    private $model;

    function __construct(){
        $this->model=new ForoModel();  
    }


    public function index(){
        $viewBag['foros']= $this->model->get();
        $this->render("index.php",$viewBag);
    }

    public function Administracion(){
       
        $viewBag['foros']= $this->model->get();
        $this->render("Administracion.php",$viewBag);
    }

    public function create(){
       
        $this->render("new.php");
    }

    public function edit($id){
        $viewBag=array();
        $Foros=$this->model->get($id);
        $viewBag['foro']=$Foros[0];
        $this->render("edit.php",$viewBag);
    }

    public function Vista($id){
        $Foros=$this->model->get($id);
        $Coment=$this->model->getComentarios($id);
        $viewBag['foro']=$Foros[0];
        $viewBag['Comentarios']=$Coment;
        $this->render("VistaForo.php",$viewBag);
    }

    public function comentario(){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $Comentario=array();
            $viewBag=array();

            $Comentario['ID']="";
            $Comentario['id_foro']=$id_foro;
            $Comentario['id_usuario']=$id_usuario;
            $Comentario['Comentario']=$Coment;
            

            if(estaVacio($Coment)||!isset($Coment)){
                array_push($errores,'Debes escribir un comentario');
            }

            
            if(count($errores)==0){
               
                $this->model->insertcomentario($Comentario);
                header('location:'.PATH.'/Foro/Vista/'.$id_foro.'');

            }
            else{
                //Cambiar
                $Foros=$this->model->get($id_foro);
                $comentarios=$this->model->getComentarios($id_foro);
                $viewBag['foro']=$Foros[0];
                $viewBag['errores']=$errores;
                $viewBag['Comentarios']=$comentarios;
                $viewBag['comet']=$Comentario;
                $this->render("VistaForo.php",$viewBag);
            }
            
        }
    }

    public function update($id){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $Foro=array();
            $viewBag=array();

            $Foro['ID_FORO']=$ID_FORO;
            $Foro['Titulo']=$Titulo;
            $Foro['Descripcion']=$Descripcion;
            

            if(estaVacio($Titulo)||!isset($Titulo)){
                array_push($errores,'Debes ingresar el Titulo del Foro.');
            }elseif(!esTexto($Titulo)){
                array_push($errores,'Solo Texto');
            }
            if(estaVacio($Descripcion)||!isset($Descripcion)){
                array_push($errores,'Debes ingresar una Descripcion.');
            }elseif(!esTexto($Descripcion)){
                array_push($errores,'Solo Texto');
            }

            
            if(count($errores)==0){
               
                $this->model->updateForo($Foro);
                header('location:'.PATH.'/Foro/Administracion');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['foro']=$Foro;
                $this->render("edit.php",$viewBag);
            }
            
        }
    }

    public function remove($id){
        $this->model->removeForo($id);
        header('location:'.PATH.'/Foro/Administracion');
    }
    

    public function add(){ 
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $Foro=array();
            $viewBag=array();

            $Foro['ID_FORO']='';
            $Foro['Titulo']=$Titulo;
            $Foro['Descripcion']=$Descripcion;
            

            if(estaVacio($Titulo)||!isset($Titulo)){
                array_push($errores,'Debes ingresar el Titulo del Foro.');
            }
            if(estaVacio($Descripcion)||!isset($Descripcion)){
                array_push($errores,'Debes ingresar una Descripcion.');
            }

            
            if(count($errores)==0){
               
                $this->model->insertForo($Foro);
                header('location:'.PATH.'/Foro/Administracion');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['foro']=$Foro;
                $this->render("new.php",$viewBag);
            }
            
        }
    }


}