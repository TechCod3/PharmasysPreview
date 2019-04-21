$(document).ready(function()
{
    window.onload = function(){
        var fecha = new Date();
        var mes = fecha.getMonth()+1;
        var dia = fecha.getDate();
        var ano = fecha.getFullYear();
        if(dia<10)
          dia='0'+dia;
        if(mes<10)
          mes='0'+mes
        $('#DayToPurchase').val(ano+"-"+mes+"-"+dia);
      }
      
    $('#SearchBoxProduct').on('keyup', function(){
        var search = $('#SearchBoxProduct').val();
        
        $.ajax({
            type: 'POST',
            url: '../DB/SearchProduct.php',
            data: {'search': search}
        })
        .done(function(resultado){
            $('#productoslist').html(resultado);
        })
        .fail(function(){
            $('#productoslist').html('Hubo un error al buscar el producto.');
        })
    })
})