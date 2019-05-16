<?php

require_once 'SQLconection.php';
require_once 'SeeDataPurchases.php';

function ReturnPurchase()
{
    
    $CONN = Conexion();
    $IDfactura = ID();

    if (isset(($_POST['IDpurchase']), $IDfactura, ($_POST['CantEdit'])) {
        
        $IDcompra = addslashes($_POST['IDpurchase']);
        $Cantidad = addslashes($_POST['CantEdit']);

        if (($IDcompra != 0) && ($IDcompra != "") && ($IDcompra != NULL) && ($IDfactura != 0) && ($IDfactura != "") && ($IDfactura != NULL)) {

            $SQLIDproducto = "SELECT idproducto FROM tbcompra WHERE idcompra = $IDcompra AND idfactura = $IDfactura";
            $ExeSQLIDproducto = sqlsrv_query($CONN, $SQLIDproducto);
            $NRSQLIDproducto = sqlsrv_has_rows($ExeSQLIDproducto);

            if ($NRSQLIDproducto === TRUE) {
                
                while ($ResIDproducto = sqlsrv_fetch_array($ExeSQLIDproducto) {
                    
                    if (($ResIDproducto['idproducto'] != "") && ($ResIDproducto['idproducto'] != NULL), ($ResIDproducto['idproducto'] != 0)) {
                        
                        $IDproducto = addslashes($ResIDproducto['idproducto']);

                    }
                }
            }
            
            if (isset($IDproducto)) {
                
                $SQLpurch = "DELETE FROM tbcompra WHERE idcompra = ( ?)";
            
                $SQLParametrospurch = array($IDcompra);

                $SQLPrepareDeletePurch = sqlsrv_prepare($CONN, $SQLpurch, $SQLParametrospurch);

                if ($SQLPrepareDeletePurch) {
                
                    try {
                    
                        $ExeSQLpurch = sqlsrv_execute($SQLPrepareDeletePurch);

                        echo "Esta compra fué eliminada correctamente.";

                    } catch (sqlsrv_Exception $e) {
                    
                        echo "Ocurrió un error al eliminar la compra.";

                    }
                
                    if (isset($ExeSQLpurch)) {
                    
                        if ($ExeSQLpurch) {
                        
                            $SQLpurchPrev = "SELECT TOP 1fecha, cantidad, precio, cantidad2 FROM tbcompra WHERE idproducto = $IDproducto ORDER BY idcompra DESC";
                            $ExeSQLpurchPrev = sqlsrv_query($CONN, $SQLpurchPrev);
                            $NRSQLpurchPrev = sqlsrv_has_rows($ExeSQLpurchPrev);

                            if ($NRSQLpurchPrev === TRUE) {
                                
                                while ($ResPurchPrev = sqlsrv_fetch_array($ExeSQLpurchPrev)) {
                                    
                                    $CantidadAnterior = 
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

ReturnPurchase();
?>