<?php
require_once('../../model/produtos/ModelProdutos.php');

class produtoCadastro{
    private $cadastro;

    public function __construct(){
        $this->cadastro = new Produtos();
        $this->setProduto();
    }

    private function incluir(){
        $dados = $this->cadastro->setProduto();

    }
}