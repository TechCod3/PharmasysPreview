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
        var PcantBox = $('#CantfBox').val()
        var PcantBlis = $('#CantfBlis').val()
        
        var Ppurch = $('#PurchaseToProduct').val()
        var Psold = $('#SoldProduct').val()
        var Pstock = $('#MineStockToProduct').val()
        var Pdate = $('#DateToPurchaseProduct').val()
        var Pbox = $('#PricefBox').val()
        var Pblis = $('#PricefBlis').val()
        var Pid = $('#CodeProductNew').val()
        var PidBar = $('#CodeBarNew').val()


        if(!Newprod.checked)
        {
            var id = document.getElementById("idP").innerText;
            var Cantidad = 0;

            if ((!FacCheck.checked) && (NitCheck.checked)){
                    
                Cantidad = 1;
    
            } else{
    
                Cantidad = 2;
            }

            if (Pdate === "") {
                Pdate = "2999-01-01";
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
                        alert("El producto no fue ingresado correctamente.");
                    })

                } else{
                    alert("No cumple con los datos suficientes para ingresar una compra.");  
                }

            } else {
                alert("Cantidad no especifíca a donde ingresar.");
            }

        } 
        
        if (Newprod.checked === true) {

            var Pname = $('#ProductName').val();
            var Pcategoria = $('#CatPN').val();
            var Pcasa = $('#CasPN').val();
            var TipodeCantidad = 0;

            if ((!FacCheck.checked) && (NitCheck.checked)){
                
                TipodeCantidad = 1;

            } else{

                TipodeCantidad = 2;
            }

            if (Pdate === "") {
                Pdate = "2999-01-01";
            }

            if (TipodeCantidad) {
                if((Pdatefact!="")&&(Pprov!="")&&(Pfact!="")&&(Pcant!="")&&(Ppurch!="")&&(Psold!="")&&(Pstock!="")
                &&(Pdate!="")&&(Pname!="")&&(PcantBox!="")&&(PcantBlis!="")&&(Pbox!="")&&(Pblis!="")&&(Pid!="")
                &&(PidBar!="")&&(Pcategoria!="")&&(Pcasa!=""))
                {
                    $.ajax({
                        type: 'POST',
                        url: '../DB/InsertNewProduct.php',
                        data: {'Pcant': Pcant,
                                'Ppurch': Ppurch,
                                'Psold': Psold,
                                'Pstock': Pstock,
                                'Pdate': Pdate,
                                'Pprov': Pprov,
                                'Pfact': Pfact,
                                'Pdatefact': Pdatefact,
                                'Pname': Pname,
                                'PcantBox': PcantBox,
                                'PcantBlis': PcantBlis,
                                'Pbox': Pbox,
                                'Pblis': Pblis,
                                'Pid': Pid,
                                'PidBar': PidBar,
                                'Pcategoria': Pcategoria,
                                'Pcasa': Pcasa,
                                'CantNum': TipodeCantidad}
                    })
                    .done(function(resultado){
                        $(":text").each(function(){
                            $($(this)).val('');
                        })
                        $('#resp').html(resultado);
                    })
                    .fail(function(){
                        alert("El producto nuevo no fue ingresado correctamente.");
                    })

                } else{
                    alert("No cumple con los datos suficientes para ingresar un nuevo producto.");  
                }

            } else {
                alert("Cantidad no especifíca a donde ingresar.");
            }
        }
    })
})