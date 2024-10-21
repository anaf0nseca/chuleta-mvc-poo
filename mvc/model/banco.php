<?php

require_once('../init.php');

class Banco {

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }



    // PRODUTO

    public function setProduto($tipo_id, $descricao, $resumo, $valor, $imagem, $destaque){
        $stmt = $this->mysqli->prepare("INSERT INTO produtos(`login`, `senha`, `nivel`) values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $tipo_id, $descricao, $resumo, $valor, $imagem, $destaque);
        if($stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getProduto(){
        $result = $this->mysqli->query("SELECT * from produtos");

        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }

    public function getDestaques(){
        $result = $this->mysqli->query("select * from vw_produtos where destaque = 'Sim'");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;

        }

        return $array;

    }

    public function pesquisaProduto($id){
        $result = $this->mysqli->query("SELECT * FROM produtos WHERE 'descricao' ='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    public function updateProduto($tipo_id, $descricao, $resumo, $valor, $imagem, $destaque){
        $stmt = $this->mysqli->prepare("UPDATE `produtos` SET `tipo_id` = ?, `descricao` = ?, `resumo`= ?, `valor` = ?, `imagem`= ?, `destaque`= ? WHERE `id` = ?");
        $stmt->bind_param("ssssss", $tipo_id, $descricao, $resumo, $valor, $imagem, $destaque);
        if($stmt->execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function deleteProduto($id)
        {
            if($this->mysqli->query("DELETE FROM 'produtos' WHERE 'descricao' ='".$id."';")==TRUE)
            {
                return true;
            }
        }



    //TIPOS     
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

    //USUARIOS
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
