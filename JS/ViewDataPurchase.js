$(document).ready(function (){

    //Search for ultimate invoice
    var enter = 13;

    $.ajax({
        type: 'POST',
        url: '../DB/SeeProductsPurchase.php',
        data: {'TypeInvoice': 'TypeOfInvoice'}
    })
    .done(function (resultado){
        $('#DataForInvoice').html(resultado);
    })
    .fail(function (){
        $('#DataForInvoice').html("Ocurrió un error al solicitar los productos de la factura al servidor.");
    })
    
    //Search Productos for Invoice insert
    $('#SearchBox').keyup(function (search) {
        
        if (search.which === enter) {
            
            var factura = $(this).val();
            
            $.ajax({
                type: 'POST',
                url: '../DB/SeeDataPurchases.php',
                data: {'DataPurchase': 'AllPurchases',
                        'IDfactura': factura}
            })
            .done(function (resultado){
                $('.DataPurch').html(resultado);
            })
            .fail(function (){
                $('.DataPurch').html("Ocurrió un error al solicitar los productos de la factura al servidor.");
            })

            $.ajax({
                type: 'POST',
                url: '../DB/SeeProductsPurchase.php',
                data: {'TypeInvoice': 'TypeOfInvoice',
                        'IDfactura': factura}
            })
            .done(function (resultado){
                $('#DataForInvoice').html(resultado);
            })
            .fail(function (){
                $('#DataForInvoice').html("Ocurrió un error al solicitar los productos de la factura al servidor.");
            })
        }
    })
})