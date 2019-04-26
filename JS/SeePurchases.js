$(document).ready(function(){

    $('#BSeePurchases').on('click', function(){

        $.ajax({
            type: 'POST',
            url: '../DB/SeePurchases.php',
            data: {'ShowPurchases': 'AllPurchases'}
        })
        .done(function(resultado){
            $('.AppPurchases').html(resultado);
        })
        .fail(function(){
            alert("No se pudo solicitar al servidor mostrar la ultima compra registrada.");
        })
    })

}) 