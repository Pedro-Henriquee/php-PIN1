<?php

    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbEntrega.php');

    $objTbEntrega = new TbEntrega();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'incluir') {

    $objTbEntrega = new TbEntrega();

    if($_GET['idEntrega'] != '') {
        $objTbEntrega = $objTbEntrega->loadById($_GET['idEntrega']);
    }
    else {
        echo "Não foi possivel incluir uma entrega!";
    }

    //abrir tela de cadastro
    //require_once(tela)
}

if(isset($_GET['action']) && $_GET['action'] == 'gravar') {

    $objTbEntrega = new TbEntrega();
    $objTbEntrega->set("identrega", $_POST['idEntrega']);
    $objTbEntrega->set("flstatus", $_POST['flStatus']);
    $objTbEntrega->set("dshistorico", $_POST['dsHistorico']);
    $objTbEntrega->set("dtprevisao", $_POST['dtPrevisao']);

    if($objTbEntrega->get("identrega") != "") {
        $objTbEntrega->update($objTbEntrega);
    }
    else {
        $objTbEntrega->insert($objTbEntrega);
    }

    echo "Não foi possivel gravar uma entrega!";

}

if(isset($_GET['action']) && $_GET['action'] == 'deletar') {

    $objTbEntrega = new TbEntrega();

    if($_GET['idEntrega'] != "") {
        $objTbEntrega->delete($_GET['idEntrega']);
    }
    else {
        echo "Não foi possível deletar uma entrega!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarTodos') {

    $objTbEntrega = new TbEntrega();
    $aroTbEntrega = $objTbEntrega->listAll();

    if(count($aroTbEntrega) > 0 && is_array($aroTbEntrega)) {
        echo json_encode($aroTbEntrega);
    }
    else {
        echo "Não foi possível listar as entregas!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarUm') {

    $objTbEntrega = new TbEntrega();

    if($_GET['idEntrega'] != "") {
        $objTbEntrega = $objTbEntrega->loadById($_GET['idEntrega']);
    }
    else {
        echo "Não foi possível listar uma entrega!";
    }
}

?>