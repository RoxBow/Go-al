
function removePion(posTr, posTd) {
    var tr = $('tr').eq(posTr);

    tr.children().each(function (index) {
        if (index === posTd) {
            $(this).children('span').removeClass();
        }
    });
}