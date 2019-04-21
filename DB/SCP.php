<?php

require_once 'SQLconection.php';

function Scant(){
    $sqlsrv = Conexion();
    $Dt = addslashes($_POST['IdProd']);
    $query = "SELECT SUM(cantidad+cantidad2) AS cantidad FROM tbinventario WHERE idsucursal = 5 AND idproducto='$Dt'";
    $Cq = sqlsrv_query($sqlsrv, $query);
    $C = sqlsrv_has_rows($Cq);

    if($C === TRUE)
    {
        while ($D = sqlsrv_fetch_array($Cq)) {
            echo "Cantidad actual del producto: ".$D['cantidad']."";
        }
    }else {
        echo "--------";
        printf("<script type='text/javascript'>alert('No Existe el código en bodega'); </script>");
    }
}

Scant();

?>