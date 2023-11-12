<?php
class TbProduto {
    private $idproduto;
    private $dsnome;
    private $dsfabricante;
    private $dsdescricao;
    private $dtvalidade;
    private $vlpeso;
    private $qtd_produto;
    private $vlpreco;

    public function set($prp, $value) {
        $this->$prp = $value;
    }

    public function get($prp) {
        return $this->$prp;
    }

    public function loadObject($row) {
        $objTbProduto = new TbProduto();
        $objTbProduto->set("idproduto", $row["idproduto"]);
        $objTbProduto->set("dsnome", $row["dsnome"]);
        $objTbProduto->set("dsfabricante", $row["dsfabricante"]);
        $objTbProduto->set("dsdescricao", $row["dsdescricao"]);
        $objTbProduto->set("dtvalidade", $row["dtvalidade"]);
        $objTbProduto->set("vlpeso", $row["vlpeso"]);
        $objTbProduto->set("qtd_produto", $row["qtd_produto"]);
        $objTbProduto->set("vlpreco", $row["vlpreco"]);

        return $objTbProduto;
    }

    public function insert($objTbProduto) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "INSERT INTO
                        shsistema.tbproduto
                        (
                            dsnome,
                            dsfabricante,
                            dsdescricao,
                            dtvalidade,
                            vlpeso,
                            qtd_produto,
                            vlpreco
                        )
                    VALUES
                        (
                            '".$objTbProduto->get("dsnome")."',
                            '".$objTbProduto->get("dsfabricante")."',
                            '".$objTbProduto->get("dsdescricao")."',
                            '".$objTbProduto->get("dtvalidade")."',
                            ".$objTbProduto->get("vlpeso").",
                            ".$objTbProduto->get("qtd_produto").",
                            ".$objTbProduto->get("vlpreco").",
                        )";

        $result = $objDtbServer->runQuery($strQuery);

        $objDtbServer->desconectServer();

        return $result;
    }

    public function update($objTbProduto) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "UPDATE
                        shsistema.tbproduto
                    SET
                        dsnome = '".$objTbProduto->get("dsnome")."',
                        dsfabricante = '".$objTbProduto->get("dsfabricante")."',
                        dsdescricao = '".$objTbProduto->get("dsdescricao")."',
                        dtvalidade = '".$objTbProduto->get("dtvalidade")."',
                        vlpeso = ".$objTbProduto->get("vlpeso").",
                        qtd_produto = ".$objTbProduto->get("qtd_produto").",
                        vlpreco = ".$objTbProduto->get("vlpreco").",
                    WHERE
                        idproduto = ".$objTbProduto->get("idproduto")."";

        $result = $objDtbServer->runQuery($strQuery);

        $objDtbServer->desconectServer();

        return $result;
    }


    public function delete($idProduto) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "DELETE FROM
                        shsistema.tbproduto
                    WHERE
                        idproduto = ".$idProduto;

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
                        shsistema.tbproduto";

        $result = $objDtbServer->runQuery($strQuery);
        $arrResult = [];

        while($row = pg_fetch_assoc($result)) {
            $arrResult = $this->loadObject($row);
        }

        $objDtbServer->desconectServer();

        return $arrResult;
    }

    public function loadById($idProduto) {
        $objDtbServer = new DtbServer();
        $objDtbServer->connectServer();

        $strQuery = "SELECT
                        *
                    FROM
                        shsistema.tbproduto
                    WHERE
                        idproduto = ". $idProduto;

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