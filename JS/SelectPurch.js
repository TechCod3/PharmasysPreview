$(document).on("click", "#SelectPurchase", function() {
    
    var idpurchase = $(this).data("id_purchase");
    var typeInvoice = $('#TypeOfInvoice').html();
    var ModifyPurchase = $('#ModifyPurchase');
    var ReturnPurchase = $('#ReturnPurchase');
    var cantEdit = document.getElementById("CantPurchase");
    var pricepEdit = document.getElementById("PricePurchase");
    var pricesEdit = document.getElementById("PriceSold");
    var dateExpireEdit = document.getElementById("DateExpire");

    $('#IDpuchase').val(idpurchase);

    $.ajax({
        type: 'POST',
        url: '../DB/SeecantP.php',
        data: {'IdPurchase': idpurchase,
                'TypeOfInvoice': typeInvoice}
    })
    .done(function(res){
        $('#CantPurchase').val(res);
        cantEdit.disabled = false;   
    })
    .fail(function(){
        alert("Ocurrio un error al solicitar la cantidad para editar al servidor");
    })

    $.ajax({
        type: 'POST',
        url: '../DB/SeepriceP.php',
        data: {'IdPurchase': idpurchase}
    })
    .done(function(res){
        $('#PricePurchase').val(res);
        pricepEdit.disabled = false;   
    })
    .fail(function(){
        alert("Ocurrio un error al solicitar la cantidad para editar al servidor");
    })

    $.ajax({
        type: 'POST',
        url: '../DB/SeepriceSP.php',
        data: {'IdPurchase': idpurchase}
    })
    .done(function(res){
        $('#PriceSold').val(res);
        pricesEdit.disabled = false;   
    })
    .fail(function(){
        alert("Ocurrio un error al solicitar la cantidad para editar al servidor");
    })

    $.ajax({
        type: 'POST',
        url: '../DB/SeedateP.php',
        data: {'IdPurchase': idpurchase}
    })
    .done(function(res){
        $('#DateExpire').val(res);
        dateExpireEdit.disabled = false;
        ModifyPurchase.prop('disabled', false);
        ReturnPurchase.prop('disabled', false);
    })
    .fail(function(){
        alert("Ocurrio un error al solicitar la cantidad para editar al servidor");
    })

    //Si ocurre algún error en el proceso de búsqueda de datos en el servidor
    $('#CantPurchase').change(function() {
        
        if ($(this).val() === "0000") {
        
            alert("Ocurrio un error al hacer la procesar los datos de la cantidad comprada del producto");
        }
    });
})