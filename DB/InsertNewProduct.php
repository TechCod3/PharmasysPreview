<?php
    require_once 'SQLconection.php';

    function insertNewProd(){

        $conn = Conexion();
        $Pname = addslashes($_POST['Pname']);
            $pcant = addslashes($_POST['Pcant']);
            $ppurch = addslashes($_POST['Ppurch']);
            $psold = addslashes($_POST['Psold']);
            $pstock = addslashes($_POST['Pstock']);
            $pdate = addslashes($_POST['Pdate']);
            $pprov = addslashes($_POST['Pprov']);
            $pfact = addslashes($_POST['Pfact']);
            $pdatefac = addslashes($_POST['Pdatefact']);
            $pcantBox = addslashes($_POST['PcantBox']);
            $pcantBlis = addslashes($_POST['PcantBlis']);
            $pbox = addslashes($_POST['Pbox']);
            $pblis = addslashes($_POST['Pblis']);
            $pid = addslashes($_POST['Pid']);
            $pidBar = addslashes($_POST['PidBar']);
            $pidCategoria = addslashes($_POST['Pcategoria']);
            $pidCasa = addslashes($_POST['Pcasa']);
            $Cant = addslashes($_POST['CantNum']);
            
            if(isset(($pid),($pcant), ($ppurch), ($psold), ($pstock), ($pdate), ($pprov), ($pfact), ($pdatefac),
            ($Cant), ($pcantBox), ($pcantBlis), ($pbox), ($pblis), ($pidBar), ($pidCategoria), ($pidCasa)))
            {
                if(($pid) && ($pcant) && ($ppurch) && ($psold) && ($pstock) && ($pdate) && ($pprov) && ($pfact)
                && ($pdatefac) && ($Cant) && ($pcantBox) && ($pcantBlis) && ($pbox) && ($pblis)
                && ($pidBar) && ($pidCategoria) && ($pidCasa))
                {
                    //Codigo para verificar si no hay otro id igual
                    //try {
                        //code...
                    //} catch (\Throwable $th) {
                        //throw $th;
                    //}

                if ($Cant === "1") {

                    $sql = "INSERT INTO tbproducto(idproducto, producto, preciocompra, idcategoria, idcasa, codbarra) VALUES (( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sql1 = "INSERT INTO tbinventario(idsucursal, idproducto, cantidad, precioventa, stock, fecha, ccaja, pcaja, cblister, pblister) VALUES(( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sql2 = "INSERT INTO tbcompra (idfactura, fecha, idproveedor, idproducto, cantidad, precio) VALUES (( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sqlP = array($pid, $Pname, $ppurch, $pidCategoria, $pidCasa, $pidBar);
                    $sqlP1 = array(5, $pid, $pcant, $psold, $pstock, $pdate, $pcantBox, $pbox, $pcantBlis, $pblis);
                    $sqlP2 = array($pfact, $pdatefac, $pprov, $pid, $pcant, $ppurch);
                    
                    $sqlR = sqlsrv_prepare($conn, $sql, $sqlP);
                    $sqlR1 = sqlsrv_prepare($conn, $sql1, $sqlP1);
                    $sqlR2 = sqlsrv_prepare($conn, $sql2, $sqlP2);
    
                        if(($sqlR) && ($sqlR1) && ($sqlR2))
                        {
                            try {
                                $APe = sqlsrv_execute($sqlR);
                                $APe1 = sqlsrv_execute($sqlR1);
                                $APe2 = sqlsrv_execute($sqlR2);

                                for ($i=0; $i < 4; $i++) {
                                    if ($i != 0) {
                                        try {
                                            
                                            $sqlP3 = array($i, $pid, 0, 0, 0, $pdate, 0, 0, 0, 0);
                                            
                                            $sqlR3 = sqlsrv_prepare($conn, $sql1, $sqlP3);

                                            if ($sqlR3) {

                                                try {

                                                    $APe3 = sqlsrv_execute($sqlR3);

                                                } catch (sqlsrv_Exception $e) {
                                                    
                                                    print_r("<script>alert('No se pudo insertar el producto nuevo en las sucursales 1, 2  y 3. = $e'); </script>");

                                                }
                                            }
                                        } catch (sqlsrv_Exception $e) {
                                            print_r("<script>alert('No se pudo insertar el producto nuevo en las demas sucursales. = $e'); </script>");
                                        }
                                    }
                                    
                                }

                                echo "Todo bien prro xd";

                                print_r("<script type='text/javascript'>alert('Proceso terminado correctamente.'); </script>");
                            
                            } catch (sqlsrv_Exception $e){
                                
                                print_r("Error al procesar los cambios en la base de datos, porfavor contacte con el soporte. ");
                                
                                die(print_r($e));

                            }
                        }

                } elseif ($Cant === "2") {

                    $sql = "INSERT INTO tbproducto(idproducto, producto, preciocompra, idcategoria, idcasa, codbarra) VALUES (( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sql1 = "INSERT INTO tbinventario(idsucursal, idproducto, cantidad2, precioventa, stock, fecha, ccaja, pcaja, cblister, pblister) VALUES(( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sql2 = "INSERT INTO tbcompra (idfactura, fecha, idproveedor, idproducto, cantidad2, precio) VALUES (( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sqlP = array($pid, $Pname, $ppurch, $pidCategoria, $pidCasa, $pidBar);
                    $sqlP1 = array(5, $pid, $pcant, $psold, $pstock, $pdate, $pcantBox, $pbox, $pcantBlis, $pblis);
                    $sqlP2 = array($pfact, $pdatefac, $pprov, $pid, $pcant, $ppurch);
                    
                    $sqlR = sqlsrv_prepare($conn, $sql, $sqlP);
                    $sqlR1 = sqlsrv_prepare($conn, $sql1, $sqlP1);
                    $sqlR2 = sqlsrv_prepare($conn, $sql2, $sqlP2);
    
                        if(($sqlR) && ($sqlR1) && ($sqlR2))
                        {
                            try {
                                $APe = sqlsrv_execute($sqlR);
                                $APe1 = sqlsrv_execute($sqlR1);
                                $APe2 = sqlsrv_execute($sqlR2);

                                for ($i=0; $i < 4; $i++) {
                                    if ($i != 0) {
                                        try {
                                            
                                            $sqlP3 = array($i, $pid, 0, 0, 0, $pdate, 0, 0, 0, 0);
                                            
                                            $sqlR3 = sqlsrv_prepare($conn, $sql1, $sqlP3);

                                            if ($sqlR3) {

                                                try {

                                                    $APe3 = sqlsrv_execute($sqlR3);

                                                } catch (sqlsrv_Exception $e) {
                                                    
                                                    print_r("<script>alert('No se pudo insertar el producto nuevo en las sucursales 1, 2  y 3. = $e'); </script>");

                                                }
                                            }
                                        } catch (sqlsrv_Exception $e) {
                                            print_r("<script>alert('No se pudo insertar el producto nuevo en las demas sucursales. = $e'); </script>");
                                        }
                                    }
                                    
                                }

                                echo "Todo bien prro xd";

                                print_r("<script type='text/javascript'>alert('Proceso terminado correctamente.'); </script>");
                            
                            } catch (sqlsrv_Exception $e){
                                
                                print_r("Error al procesar los cambios en la base de datos, porfavor contacte con el soporte. ");
                                
                                die(print_r($e));

                            }
                        }
                    }
                } else {
                    print_r("<script>alert('Faltan algunos caracteres para procesar la compra.'); </script>");
                }

            } else {
                echo "Error al insertar la compra.";
            }
    }
insertNewProd();
?>