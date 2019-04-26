<?php

require_once 'SQLconection.php';

function ScantSold(){

    $sqlsrv = Conexion();
    $Sdt = addslashes($_POST['IdProd']);
    $query = "SELECT precioventa FROM tbinventario WHERE idsucursal='5' AND idproducto='$Sdt'";
    $Rs = sqlsrv_query($sqlsrv, $query);
    $Nr = sqlsrv_has_rows($Rs);

    if($Nr === TRUE)
    {
        while ($Spr = sqlsrv_fetch_array($Rs)){
            echo "Precio de Venta Actual: Q".$Spr['precioventa'].""; 
        }
    }else{
        echo "--------";
        printf("<script type='text/javascript'>alert('No Existe el código en bodega'); </script>");
    }
}
ScantSold();
?>