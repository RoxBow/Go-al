$(document).ready(function () {
    
    $('table').on('click','td',function(){
        // piece already on this case
        if(($(this).children('span').hasClass('blanc') || ($(this).children('span').hasClass('noir')))){
            return false;
        }

        // Faire une requete ajax au moment du click position du tr, td du click
        var currentTr = $(this).parent().index();
        var currentTd = $(this).index();

        if (currentPlayer === 1) {
            $(this).children('span').addClass('blanc');
        } else {
            $(this).children('span').addClass('noir');
        }

        var data = {
            currentTr: $(this).parent().index(),
            currentTd: $(this).index()
        };

        $.post('index.php', data, function () {
            console.log('Position send', data);
        });
    });

});


function removePion(posTr, posTd) {
    var tr = $('tr').eq(posTr);

    tr.children().each(function (index) {
        if (index === posTd) {
            $(this).children('span').removeClass();
        }
    });
}