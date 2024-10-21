<?php

require_once('banco.php');

class Produtos extends Banco {

    //CADASTRO 
    private $tipo_id;
    private $descricao;
    private $resumo;
    private $valor;
    private $imagem;
    private $destaque;

    public function setTipoId($int){
        $this->tipo_id = $int;
    }

    public function setDescricao($string){
        $this->descricao = $string;
    }

    public function setResumo($string){
        $this->resumo = $string;
    }

    public function setValor($double){
        $this->valor = $double;
    }

    public function setImagem($string){
        $this->imagem = $string;
    }

    public function setDestaque($string){
        $this->destaque= $string;
    }


    public function getTipoId($int){
        return $this->tipo_id;
    }

    public function getDescricao($string){
        return $this->descricao;
    }

    public function getResumo($string){
        return $this->resumo;
    }

    public function getValor($double){
        return $this->valor;
    }

    public function getImagem($string){
        return $this->imagem;
    }

    public function getDestaque($string){
        return $this->destaque;
    }


    public function cadastrar(){
        return $this->setProduto($this->getTipoId(), $this->getDescricao(), $this->getResumo(), $this->getValor(), $this->getImagem(), $this->getDestaque());
    }



    //DESTAQUES
    


    
}

?>