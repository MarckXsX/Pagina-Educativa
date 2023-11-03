<?php
require_once 'Controller.php';
require_once './Model/TestModel.php';


class TestController extends Controller{

    private $model;

    function __construct(){
        $this->model=new TestModel();  
    }


    public function index(){
       
        $this->render("index.php");
    }

    public function Administracion(){
       
        $viewBag['tests']= $this->model->get();
        $this->render("Administracion.php",$viewBag);
    }

    public function Create(){
       
        $this->render("new.php");
    }

    public function Add(){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $Test=array();
            $viewBag=array();

            $Test['ID']='';
            $Test['Nombre']=$Nombre;
            $Test['Descripcion']=$Descripcion;
            $Test['Recurso']=$Recurso;
            
            function generateGoogleFormsEmbed($formsURL) {
                // Extraer el ID del formulario de Google Forms a partir del enlace proporcionado
                $formID = getGoogleFormsID($formsURL);
            
                if ($formID !== false) {
                    // Generar el código HTML para incrustar el formulario de Google Forms
                    $link = "https://docs.google.com/forms/d/e/". $formID . "/viewform"; 
            
                    return $link;
                }
            
                return false;
            }
            
            function getGoogleFormsID($formsURL) {
                $formID = false;
            
                // Patrones de URL válidos de Google Forms
                $patterns = [
                    '/docs.google.com\/forms\/d\/e\/([a-zA-Z0-9_-]+)\/viewform/', // Formato largo
                    '/docs.google.com\/forms\/[d|u]\/([a-zA-Z0-9_-]+)\/viewform/' // Formato corto
                ];
            
                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $formsURL, $matches)) {
                        $formID = $matches[1];
                        break;
                    }
                }
            
                return $formID;
            }

            if(estaVacio($Nombre)||!isset($Nombre)){
                array_push($errores,'Debes ingresar el Titulo del Recurso.');
            }if(estaVacio($Descripcion)||!isset($Descripcion)){
                array_push($errores,'Debes ingresar una Descripcion.');
            }if(estaVacio($Recurso)||!isset($Recurso)){
                array_push($errores,'Debes ingresar el link del recurso');
            }elseif(isset($Recurso)){
                $formsURL = $Recurso;
                $embedCode = generateGoogleFormsEmbed($formsURL);

                if ($embedCode) {
                    $Test['Recurso']=$embedCode;
                } else {
                    array_push($errores,'URLde Google Forms no válida. Por favor, ingrese una URL válida');
                }

            }

            if(count($errores)==0){
              

                $this->model->insertTest($Test);
                header('location:'.PATH.'/Test/Administracion');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['test']=$Test;
                $this->render("new.php",$viewBag);
            }
        }
    }

    public function edit($id){
        $viewBag=array();
        $Test=$this->model->get($id);
        $viewBag['test']=$Test[0];
        $this->render("edit.php",$viewBag);
    }


}
