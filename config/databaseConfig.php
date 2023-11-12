<?php

class DtbServer {

    private static $info_string = "host=localhost port=5432 dbname=dbpin1 user=postgres password=123";
    private $connection;

    public function set($prp, $value) {
        $this->$prp = $value;
    }

    public function get($prp) {
        return $this->$prp;
    }

    public function connectServer() {
        $cn = pg_connect(DtbServer::$info_string) or die("Não foi possível conectar!");
        $this->set("connection", $cn);
    }

    public function runQuery($query) {
        $result = pg_query($this->get("connection"), $query);
        return $result;
    }

    public function desconectServer() {
        pg_close($this->get("connection")) or die("Não foi possível desconectar!");
    }
}
