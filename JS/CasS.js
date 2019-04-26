$(document).ready(function()
{
    $.ajax({
        type: 'POST',
        url: '../DB/CasS.php',
        data: {'Qlist': 'list_s'}
    })
    .done(function(resultado){
        $('#CasPN').html(resultado);
    })
    .fail(function(){
        alert("No se pudieron cargar las listas de 'Casa'");
    })
})