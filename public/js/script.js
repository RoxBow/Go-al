// CONSTANT - Color cases
const BLACK = 1;
const WHITE = 2;
const NOSTONE = 0;

$(document).ready(function () {

    var players = {
        player1: prompt('Choisissez nom player 1'),
        player2: prompt('Choisissez nom player 2')
    }

    $.post('receiverAjax.php', players, function (data) {
        data = JSON.parse(data);
        constructBoard(data.board);
        initNamePlayer(data.player1, data.player2);
    });

});

function initNamePlayer(nameP1, nameP2){
    $('.joueur1').text(nameP1);
    $('.joueur2').text(nameP2);
}

function constructBoard(arrayBoard) {
    var renderBoard = '<table id="game-board">';

    for (var i = 0; i < arrayBoard.length; i++) {
        renderBoard += '<tr>';
        
        for (var j = 0; j < arrayBoard.length; j++) {

            switch (arrayBoard[i][j]) {
                case NOSTONE:
                    renderBoard += '<td> <span class="pion"></span> </td>';
                    break;
                case BLACK:
                    renderBoard += '<td> <span class="pion black"></span> </td>';
                    break;
                case WHITE:
                    renderBoard += '<td> <span class="pion white"></span> </td>';
                    break;
                default:
                    renderBoard += '<td> <span class="pion"></span> </td>';
                    break;
            }

        }

        renderBoard += '</tr>';
    }

    renderBoard += '</table>';

    // Put table in html
    $('.wrapper-goban').html(renderBoard);
}

function updateScore(scoreP1, scoreP2){
    $('#score1').text(scoreP1);
    $('#score2').text(scoreP2);
}

$('.wrapper-goban').on('click', 'table td', function () {
    // piece already on this case
    if (($(this).children('span').hasClass('blanc') || ($(this).children('span').hasClass('noir')))) {
        return false;
    }

    // Faire une requete ajax au moment du click position du tr, td du click
    var positionStone = {
        currentTr: $(this).parent().index(),
        currentTd: $(this).index()
    };

    $.post('receiverAjax.php', positionStone, function (data) {
        data = JSON.parse(data);

        constructBoard(data.table);
        updateScore(data.player1, data.player2);
        $('#turn').text(data.turn);
    });

    $('.joueur1, .joueur2').toggleClass('actif');
});

/* DELETE AFTER DEV */
/* CLICK TO DELETE SESSION */
$('body').on('click', '.kill', function () {
    $.post('index.php', { kill: true }, function () {
        console.log("Kill session");
        location.reload();
    });
});