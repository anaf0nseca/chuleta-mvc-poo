<?php

require_once('banco.php');

class Produtos extends Banco {

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

    public function pesquisaProduto($id){
        $result = $this->mysqli->query("SELECT * FROM produtos WHERE 'descricao' ='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public function deleteProduto($id)
        {
            if($this->mysqli->query("DELETE FROM 'produtos' WHERE 'descricao' ='".$id."';")==TRUE)
            {
                return true;
            }
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

}
