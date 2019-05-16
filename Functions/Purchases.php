<?php
require_once '../DB/SQLconection.php';
$conn = Conexion();
$Rproviders = sqlsrv_query($conn, "SELECT * FROM tbproveedor ORDER BY proveedor");
@$SP[proveedor] = '--proveedor--';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmasys | Compras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" href="../img/2ffac600bf44b92fb9a3dde19f603ada.png">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/Purchases.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../JS/skins/all.css">
    <script type="text/javascript" src="../JS/jquery.min.js"></script>
    <script type="text/javascript" src="../JS/icheck.js"></script>
</head>
<body>
    <div class="AppPurchases">
        <div class="MainOptionsP">
            <button id="BSeePurchases" type="button">Ver Compras</button>
            <button id="BSaldos" type="button">Saldos</button>
            <div class="MainProviders">
                <form id="ListProvidersF" method="post">
                    <select id="Providers" name="Providers">
                        <option id="PrimaryOption" disabled selected><?php echo @$SP['proveedor'];?></option>
                            <?php
                            while($ListProviders = sqlsrv_fetch_array($Rproviders)){
                                echo '<option value='.$ListProviders[idproveedor].'>'.$ListProviders[proveedor].'</option>';
                            }
                            ?>
                    </select>
                </form>
            </div>
            <div class="MainTypePurchases">
                <div>
                    <input id="PerInvoice" type="checkbox">
                    <label id="PerInvoiceL" for="PerInvoice">Factura</label>
                </div>
                <div>
                    <input id="ByNit" type="checkbox">
                    <label id="ByNitL" for="ByNit">NIT</label>
                </div>
            </div>
            <div class="NumInvoice">
                <input id="Number_Invoice" type="text" placeholder="No. Factura / NIT" disabled>
            </div>
            <script async type="text/javascript" src="../JS/SelectOptionV.js"></script>
            <div>
                <input id="DayToPurchase" type="date">
            </div>
        </div>
        <div class="SecondaryOptionsRequest">
            <div class="ProductNewInsertQuery">
                <label for="NewProductQuery" id="NpQ">¿Producto Nuevo?</label>
                <input id="NewProductQuery" type="checkbox">
                <label id="idP" hidden></label>
            </div>
            <div class="SearchProd">
                <div class="SearchProductList">
                    <input id="SearchBoxProduct" type="search" placeholder="Buscar producto...">
                </div>
                    <div id="productoslist">
                    </div>
            </div>
            <div class="DataInsertProduct">
                    <div class="DataProduct" id="DtProduct" hidden>
                        <div class="CodeN">
                            <label for="CodeProductNew">Código: </label>
                            <input id="CodeProductNew" type="number" placeholder="0" min="0">
                        </div>
                        <div class="CodeBN">
                            <label for="CodeBarNew">Código de barras: </label>
                            <input id="CodeBarNew" type="number" placeholder="0" min="0">
                        </div>
                    </div>
                    <div class="NaO">
                        <div class="NameProduct">
                            <label for="ProductName" id="PNL">Producto: </label>
                            <input id="ProductName" type="text" placeholder="Nombre del producto a ingresar...">
                        </div>
                        <div class="OpProd" id="Oprod" hidden>
                            <label for="CatPN">Categoria: </label>
                            <Select id="CatPN">
                                <option value="" disabled selected>--Seleccione--</option>
                            </Select>
                            <label for="CasPN">Casa: </label>
                            <select id="CasPN">
                                <option value="" disabled selected>--Seleccione--</option>
                            </select>
                        </div>
                    </div>
                    <div class="CantProduct">
                        <label for="CantToProduct">Cantidad a ingresar: </label>
                        <input id="CantToProduct" type="number" placeholder="0" min="0">
                        <br>
                        <label id="Cproduct">No hay cantidad actual</label>
                        </br>
                    </div>
                    <div class="PurchaseProduct">
                        <label id="Purch">Precio de Compra: </label>
                        <input id="PurchaseToProduct" type="number" placeholder="0" min="0">
                        <input id="CheckPurchaseProduct" type="checkbox">
                        <br>
                        <label id="PricePurch">No hay Precio Actual</label>
                        </br>
                    </div>
                    <div class="SoldProducts">
                        <label id="Sold">Precio de venta: </label>
                        <input id="SoldProduct" type="number" placeholder="0" min="0">
                        <br>
                        <label id="PriceSold">No hay Precio Actual</label>
                        </br>
                    </div>
                    <div class="MineStockProduct">
                        <label for="MineStockToProduct">Stock Mínimo: </label>
                        <input id="MineStockToProduct" type="number" placeholder="0" min="0">
                        <br>
                        <label id="StockPL">No hay Stock actual</label>
                        </br>
                    </div>
                    <div class="DateExpireProduct">
                        <label for="DateToPurchaseProduct">Fecha de vencimiento: </label>
                        <input id="DateToPurchaseProduct" type="date">
                        <br>
                        <label id="FexpireL">Fecha de vencimiento actual</label>
                        </br>
                    </div>
                    <div class="DatExtNewProd">
                        <div class="DatBoxNewProd">
                            <div class="PriceBox">
                                <label>Precio de Caja: </label>
                                <input id="PricefBox" type="number" placeholder="0">
                                <br>
                                <label id="ResultPriceBox">No hay precio de Caja</label>
                                </br>
                            </div>
                            <div class="CantBox">
                                <label>Cantidad de Caja: </label>
                                <input id="CantfBox" type="number" placeholder="0">
                                <br>
                                <label id="ResultCantBox">No hay cantidad de Caja</label>
                                </br>
                            </div>
                        </div>
                        <div class="DatBlisNewProd">
                            <div class="PriceBlis">
                                <label>Precio de Blister: </label>
                                <input id="PricefBlis" type="number" placeholder="0">
                                <br>
                                <label id="ResultPriceBlis">No hay precio de Blister</label>
                                </br>
                            </div>
                            <div class="CantBlis">
                                <label>Cantidad de Blister: </label>
                                <input id="CantfBlis" type="number" placeholder="0">
                                <br>
                                <label id="ResultCantBlis">No hay cantidad de Blister</label>
                                </br>
                            </div>
                        </div>
                    </div>
                    <div class="AddProduct">
                        <button id="BaddProduct" type="button">Agregar Producto</button>
                    </div>
                    <label id="resp"></label>
            </div>
    <script type="text/javascript" src="../JS/Search.js"></script>
    <script type="text/javascript" src="../JS/SelectProduct.js"></script>
    <script type="text/javascript" src="../JS/InsertProd.js"></script>
    <script type="text/javascript" src="../JS/Cpcant.js"></script>
    <script type="text/javascript" src="../JS/CasS.js"></script>
    <script type="text/javascript" src="../JS/CatS.js"></script>
    <script type="text/javascript" src="../JS/Nproduct.js"></script>
    <script type="text/javascript" src="../JS/SeePurchases.js"></script>
</body>
</html>