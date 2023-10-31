<?php
require_once 'Model.php';
class DocumentoModel extends Model{

   
    public function get($id=''){ //Funcional
        if($id==''){
            $query="SELECT * FROM documentos";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT * FROM documentos WHERE ID=:ID";
            return $this->getQuery($query,['ID'=>$id]);
        }      
    }

    public function insertDocumento($documento=array()){
        $query="INSERT INTO documentos VALUES (:ID,:Nombre,:Descripcion,:Recurso,:Tipo)";
        return $this->setQuery($query,$documento);
    }

    public function updateDocumento($documento=array()){
        $query="UPDATE documentos SET Nombre=:Nombre, Descripcion=:Descripcion, Recurso=:Recurso, Tipo=:Tipo   WHERE ID=:ID";
        return $this->setQuery($query,$documento);

    }

    public function removeDocumento($id){
        $query="DELETE FROM documentos WHERE ID=:ID";
        return $this->setQuery($query,['ID'=>$id]);
    }


}