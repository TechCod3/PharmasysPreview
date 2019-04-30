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
        
                            $Qsql1 = sqlsrv_query($conn, $sql1);
                            $NRsql1 = sqlsrv_has_rows($Qsql1);
        
                            if ($NRsql1 === TRUE) {

                                echo "<table id='DataForInvoice'>
                                                <tr>
                                                    <th id='PurchRecord'>Registro de Compra</th>
                                                    <th>ID</th>
                                                    <th>Producto</th>
                                                    <th>Fecha</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio de Compra</th>
                                                    <th>Precio de Venta</th>
                                                </tr>";
    
                                while ($Data = sqlsrv_fetch_array($Qsql1)) {

                                            echo "<tr>
                                                    <td id='NumberPurchRecord'>".$Data['idcompra']."</td>
                                                    <td>".$Data['idproducto']."</td>
                                                    <td>".$Data['producto']."</td>
                                                    <td>".$Data['fecha']->format('d/m/Y')."</td>
                                                    <td>".$Data['cantidad']."</td>
                                                    <td>".$Data['precio']."</td>
                                                    <td>".$Data['precioventa']."</td>
                                                </tr>";
                                }

                                echo "</table>";

                                //<td>".$Data['categoria']."</td>
                                //<td>".$Data['casa']."</td>
                                //<td>".$Data['cantidad2']."</td>
    
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