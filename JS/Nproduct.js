var d = document.getElementById("DtProduct");
    var d1 = document.getElementById("Oprod");
    var tname = document.getElementById("ProductName");
    var Cn = document.getElementById("NewProductQuery");
    var d2 = document.getElementById("NpQ");
    var d3 = document.getElementById("SearchBoxProduct");

$(document).ready(function()
{
        if(Cn.checked){
            d.hidden = false;
            d1.hidden = false;
            tname.disabled = false;
            d2.style.fontWeight = "bold";
            d3.disabled = true;
        } else{
            d.hidden = true;
            d1.hidden = true;
            tname.disabled = true;
            d2.style.fontWeight = "400";
            d3.disabled = false;
        }

        $.ajax({
            type: 'POST',
            url: '../DB/IDforProductNew.php',
            data: {'RequesID': 'Search'}
        })
        .done(function (resultado) {
            alert(resultado);
            //$('#CodeProductNew').val(resultado);
        })
        .fail(function(){
            alert("Ocurrió un error al solicitar al servidor un id automático para el nuevo producto");
        })
})

$('#NewProductQuery').on('click', function()
{
    if(Cn.checked){
        d.hidden = false;
        d1.hidden = false;
        tname.disabled = false;
        d2.style.fontWeight = "bold";
        d3.disabled = true;
    } else{
        d.hidden = true;
        d1.hidden = true;
        tname.disabled = true;
        d2.style.fontWeight = "400";
        d3.disabled = false;
    }
    
    $.ajax({
        type: 'POST',
        url: '../DB/IDforProductNew.php',
        data: {'RequesID': 'Search'}
    })
    .done(function (resultado) {
        alert(resultado);
        //$('#CodeProductNew').val(resultado);
    })
    .fail(function(){
        alert("Ocurrió un error al solicitar al servidor un id automático para el nuevo producto");
    })
})  