$(document).ready(function()
{
    $('#BaddProduct').on('click', function()
    {
        var Newprod = document.getElementById("NewProductQuery");
        var FacCheck = document.getElementById("PerInvoice");
        var NitCheck = document.getElementById("ByNit");

        var Pprov = $('#Providers').val()
        var Pfact = $('#Number_Invoice').val()
        var Pdatefact = $('#DayToPurchase').val()
        
        var Pcant = $('#CantToProduct').val()
        
        var Ppurch = $('#PurchaseToProduct').val()
        var Psold = $('#SoldProduct').val()
        var Pstock = $('#MineStockToProduct').val()
        var Pdate = $('#DateToPurchaseProduct').val()

        if(!Newprod.checked)
        {
            var id = document.getElementById("idP").innerText;
            var Cantidad = 0;

            if ((!FacCheck.checked) && (NitCheck.checked)){
                
                Cantidad = 1;

            } else{

                Cantidad = 2;
            }

            if (Cantidad) {
                if((Pdatefact!="")&&(Pprov!="")&&(Pfact!="")&&(Pcant!="")&&(Ppurch!="")&&(Psold!="")&&(Pstock!="")&&(Pdate!=""))
                {
                    $.ajax({
                        type: 'POST',
                        url: '../DB/InsertPurch.php',
                        data: {'Pcant': Pcant,
                                'Ppurch': Ppurch,
                                'Psold': Psold,
                                'Pstock': Pstock,
                                'Pdate': Pdate,
                                'Pprov': Pprov,
                                'Pfact': Pfact,
                                'Pdatefact': Pdatefact,
                                'id': id,
                                'CantNum': Cantidad}
                    })
                    .done(function(resultado){
                        $(":text").each(function(){
                            $($(this)).val('');
                        })
                        $('#resp').html(resultado);
                    })
                    .fail(function(){
                        alert("El producto no fue ingresado correctamente");
                    })

                } else{
                    alert("No cumple con los datos suficientes para ingresar un producto");  
                }

            } else {
                alert("Cantidad no especifíca a donde ingresar");
            }

        } else if (Newprod.checked) {

            alert("Usted se esta a punto de procesar un nuevo producto a su inventario y bodega.");
            
        }
    })
})