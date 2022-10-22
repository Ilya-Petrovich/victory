<?php
	// require_once 'levels.php';
	extract($_POST);

	if(isset($_POST['submit_diff'])) {
		if(isset($_POST['difficulty'])) {
			// echo $_POST['difficulty'];

			// here we save difficulty in team's files
			// echo $_COOKIE["username"];
			$tasks = scandir('users');
			// echo $tasks[2];
			// $line = ""
			$f = fopen("users/".$_COOKIE["username"].".csv", "r+");

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

				fwrite($f, implode(";", $info));
			}

			fclose($f);
			header('Location: levels.php');

			// fputs($f, )
		} else {
			echo "Нужно выбрать уровень сложности!";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Выбор сложности</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
</head>
<body>
	<main>
	    <form action="difficulty.php" method="post">
	        <h1>Выбери котика-инженера!</h1>
	        <div>
				<label for="difficulty_1">Начинающий</label>
				<input type="radio" name="difficulty" value="1">
				<img src="diff_1.jpg" style="width:32px; height:33px; cursor:pointer; vertical-align:bottom;">
	            <label for="difficulty_2">Продвинутый</label>
				<input type="radio" name="difficulty" value="2">Выбрать</button>
	            <label for="difficulty_3">Эксперт</label>
				<input type="radio" name="difficulty" value="3">Выбрать</button>
	        </div>
			<button type="submit" name="submit_diff">Выбрать</button>
	    </form>
	</main>
</body>
</html>
