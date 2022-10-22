<?php
	require_once 'question.php';

	$tasks = scandir('tasks');

	extract($_POST);

	if (isset($_POST['submit'])) {
		$f = fopen('tasks/'.$_POST['submit'], 'r');
		$text = fgets($f, 4096);
		echo '<form action="question.php" method="post">';
		echo "<div>";
		echo $text;
		echo "</div>";
		echo '<button type="submit" name="submit_theory" value="'.$_POST['submit'].'">Далее</button>';
		echo '</form>';

	} else {
		echo <<<HTML
		<html lang="en">
		<head>
			<title>Выбор сложности</title>
		    <meta charset="UTF-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
		</head>
		<body>
			<main>
			    <form action="levels.php" method="post">
			        <h1>Выбери вопрос!</h1>
			        <div>
		HTML;
						for ($i = 2; $i < count($tasks); $i++) {
							echo "<div>";
							echo $tasks[$i];
							echo "</div>";
							echo '<button type="submit" name="submit" value="'.$tasks[$i].'">Выбрать</button>';
						}
		echo <<<HTML
			        </div>
			    </form>
			</main>
		</body>
		</html>
		HTML;
	}
?>
