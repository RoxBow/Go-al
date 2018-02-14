$( document ).ready(function() {
    var auJoueur1 = true;
    
    $('td').on('click', function() {
        console.log('dans click')
        if ( !($(this).children('span').hasClass('blanc') || ($(this).children('span').hasClass('noir'))) ) {
            if (auJoueur1 == true) {
                $(this).children('span').addClass('blanc');
                auJoueur1 = false;
            }
            else {
                $(this).children('span').addClass('noir');
                auJoueur1 = true;
            }
        }
    });
});