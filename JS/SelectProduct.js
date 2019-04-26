$(document).on("click", "#BselectIn", function(){

    var IdProd = $(this).data("id_prod");
    var NewProd = document.getElementById("NewProductQuery");

    if (!NewProd.checked) {
        $.ajax({
            type: 'POST',
            url: '../DB/SprodD.php',
            data: {'IdProd': IdProd}
        })
        .done(function(resultado){
            $('#ProductName').val(resultado);
        })
        .fail(function(){
            $('#ProductName').val("No se pudo obtener el producto");
        })
    
        $.ajax({
            type: 'POST',
            url: '../DB/ScatnP.php',
            data: {'IdProd': IdProd}
        })
        .done(function(resultado){
            $('#PricePurch').html(resultado);
        })
        .fail(function(){
            $('#PricePurch').html("No se pudo leer el precio de compra...");
        })
    
        $.ajax({
            type: 'POST',
            url: '../DB/ScatnS.php',
            data: {'IdProd': IdProd}
        })
        .done(function(resultado){
            $('#PriceSold').html(resultado);
        })
        .fail(function(){
            $('#PriceSold').html("Error al leer precio de venta...");
        })
    
        $.ajax({
            type: 'POST',
            url: '../DB/ScantSTK.php',
            data: {'IdProd': IdProd}
        })
        .done(function(resultado){
            $('#StockPL').html(resultado);
        })
        .fail(function(){
            $('#StockPL').html("Error al leer el Stock del Producto...");
        })
    
        $.ajax({
            type: 'POST',
            url: '../DB/SFex.php',
            data: {'IdProd': IdProd}
        })
        .done(function(resultado){
            $('#FexpireL').html(resultado);
        })
        .fail(function(){
            $('#FexpireL').html("Error al leer la fecha de expiración del producto...");
        })
    
        $.ajax({
            type: 'POST',
            url: '../DB/SCP.php',
            data: {'IdProd': IdProd}
        })
        .done(function(resultado){
            $('#Cproduct').html(resultado);
        })
        .fail(function(){
            $('#Cproduct').html("Error al leer la cantidad en Inventario");
        })

        $.ajax({
            type: 'POST',
            url: '../DB/SPBox',
            data: {'IdProd': IdProd}
        })
        .done(function (resultado) {
            $('#ResultPriceBox').html(resultado);
        })
        .fail(function () {
            alert("Error al consultar al servidor el Precio de Caja");
        })
    
        $('#idP').html(IdProd);
    } else {
        alert("No puede agregar una compra si está habilitada la opción para un nuevo producto");
    }
})