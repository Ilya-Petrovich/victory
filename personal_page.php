<?php
	// $tasks = scandir('tasks');
	// $i = 0;
	// $questions = [];

	$f = fopen("users/".$_COOKIE["username"].".csv", "r+");

	if ($f) {
		$line = fgets($f, 100);
		rewind($f);
		$info = (explode(';', $line));

		$score = $info[4];
		// echo $info[6]."<br>";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats_energy</title>
    <link rel="stylesheet" href="../Project_cat/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&family=Inter&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="menu">
                <ul>
                    <li class="menu-item-one">
                        <a href="levels.php">К выбору уровня</a>
                    </li>
                    <li class="menu-item-two">
						<form action="index.php" method="post">
                        	<button type="submit" name="submit_exit">Выйти</button>
						</form>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="container">
            <div class="info">
                <h1 class="info-title">ИМЯ КОТЁНКА</h1>
                <div class="info-image">
                    <img src="../Project_cat/image/avatar.png" alt="background">
                </div>
                <div class="info-cat">
                    <img src="../Project_cat/image/comp_base.png" alt="main-cat">
                </div>
                <div class="lifes-image">
                    <img src="../Project_cat/image/lifes.png" alt="lifes">
                </div>
                <div class="top">
                    <h3 class="my-point">Мой счёт</h3>
					<?php echo '<h3 class="point">'.$score.'</h3>'; ?>
                    <h3 class="leaders">Таблица лидеров</h3>
                    <div class="top-image">
                        <img src="../Project_cat/image/1.png" alt="first">
                        <img src="../Project_cat/image/2.png" alt="second">
                        <img src="../Project_cat/image/3.png" alt="third">
                        <div class="skip">
                            <img src="../Project_cat/image/propusk.png" alt="propusk">
                        </div>
                        <img src="../Project_cat/image/defolt.png" alt="defolt">
                    </div>
                </div>
                <div class="action">
                    <button class="button">Попробовать ещё раз!</button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>