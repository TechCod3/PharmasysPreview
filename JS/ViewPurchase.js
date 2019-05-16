$(document).ready(function(){

    $.ajax({
        type: 'POST',
        url: '../DB/SeeDataPurchases.php',
        data: {'DataPurchase': 'AllPurchases'}
    })
    .done(function (resultado){
        $('.DataPurch').html(resultado);
    })
    .fail(function(){
        alert("Ocurrió un error al intentar solicitar los datos de la última factura.");
    })

    $('#BackToHome').on("click", function(){

        window.location.replace("Purchases.php");
    })
})