<?php
class TbCliente{
    private $idcliente;
    private $dstelefone_responsavel;
    private $dsnome_institucional;
    private $dsemail_institucional;
    private $dscnpj_institucional;
    private $dsendereco;
    private $dsnome_responsavel;
    private $dsemail_responsavel;
    private $dscpf_responsavel;
    public function set($prp, $value) {
        $this->prp = $value;
    }
    public function get($prp) {
        return $this->$prp;
    }
    public function loadObject($row) {
        $objTbCliente = new TbCliente();
        $objTbCliente->set("idcliente", $row["idcliente"]);
        $objTbCliente->set("dstelefone", $row["dstelefone"]);
        $objTbCliente->set("dsnome_institucional", $row["dsnome_institucional"]);
        $objTbCliente->set("dsemail_institucional", $row["dsemail_institucional"]);
        $objTbCliente->set("dscnpj_institucional", $row["dscnpj_institucional"]);
        $objTbCliente->set("dsendereco", $row["dsendereco"]);
        $objTbCliente->set("dsnome_responsavel", $row["dsnome_responsavel"]);
        $objTbCliente->set("dsemail_responsavel", $row["dsemail_responsavel"]);
        $objTbCliente->set("dscpf_responsavel", $row["dscpf_responsavel"]);

        return $objTbCliente;
    }
    public function insert($objTbCliente){
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "INSERT INTO
                        shsistema.tbcliente
                        (
                            dstelefone,
                            dsnome_institucional,
                            dsemail_institucional,
                            dscnpj_institucional,
                            dsendereco,
                            dsnome_responsavel,
                            dsemail_responsavel,
                            dscpf_responsavel
                        )
                    VALUES
                        (
                            '".$objTbCliente->get("dstelefone")."',
                            '".$objTbCliente->get("dsnome_institucional")."',
                            '".$objTbCliente->get("dsemail_institucional")."',
                            '".$objTbCliente->get("dscnpj_institucional")."',
                            '".$objTbCliente->get("dsendereco")."',
                            '".$objTbCliente->get("dsnome_responsavel")."',
                            '".$objTbCliente->get("dsemail_responsavel")."',
                            '".$objTbCliente->get("dscpf_responsavel")."
                        )";
        $result=$objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();

        return $result;
    }
    public function update($objTbCliente){
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "UPDATE 
                        shsistema.tbcliente
                    SET
                            dstelefone='".$objTbCliente->get("dstelefone")."',
                            dsnome_institucional='".$objTbCliente->get("dsnome_institucional")."',
                            dsemail_institucional='".$objTbCliente->get("dsemail_institucional")."',
                            dscnpj_institucional='".$objTbCliente->get("dscnpj_institucional")."',
                            dsendereco='".$objTbCliente->get("dsendereco")."',
                            dsnome_responsavel='".$objTbCliente->get("dsnome_responsavel")."',
                            dsemail_responsavel='".$objTbCliente->get("dsemail_responsavel")."',
                            dscpf_responsavel='".$objTbCliente->get("dscpf_responsavel")."
                    WHERE
                            idcliente='".$objTbCliente->get("idcliente")."";
        $result=$objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();

        return $result;
    }
    public function delete($idCliente){
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "DELETE FROM 
                        shsistema.tbcliente
                    WHERE
                        idcliente=".$idCliente;
        $result=$objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();
        
        return $result;
    }
    public function listAll() {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbcliente";
        $result=$objDtbServer->runQuery($strQuery);
        $arrResult=[];
        while($row=pg_fetch_array($result)) {
            $arrResult[]=$this->loadObject($row);
        }
        $objDtbServer->desconectServer();
        return $arrResult;
    }
    public function loadById($idCliente) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbcliente
                    WHERE
                        idcliente=".$idCliente;
        $result=$objDtbServer->runQuery($strQuery);
        $arrResult=[];
        while($row=pg_fetch_array($result)) {
            $arrResult=$this->loadObject($row);
        }
        $objDtbServer->desconectServer();
        return $arrResult;
    }
}
?>