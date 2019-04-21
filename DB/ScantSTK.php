<?php

require_once 'SQLconection.php';

function STK(){
    $sqlsrv = Conexion();
    $dt = addslashes($_POST['IdProd']);
    $query = "SELECT stock FROM tbinventario WHERE idsucursal='5' AND idproducto='$dt'";
    $Rstk = sqlsrv_query($sqlsrv, $query);
    $DtR = sqlsrv_has_rows($Rstk);

    if($DtR === TRUE)
    {
        while ($Dstk = sqlsrv_fetch_array($Rstk)) {
            echo "Cantidad del stock actual: ".$Dstk['stock']."";
        }
    }else{
        echo "--------";
        printf("<script type='text/javascript'>alert('No Existe el código en bodega'); </script>");
    }
}
STK();
?>