$( document ).ready(function() {
    var auJoueur1 = true;
    
    $('td').on('click', function() {
        // Faire une requete ajax au moment du click position du tr, td du click
        if ( !($(this).children('span').hasClass('blanc') || ($(this).children('span').hasClass('noir'))) ) {
            var currentTr = $(this).parent().index();
            var currentTd = $(this).index();

            if (auJoueur1) {
                $(this).children('span').addClass('blanc');
                auJoueur1 = false;
            }
            else {
                $(this).children('span').addClass('noir');
                auJoueur1 = true;
            }

            var data = { 
                currentTr: $(this).parent().index(), 
                currentTd: $(this).index() 
            };

            /* $.post( "index.php", { currentTr: $(this).parent().index(), currentTd: $(this).index() })
            .done(function( data ) {
                console.log(data);
                $('.posTr').append(data.currentTr + ', ');
                $('.posTd').append(data.currentTd + ', ');
            }); */

            $.post('index.php', data , function() {
                /* content.html(response); */
            });
        }
    });

    function removePion (posTr, posTd) {
        var tr = $('tr').eq(posTr);

        tr.children().each( function(index) {
            if (index === posTd) {
                $(this).children('span').removeClass();
            }
        });
    }
});