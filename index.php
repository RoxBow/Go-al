<?php 

function __autoload($classname) {
    $filename = "./models/". $classname .".php";
    include_once($filename);
}

session_start();

// If game doesn't exist
if(!isset($_SESSION['board']) && 
   !isset($_SESSION['player1']) && 
   !isset($_SESSION['player2']) && 
   !isset($_SESSION['game'])){

    $_SESSION['board'] = new Board(9);
    $_SESSION['player1'] = new Player('White');
    $_SESSION['player2'] = new Player('Black');
    $_SESSION['game'] = new Game($_SESSION['player1'], $_SESSION['player2']);
    $_SESSION['currentBoard'] = null;
};

$board = $_SESSION['board'];

$player1 = $_SESSION['player1'];
$player2 = $_SESSION['player2'];
$game = $_SESSION['game'];

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
    <button class="kill">Reset GAME</button>
    <h1>Jeu de go</h1>

        <div class="wrapper-players">
            <div class="wrapper-player-1">
                <h2 class="joueur1 actif">Joueur 1</h2>
                <p class="score">0</p>
            </div>
            <div class="wrapper-player-2">
                <h2 class="joueur2">Joueur 2</h2>
                <p class="score">0</p>
            </div>
        </div>
        <div class="wrapper-goban">
        <?php 

            if($_SESSION['currentBoard']){
              echo $_SESSION['currentBoard'];
            } else {
                $board->createBoard($board->__get('cases')); 
            }
        ?>
        </div>
    <script src="public/js/jquery-3.3.1.min.js"></script>

    <script>
        
        //let currentPlayer = 1;
    
        $('body').on('click', 'table td', function () {
            // piece already on this case
            if (($(this).children('span').hasClass('blanc') || ($(this).children('span').hasClass('noir')))) {
                return false;
            }

            // Faire une requete ajax au moment du click position du tr, td du click
            var data = {
                currentTr: $(this).parent().index(),
                currentTd: $(this).index()
            };

            $.post('models/updateBoard.php', data, function (data) {
                console.log("Put new piece");
                $('.wrapper-goban table').remove();
                $('.wrapper-goban').append(data);
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