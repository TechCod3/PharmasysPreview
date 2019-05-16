var BToSell = document.getElementById("To_Sell");
var BSales = document.getElementById("Sales");
var BInventories = document.getElementById("Inventories");
var BCloseTheBox = document.getElementById("Close_the_Box");
var BOrders = document.getElementById("Orders");
var BPurchases = document.getElementById("Purchases");
var BExpirations = document.getElementById("Expirations");
var BSettings = document.getElementById("Settings");
var Brequests = document.getElementById("Requests");
var Bwinery_Orders = document.getElementById("Winery_Orders");
var TitleFunction = document.getElementById("Title-To-Function");
var VFunction = document.getElementById("viewFunction");

BToSell.addEventListener("click", StoSell);
function StoSell()
{
    TitleFunction.innerText = "Vender";
    VFunction.setAttribute("src", "Functions/ToSell.php");   
}

BSales.addEventListener("click", SSales);
function SSales()
{
    TitleFunction.innerText = "Ventas";
    VFunction.setAttribute("src", "Functions/Sales.php");
}

BInventories.addEventListener("click", SInventories);
function SInventories()
{
    TitleFunction.innerText = "Inventarios";
    VFunction.setAttribute("src", "Functions/Inventories.html");
}

BCloseTheBox.addEventListener("click", SClosebox);
function SClosebox()
{
    TitleFunction.innerText = "Cierre de Caja";
    VFunction.setAttribute("src", "Functions/CloseTheBox.php");
}

BOrders.addEventListener("click", SOrders);
function SOrders()
{
    TitleFunction.innerText = "Órdenes";
    VFunction.setAttribute("src", "Functions/Orders.php");
}

BPurchases.addEventListener("click", SPurchases);
function SPurchases()
{
    TitleFunction.innerText = "Compras";
    VFunction.setAttribute("src", "Functions/Purchases.php");
}

BExpirations.addEventListener("click", SExpirations);
function SExpirations()
{
    TitleFunction.innerText = "Vencidos";
    VFunction.setAttribute("src", "Functions/Expirations.php");
}

BSettings.addEventListener("click", SSettings);
function SSettings()
{
    TitleFunction.innerText = "Ajustes";
    VFunction.setAttribute("src", "Functions/Settings.php");
}

Brequests.addEventListener("click", SReques);
function SReques()
{
    TitleFunction.innerText = "Solicitudes";
    VFunction.setAttribute("src", "Functions/Requests.php");
}

Bwinery_Orders.addEventListener("click", SwineryO);
function SwineryO()
{
    TitleFunction.innerText = "Pedidos de Bodega";
    VFunction.setAttribute("src", "Functions/WineryOrders.php");
}