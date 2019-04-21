<?php

require_once 'SQLconection.php';

function ScantP(){
    
    $sqlsrv = Conexion();
    $Sp = addslashes($_POST['IdProd']);
    $query = "SELECT preciocompra FROM tbproducto WHERE idproducto = '$Sp'";
    $result = sqlsrv_query($sqlsrv, $query);
    $Nr = sqlsrv_has_rows($result);

    if($Nr === TRUE)
    {
    while ($dres = sqlsrv_fetch_array($result)) {
        echo "Precio de Compra Actual: Q".$dres['preciocompra']."";
    }
    }else{
        echo "--------";
        printf("<script type='text/javascript'>alert('No Existe el código en bodega');</script>");
    }
}
ScantP();
?>