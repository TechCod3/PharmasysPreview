var FacL = document.getElementById("PerInvoiceL");
var NitL = document.getElementById("ByNitL");
var textRefFacNit = document.getElementById("Number_Invoice");

$(document).ready(function(){

    $('#PerInvoice').on('ifChecked', function(){
        $('#ByNit').iCheck('uncheck');
        textRefFacNit.disabled = false;
        FacL.style.color = "white";
        NitL.style.color = "Black";
    })

    $('#PerInvoice').on('ifUnchecked', function(){
        textRefFacNit.disabled = true;
        FacL.style.color = "Black";
    })

    $('#ByNit').on('ifChecked', function(){
        $('#PerInvoice').iCheck('uncheck');
        textRefFacNit.disabled = false;
        NitL.style.color = "White";
        FacL.style.color = "Black";
    })

    $('#ByNit').on('ifUnchecked', function(){
        textRefFacNit.disabled = true;
        NitL.style.color = "Black";
    })
})