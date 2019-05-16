<?php

require_once 'SQLconection.php';

function Modificar()
{

    $CONN = Conexion();

    if (isset(($_POST['IDpurchase']), ($_POST['NewCant']), ($_POST['NewPricePurch']), ($_POST['NewPriceSold']), ($_POST['NewDateExpire']), ($_POST['TypeInvoice']))) {
        
        $TipoFactura = addslashes($_POST['TypeInvoice']);
        $IDpurchase = addslashes($_POST['IDpurchase']);
        $Cantidad = addslashes($_POST['NewCant']);
        $PrecioCompra = addslashes($_POST['NewPricePurch']);
        $PrecioVenta = addslashes($_POST['NewPriceSold']);
        $FechaExpiracion = addslashes($_POST['NewDateExpire']);

        if (($IDpurchase != NULL) && ($IDpurchase != "") && ($IDpurchase != 0) && ($Cantidad != 0) && ($Cantidad != NULL) && ($Cantidad != "")
            && ($PrecioCompra != 0) && ($PrecioCompra != "") && ($PrecioCompra != NULL) && ($PrecioVenta != 0) && ($PrecioVenta != NULL) && ($PrecioVenta != "")) {

                try {

                    $IDproductoSQL = "SELECT idproducto FROM tbcompra WHERE idcompra = $IDpurchase";
                    $ExeIDproducto = sqlsrv_query($CONN, $IDproductoSQL);
                    $NRExeIDproducto = sqlsrv_has_rows($ExeIDproducto);

                    if ($NRExeIDproducto === TRUE) {
                        
                        while ($ResIDproductoSQL = sqlsrv_fetch_array($ExeIDproducto)) {
                            
                            $IDproducto = $ResIDproductoSQL['idproducto'];
                        }
                        
                        if (isset($IDproducto)) {

                            if ($TipoFactura === "Contable") {
                                
                                $sql = "UPDATE tbproducto SET preciocompra = ( ?) WHERE idproducto = ( ?)";
                                $sql1 = "UPDATE tbinventario SET cantidad = ( ?), precioventa = ( ?), stock = ( ?), fecha = ( ?) WHERE idproducto = ( ?) AND idsucursal = ( ?)";
                                $sql2 = "UPDATE tbcompra SET fecha = ( ?), cantidad = ( ?), precio = ( ?) WHERE idcompra = ( ?) AND idproducto = ( ?)";

                                $sqlP = array($PrecioCompra, $IDproducto);
                                $sqlP1 = array($Cantidad, $PrecioVenta, 0, $FechaExpiracion, $IDproducto, 5);
                                $sqlP2 = array($FechaExpiracion, $Cantidad, $PrecioCompra, $IDpurchase, $IDproducto);
                    
                                $sqlR = sqlsrv_prepare($CONN, $sql, $sqlP);
                                $sqlR1 = sqlsrv_prepare($CONN, $sql1, $sqlP1);
                                $sqlR2 = sqlsrv_prepare($CONN, $sql2, $sqlP2);
    
                                if(($sqlR) && ($sqlR1) && ($sqlR2)){

                                    try {
                                        $APe = sqlsrv_execute($sqlR);
                                        $APe1 = sqlsrv_execute($sqlR1);
                                        $APe2 = sqlsrv_execute($sqlR2);

                                        echo "Se Modificó CORRECTAMENTE el producto con el registro de compra = '$IDpurchase'";
                                        
                                    } catch (sqlsrv_Exception $e){

                                        echo "Error al procesar los cambios en la base de datos, porfavor contacte con el soporte. ------------> $e";
                                    }
                                }

                            } elseif ($TipoFactura === "No Contable") {
                                
                                $sql = "UPDATE tbproducto SET preciocompra = ( ?) WHERE idproducto = ( ?)";
                                $sql1 = "UPDATE tbinventario SET cantidad = ( ?), precioventa = ( ?), stock = ( ?), fecha = ( ?) WHERE idproducto = ( ?) AND idsucursal = ( ?)";
                                $sql2 = "UPDATE tbcompra SET fecha = ( ?), cantidad2 = ( ?), precio = ( ?) WHERE idcompra = ( ?) AND idproducto = ( ?)";

                                $sqlP = array($PrecioCompra, $IDproducto);
                                $sqlP1 = array($Cantidad, $PrecioVenta, 0, $FechaExpiracion, $IDproducto, 5);
                                $sqlP2 = array($FechaExpiracion, $Cantidad, $PrecioCompra, $IDpurchase, $IDproducto);
                    
                                $sqlR = sqlsrv_prepare($CONN, $sql, $sqlP);
                                $sqlR1 = sqlsrv_prepare($CONN, $sql1, $sqlP1);
                                $sqlR2 = sqlsrv_prepare($CONN, $sql2, $sqlP2);
    
                                if(($sqlR) && ($sqlR1) && ($sqlR2)){

                                    try {
                                        $APe = sqlsrv_execute($sqlR);
                                        $APe1 = sqlsrv_execute($sqlR1);
                                        $APe2 = sqlsrv_execute($sqlR2);

                                        echo "Se Modificó CORRECTAMENTE el producto con el registro de compra = '$IDpurchase'";

                                    } catch (sqlsrv_Exception $e){

                                        echo "Error al procesar los cambios en la base de datos, porfavor contacte con el soporte. ------------> $e";
                                    }
                                }
                            }
                        }
                    }
                } catch (sqlsrv_Exception $e) {
                    
                    echo "Error al procesar los cambios en la base de datos, porfavor contacte con el soporte. ------------/> $e";
                }
        } else {
            
            echo "Nel";
        }
    } else {
         
        echo "Nel 1";
    }
}

Modificar();
?>