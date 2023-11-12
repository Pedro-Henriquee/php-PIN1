<?php
class TbRelatorio {

    private $idrelatorio;
    private $dtgeracao;
    private $hrgeracao;
    private $dtcomparativaorigem;
    private $dtcomparativadestino;

    public function set($prp, $value) {
        $this->$prp = $value;
    }

    public function get($prp) {
        return $this->$prp;
    }

    public function loadObject($row) {
        $objTbRelatorio = new TbRelatorio();

        $objTbRelatorio->set("idrelatorio", $row["idrelatorio"]);
        $objTbRelatorio->set("dtgeracao", $row["dtgeracao"]);
        $objTbRelatorio->set("hrgeracao", $row["hrgeracao"]);
        $objTbRelatorio->set("dtcomparativaorigem", $row["dtcomparativaorigem"]);
        $objTbRelatorio->set("dtcomparativadestino", $row["dtcomparativadestino"]);
        
        return $objTbRelatorio;
    }

    public function insert($objTbRelatorio) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "INSERT INTO
                        shsistema.tbrelatorio
                        (
                            dtgeracao, 
                            hrgeracao, 
                            dtcomparativaorigem, 
                            dtcomparativadestino
                        )
                    VALUES
                        (   
                            '".$objTbRelatorio->get("dtgeracao")."',
                            '".$objTbRelatorio->get("hrgeracao")."',
                            '".$objTbRelatorio->get("dtcomparativaorigem")."',
                            '".$objTbRelatorio->get("dtcomparativadestino")."'
                        )";

        $result = $objDtbServer->runQuery($strQuery);
        
        $objDtbServer->desconectServer();

        return $result;
    }

    public function update($objTbRelatorio) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "UPDATE 
                        shsistema.tbrelatorio
                    SET
                        dtgeracao = '".$objTbRelatorio->get("dtgeracao")."',
                        hrgeracao = '".$objTbRelatorio->get("hrgeracao")."',
                        dtcomparativaorigem = '".$objTbRelatorio->get("dtcomparativaorigem")."',
                        dtcomparativadestino = '".$objTbRelatorio->get("dtcomparativadestino")."'
                    WHERE
                        idrelatorio = ".$objTbRelatorio->get("idrelatorio")."";

        $result = $objDtbServer->runQuery($strQuery);
       
        $objDtbServer->desconectServer();

        return $result;
    }

    public function delete($idRelatorio) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "DELETE FROM 
                        shsistema.tbrelatorio
                    WHERE
                        idrelatorio = ".$idRelatorio;

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
                        shsistema.tbrelatorio";

        $result = $objDtbServer->runQuery($strQuery);
        $arrResult = [];

        while($row = pg_fetch_assoc($result)) {

            $arrResult = $this->loadObject($row);
        }

        $objDtbServer->desconectServer();

        return $arrResult;
    }

    public function loadById($idRelatorio) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT 
                        *
                    FROM 
                        shsistema.tbrelatorio
                    WHERE
                        idrelatorio = ". $idRelatorio;

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