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

            $fechaEx = $fr['fecha']->format('d/m/Y');

            if (($fechaEx === "01/01/2999") || ($fechaEx === "31/12/2099")) {
                
                echo "Fecha de vencimiento actual:<br><b>Este producto NO EXPIRA.</b></br>";

            } else {

                echo "Fecha de vencimiento actual:<br><b>".$fechaEx."</b></br>";

            }
        }
    }else{
        echo "--------";
        print_r("<script type='text/javascript'>alert('No Existe el código en bodega');</script>");
    }
}

Fex();

?>