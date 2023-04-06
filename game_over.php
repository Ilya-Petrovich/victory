<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&family=Inter&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/game_over_style.css">
    <title>Конец игры</title>
</head>
<body>
    <header class="head__hard" style="width:100%; height:100%">
        <div class="container">
            <div class="navigation">
                <div class="nav__left">
                    <!-- <a href=".." class="home">На главную</a> -->
                    <a href="personal_page.php">Мой прогресс</a>
                </div>
				<form action="index.php" method="post">
					<button class="exit" type="submit" name="submit_exit">Выйти</button>
				</form>
            </div>
            <div class="end__title">
                GAME OVER
            </div>
            <div class="end__text">
                Упс! Игра окончена, но это лишь повод ещё лучше усвоить пройденный материал. </br> Повторение - мать учения, не сдавайся!
            </div>
            <div class="end__img">
                <img src="images/sad_cosmo 1.png" alt="">
            </div>
            <!-- <div class="btn__restart">
                <a href="">Попровать снова</a>
            </div> -->
        </div>
    </header>
</body>
</html>