$(document).ready(function()
{
    var search = $('#SearchBoxProduct').val();

    $('input').iCheck({
        checkboxClass: 'icheckbox_flat',
        radioClass: 'iradio_flat'
      });

        var fecha = new Date();
        var mes = fecha.getMonth()+1;
        var dia = fecha.getDate();
        var year = fecha.getFullYear();
        if(dia<10)
          dia='0'+dia;
        if(mes<10)
          mes='0'+mes
        $('#DayToPurchase').val(year+"-"+mes+"-"+dia);
      
    $('#SearchBoxProduct').on('keyup', function(){
        
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