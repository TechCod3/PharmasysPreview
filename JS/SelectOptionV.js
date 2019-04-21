var BFactura = document.getElementById("PerInvoice");
var BNit = document.getElementById("ByNit");
var FacL = document.getElementById("PerInvoiceL");
var NitL = document.getElementById("ByNitL");
var textRefFacNit = document.getElementById("Number_Invoice");

BFactura.addEventListener("click", SelFactura);
BNit.addEventListener("click", SelNit);

function SelFactura()
{
    BNit.checked = false;
    if(BFactura.checked)
    {
        textRefFacNit.disabled = false;
        FacL.style.color = "white";
        NitL.style.color = "Black";
    }else{
        textRefFacNit.disabled = true;
        FacL.style.color = "Black";
    }
}

function SelNit()
{
    BFactura.checked = false;
    if(BNit.checked)
    {
        textRefFacNit.disabled = false;
        NitL.style.color = "White";
        FacL.style.color = "Black";
    }else{
        textRefFacNit.disabled = true;
        NitL.style.color = "Black";
    }
}