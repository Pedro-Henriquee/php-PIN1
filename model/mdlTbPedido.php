<?php
class TbPedido {

    private $idpedido;
    private $idproduto;
    private $idusuario;
    private $idcliente;
    private $qntd_produto;
    private $flstatus;
    private $vlpreco;
    private $dtcriacao;
    private $dtmoovimentacao;
    private $dsobservacao;

    public function set($prp, $value) {
        $this->$prp = $value;
    }

    public function get($prp) {
        return $this->$prp;
    }

    public function loadObject($row) {
        $objTbPedido = new TbPedido();

        $objTbPedido->set("idpedido", $row["idpedido"]);
        $objTbPedido->set("idproduto", $row["idproduto"]);
        $objTbPedido->set("idusuario", $row["idusuario"]);
        $objTbPedido->set("idcliente", $row["idcliente"]);
        $objTbPedido->set("qntd_produto", $row["qntd_produto"]);
        $objTbPedido->set("flstatus", $row["flstatus"]);
        $objTbPedido->set("vlpreco", $row["vlpreco"]);
        $objTbPedido->set("dtcriacao", $row["dtcriacao"]);
        $objTbPedido->set("dtmovimentacao", $row["dtmovimentacao"]);
        $objTbPedido->set("dsobservacao", $row["dsobservacao"]);

        return $objTbPedido;
    }

    public function insert($objTbPedido) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "INSERT INTO
                        shsistema.tbpedido
                        (
                            idproduto,
                            idusuario,
                            idcliente,
                            qntd_produto,
                            flstatus,
                            vlpreco,
                            dtcriacao,
                            dtmovimentacao,
                            dsobservacao
                        )
                    VALUES
                        (
                            ".$objTbPedido->get("idproduto").",
                            ".$objTbPedido->get("idusuario").",
                            ".$objTbPedido->get("idcliente").",
                            ".$objTbPedido->get("qntd_produto").",
                            '".$objTbPedido->get("flstatus")."',
                            ".$objTbPedido->get("vlpreco").",
                            '".$objTbPedido->get("dtcriacao")."',
                            '".$objTbPedido->get("dtmovimentacao")."',
                            '".$objTbPedido->get("dsobservacao")."'
                        )";

        $result = $objDtbServer->runQuery($strQuery);

        $objDtbServer->desconectServer();

        return $result;
    }

    public function update($objTbPedido) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "UPDATE
                        shsistema.tbpedido
                    SET
                        idproduto = ".$objTbPedido->get("idproduto").",
                        idusuario = ".$objTbPedido->get("idusuario").",
                        idcliente = ".$objTbPedido->get("idcliente").",
                        qntd_produto = '".$objTbPedido->get("qntd_produto")."',
                        flstatus = '".$objTbPedido->get("flstatus")."',
                        vlpreco = ".$objTbPedido->get("vlpreco").",
                        dtcriacao = '".$objTbPedido->get("dtcriacao")."',
                        dtmovimentacao = '".$objTbPedido->get("dtmovimentacao")."',
                        dsobservacao = '".$objTbPedido->get("dsobservacao")."',
                    WHERE
                        idpedido = ".$objTbPedido->get("idpedido")."";

        $result = $objDtbServer->runQuery($strQuery);

        $objDtbServer->desconectServer();

        return $result;
    }

    public function delete($idPedido) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "DELETE FROM
                        shsistema.tbpedido
                    WHERE
                        idpedido = ".$idPedido;

        $result = $objDtbServer->runQuery($strQuery);

        $objDtbServer->desconectServer();

        return $result;
    }

    public function listAll() {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbpedido";

        $result = $objDtbServer->runQuery($strQuery);
        $arrResult = [];

        while($row = pg_fetch_assoc($result)) {
            $arrResult = $this->loadObject($row);
        }

        return $arrResult;
    }

    public function loadById($idPedido) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbpedido
                    WHERE
                        idpedido = ". $idPedido;

        $result = $objDtbServer->runQuery($strQuery);
        $arrResult = [];

        while($row = pg_fetch_assoc($result)) {
            $arrResult = $this->loadObject($row);
        }

        $objDtbServer->desconectServer();

        return $arrResult;
    }
}
?>
