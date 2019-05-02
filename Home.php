<?php
session_start();
    if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES')
    {
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmasys | Sistema de venta de farmacias.</title>
    <link rel="shorcut icon" href="img/2ffac600bf44b92fb9a3dde19f603ada.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/Bootstrap/bootstrap.min.css">
</head>
<body>
    <container>
    <div class="AppManager">
        <div class="HeaderApp">
            <div class="IcoAppHeader">
                <img class="Logo" src="img/2ffac600bf44b92fb9a3dde19f603ada.png" alt="Pharmasys_Isotipo">
            </div>
            <div class="Functions_App">
            <button type="button" id="To_Sell">Vender</button>
            <button type="button" id="Sales">Ventas</button>
            <button type="button" id="Inventories">Inventarios</button>
            <button type="button" id="Close_the_Box">Cierre de Caja</button>
            <button type="button" id="Orders">Pedidos</button>
            <button type="button" id="Purchases">Compras</button>
            <button type="button" id="Expirations">Vencimientos</button>
            <button type="button" id="Settings">Ajustes</button>
            <button type="button" id="Requests">Ver Solicitudes</button>
            <button type="button" id="Winery_Orders">Pedidos Bodega</button>
            </div>
        </div>
        <div class="Content_Function">
            <div class="Page_function">
                <div class="Function">
                    <div class="TitToFunction">
                        <header id="Title-To-Function">Bienvenido, Daniel</header>
                    </div>
                    <div class="VFunction">
                        <iframe src="InLog.php" id="viewFunction" scrolling="no" frameborder="0">
                        </iframe> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Footer_Page">
        <footer>
            <p id="TextFooter">Pharmasys.online is website design of Pharmacy</p>
        </footer>
    </div>
    <script src="Home.js" type="text/javascript"></script>
</body>
</html>