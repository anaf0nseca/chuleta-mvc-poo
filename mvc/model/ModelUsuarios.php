<?php

require_once('banco.php');

class Usuarios extends Banco {

    public function setUsuario($login, $senha, $nivel){
        $stmt = $this->mysqli->prepare("INSERT INTO usuarios(`login`, `senha`, `nivel`) values(?,?,?)");
        $stmt->bind_param("sss", $login, $senha, $nivel);
        if($stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getUsuario(){
        $result = $this->mysqli->query("SELECT * from usuarios");

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }

    public function pesquisaUsuario($id){
        $result = $this->mysqli->query("SELECT * FROM usuarios WHERE 'login' ='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function deleteUsuario($id)
        {
            if($this->mysqli->query("DELETE FROM 'usuarios' WHERE 'login' ='".$id."';")==TRUE)
            {
                return true;
            }
        }

 
    
    public function updateUsuario($login, $senha, $nivel, $preco, $flag, $data, $id){
        $stmt = $this->mysqli->prepare("UPDATE `usuarios` SET `login` = ?, `senha`= ?, `nivel` = ? WHERE `login` = ?");
        $stmt->bind_param("sss", $login, $senha, $nivel);
        if($stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

}
