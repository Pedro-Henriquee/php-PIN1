<?php
    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbUsuario.php');

    $objTbUsuario = new TbUsuario();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'incluir') {

    $objTbUsuario = new TbUsuario();

    if($_GET['idUsuario'] != '') {
        $objTbUsuario = $objTbUsuario->loadById($_GET['idUsuario']);
    }
    else {
        echo "Não foi possivel incluir um usuário!";
    }

    //abrir tela de cadastro
    //require_once(tela)
}

if(isset($_GET['action']) && $_GET['action'] == 'gravar') {

    $objTbUsuario = new TbUsuario();
    $objTbUsuario->set("idusuario", $_POST['idUsuario']);
    $objTbUsuario->set("dsnome", $_POST['dsNome']);
    $objTbUsuario->set("dscpf", $_POST['dsCpf']);
    $objTbUsuario->set("dslogin", $_POST['dsLogin']);
    $objTbUsuario->set("dssenha", $_POST['dsSenha']);

    if($objTbUsuario->get("idusuario") != "") {
        $objTbUsuario->update($objTbUsuario);
    }
    else {
        $objTbUsuario->insert($objTbUsuario);
    }

    echo "Não foi possivel gravar um usuário!";

}

if(isset($_GET['action']) && $_GET['action'] == 'deletar') {

    $objTbUsuario = new TbUsuario();

    if($_GET['idUsuario'] != "") {
        $objTbUsuario->delete($_GET['idUsuario']);
    }
    else {
        echo "Não foi possível deletar um usuário!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarTodos') {

    $objTbUsuario = new TbUsuario();
    $aroTbUsuario = $objTbUsuario->listAll();

    if(count($aroTbUsuario) > 0 && is_array($aroTbUsuario)) {
        echo json_encode($aroTbUsuario);
    }
    else {
        echo "Não foi possível listar os usuários!";
    }

}

if(isset($_GET['action']) && $_GET['action'] == 'listarUm') {

    $objTbUsuario = new TbUsuario();

    if($_GET['idUsuario'] != "") {
        $objTbUsuario = $objTbUsuario->loadById($_GET['idUsuario']);
    }
    else {
        echo "Não foi possível listar um usuário!";
    }
}

?>