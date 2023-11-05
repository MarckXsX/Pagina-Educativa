<?php
require_once 'Model.php';
class TestModel extends Model{

   
    public function get($id=''){ //Funcional
        if($id==''){
            $query="SELECT * FROM tests";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT * FROM tests WHERE ID=:ID";
            return $this->getQuery($query,['ID'=>$id]);
        }      
    }

    public function insertTest($test=array()){
        $query="INSERT INTO tests VALUES (:ID,:Nombre,:Descripcion,:Recurso)";
        return $this->setQuery($query,$test);
    }

    public function updateTest($test=array()){
        $query="UPDATE tests SET Nombre=:Nombre, Descripcion=:Descripcion, Recurso=:Recurso WHERE ID=:ID";
        return $this->setQuery($query,$test);

    }

    public function removeTest($id){
        $query="DELETE FROM tests WHERE ID=:ID";
        return $this->setQuery($query,['ID'=>$id]);
    }


}