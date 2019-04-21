$(document).ready(function()
{
    $.ajax({
        type: 'POST',
        url: '../DB/CatS.php',
        data: {'Qlist': 'list_s'}
    })
    .done(function(resultado){
        $('#CatPN').html(resultado);
    })
    .fail(function(){
        alert("No se pudieron cargar las listas de 'Casa'");
    })
})