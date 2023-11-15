<?php

    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbPedido.php');

    $objTbPedido = new TbPedido();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'incluir') {

    $objTbPedido = new TbPedido();

    if($_GET['idPedido'] != '') {
        $objTbPedido = $objTbPedido->loadById($_GET['idPedido']);
    }
    else {
        echo "Não foi possivel incluir um Pedido!";
    }

    //abrir tela de cadastro
    //require_once(tela)
}

if(isset($_GET['action']) && $_GET['action'] == 'gravar') {

    $objTbPedido = new TbPedido();
    $objTbPedido->set("idpedido", $_POST['idPedido']);
    $objTbPedido->set("idproduto", $_POST['idProduto']);
    $objTbPedido->set("idusuario", $_POST['idUsuario']);
    $objTbPedido->set("idcliente", $_POST['idCliente']);
    $objTbPedido->set("qntd_produto", $_POST['qntdProduto']);
    $objTbPedido->set("flstatus", $_POST['flStatus']);
    $objTbPedido->set("vlpreco", $_POST['vlPreco']);
    $objTbPedido->set("dtcriacao", $_POST['dtCriacao']);
    $objTbPedido->set("dtmovimentacao", $_POST['dtMovimentacao']);
    $objTbPedido->set("dsobservacao", $_POST['dsObservacao']);

    if($objTbPedido->get("idpedido") != "") {
        $objTbPedido->update($objTbPedido);
    }
    else {
        $objTbPedido->insert($objTbPedido);
    }

    echo "Não foi possivel gravar um pedido!";

}

if(isset($_GET['action']) && $_GET['action'] == 'deletar') {

    $objTbPedido = new TbPedido();

    if($_GET['idPedido'] != "") {
        $objTbPedido->delete($_GET['idPedido']);
    }
    else {
        echo "Não foi possível deletar um pedido!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarTodos') {

    $objTbPedido = new TbPedido();
    $aroTbPedido = $objTbPedido->listAll();

    if(count($aroTbPedido) > 0 && is_array($aroTbPedido)) {
        echo json_encode($aroTbPedido);
    }
    else {
        echo "Não foi possível listar os pedidos!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarUm') {

    $objTbPedido = new TbPedido();

    if($_GET['idPedido'] != "") {
        $objTbPedido = $objTbPedido->loadById($_GET['idPedido']);
    }
    else {
        echo "Não foi possível listar um pedido!";
    }
}

?>