<?php

    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbRelatorio.php');

    $objTbRelatorio = new TbRelatorio();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'incluir') {

    $objTbRelatorio = new TbRelatorio();

    if($_GET['idRelatorio'] != '') {
        $objTbRelatorio = $objTbRelatorio->loadById($_GET['idRelatorio']);
    }
    else {
        echo "Não foi possivel incluir um relatório!";
    }

    //abrir tela de cadastro
    //require_once(tela)
}

if(isset($_GET['action']) && $_GET['action'] == 'gravar') {

    $objTbRelatorio = new TbRelatorio();
    $objTbRelatorio->set("idrelatorio", $_POST['idRelatorio']);
    $objTbRelatorio->set("dtgeracao", $_POST['dtGeracao']);
    $objTbRelatorio->set("hrgeracao", $_POST['hrGeracao']);
    $objTbRelatorio->set("dtcomparativaorigem", $_POST['dtComparativaOrigem']);
    $objTbRelatorio->set("dtcomparativadestino", $_POST['dtComparativaDestino']);

    if($objTbRelatorio->get("idrelatorio") != "") {
        $objTbRelatorio->update($objTbRelatorio);
    }
    else {
        $objTbRelatorio->insert($objTbRelatorio);
    }

    echo "Não foi possivel gravar um relatório!";

}

if(isset($_GET['action']) && $_GET['action'] == 'deletar') {

    $objTbRelatorio = new TbRelatorio();

    if($_GET['idRelatorio'] != "") {
        $objTbRelatorio->delete($_GET['idRelatorio']);
    }
    else {
        echo "Não foi possível deletar um relatório!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarTodos') {

    $objTbRelatorio = new TbRelatorio();
    $aroTbRelatorio = $objTbRelatorio->listAll();

    if(count($aroTbRelatorio) > 0 && is_array($aroTbRelatorio)) {
        echo json_encode($aroTbRelatorio);
    }
    else {
        echo "Não foi possível listar os relatórios!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarUm') {

    $objTbRelatorio = new TbRelatorio();

    if($_GET['idRelatorio'] != "") {
        $objTbRelatorio = $objTbRelatorio->loadById($_GET['idRelatorio']);
    }
    else {
        echo "Não foi possível listar um relatório!";
    }
}

?>