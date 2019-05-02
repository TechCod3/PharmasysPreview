$(document).on("click", "#SelectPurchase", function() {
    
    var idpurchase = $(this).data("id_purchase");

    $.ajax({
        type: 'POST',
        url: '../DB/SeecantP.php',
        data: {'IdPurchase': idpurchase}
    })
    .done(function(res){
        $('#CantPurchase').val(res);
    })
    .fail(function(){
        alert("Ocurrio un error al solicitar la cantidad para editar al servidor");
    })

    var cant = $('#CantPurchase').val();
    
    if (cant === 0000) {
        
        alert("Ocurrio un error al hacer la procesar los datos de la cantidad comprada del producto");
    }
})