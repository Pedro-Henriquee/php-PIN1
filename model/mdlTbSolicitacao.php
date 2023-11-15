<?php
class TbSolicitacao {
    private $idsolicitacao;
    private $dsalteracao;
    private $flstatus;
    private $dtcriacao;
    private $dtmovimentacao;
    private $dsobservacao;
    private $idpedido;

    public function set($prp, $value) {
        $this->$prp = $value;
    }

    public function get($prp) {
        return $this->$prp;
    }

    public function loadObject($row) {
        $objTbSolicitacao = new TbSolicitacao();
        $objTbSolicitacao->set("idsolicitacao", $row["idsolicitacao"]);
        $objTbSolicitacao->set("dsalteracao", $row["dsalteracao"]);
        $objTbSolicitacao->set("flstatus", $row["flstatus"]);
        $objTbSolicitacao->set("dtcriacao", $row["dtcriacao"]);
        $objTbSolicitacao->set("dtmovimentacao", $row["dtmovimentacao"]);
        $objTbSolicitacao->set("dsobservacao", $row["dsobservacao"]);
        $objTbSolicitacao->set("idpedido", $row["idpedido"]);

        return $objTbSolicitacao;
    }

    public function insert($objTbSolicitacao) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "INSERT INTO
                        shsistema.tbsolicitacao
                        (
                            dsalteracao,
                            flstatus,
                            dtcriacao,
                            dtmovimentacao,
                            dsobservacao,
                            idpedido
                        )
                    VALUES
                        (
                            '".$objTbSolicitacao->get("dsalteracao")."',
                            '".$objTbSolicitacao->get("flstatus")."',
                            '".$objTbSolicitacao->get("dtcriacao")."',
                            '".$objTbSolicitacao->get("dtmovimentacao")."',
                            ".$objTbSolicitacao->get("dsobservacao").",
                            ".$objTbSolicitacao->get("idpedido")."
                        )";

        $result = $objDtbServer->runQuery($strQuery);

        $objDtbServer->desconectServer();

        return $result;
    }

    public function update($objTbSolicitacao) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "UPDATE
                        shsistema.tbsolicitacao
                    SET
                        dsalteracao = '".$objTbSolicitacao->get("dsalteracao")."',
                        flstatus = '".$objTbSolicitacao->get("flstatus")."',
                        dtcriacao = '".$objTbSolicitacao->get("dtcriacao")."',
                        dtmovimentacao = '".$objTbSolicitacao->get("dtmovimentacao")."',
                        dsobservacao = ".$objTbSolicitacao->get("dsobservacao").",
                        idpedido = ".$objTbSolicitacao->get("idpedido")."
                    WHERE
                        idsolicitacao = ".$objTbSolicitacao->get("idsolicitacao")."";

        $result = $objDtbServer->runQuery($strQuery);

        $objDtbServer->desconectServer();

        return $result;
    }


    public function delete($idSolicitacao) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "DELETE FROM
                        shsistema.tbsolicitacao
                    WHERE
                        idsolicitacao = ".$idSolicitacao;

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
                        shsistema.tbsolicitacao";

        $result = $objDtbServer->runQuery($strQuery);
        $arrResult = [];

        while($row = pg_fetch_array($result)) {
            $arrResult = $this->loadObject($row);
        }

        $objDtbServer->desconectServer();

        return $arrResult;
    }

    public function loadById($idSolicitacao) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbsolicitacao
                    WHERE
                        idsolicitacao = ". $idSolicitacao;

        $result = $objDtbServer->runQuery($strQuery);
        $arrResult = [];

        while($row = pg_fetch_array($result)) {
            $arrResult = $this->loadObject($row);
        }

        $objDtbServer->desconectServer();

        return $arrResult;
    }
}
?>