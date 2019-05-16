<?php

require_once 'SQLconection.php';

function DateExpireEdit()
{

    $CONN = Conexion();

    if (isset($_POST['IdPurchase'])) {
        
        $IDpurch = addslashes($_POST['IdPurchase']);

        if (isset($IDpurch)) {
            
            if (($IDpurch != "") || ($IDpurch != 0) ($IDpurch != NULL)) {
                
                try {
                    
                    $IDproductoSQL = "SELECT idproducto FROM tbcompra WHERE idcompra = $IDpurch";
                    $ExeIDproductoSQL = sqlsrv_query($CONN, $IDproductoSQL);
                    $NRIDproductoSQL = sqlsrv_has_rows($ExeIDproductoSQL);

                    if ($NRIDproductoSQL === TRUE) {

                        while ($ResIDproductoSQL = sqlsrv_fetch_array($ExeIDproductoSQL)) {
                            
                            $IDproducto = $ResIDproductoSQL['idproducto'];
                        }

                        if (isset($IDproducto)) {
                            
                            $PriceSSQL = "SELECT fecha FROM tbinventario WHERE idproducto = $IDproducto AND idsucursal = 5";
                            $ExePriceSSQL = sqlsrv_query($CONN, $PriceSSQL);
                            $NRPriceSSQL = sqlsrv_has_rows($ExePriceSSQL);

                            if ($NRPriceSSQL === TRUE) {
                                
                                while ($ResPriceSSQL = sqlsrv_fetch_array($ExePriceSSQL)) {
                                    
                                    $PrecioVenta = $ResPriceSSQL['fecha']->format('Y-m-d');

                                    echo $PrecioVenta;
                                }
                            }
                        }
                    }
                } catch (sqlsrv_Exception $e) {
                    
                    echo "0000";
                }
            }
        }
    }
}

DateExpireEdit();
?>