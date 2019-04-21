<?php

require_once 'SQLconection.php';

    function Scas(){
        $sql = Conexion();
        $query = "SELECT idcategoria, categoria FROM tbcategoria ORDER BY categoria";
        $eq = sqlsrv_query($sql, $query);
        $r = sqlsrv_has_rows($eq);
        $do = "<option value='0' disabled selected>--Seleccione--</option>";

        if($r === TRUE){
            while ($d = sqlsrv_fetch_array($eq)) {
                $do .= "<option value=".$d['idcategoria'].">".$d['categoria']."</option>";
            }
        }
        return $do;
    }
echo Scas();
?>