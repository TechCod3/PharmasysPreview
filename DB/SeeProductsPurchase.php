<?php

require_once 'SQLconection.php';
require_once 'SeeDataPurchases.php';

function SeeProducts(){

    $CONN = Conexion();
    $IDfactura = ID();
    $TipoDeFactura = TypeOfInvoice();

    $Actuar = addslashes($_POST['TypeInvoice']);

    if (isset($Actuar)) {
        
        if ($Actuar === "TypeOfInvoice") {

            if (isset(($IDfactura), ($TipoDeFactura))) {

                if (($IDfactura != 0) || ($IDfactura != "") || ($IDfactura != NULL)) {
    
                    if ($TipoDeFactura === "Contable") {
                        
                        try {
                        
                            $SQL = "SELECT tbcompra.idcompra, tbcompra.idproducto, tbcategoria.categoria, tbproducto.producto, tbcasa.casa, tbinventario.fecha, tbproducto.preciocompra, tbinventario.precioventa, tbcompra.cantidad
                                    FROM tbcompra, tbcategoria, tbproducto, tbcasa, tbinventario WHERE tbinventario.idsucursal = 5 AND tbcompra.idfactura = $IDfactura AND tbcategoria.idcategoria = tbproducto.idcategoria AND tbproducto.idproducto = tbcompra.idproducto
                                    AND tbcasa.idcasa = tbproducto.idcasa AND tbinventario.idproducto = tbcompra.idproducto ORDER BY idcompra ASC";
                            $ExeSQL = sqlsrv_query($CONN, $SQL);
                            $NRSQL = sqlsrv_has_rows($ExeSQL);
            
                            if ($NRSQL) {

                                echo "<tr>
                                        <th id='PurchRecord'>Registro de Compra</th>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Precio de Compra</th>
                                        <th>Precio de Venta</th>
                                        <th>Opción</th>
                                    </tr>";
                                
                                while ($ResSQL = sqlsrv_fetch_array($ExeSQL)) {
                                    
                                    $IDcompra = $ResSQL['idcompra'];
                                    $IDproducto = $ResSQL['idproducto'];
                                    $Categoria = $ResSQL['categoria'];
                                    $Producto = $ResSQL['producto'];
                                    $Casa = $ResSQL['casa'];
                                    $FechaExpiracion = $ResSQL['fecha']->format('d/m/Y');
                                    $PrecioCompra = $ResSQL['preciocompra'];
                                    $PrecioVenta = $ResSQL['precioventa'];
                                    $Cantidad = $ResSQL['cantidad'];
        
                                    echo "<tr>
                                            <td>".$IDcompra."</td>
                                            <td>".$IDproducto."</td>
                                            <td>".$Categoria." - ".$Producto." - ".$Casa."</td>
                                            <td>".$FechaExpiracion."</td>
                                            <td>".$Cantidad."</td>
                                            <td>".$PrecioCompra."</td>
                                            <td>".$PrecioVenta."</td>
                                            <td><button id='SelectPurchase' data-id_purchase=".$IDcompra.">Editar</button></td>
                                        </tr>";
                                }
                            }
                        } catch (sqlsrv_Exception $e) {
                            
                            print_r("<script type='text/javascript'>alert('Ocurrió un error al procesar los productos con esta factura, revise los productos o datos de la factura.'); </script>");
                            echo "<b>OCURRIÓ UN ERROR AL PROCESAR LOS DATOS DE LA FACTURA, REVISE LOS DATOS INGRESADOS.</b>";
                        }
                    } elseif ($TipoDeFactura === "No Contable") {
                        
                        try {
                        
                            $SQL = "SELECT tbcompra.idcompra, tbcompra.idproducto, tbcategoria.categoria, tbproducto.producto, tbcasa.casa, tbinventario.fecha, tbproducto.preciocompra, tbinventario.precioventa, tbcompra.cantidad2
                                    FROM tbcompra, tbcategoria, tbproducto, tbcasa, tbinventario WHERE tbinventario.idsucursal = 5 AND tbcompra.idfactura = $IDfactura AND tbcategoria.idcategoria = tbproducto.idcategoria AND tbproducto.idproducto = tbcompra.idproducto
                                    AND tbcasa.idcasa = tbproducto.idcasa AND tbinventario.idproducto = tbcompra.idproducto ORDER BY idcompra ASC";
                            $ExeSQL = sqlsrv_query($CONN, $SQL);
                            $NRSQL = sqlsrv_has_rows($ExeSQL);
            
                            if ($NRSQL) {
                                
                                echo "<tr>
                                        <th id='PurchRecord'>Registro de Compra</th>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Precio de Compra</th>
                                        <th>Precio de Venta</th>
                                        <th>Opción</th>
                                    </tr>";

                                while ($ResSQL = sqlsrv_fetch_array($ExeSQL)) {
                                    
                                    $IDcompra = $ResSQL['idcompra'];
                                    $IDproducto = $ResSQL['idproducto'];
                                    $Categoria = $ResSQL['categoria'];
                                    $Producto = $ResSQL['producto'];
                                    $Casa = $ResSQL['casa'];
                                    $FechaExpiracion = $ResSQL['fecha']->format('d/m/Y');
                                    $PrecioCompra = $ResSQL['preciocompra'];
                                    $PrecioVenta = $ResSQL['precioventa'];
                                    $Cantidad = $ResSQL['cantidad2'];
        
                                    echo "<tr>
                                            <td>".$IDcompra."</td>
                                            <td>".$IDproducto."</td>
                                            <td>".$Categoria." - ".$Producto." - ".$Casa."</td>
                                            <td>".$FechaExpiracion."</td>
                                            <td>".$Cantidad."</td>
                                            <td>".$PrecioCompra."</td>
                                            <td>".$PrecioVenta."</td>
                                            <td><button id='SelectPurchase' data-id_purchase=".$IDcompra.">Editar</button></td>
                                        </tr>";
                                }
                            }
                        } catch (sqlsrv_Exception $e) {
                            
                            print_r("<script type='text/javascript'>alert('Ocurrió un error al procesar los productos con esta factura, revise los productos o datos de la factura.'); </script>");
                            echo "<b>OCURRIÓ UN ERROR AL PROCESAR LOS DATOS DE LA FACTURA, REVISE LOS DATOS INGRESADOS.</b>";
                        }
                    }
                } else {
                    
                    echo "El valor del número de factura es un caractér no válido";
                }
            } else {

                echo "Los valores: <b>Número de Factura</b> y <b>Tipo de Factura</b>, no existen o són un caractér inválido";
            }
        }
    }
}

SeeProducts();

?>