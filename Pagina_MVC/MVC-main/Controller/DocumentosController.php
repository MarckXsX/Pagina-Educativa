<?php
require_once 'Controller.php';
require_once './Model/DocumentoModel.php';
// require_once './Core/validaciones.php';
//require_once './Model/CuponesModel.php';
// require_once './Model/EmpresaModel.php';

class DocumentosController extends Controller{

    private $model;

    function __construct(){
        $this->model=new DocumentoModel();  
    }


    public function index(){
        $viewBag['documentos']= $this->model->get();
        $this->render("index.php",$viewBag);
    }

    public function Administracion() {
        $viewBag['documentos']= $this->model->get();
        $this->render("Administracion.php",$viewBag);
    }

    public function create(){
       
        $this->render("new.php");
    }

    public function edit($id){
        $viewBag=array();
        $Documentos=$this->model->get($id);
        $viewBag['documento']=$Documentos[0];
        $this->render("edit.php",$viewBag);
    }

    public function Vista($id){
        $viewBag=array();
        $Documentos=$this->model->get($id);
        $viewBag['documento']=$Documentos[0];
        $this->render("VistaDoc.php",$viewBag);
    }

    public function update($id){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $Documento=array();
            $viewBag=array();

            

            $Documento['ID']=$ID;
            $Documento['Nombre']=$Nombre;
            $Documento['Descripcion']=$Descripcion;
            $Documento['Recurso']=$Recurso;
            $Documento['Tipo']=$Tipo;

            function generateYouTubeEmbed($video) {
                // Extraer el ID del video de YouTube a partir del enlace proporcionado
                $videoID = getYouTubeVideoID($video);         
                if ($videoID !== false) {
                    // Generar el código HTML para incrustar el video de YouTube
                    $link = "https://www.youtube.com/embed/".$videoID."";
            
                    return $link;
                }
                return false;
            }
            
            function getYouTubeVideoID($youtubeURL) {
                $videoID = false;            
                // Patrones de URL válidos de YouTube
                $patterns = [
                    '/youtu.be\/([a-zA-Z0-9_-]+)/', // Formato corto
                    '/youtube.com.*[?&]v=([a-zA-Z0-9_-]+)/', // Formato largo
                    '/youtube.com\/embed\/([a-zA-Z0-9_-]+)/' // Formato de inserción
                ];            
                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $youtubeURL, $matches)) {
                        $videoID = $matches[1];
                        break;
                    }
                }    
                return $videoID;
            }

            function generateDriveEmbed($driveURL) {
                // Verificar si el enlace es válido
                if (filter_var($driveURL, FILTER_VALIDATE_URL)) {
                    $documentID = getDriveDocumentID($driveURL);
                    
                    if ($documentID !== false) {
                        // Generar el código HTML para incrustar el documento de Google Drive
                        $link = "https://drive.google.com/file/d/". $documentID . "/preview";
                        
                        return $link;
                    }
                }
                
                return false;
            }
            
            function getDriveDocumentID($driveURL) {
                $fileID = false;
                // Patrones de URL válidos de Google Drive
                $patterns = [
                    '/drive.google.com\/file\/d\/([a-zA-Z0-9_-]+)\//', // Formato largo
                    '/drive.google.com\/open\?id=([a-zA-Z0-9_-]+)/', // Formato corto
                ];      
                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $driveURL, $matches)) {
                        $fileID = $matches[1];
                        break;
                    }
                }
                return $fileID;
            }

            if(estaVacio($Nombre)||!isset($Nombre)){
                array_push($errores,'Debes ingresar el Titulo del Recurso.');
            }if(estaVacio($Descripcion)||!isset($Descripcion)){
                array_push($errores,'Debes ingresar una Descripcion.');
            }if(estaVacio($Recurso)||!isset($Recurso)){
                array_push($errores,'Debes ingresar el link del recurso');
            }elseif ($Tipo == 'Video') {
                if(isset($Recurso)){
                    $youtubeURL = $Recurso;
                    $embedCode = generateYouTubeEmbed($youtubeURL);
                
                    if ($embedCode) {
                        $Documento['Recurso']=$embedCode;
                    } else {
                        array_push($errores,'URL de YouTube no válida. Por favor, ingrese una URL válida');
                    }
                }
            }else{
                $driveURL = $Recurso;
                $embedCode = generateDriveEmbed($driveURL);
                
                if ($embedCode) {
                    $Documento['Recurso']=$embedCode;
                } else {
                    array_push($errores,'URL de Google Drive no válida. Por favor, ingrese una URL válida');
                }
            }
            if(estaVacio($Tipo)||!isset($Tipo)){
                array_push($errores,'Debes ingresar el tipo de recurso');
            }

            
            if(count($errores)==0){
              

                $this->model->updateDocumento($Documento);
                header('location:'.PATH.'/Documentos/Administracion');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['documento']=$Documento;
                $this->render("edit.php",$viewBag);
            }
            
        }
    }

    public function remove($id){
        $this->model->removeDocumento($id);
        header('location:'.PATH.'/Documentos/Administracion');
    }

    public function add(){ 
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $Documento=array();
            $viewBag=array();

            

            $Documento['ID']='';
            $Documento['Nombre']=$Nombre;
            $Documento['Descripcion']=$Descripcion;
            $Documento['Recurso']=$Recurso;
            $Documento['Tipo']=$Tipo;

            function generateYouTubeEmbed($video) {
                // Extraer el ID del video de YouTube a partir del enlace proporcionado
                $videoID = getYouTubeVideoID($video);         
                if ($videoID !== false) {
                    // Generar el código HTML para incrustar el video de YouTube
                    $link = "https://www.youtube.com/embed/".$videoID."";
            
                    return $link;
                }
                return false;
            }
            
            function getYouTubeVideoID($youtubeURL) {
                $videoID = false;            
                // Patrones de URL válidos de YouTube
                $patterns = [
                    '/youtu.be\/([a-zA-Z0-9_-]+)/', // Formato corto
                    '/youtube.com.*[?&]v=([a-zA-Z0-9_-]+)/', // Formato largo
                    '/youtube.com\/embed\/([a-zA-Z0-9_-]+)/' // Formato de inserción
                ];            
                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $youtubeURL, $matches)) {
                        $videoID = $matches[1];
                        break;
                    }
                }    
                return $videoID;
            }

            function generateDriveEmbed($driveURL) {
                // Verificar si el enlace es válido
                if (filter_var($driveURL, FILTER_VALIDATE_URL)) {
                    $documentID = getDriveDocumentID($driveURL);
                    
                    if ($documentID !== false) {
                        // Generar el código HTML para incrustar el documento de Google Drive
                        $link = "https://drive.google.com/file/d/". $documentID . "/preview";
                        
                        return $link;
                    }
                }
                
                return false;
            }
            
            function getDriveDocumentID($driveURL) {
                $fileID = false;
                // Patrones de URL válidos de Google Drive
                $patterns = [
                    '/drive.google.com\/file\/d\/([a-zA-Z0-9_-]+)\//', // Formato largo
                    '/drive.google.com\/open\?id=([a-zA-Z0-9_-]+)/', // Formato corto
                ];      
                foreach ($patterns as $pattern) {
                    if (preg_match($pattern, $driveURL, $matches)) {
                        $fileID = $matches[1];
                        break;
                    }
                }
                return $fileID;
            }

            if(estaVacio($Nombre)||!isset($Nombre)){
                array_push($errores,'Debes ingresar el Titulo del Recurso.');
            }if(estaVacio($Descripcion)||!isset($Descripcion)){
                array_push($errores,'Debes ingresar una Descripcion.');
            }if(estaVacio($Recurso)||!isset($Recurso)){
                array_push($errores,'Debes ingresar el link del recurso');
            }elseif ($Tipo == 'Video') {
                if(isset($Recurso)){
                    $youtubeURL = $Recurso;
                    $embedCode = generateYouTubeEmbed($youtubeURL);
                
                    if ($embedCode) {
                        $Documento['Recurso']=$embedCode;
                    } else {
                        array_push($errores,'URL de YouTube no válida. Por favor, ingrese una URL válida');
                    }
                }
            }else{
                $driveURL = $Recurso;
                $embedCode = generateDriveEmbed($driveURL);
                
                if ($embedCode) {
                    $Documento['Recurso']=$embedCode;
                } else {
                    array_push($errores,'URL de Google Drive no válida. Por favor, ingrese una URL válida');
                }
            }
            if(estaVacio($Tipo)||!isset($Tipo)){
                array_push($errores,'Debes ingresar el tipo de recurso');
            }

            
            if(count($errores)==0){
              

                $this->model->insertDocumento($Documento);
                header('location:'.PATH.'/Documentos/Administracion');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['documento']=$Documento;
                $this->render("new.php",$viewBag);
            }
            
        }
    }



}