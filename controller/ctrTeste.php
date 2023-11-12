<?php

    require_once('../config/databaseConfig.php');
    require_once('../lib/libUtils.php');
    require_once('../model/mdlTbRelatorio.php');

    $objTbRelatorio = new TbRelatorio();
    $objDtbServer = new DtbServer();
    $fmt = new Format();

if(isset($_GET['action']) && $_GET['action'] == 'listAll') {

    $objDtbServer->connectServer();

    echo "Conectado!";

    $objTbRelatorio->set("dtgeracao", '2023-10-11');
    $objTbRelatorio->set("hrgeracao", '23:00:00');
    $objTbRelatorio->set("dtcomparativaorigem", '2023-10-11');
    $objTbRelatorio->set("dtcomparativadestino", '2023-10-11');

    $result = $objTbRelatorio->listAll();

    print_r($result);

}
?>