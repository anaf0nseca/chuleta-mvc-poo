<?php
require_once('../../model/produtos/ModelProdutos.php');

class produtoListar {
    private $lista;

    public function __construct(){
        $this->lista = new Produtos();
        $this->
    }
    
    public function __construct(){
        $this->lista-> new Destaq
    }

    private function criarDestaques(){
        $dados = $this->lista->getDestaques(),
        foreach ($dados as $dado){

        }
    }




}


<?php
    include 'conn/connect.php';
    $lista = $conn -> query ("select * from vw_produtos where destaque = 'Sim'");
    $row_produtos = $lista -> fetch_assoc();
    $num_linhas = $lista -> num_rows;
?>

<!-- Mostrar se a consulta retornar vazio -->
<?php
    if($num_linhas == 0)
    {
?>
        <h2 class="breadcrumb alert-danger">
            Não há produtos em destaque! :(
        </h2>
<?php
    }
?>


<!-- mostrar se a consulta retornou produtos -->
<?php
    if($num_linhas > 0)
    {
?>
    <h2 class="breadcrumb alert-danger">
       Destaques
    </h2>
