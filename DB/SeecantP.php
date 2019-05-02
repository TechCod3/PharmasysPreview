<?php

require_once 'SQLconection.php';

function SeeCant()
{
    $conn = Conexion();

    if (isset($_POST['IdPurchase'])) {
        
        $ID = addslashes($_POST['IdPurchase']);

        if ($ID != 0) {
            
            try {
                $sql = "SELECT cantidad, cantidad2 FROM tbcompra WHERE idcompra = $ID";
                $ExeSQL = sqlsrv_query($conn, $sql);
                $NumRSQL = sqlsrv_has_rows($ExeSQL);

                if ($NumRSQL === TRUE) {
                    
                    while ($ResSQL = sqlsrv_fetch_array($ExeSQL)) {
                        $cantidad1 = $ResSQL['cantidad'];
                        $cantidad2 = $ResSQL['cantidad2'];

                        if (($cantidad1 === NULL)) {
                        
                            $cantidad1 = 0;
                        }
    
                        if ($cantidad2 === NULL) {
                            
                            $cantidad2 = 0;
                        }
                    }

                    if (($cantidad1 != 0) && ($cantidad2 === 0)) {
                        
                        echo $cantidad1;

                    } elseif (($cantidad2 != 0) && ($cantidad1 === 0)) {

                        echo $cantidad2;
                    }
                }
            } catch (sqlsrv_Exception $e) {
                
                echo "0000";
            }
        }
    }
}

SeeCant();
?>