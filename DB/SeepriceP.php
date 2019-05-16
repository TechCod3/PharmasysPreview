<?php

require_once 'SQLconection.php';

function SeePrice()
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
                            
                            $PricePSQL = "SELECT preciocompra FROM tbproducto WHERE idproducto = $IDproducto";
                            $ExePricePSQL = sqlsrv_query($CONN, $PricePSQL);
                            $NRPricePSQL = sqlsrv_has_rows($ExePricePSQL);

                            if ($NRPricePSQL === TRUE) {
                                
                                while ($ResPricePSQL = sqlsrv_fetch_array($ExePricePSQL)) {
                                    
                                    $PrecioCompra = $ResPricePSQL['preciocompra'];

                                    echo $PrecioCompra;
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

SeePrice();
?>