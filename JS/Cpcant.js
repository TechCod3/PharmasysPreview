var cant = document.getElementById("PricePurch");
var vent = document.getElementById("PriceSold");
var stok = document.getElementById("StockPL");
var Ccant = document.getElementById("CheckPurchaseProduct");

Ccant.addEventListener("click", CPc);

function CPc(){

    if(Ccant.checked){

        if ((cant.innerHTML != "--------") && (cant.innerHTML != "") && (cant.innerHTML != "No hay Precio Actual")
            && (vent.innerHTML != "--------") && (vent.innerHTML != "") && (vent.innerHTML != "No hay Precio Actual")
            && (stok.innerHTML != "--------") && (stok.innerHTML != "") && (stok.innerHTML != "No hay Stock actual")) {

            var n = cant.innerHTML.substring(26, 36);
            var n1 = vent.innerHTML.substring(25, 35);
            var n2 = stok.innerHTML.substring(27, 37);
            
            $('#PurchaseToProduct').val(n);
            $('#SoldProduct').val(n1);
            $('#MineStockToProduct').val(n2);

        } else{

            alert("NO HAY DATOS ANTERIORES PARA COPIAR");

            Ccant.checked = false;
        } 
    } else{

        $('#PurchaseToProduct').val('');
        $('#SoldProduct').val('');
        $('#MineStockToProduct').val('');
        
    }
}

    