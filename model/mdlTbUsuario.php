<?php
class TbUsuario {
    private $idusuario;
    private $dsnome;
    private $dscpf;
    private $dslogin;
    private $dssenha;
    public function set($prp, $value) {
        $this->$prp= $value;
    }
    public function get($prp) {
        return $this->$prp;
    }
    public function loadObject($row) {
        $objTbUsuario= new TbUsuario();
        $objTbUsuario->set("idusuario", $row["idusuario"]);
        $objTbUsuario->set("dsnome", $row["dsnome"]);
        $objTbUsuario->set("dscpf", $row["dscpf"]);
        $objTbUsuario->set("dslogin", $row["dslogin"]);
        $objTbUsuario->set("dssenha", $row["dssenha"]);

        return $objTbUsuario;
    }
    public function insert($objTbUsuario) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "INSERT INTO
                        shsistema.tbusuario
                        (
                            dsnome,
                            dscpf,
                            dslogin
                            dssenha
                        )
                    VALUES
                        (
                            '".$objTbUsuario->get("dsnome")."',
                            '".$objTbUsuario->get("dscpf")."',
                            '".$objTbUsuario->get("dslogin")."',
                            '".$objTbUsuario->get("dssenha")."'
                        )";
        $result= $objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();
        
        return $result;
    }
    public function update($objTbUsuario) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "UPDATE
                        shsistema.tbusuario
                    SET
                        dsnome'".$objTbUsuario->get("dsnome")."',
                        dscpf'".$objTbUsuario->get("dscpf")."',
                        dslogin'".$objTbUsuario->get("dslogin")."',
                        dssenha'".$objTbUsuario->get("dssenha")."
                    WHERE
                        idusuario='".$objTbUsuario->get("idusuario")."";
        $result=$objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();

        return $result;
    }
    public function delete($idUsuario) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "DELETE FROM
                        shsistema.tbusuario
                    WHERE
                        idusuario=".$idUsuario;
        $result= $objDtbServer->runQuery($strQuery);
        $objDtbServer->desconectServer();
        return $result;
    }
    public function listAll() {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbusuario";
        $result= $objDtbServer->runQuery($strQuery);
        $arrResult=[];
        while($row=pg_fetch_array($result)) {
            $arrResult[]=$this->loadObject($row);
        }
        $objDtbServer->desconectServer();
        return $arrResult;
    }
    public function loadById($idUsuario) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        * 
                    FROM
                        shsistema.tbusuario
                    WHERE
                        idusuario=".$idUsuario;
        $result= $objDtbServer->runQuery($strQuery);
        $arrResult=[];
        while($row=pg_fetch_array($result)) {
            $arrResult[]=$this->loadObject($row);
        }
        $objDtbServer->desconectServer();
        return $arrResult;
    }
}
?>