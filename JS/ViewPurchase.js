$(document).ready(function(){

    $.ajax({
        type: 'POST',
        url: '../DB/SeePurchases.php',
        data: {'ShowPurchases': 'AllPurchases'}
    })
    .done(function (resultado){
        $('.RowsDataApp').html(resultado);
        alert("datos enviados");
    })
    .fail(function(){
        alert("Ocurrió un error al intentar solicitar los datos de la última factura.");
    })

    $('#BackToHome').on("click", function(){

        window.location.replace("Purchases.php");

    })
})