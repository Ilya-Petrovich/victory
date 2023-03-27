<?php
if (!isset($_COOKIE["username"])) {
	header("Location: index.php");
}

$message = 'Выбери котика-инженера!';
// require_once 'levels.php';
extract($_POST);

if (isset($_POST['submit_diff'])) {
	// echo "YES";
	if (isset($_POST['difficulty'])) {
		// echo $_POST['difficulty'];

		// here we save difficulty in team's files
		// echo $_COOKIE["username"];
		$tasks = scandir('users');
		// echo $tasks[2];
		// $line = ""
		$f = fopen("users/" . $_COOKIE["username"] . ".csv", "r+");

		if ($f) {
			$line = fgets($f, 100);
			rewind($f);
			$info = (explode(';', $line));

			// echo $info[1];
			// echo $info[2];

			switch ($_POST['difficulty']) {
				case 1:
					$info[1] = 3;
					$info[2] = 1;
					break;
				case 2:
					$info[1] = 2;
					$info[2] = 2;
					break;
				case 3:
					$info[1] = 1;
					$info[2] = 3;
					break;
			}

			// echo $info[1];
			// echo $info[2];

			$info[3] += 1;
			$info[4] = 0;

			fwrite($f, implode(";", $info));
		}

		fclose($f);
		header('Location: levels.php');

		// fputs($f, )
	} else {
		$message = 'Нужно выбрать уровень сложности!';
		// echo "Нужно выбрать уровень сложности!";
		// echo '<div class="head__title">';
		// 	echo '<div class="title">';
		// 		echo '<h1>Нужно выбрать уровень сложности!</h1>';
		// 	echo '</div>';
		// echo '</div>';
	}
}

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
	<title>Выбор сложности</title>
</head>

<body>

		<header>
			<div class="container">
				<div class="navigation">
					<div class="nav-e">
						<form action="index.php" method="post">
							<button class="exit" type="submit" name="submit_exit">Выйти</button>
						</form>
						<form action="difficulty.php" method="post">
					</div>
				</div>
				<!-- <form -->
				<div class="head__title">
					<div class="title">
						<h1> <?php echo $message; ?> </h1>
						<p class="text__info">Выбирая себе компаньона помни, что от него напрямую зависит сложность прохождения игры и количество набранных за правильные ответы баллов. Внимательно ознакомься с правилами игры.</p>
					</div>
				</div>



				<div class="head__apps">


					<div class="form_radio_btn">
						<input id="radio-1" type="radio" name="difficulty" value="1" style="display:none">
						<label for="radio-1">
							<div class="app" id="app-one">
								<div class="app__title">
									<h2>Начинающий</h2>
									Этот котик только начинает свой путь в энергетике, поэтому у него есть целых три попытки!
								</div>
								<!-- </form> -->
								<div class="app__img">
									<img src="images/point_1.png" alt="">
									<img src="images/point_1.png" alt="">
									<img src="images/point_1.png" alt="">
								</div>
								<div class="app__cat">
									<img src="images/evrika_base 2.png" alt="">
								</div>
							</div>
						</label>
					</div>


					<div class="form_radio_btn">
						<input id="radio-2" type="radio" name="difficulty" value="2" style="display:none">
						<label for="radio-2">
							<div class="app" id="app-two">
								<!-- <form action="difficulty.php" method="post"> -->
								<div class="app__title">
									<!-- <input type="radio" name="difficulty" style="display:none"> -->
									<h2>Продвинутый</h2>
									Если веришь в свои силы, то тебе сюда. Обрати внимание, у тебя всего две попытки!
								</div>
								<div class="app__img">
									<img src="images/point_2.png" alt="">
									<img src="images/point_2.png" alt="">
								</div>
								<div class="app__cat">
									<img src="images/evrika_cool 2.png" alt="">
								</div>
							</div>
						</label>
					</div>


					<div class="form_radio_btn">
						<input id="radio-3" type="radio" name="difficulty" value="3" style="display:none">
						<label for="radio-3">
							<div class="app" id="app-three">
								<div class="app__title">
									<h2>Эксперт</h2>
									Вау! Игра с экспертом по энергетике - это вызов всему миру. У тебя нет права на ошибку...
								</div>
								<div class="app__img">
									<img src="images/point_3.png" alt="">
								</div>
								<div class="app__cat">
									<img src="images/evrika_cosmo 1.png" alt="">
								</div>
							</div>
						</label>
					</div>

				</div>
				<!-- </form> -->
			</div>
		</header>
		<main align="center">
			<div class="container"  align="center" style="margin-left:150px; margin-right:150px">
				<div class="info">
					<p id="info-p">Правила игры</p>
						<p style="text-align:justify">
						Твоя главная задача набрать как можно больше баллов. Их можно заработать отвечая на вопросы, каждый из которых составлен согласно небольшому конспекту. Чем лучше ты изучишь предложенную информацию, тем выше вероятность ответить верно.
						Чтобы заработать больше баллов выбирай более высокую сложность. Однако, чем выше уровень сложности, тем меньше у тебя жизней (актуальное количество отмечается сердечками в твоём профиле). Как только сердечки закончатся баллы обнулятся, а путь придётся начинать сначала.
						</p>
					<p>Структура подсчёта баллов</p>
					Ниже указаны коэффициенты умножения набранных за правильный ответ очков.
					<div class="points">
						<div class="point">
							<div class="point__img">
								<img src="images/point_1.png" alt="">
								<img src="images/point_1.png" alt="">
								<img src="images/point_1.png" alt="">
							</div>
							<p>
								x 1
							</p>
							(начинающий)
						</div>
						<div class="point">
							<div class="point__img">
								<img src="images/point_2.png" alt="">
								<img src="images/point_2.png" alt="">
							</div>
							<p>
								x 2
							</p>
							(продвинутый)
						</div>
						<div class="point">
							<div class="point__img">
								<img src="images/point_3.png" alt="">
							</div>
							<p>
								x 3
							</p>
							(эксперт)
						</div>
					</div>
					Таким образом, пример получения баллов за один и тот же вопрос для разных уровней сложности может выглядеть так: стоимость вопроса — 5 баллов, уровень сложности — средний, итого баллов — 5*2 = 10.
					<div class="last__info">
						Всё просто: копи баллы, учись и </br>совершенствуйся!
					</div>
				</div>
			</div>
		</main>
		<footer class="dif_footer">
			<!-- <form action="difficulty.php" method="post"> -->
			<button class="btn__start" type="submit" name="submit_diff">Я готов к игре!</button>

		</footer>
	</form>
</body>

</html>
