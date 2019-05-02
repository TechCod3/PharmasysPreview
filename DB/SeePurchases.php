<?php

require_once 'SQLconection.php';

function SeePurch(){

    $reque = addslashes($_POST['ShowPurchases']);

    if (isset($reque)) {
    
        $conn = Conexion();
    
        if ($reque === "AllPurchases") {
            
            try {
    
                $sql = "SELECT TOP 1idfactura FROM tbcompra ORDER BY idcompra DESC";
                $Esql = sqlsrv_query($conn, $sql);
                $NRsql = sqlsrv_has_rows($Esql);
    
                if ($NRsql === TRUE) {
    
                    while ($Rsql = sqlsrv_fetch_array($Esql)) {
        
                        $IDfactura = addslashes($Rsql['idfactura']);
        
                    }
    
                    if (isset($IDfactura)) {
                        
                            
                            $sql1 = "SELECT tbcompra.idcompra, tbcompra.idproducto, tbcategoria.categoria, tbproducto.producto, tbcasa.casa, tbinventario.fecha, tbcompra.precio,
                                tbinventario.precioventa, tbcompra.cantidad, tbcompra.cantidad2 FROM tbcompra, tbproducto, tbinventario, tbcategoria, tbcasa WHERE idfactura = $IDfactura
                                AND idsucursal = 5 AND tbcategoria.idcategoria = tbproducto.idcategoria AND tbproducto.idproducto = tbcompra.idproducto AND tbcasa.idcasa = tbproducto.idcasa 
                                AND tbinventario.idproducto = tbcompra.idproducto ORDER BY idcompra DESC";

                            $sqlCant = "SELECT SUM(cantidad) AS cant1, SUM(cantidad2) AS cant2 FROM tbcompra WHERE idfactura = $IDfactura";
        
                            $Qsql1 = sqlsrv_query($conn, $sql1);
                            $QsqlCant = sqlsrv_query($conn, $sqlCant);
                            $NRsql1 = sqlsrv_has_rows($Qsql1);
                            $NRsqlCant = sqlsrv_has_rows($QsqlCant);

                            if (($NRsql1 === TRUE) && ($NRsqlCant === TRUE)) {

                                while ($ResultCantidad = sqlsrv_fetch_array($QsqlCant)) {

                                    $cantidad1 = $ResultCantidad['cant1'];

                                    if ($cantidad1 === NULL) {
                                        
                                        $cantidad1 = 0;
    
                                    }

                                }

                                echo "<table id='DataForInvoice'>
                                        <tr>
                                            <th id='PurchRecord'>Registro de Compra</th>
                                            <th>ID</th>
                                            <th>Producto</th>
                                            <th>Fecha</th>
                                            <th>Cantidad</th>
                                            <th>Precio de Compra</th>
                                            <th>Precio de Venta</th>
                                            <th>Seleccionar<th>
                                        </tr>";

                                //if (($cantidad1 = 0) && ($cantidad2 != 0)) {
                                    
                                    //print_r("<script type='text/javascript'>alert('Esta factura está ingresada correctamente en cantidad 2'); </script>");

                                    //echo "<table id='DataForInvoice'>
                                                //<tr>
                                                  //  <th id='PurchRecord'>Registro de Compra</th>
                                                    //<th>ID</th>
                                                    //<th>Producto</th>
                                                    //<th>Fecha</th>
                                                    //<th>Cantidad</th>
                                                    //<th>Precio de Compra</th>
                                                    //<th>Precio de Venta</th>
                                                //</tr>";

                                //} elseif (($cantidad1 != 0) && ($cantidad2 = 0)) {
                                    
                                    //print_r("<script type='text/javascript'>alert('Esta factura está ingresada correctamente en cantidad 1'); </script>");

                                    //echo "<table id='DataForInvoice'>
                                                //<tr>
                                                    //<th id='PurchRecord'>Registro de Compra</th>
                                                    //<th>ID</th>
                                                    //<th>Producto</th>
                                                    //<th>Fecha</th>
                                                    //<th>Cantidad</th>
                                                    //<th>Precio de Compra</th>
                                                    //<th>Precio de Venta</th>
                                                //</tr>";

                                //} elseif (($cantidad1 != 0) && ($cantidad2 != 0)) {

                                    //print_r("<script type='text/javascript'>alert('Ocurrió un error con esta factura. Requiere Verificación.'); </script>");
                                    //print_r("<script type='text/javascript'>alert('Esta factura está ingresada con datos conflictivos, por favor revise las cantidades y proveedores con las que fué ingresada.'); </script>");
                                    
                                    //echo "<table id='DataForInvoice'>
                                                //<tr>
                                                    //<th id='PurchRecord'>Registro de Compra</th>
                                                    //<th>ID</th>
                                                    //<th>Producto</th>
                                                    //<th>Fecha</th>
                                                    //<th>Cantidad 1</th>
                                                    //<th>Cantidad 2</th>
                                                    //<th>Precio de Compra</th>
                                                    //<th>Precio de Venta</th>
                                                //</tr>";
                                //}



                                if (isset($cantidad1)) {

                                    while ($Data = sqlsrv_fetch_array($Qsql1)) {

                                        $producto = "".$Data['categoria']." - ".$Data['producto']." - ".$Data['casa']."";
                                        $fechaExpiracion = $Data['fecha']->format('d/m/Y');

                                        if (($fechaExpiracion === "01/01/2999") || ($fechaExpiracion === "01/01/2099") || ($fechaExpiracion === "31/12/2099")) {
                                            
                                            $fechaExpiracion = "No expira";

                                        }
                                        
                                        if (($cantidad1 != 0) && ($cantidad2 === 0)) {
    
                                            echo "<tr>
                                                        <td id='NumberPurchRecord'>".$Data['idcompra']."</td>
                                                        <td>".$Data['idproducto']."</td>
                                                        <td>".$producto."</td>
                                                        <td>".$fechaExpiracion."</td>
                                                        <td>".$cantidad1."</td>
                                                        <td>".$Data['precio']."</td>
                                                        <td>".$Data['precioventa']."</td>
                                                        <td><button id='SelectPurchase' data-id_Purchase='".$Data['idcompra']."'>Editar</button></td>
                                                    </tr>";
    
                                        } elseif (($cantidad2 != 0) && ($cantidad1 === 0)) {
    
                                            echo "<tr>
                                                        <td id='NumberPurchRecord'>".$Data['idcompra']."</td>
                                                        <td>".$Data['idproducto']."</td>
                                                        <td>".$producto."</td>
                                                        <td>".$fechaExpiracion."</td>
                                                        <td>".$cantidad2."</td>
                                                        <td>".$Data['precio']."</td>
                                                        <td>".$Data['precioventa']."</td>
                                                    </tr>";
    
                                        } //else {

                                            //echo "<tr>
                                                        //<td id='NumberPurchRecord'>".$Data['idcompra']."</td>
                                                        //<td>".$Data['idproducto']."</td>
                                                        //<td>".$producto."</td>
                                                        //<td>".$fechaExpiracion."</td>
                                                        //<td>".$cantidad1."</td>
                                                        //<td>".$cantidad2."</td>
                                                        //<td>".$Data['precio']."</td>
                                                        //<td>".$Data['precioventa']."</td>
                                                    //</tr>";

                                        //}
                                                
                                    }

                                } else {
                                    
                                    print_r("<script type='text/javascript'>alert('Ocurrió un error al intentar obtener datos de 'Cantidad' de los productos de la factura.'); </script>");

                                }

                                echo "</table>";

                        }
    
                    } else {
    
                        print_r("<script type='text/javascript'>alert('Ocurrió un error al obtener el identificador de la última factura.'); </script>");
                    
                    }
        
                }
    
            } catch (sqlsrv_Exception $e) {
                
                print_r("Error al obtener la última factura. ");
                die(print_r("Error: "+$e));
    
            }
            
        }
    }
}

SeePurch();

?>