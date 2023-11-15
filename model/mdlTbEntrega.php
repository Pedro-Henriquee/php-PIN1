<?php
class TbEntrega{
    private $identrega;
    private $flstatus;
    private $dshistorico;
    private $dtprevisao;
    public function set($prp, $value){
        $this ->$prp = $value;
    }
    public function get($prp){
        return $this->$prp;
    }
    public function loadObject($row){
        $objTbEntrega = new TbEntrega();
        $objTbEntrega->set("identrega", $row["identrega"]);
        $objTbEntrega->set("flstatus", $row["flstatus"]);
        $objTbEntrega->set("dshistorico", $row["dshistorico"]);
        $objTbEntrega->set("dtprevisao", $row["dtprevisao"]);

        return $objTbEntrega;
    }
    public function insert($objTbEntrega) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "INSERT INTO
                        shsistema.tbentrega
                        (
                            flstatus,
                            dshistorico,
                            dtprevisao
                        )
                    VALUES
                        (
                            '".$objTbEntrega->get("flstatus")."',
                            '".$objTbEntrega->get("dshistorico")."',
                            '".$objTbEntrega->get("dtprevisao")."
                        )";
        $result = $objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();

        return $result;
    }
    public function update($objTbEntrega) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "UPDATE
                        shsistema.tbentrega
                    SET
                        flstatus'".$objTbEntrega->get("flstatus")."',
                        dshistorico'".$objTbEntrega->get("dshistorico")."',
                        dtprevisao'".$objTbEntrega->get("dtprevisao")."'
                    WHERE
                        identrega = ".$objTbEntrega->get("identrega")."";
        $result = $objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();

        return $result;
    }
    public function delete($idEntrega) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "DELETE FROM
                        shsistema.tbentrega
                    WHERE
                        identrega = ".$idEntrega;
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
                        shsistema.tbentrega";
        $result= $objDtbServer->runQuery($strQuery);
        $arrResult = [];

        while($row = pg_fetch_array($result)) {
            $arrResult = $this->loadObject($row);
        }

        $objDtbServer->desconectServer();
        return $arrResult;
    }
    public function loadById($idEntrega){
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbentrega
                    WHERE
                        identrega = ".$idEntrega;

        $result = $objDtbServer->runQuery($strQuery);

        $arrResult=[];

        while($row = pg_fetch_array($result)) {
            $arrResult = $this->loadObject($row);
        }

        $objDtbServer->desconectServer();
        return $arrResult;
    }
}
?>