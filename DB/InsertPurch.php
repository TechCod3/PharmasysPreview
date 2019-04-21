<?php
    require_once 'SQLconection.php';

    function insertProd(){

        $conn = Conexion();
        $IdP = addslashes($_POST['id']);
            $pcant = addslashes($_POST['Pcant']);
            $ppurch = addslashes($_POST['Ppurch']);
            $psold = addslashes($_POST['Psold']);
            $pstock = addslashes($_POST['Pstock']);
            $pdate = addslashes($_POST['Pdate']);
            $pprov = addslashes($_POST['Pprov']);
            $pfact = addslashes($_POST['Pfact']);
            $pdatefac = addslashes($_POST['Pdatefact']);
            $TypeCant = addslashes($_POST['CantNum']);
            
            if(isset(($IdP),($pcant), ($ppurch), ($psold), ($pstock), ($pdate), ($pprov), ($pfact), ($pdatefac), ($TypeCant)))
            {
                if(($IdP) && ($pcant) && ($ppurch) && ($psold) && ($pstock) && ($pdate) && ($pprov) && ($pfact) && ($pdatefac))
                {

                    try {
                        $c1 = "SELECT cantidad FROM tbinventario WHERE idproducto = '$IdP' AND idsucursal = 5";
                        $qc1 = sqlsrv_query($conn, $c1);

                        if (isset($qc1)) {

                            $Rc1 = sqlsrv_has_rows($qc1);

                            if ($Rc1 === TRUE) {

                                $ResCant1 = sqlsrv_fetch_array($qc1);

                                $resultCant1 = addslashes($ResCant1['cantidad']);

                                $Cant1 = $pcant + $resultCant1;

                            } else {
                                print_r("<script>alert('Error al obtener algun dato de cantidad.'); </script>");
                            }    
                        }
                        
                    } catch (sqlsrv_Exception $e) {
                        print("Hubo un error al obtener la cantidad de invertario del producto.");
                        die(print_r($e));
                    }

                    try {
                        $sqlCant2 = "SELECT cantidad2 FROM tbinventario WHERE idproducto = '$IdP' AND idsucursal = 5";
                        $qc2 = sqlsrv_query($conn, $sqlCant2);

                        if (isset($qc2)) {

                            $Rc2 = sqlsrv_has_rows($qc2);

                            if ($Rc2 === TRUE) {
                                
                                $ResCant2 = sqlsrv_fetch_array($qc2);

                                $resultCant2 = addslashes($ResCant2['cantidad2']);

                                $Cant2 = $pcant + $resultCant2;

                            } else {
                                print_r("<script>alert('Error al obtener algun dato de cantidad 2.'); </script>");
                            }
                        }
                        
                    } catch (sqlsrv_Exception $e) {
                        print("Hubo un error al obtener la cantidad 2 de inventario del producto.");
                        die(print_r($e));
                    }

                if ($TypeCant === "1") {

                    $sql = "UPDATE tbproducto SET preciocompra = ( ?) WHERE idproducto = ( ?)";

                    $sql1 = "UPDATE tbinventario SET cantidad = ( ?), precioventa = ( ?), stock = ( ?), fecha = ( ?) WHERE idproducto = ( ?) AND idsucursal = ( ?)";

                    $sql2 = "INSERT INTO tbcompra (idfactura, fecha, idproveedor, idproducto, cantidad, precio) VALUES (( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sqlP = array($ppurch, $IdP);
                    $sqlP1 = array($Cant1, $psold, $pstock, $pdate, $IdP, 5);
                    $sqlP2 = array($pfact, $pdatefac, $pprov, $IdP, $pcant, $ppurch);
                    
                    $sqlR = sqlsrv_prepare($conn, $sql, $sqlP);
                    $sqlR1 = sqlsrv_prepare($conn, $sql1, $sqlP1);
                    $sqlR2 = sqlsrv_prepare($conn, $sql2, $sqlP2);
    
                        if(($sqlR) && ($sqlR1) && ($sqlR2))
                        {
                            try {
                                $APe = sqlsrv_execute($sqlR);
                                $APe1 = sqlsrv_execute($sqlR1);
                                $APe2 = sqlsrv_execute($sqlR2);
        
                                echo "Todo bien prro xd";
                                printf("<script type='text/javascript'>alert('Todo bien prro xd')</script>");
                            } catch (sqlsrv_Exception $e){
                                print("Error al procesar los cambios en la base de datos, porfavor contacte con el soporte. ");
                                die(print_r($e));
                            }
                        }

                } elseif ($TypeCant === "2") {

                    $sql = "UPDATE tbproducto SET preciocompra = ( ?) WHERE idproducto = ( ?)";

                    $sql1 = "UPDATE tbinventario SET cantidad2 = ( ?), precioventa = ( ?), stock = ( ?), fecha = ( ?) WHERE idproducto = ( ?) AND idsucursal = ( ?)";

                    $sql2 = "INSERT INTO tbcompra (idfactura, fecha, idproveedor, idproducto, cantidad2, precio) VALUES (( ?), ( ?), ( ?), ( ?), ( ?), ( ?))";

                    $sqlP = array($ppurch, $IdP);
                    $sqlP1 = array($Cant2, $psold, $pstock, $pdate, $IdP, 5);
                    $sqlP2 = array($pfact, $pdatefac, $pprov, $IdP, $pcant, $ppurch);
                    
                    $sqlR = sqlsrv_prepare($conn, $sql, $sqlP);
                    $sqlR1 = sqlsrv_prepare($conn, $sql1, $sqlP1);
                    $sqlR2 = sqlsrv_prepare($conn, $sql2, $sqlP2);
    
                        if(($sqlR) && ($sqlR1) && ($sqlR2))
                        {
                            try {
                                $APe = sqlsrv_execute($sqlR);
                                $APe1 = sqlsrv_execute($sqlR1);
                                $APe2 = sqlsrv_execute($sqlR2);
        
                                echo "Todo bien prro xd";
                                printf("<script type='text/javascript'>alert('Todo bien prro xd')</script>");
                            } catch (sqlsrv_Exception $e){
                                print("Error connecting to SQL Server.");
                                die(print_r($e));
                            }
                        }
                }

                }

            } else {
                echo "No todo bien prro :c";
            }
    }
insertProd();
?>