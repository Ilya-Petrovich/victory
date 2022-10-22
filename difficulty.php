<?php
	// require_once 'levels.php';
	extract($_POST);

	if(isset($_POST['submit_diff'])) {
		if(isset($_POST['difficulty'])) {
			// echo $_POST['difficulty'];

			// here we save difficulty in team's files

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
