<?php
    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbSolicitacao.php');

    $objTbSolicitacao = new TbSolicitacao();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'incluir') {

    $objTbSolicitacao = new TbSolicitacao();

    if($_GET['idSolicitacao'] != '') {
        $objTbSolicitacao = $objTbSolicitacao->loadById($_GET['idSolicitacao']);
    }
    else {
        echo "Não foi possivel incluir uma solicitação!";
    }

    //abrir tela de cadastro
    //require_once(tela)
}

if(isset($_GET['action']) && $_GET['action'] == 'gravar') {

    $objTbSolicitacao = new TbSolicitacao();
    $objTbSolicitacao->set("idsolicitacao", $_POST['idSolicitacao']);
    $objTbSolicitacao->set("idpedido", $_POST['idPedido']);
    $objTbSolicitacao->set("dsalteracao", $_POST['dsAlteracao']);
    $objTbSolicitacao->set("flstatus", $_POST['flStatus']);
    $objTbSolicitacao->set("dtcriacao", $_POST['dtCriacao']);
    $objTbSolicitacao->set("dtmovimentacao", $_POST['dtMovimentacao']);
    $objTbSolicitacao->set("dsobservacao", $_POST['dsObservacao']);

    if($objTbSolicitacao->get("idsolicitacao") != "") {
        $objTbSolicitacao->update($objTbSolicitacao);
    }
    else {
        $objTbSolicitacao->insert($objTbSolicitacao);
    }

    echo "Não foi possivel gravar uma solicitação!";

}

if(isset($_GET['action']) && $_GET['action'] == 'deletar') {

    $objTbSolicitacao = new TbSolicitacao();

    if($_GET['idSolicitacao'] != "") {
        $objTbSolicitacao->delete($_GET['idSolicitacao']);
    }
    else {
        echo "Não foi possível deletar uma solicitação!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarTodos') {

    $objTbSolicitacao = new TbSolicitacao();
    $aroTbSolicitacao = $objTbSolicitacao->listAll();

    if(count($aroTbSolicitacao) > 0 && is_array($aroTbSolicitacao)) {
        echo json_encode($aroTbSolicitacao);
    }
    else {
        echo "Não foi possível listar as solicitações!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarUm') {

    $objTbSolicitacao = new TbSolicitacao();

    if($_GET['idSolicitacao'] != "") {
        $objTbSolicitacao = $objTbSolicitacao->loadById($_GET['idSolicitacao']);
    }
    else {
        echo "Não foi possível listar um solicitação!";
    }
}

?>