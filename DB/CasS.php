<?php

require_once 'SQLconection.php';

    function Scas(){
        $sql = Conexion();
        $query = "SELECT idcasa, casa FROM tbcasa ORDER BY casa";
        $eq = sqlsrv_query($sql, $query);
        $r = sqlsrv_has_rows($eq);
        $do = "<option value='0' disabled selected>--Seleccione--</option>";

        if($r === TRUE){
            while ($d = sqlsrv_fetch_array($eq)) {
                $do .= "<option value=".$d['idcasa'].">".$d['casa']."</option>";
            }
        }
        return $do;
    }
echo Scas();
?>