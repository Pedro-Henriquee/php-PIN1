<?php
class Format {

    public function data($data){
        if(trim($data) != ""){

        //Verificando o formato de entrada
        if (substr($data,2,1) == '/'){ // Entrada->01/05/2013 Saída->'2013-05-01'
            return substr($data,6,4)."-".substr($data,3,2)."-".substr($data,0,2);
        }
        else{ // Entrada->2013-05-01 Saída->'01/05/2013'
            return substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);
        }
        }
        else{
            return "";
        }   
    }

}

?>