<?php

    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbProduto.php');

    $objTbProduto = new TbProduto();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'incluir') {

    $objTbProduto = new TbProduto();

    if($_GET['idProduto'] != '') {
        $objTbProduto = $objTbProduto->loadById($_GET['idProduto']);
    }
    else {
        echo "Não foi possivel incluir um produto!";
    }

    //abrir tela de cadastro
    //require_once(tela)
}

if(isset($_GET['action']) && $_GET['action'] == 'gravar') {

    $objTbProduto = new TbProduto();
    $objTbProduto->set("idproduto", $_POST['idProduto']);
    $objTbProduto->set("dsnome", $_POST['dsNome']);
    $objTbProduto->set("dsfabricante", $_POST['dsFabricante']);
    $objTbProduto->set("dsdescricao", $_POST['dsDescricao']);
    $objTbProduto->set("dtvalidade", $_POST['dtValidade']);
    $objTbProduto->set("vlpeso", $_POST['vlPeso']);
    $objTbProduto->set("qtd_produto", $_POST['qtdProduto']);
    $objTbProduto->set("vlpreco", $_POST['vlPreco']);

    if($objTbProduto->get("idproduto") != "") {
        $objTbProduto->update($objTbProduto);
    }
    else {
        $objTbProduto->insert($objTbProduto);
    }

    echo "Não foi possivel gravar um produto!";

}

if(isset($_GET['action']) && $_GET['action'] == 'deletar') {

    $objTbProduto = new TbProduto();

    if($_GET['idProduto'] != "") {
        $objTbProduto->delete($_GET['idProduto']);
    }
    else {
        echo "Não foi possível deletar um produto!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarTodos') {

    $objTbProduto = new TbProduto();
    $aroTbProduto = $objTbProduto->listAll();

    if(count($aroTbProduto) > 0 && is_array($aroTbProduto)) {
        echo json_encode($aroTbProduto);
    }
    else {
        echo "Não foi possível listar os produtos!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarUm') {

    $objTbProduto = new TbProduto();

    if($_GET['idProduto'] != "") {
        $objTbProduto = $objTbProduto->loadById($_GET['idProduto']);
    }
    else {
        echo "Não foi possível listar um produto!";
    }
}

?>