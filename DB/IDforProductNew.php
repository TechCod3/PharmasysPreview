<?php

require_once 'SQLconection.php';

function IDnew(){
    $conn = Conexion();
    $sql = "SELECT TOP 1idproducto FROM tbproducto ORDER BY idproducto DESC";
    $Rsql = sqlsrv_query($conn, $sql);
    $NRsql = sqlsrv_has_rows($Rsql);

    if ($NRsql === TRUE) {
        
        if ($Rsql) {
            
            while ($Srow = sqlsrv_fetch_array($Rsql)) {
                
                $idNew = ($Srow['idproducto'] + 1);

                echo "$idNew";

            }
            
        } else {
            
            print_r("<script type='text/javascript'>alert('Ocurrió un error al obtener el útlimo id de los productos'); </script>");

        }

    } else {
        
        print_r("<script type='text/javascript'>alert('Hubo algún error o no se econtraron registros de un último id'); </script>");

    }
}

IDnew();
?>