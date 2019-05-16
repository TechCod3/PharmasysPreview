<?php

require_once 'SQLconection.php';

function ID()
{
    
    if (isset($_POST['IDfactura'])) {
    
        $SearchID = addslashes($_POST['IDfactura']);
    }

    $conn = Conexion();

    if (isset($SearchID)) {

        if (($SearchID != "0") && ($SearchID != "")) {
            
            $ID = $SearchID;
        }

    } else {
        
        $IDsql = "SELECT TOP 1idfactura FROM tbcompra ORDER BY idcompra DESC";
        $ExeIDsql = sqlsrv_query($conn, $IDsql);
        $NRIDsql = sqlsrv_has_rows($ExeIDsql);

        if ($NRIDsql === TRUE) {

            while ($RIDsql = sqlsrv_fetch_array($ExeIDsql)) {
                
                $ID = $RIDsql['idfactura'];
            }
        }
    }

    return $ID;
}

function TypeOfInvoice()
{
    $conn = Conexion();
    $ID = ID();

    if (isset($ID)) {

        try {
                    
            $Datasql = "SELECT SUM(cantidad) AS can1, SUM(cantidad2) AS can2 FROM tbcompra WHERE idfactura = $ID";
            $ExeDatasql = sqlsrv_query($conn, $Datasql);
            $NRsql = sqlsrv_has_rows($ExeDatasql);

            if ($NRsql === TRUE) {
                
                while ($Rsql = sqlsrv_fetch_array($ExeDatasql)) {
                    
                    $Cantidad1 = $Rsql['can1'];
                    $Cantidad2 = $Rsql['can2'];

                    if (($Cantidad1 === NULL) || ($Cantidad2 === "")) {
                        $Cantidad1 = 0;
                    }
                    if (($Cantidad2 === NULL) || ($Cantidad2 === "")) {
                        $Cantidad2 = 0;
                    }
                }

                if (isset(($Cantidad1), ($Cantidad2))) {

                    $TipoDeFactura = 0;
                    
                    if (($Cantidad1 === 0) || ($Cantidad1 === NULL)) {
                        
                        $TipoDeFactura = "No Contable";
                        
                    } elseif (($Cantidad2 === 0) || ($Cantidad2 === NULL)) {
                        
                        $TipoDeFactura = "Contable";
                    } else {
                        
                        $TipoDeFactura = "Ocurrió un error al procesar el <b>TIPO DE FACTURA</b>, debido a que existen datos conflictivos en 'Cantidades 1 y 2', verifique este problema.";
                    }
                } else {
                    
                    $TipoDeFactura = "<b>NO SE ENCONTRARON DATOS PARA PROCESAR EL TIPO DE FACTURA, verifique las cantidades ingresadas en esta factura.</b>";
                }

            }
            } catch (sqlsrv_Exception $e) {
            
                $TipoDeFactura = "Ocurrió un error al momento de obtener los datos principales de la factura. <b>Dettalles del Error: ".$e."</b>";
            }
    }

    return $TipoDeFactura;
}

function See()
{
    $conn = Conexion();

    if (isset($_POST['DataPurchase'])) {

        $ID = ID();

        if (isset($ID)) {

            if (addslashes($_POST['DataPurchase'] === "AllPurchases")) {
            
                try {
                    
                    $Datasql = "SELECT idproveedor, SUM(cantidad) AS can1, SUM(cantidad2) AS can2 FROM tbcompra WHERE idfactura = $ID GROUP BY idproveedor";
                    $ExeDatasql = sqlsrv_query($conn, $Datasql);
                    $NRsql = sqlsrv_has_rows($ExeDatasql);

                    if ($NRsql === TRUE) {
                        
                        while ($Rsql = sqlsrv_fetch_array($ExeDatasql)) {
                            
                            $IDproveedor = $Rsql['idproveedor'];
                            $Cantidad1 = $Rsql['can1'];
                            $Cantidad2 = $Rsql['can2'];

                            if (($Cantidad1 === NULL) || ($Cantidad1 === "")) {
                                $Cantidad1 = 0;
                            }
                            if (($Cantidad2 === NULL) || ($Cantidad2 === "")) {
                                $Cantidad2 = 0;
                            }
                        }

                        if (isset($IDproveedor)) {
                            
                            $Proveedorsql = "SELECT proveedor FROM tbproveedor WHERE idproveedor = $IDproveedor";
                            $ExeProveedorsql = sqlsrv_query($conn, $Proveedorsql);
                            $NRProveedorsql = sqlsrv_has_rows($ExeProveedorsql);

                            if ($NRProveedorsql === TRUE) {
                                
                                while ($RProveedorsql = sqlsrv_fetch_array($ExeProveedorsql)) {
                                    
                                    $Proveedor = $RProveedorsql['proveedor'];
                                }
                            } else {
                            
                                $Proveedor = "<b>No se encontró el proveedor que se especificó en la compra, por favor revise el proveedor de la factura, para eso, debe devolver la compra e ingresar de nuevo.</b>";
                            }
                        } else {
                            
                            $Proveedor = "<b>NO SE PUDO IDENTIFICAR EL PROVEEDOR QUE FUE INGRESADO CON ESTA FACTURA, verifique los datos del proveedor</b>";
                        }

                        if (isset(($Cantidad1), ($Cantidad2))) {

                            $TipoDeFactura = 0;
                            
                            if (($Cantidad1 === 0) || ($Cantidad1 === NULL)) {
                                
                                $TipoDeFactura = "No Contable";
                                
                            } elseif (($Cantidad2 === 0) || ($Cantidad2 === NULL)) {
                                
                                $TipoDeFactura = "Contable";
                            } else {
                                
                                $TipoDeFactura = "Ocurrió un error al procesar el <b>TIPO DE FACTURA</b>, debido a que existen datos conflictivos en 'Cantidades 1 y 2', verifique este problema.";
                            }
                        } else {
                            
                            $TipoDeFactura = "<b>NO SE ENCONTRARON DATOS PARA PROCESAR EL TIPO DE FACTURA, verifique las cantidades ingresadas en esta factura.</b>";
                        }

                        if (isset($TipoDeFactura)) {
                            
                            if ($TipoDeFactura === "Contable") {
                                
                                $TotalFacturaSQL = "SELECT SUM(cantidad * precio) AS Total FROM tbcompra WHERE idfactura = $ID";
                                $ExeTotalFacturaSQL = sqlsrv_query($conn, $TotalFacturaSQL);
                                $NRTotalFacturaSQL = sqlsrv_has_rows($ExeTotalFacturaSQL);

                                if ($NRTotalFacturaSQL) {
                                    
                                    while ($ResTotalFactura = sqlsrv_fetch_array($ExeTotalFacturaSQL)) {
                                        
                                        $Total = $ResTotalFactura['Total'];
                                    }
                                }

                            } elseif ($TipoDeFactura === "No Contable") {
                                
                                $TotalFacturaSQL = "SELECT SUM(cantidad2 * precio) AS Total FROM tbcompra WHERE idfactura = $ID";
                                $ExeTotalFacturaSQL = sqlsrv_query($conn, $TotalFacturaSQL);
                                $NRTotalFacturaSQL = sqlsrv_has_rows($ExeTotalFacturaSQL);

                                if ($NRTotalFacturaSQL) {
                                    
                                    while ($ResTotalFactura = sqlsrv_fetch_array($ExeTotalFacturaSQL)) {
                                        
                                        $Total = $ResTotalFactura['Total'];
                                    }
                                }
                            } else {
                                
                                $Total = "No se ha podido calcular el total de la factura debido a que existe un error con el <b>tipo de factura</b>, verifique los datos ingresados en esa parte";
                            }
                        }
                            
                            //print_r("<script type='text/javascript'>alert('Ocurrió un error al hacer la suma total del precio de la factura.'); </script>");

                        echo "<label><b>Proveedor: </b></label>
                                <label id='Proveedor'>".$Proveedor."</label>
                                <label><b>No. de Factura: </b></label>
                                <label id='idPurchase'>".$ID."</label>
                                <label><b>Factura de tipo: </b></label>
                                <label id='TypeOfInvoice'>".$TipoDeFactura."</label>
                                <label id='TotalInvoice'><b>Valor de la Factura: </b>Q".$Total."</label>";
                    }
                    } catch (sqlsrv_Exception $e) {
                    
                        echo "Ocurrió un error al momento de obtener los datos principales de la factura. <b>Dettalles del Error: ".$e."</b>";
                    }
                }
            } else {
                
                echo "No envió un número de factura válido";
            }
        }
    }

See();
?>