<?php

require_once 'SQLconection.php';

function Fex(){
    $sqlsrv = Conexion();
    $dt = addslashes($_POST['IdProd']);
    $query = "SELECT fecha FROM tbinventario WHERE idsucursal='5' AND idproducto='$dt'";
    $fq = sqlsrv_query($sqlsrv, $query);
    $rf = sqlsrv_has_rows($fq);

    if($rf === TRUE)
    {
        while($fr = sqlsrv_fetch_array($fq)){
            echo "Fecha de vencimiento actual:<br>".$fr['fecha']->format('d/m/Y')."</br>";
        }
    }else{
        echo "--------";
        printf("<script type='text/javascript'>alert('No Existe el código en bodega');</script>");
    }
}

Fex();

?>