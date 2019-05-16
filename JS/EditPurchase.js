$(document).on("click", "#ModifyPurchase", function() {

    var TypeInvoice = $('#TypeOfInvoice').html();
    var idpurchase = $('#IDpuchase').val();
    var CantEdit = $('#CantPurchase').val();
    var PricePurch = $('#PricePurchase').val();
    var PriceSold = $('#PriceSold').val();
    var DateExpire = $('#DateExpire').val();

    $.ajax({
        type: 'POST',
        url: '../DB/ModifyPurchase.php',
        data: {'TypeInvoice': TypeInvoice,
                'IDpurchase': idpurchase,
                'NewCant': CantEdit,
                'NewPricePurch': PricePurch,
                'NewPriceSold': PriceSold,
                'NewDateExpire': DateExpire}
    })
    .done(function(respuesta){
        alert(respuesta);
    })
    .fail(function(){
        alert("Error al enviar la solicitud al servidor");
    })
})