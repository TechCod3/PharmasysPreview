<?php

require_once 'SQLconection.php';

function SeeCant()
{
    $conn = Conexion();

    if (isset(($_POST['IdPurchase']), ($_POST['TypeOfInvoice']))) {
        
        $ID = addslashes($_POST['IdPurchase']);
        $TipoFactura = addslashes($_POST['TypeOfInvoice']);

        if (isset(($ID), ($TipoFactura))) {

            if (($ID != "") && ($ID != NULL) && ($ID != 0) && ($TipoFactura != "") && ($TipoFactura != NULL)) {
                
                if ($TipoFactura === "Contable") {
                    
                    try {
                        $sql = "SELECT cantidad FROM tbcompra WHERE idcompra = $ID";
                        $ExeSQL = sqlsrv_query($conn, $sql);
                        $NumRSQL = sqlsrv_has_rows($ExeSQL);
        
                        if ($NumRSQL === TRUE) {
                            
                            while ($ResSQL = sqlsrv_fetch_array($ExeSQL)) {

                                $cantidad = $ResSQL['cantidad'];

                                echo $cantidad;
                            }
                        }
                    } catch (sqlsrv_Exception $e) {
                        
                        echo "0000";
                    }
                } elseif ($TipoFactura === "No Contable") {
                    
                    try {
                        $sql = "SELECT cantidad2 FROM tbcompra WHERE idcompra = $ID";
                        $ExeSQL = sqlsrv_query($conn, $sql);
                        $NumRSQL = sqlsrv_has_rows($ExeSQL);
        
                        if ($NumRSQL === TRUE) {
                            
                            while ($ResSQL = sqlsrv_fetch_array($ExeSQL)) {

                                $cantidad = $ResSQL['cantidad2'];

                                echo $cantidad;

                            }
                        }
                    } catch (sqlsrv_Exception $e) {
                        
                        echo "0000";
                    }
                }
            }
        }
    }
}

SeeCant();
?>