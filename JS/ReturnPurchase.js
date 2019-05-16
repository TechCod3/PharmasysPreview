$(document).on("click", "#ReturnPurchase", function (){

    var TypeInvoice = $('#TypeOfInvoice').html();
    var idpurchase = $('#IDpuchase').val();
    var CantEdit = $('#CantPurchase').val();
    var PricePurch = $('#PricePurchase').val();
    var PriceSold = $('#PriceSold').val();
    var DateExpire = $('#DateExpire').val();
    var idinvoice = $('#idPurchase').html();

    $.ajax({
        type: 'POST',
        url: '../DB/ReturnPurchase.php',
        data: {'IDpurchase': idpurchase,
                'IDfatura': idinvoice,
                'CantEdit': CantEdit}
    })
    .done(function(respuesta){
        alert(respuesta);
    })
    .fail(function(){
        alert("Error al enviar la solicitud al servidor");
    })
})