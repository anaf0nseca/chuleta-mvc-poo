<?php

require_once('banco.php');

class Tipos extends Banco {

    public function setTipo($sigla, $rotulo){
        $stmt = $this->mysqli->prepare("INSERT INTO tipos(`sigla`, `rotulo`) values(?,?)");
        $stmt->bind_param("sss", $sigla, $rotulo);
        if($stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getTipo(){
        $result = $this->mysqli->query("SELECT * from tipos");

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }

    public function pesquisaTipo($id){
        $result = $this->mysqli->query("SELECT * FROM tipos WHERE 'rotulo' ='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function deleteTipo($id)
        {
            if($this->mysqli->query("DELETE FROM 'tipos' WHERE 'rotulo' ='".$id."';")==TRUE)
            {
                return true;
            }
        }

 
    
    public function updateTipo($sigla, $rotulo){
        $stmt = $this->mysqli->prepare("UPDATE `tipos` SET `sigla` = ?, `rotulo`= ? WHERE `rotulo` = ?");
        $stmt->bind_param("ss", $sigla, $rotulo);
        if($stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

}
