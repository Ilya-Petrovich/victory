<?php
if (!isset($_COOKIE["username"])) {
	header("Location: index.php");
}
	$tasks = scandir('tasks');
	$questions = [];
	$f = fopen("users/".$_COOKIE["username"].".csv", "r+");
	if ($f) {
		$line = fgets($f, 100);
		rewind($f);
		$info = (explode(';', $line));
	}
	if ($info[1] == 0) {
		// echo "GAME OVER!";
		header("Location: game_over.php");
	}
	if ($info[6] == "11111111111111111111") {
		header("Location: game_over_2.php");
	}
	// for ($i = 0; $i < 10; $i++) {
	// 	echo $info[6][$i]."<br>";
	// }
	// $i = 0;

	foreach ($tasks as $el) {
		if ($el[0] == "q") {
			// $question[i] = $el;
			array_push($questions, substr($el, 2));
			// $i++;
		}
	}

	sort($questions);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&family=Inter&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>Теория</title>
</head>
<body>
    <header class="lvl__head">
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
            <div class="cat-line">
                <p>ТЕОРИЯ</p>
                <img src="images/main_cat 1.png" alt="">
            </div>
            <div class="teory-cards">
				<?php
				for ($i = 0; $i < count($questions); $i++) {
					// $number = (explode('_', $questions[$i]))[1];
					$number = $questions[$i];
					$state = $info[6][$i];

					$id = "";
					$metka = "";

					if ($state == "z") {
						$id = "card-one";
						// $metka = "1";
					}

					if ($state == "1") {
						$id = "card-two";
						// $metka = "2";
					}

					if ($state == "0") {
						$id = "card-three";
						// $metka = "3";
					}
					echo $metka."<br>";
					echo '<form action="theory.php" method="post">';
						echo '<div class="teory-card" id="'.$id.'">';
							echo '<table>';
								echo '<tr>';
									echo '<td>';
										echo '<div class="card__title" style="width:850px">';
											echo "Вопрос ".$number;
										echo '</div>';
										echo '<div class="card__down">';
											echo '<div class="card__questions">';
												if ($state == "z") {
													echo '<button class="theory_b" type="submit" name="submit_question" value="'.$number.'">Теория</button>';
												}
											echo '</div>';
										echo '</div>';
									echo '</td>';
									echo '<td>';
										echo '<img src="images/metka_'.$state.'.png" alt="" style="width:100px; height:100px">';
									echo '</td>';
								echo '</tr>';
							echo '</table>';
						echo '</div>';
					echo '</form';
				}
				?>

			</div>
		</div>
	</header>
</body>
</html>