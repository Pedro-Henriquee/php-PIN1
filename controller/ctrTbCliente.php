<?php

    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbCliente.php');

    $objTbCliente = new TbCliente();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'incluir') {

    $objTbCliente = new TbCliente();

    if($_GET['idCliente'] != '') {
        $objTbCliente = $objTbCliente->loadById($_GET['idCliente']);
    }
    else {
        echo "Não foi possivel incluir um cliente!";
    }

    //abrir tela de cadastro
    //require_once(tela)
}

if(isset($_GET['action']) && $_GET['action'] == 'gravar') {

    $objTbCliente = new TbCliente();
    $objTbCliente->set("idcliente", $_POST['idCliente']);
    $objTbCliente->set("dstelefone_responsavel", $_POST['dsTelefoneResponsavel']);
    $objTbCliente->set("dsnome_institucional", $_POST['dsNomeInstitucional']);
    $objTbCliente->set("dsemail_institucional", $_POST['dsEmailInstitucional']);
    $objTbCliente->set("dscnpj_institucional", $_POST['dsCnpjInstitucional']);
    $objTbCliente->set("dsendereco", $_POST['dsEndereco']);
    $objTbCliente->set("dsnome_responsavel", $_POST['dsNomeResponsavel']);
    $objTbCliente->set("dsemail_responsavel", $_POST['dsNomeResponsavel']);
    $objTbCliente->set("dscpf_responsavel", $_POST['dsCpfResponsavel']);

    if($objTbCliente->get("idcliente") != "") {
        $objTbCliente->update($objTbCliente);
    }
    else {
        $objTbCliente->insert($objTbCliente);
    }

    echo "Não foi possivel gravar um cliente!";

}

if(isset($_GET['action']) && $_GET['action'] == 'deletar') {

    $objTbCliente = new TbCliente();

    if($_GET['idCliente'] != "") {
        $objTbCliente->delete($_GET['idCliente']);
    }
    else {
        echo "Não foi possível deletar um cliente!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarTodos') {

    $objTbCliente = new TbCliente();
    $aroTbCliente = $objTbCliente->listAll();

    if(count($aroTbCliente) > 0 && is_array($aroTbCliente)) {
        echo json_encode($aroTbCliente);
    }
    else {
        echo "Não foi possível listar os clientes!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarUm') {

    $objTbCliente = new TbCliente();

    if($_GET['idCliente'] != "") {
        $objTbCliente = $objTbCliente->loadById($_GET['idCliente']);
    }
    else {
        echo "Não foi possível listar um cliente!";
    }
}

?>