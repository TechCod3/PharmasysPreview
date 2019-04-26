<?php

    function SprodN(){

        require_once 'SQLconection.php';

        $sqlsrv = Conexion();
        $Prod = addslashes($_POST['IdProd']);
        $Squer = "SELECT categoria, producto, casa FROM tbproducto, tbcategoria, tbcasa WHERE tbcasa.idcasa = tbproducto.idcasa AND tbcategoria.idcategoria = tbproducto.idcategoria AND idproducto='$Prod'";
        $rs = sqlsrv_query($sqlsrv, $Squer);
        $Nr = sqlsrv_has_rows($rs);

    if($Nr === TRUE)
    {
        while ($ro = sqlsrv_fetch_array($rs)) {
            echo "".$ro['categoria']." - ".$ro['producto']." - ".$ro['casa']."";
        }
    }else{
        echo "--------";
        printf("<script type='text/javascript'>alert('No Existe el código en bodega'); </script>");
    }
}
SprodN();
?>