<?php 


require_once('models/Player.php');
require_once('models/Game.php');
require_once('models/Board.php');
require_once('models/Stone.php');

//$board = new monBoard(9);

session_start();
if(!$_SESSION['board'] && 
   !$_SESSION['player1'] && 
   !$_SESSION['player2'] && 
   !$_SESSION['game']){

    $_SESSION['board'] = new Board(9);
    $_SESSION['player1'] = new Player('Elmar');
    $_SESSION['player2'] = new Player('Bendo');
    $_SESSION['game'] = new Game($_SESSION['player1'], $_SESSION['player2']);
    $_SESSION['currentBoard'] = null;
};

$board = $_SESSION['board'];
$player1 = $_SESSION['player1'];
$player2 = $_SESSION['player2'];
$game = $_SESSION['game'];

// When user play a piece
if(isset($_POST["currentTr"]) && isset($_POST["currentTd"])){
    $board->addPositionPion( new Stone(0, intval($_POST["currentTd"]), intval($_POST["currentTr"])) );
    $game->changePlayerTurn();
    $_SESSION['currentBoard'] = $board->updateBoard($board->__get("position"));
}

// destroy session
if(isset($_POST["kill"])){
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jeu de go</title>

    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <button class="kill">Reset session</button>
    <h1>Jeu de go</h1>
    <div class="wrapper-goban">
        <div class="container-goban">
            <?php 

                if($_SESSION['currentBoard']){
                echo $_SESSION['currentBoard'];
                } else {
                    $board->createBoard($board->__get('cases')); 
                }
            ?>
        </div>
    </div>

    <script src="public/js/jquery-3.3.1.min.js"></script>

    <script>
        
        //let currentPlayer = 1;

        $('table').on('click', 'td', function () {
            // piece already on this case
            if (($(this).children('span').hasClass('blanc') || ($(this).children('span').hasClass('noir')))) {
                return false;
            }

            // if (currentPlayer === 1) {
            //     $(this).children('span').addClass('blanc');
            // } else {
            //     $(this).children('span').addClass('noir');
            // }

            // Faire une requete ajax au moment du click position du tr, td du click
            var data = {
                currentTr: $(this).parent().index(),
                currentTd: $(this).index()
            };

            $.post('index.php', data, function (data) {
                $('.container-goban').html(data);
            });
        });

        /* DELETE AFTER DEV */
        /* CLICK TO DELETE SESSION */
        $('body').on('click', '.kill', function () {
            $.post('index.php', {kill: true}, function () {
                console.log("Kill session");
            });
        });
    </script>

    <script src="public/js/script.js"></script>
</body>
</html>