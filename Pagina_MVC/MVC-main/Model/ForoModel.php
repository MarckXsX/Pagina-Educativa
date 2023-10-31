<?php
require_once 'Model.php';
class ForoModel extends Model{

   
    public function get($id=''){ //Funcional
        if($id==''){
            $query="SELECT * FROM foros";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT * FROM foros WHERE ID_FORO=:ID_FORO";
            return $this->getQuery($query,['ID_FORO'=>$id]);
        }      
    }

    public function getComentarios($id=''){
        if($id !=''){
            $query="SELECT U.Nombres, U.Correo, FU.Comentario, FU.ID, FU.id_foro, FU.id_usuario FROM foros_usuarios FU INNER JOIN foros F ON FU.id_foro = F.ID_FORO 
            INNER JOIN usuarios U ON FU.id_usuario= U.ID_Usuario 
            WHERE F.ID_FORO = :ID_FORO
            ORDER BY  FU.ID ASC";
            return $this->getQuery($query,['ID_FORO'=>$id]);
        }
    }

    public function insertcomentario($foro=array()){
        $query="INSERT INTO foros_usuarios VALUES (:ID,:id_foro,:id_usuario,:Comentario)";
        return $this->setQuery($query,$foro);
    }

    public function insertForo($foro=array()){
        $query="INSERT INTO foros VALUES (:ID_FORO,:Titulo,:Descripcion)";
        return $this->setQuery($query,$foro);
    }

    public function updateForo($foro=array()){
        $query="UPDATE foros SET Titulo=:Titulo, Descripcion=:Descripcion  WHERE ID_FORO=:ID_FORO";
        return $this->setQuery($query,$foro);

    }

    public function removeForo($id){
        $query="DELETE FROM foros WHERE ID_FORO=:ID_FORO";
        return $this->setQuery($query,['ID_FORO'=>$id]);
    }


}