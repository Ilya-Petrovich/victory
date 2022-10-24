<?php
	// require_once 'question.php';

	$tasks = scandir('tasks');

	extract($_POST);

	if (isset($_POST['submit_question'])) {
		$i = 0;
		$text = [];
		$f = fopen('tasks/q_'.$_POST['submit_question'], 'r');

		while (!feof($f)) {
			$text[$i] = stream_get_line($f, 100, "\n");
			$i++;
		}
		// echo strlen($text[0]);

		while(! is_numeric($text[0][-1])) {
			// echo "YES";
			$text[0] = substr($text[0], 0, -1);
		}

		fclose($f);

		$file = "";
		$file = $text[0];

		$i = 0;
		$text = [];
		$f = fopen('tasks/'.$file, 'r');

		while (!feof($f)) {
			$text[$i] = fgets($f);
			$i++;
		}

		fclose($f);
	}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat_theory</title>
    <link rel="stylesheet" href="theory/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&family=Inter&family=Roboto&display=swap"
        rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="menu">
                <ul>
                    <li class="menu-item">
                        <a href="levels.php">К выбору уровня</a>
                    </li>
                    <li class="menu-item-one">
                        <a href="..">Мой прогресс</a>
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
    <section class="hat">
        <h1 class="main-title">ТЕОРИЯ</h1>
        <div class="line-image">
            <img src="theory/images/bold line.png" alt="podlozhka">
        </div>
        <div class="first-image">
            <img src="theory/images/main_cat.png" alt="first image">
        </div>
    </section>
    <section class="texts-form">
        <div class="container">
            <div class="info">
<?php
	for ($i = 0; $i < count($text); $i++) {
		if ($text[$i][0] != "$") {
			if ($i == 0) {
				echo '<h1 class="sub-title">'.$text[$i].'</h1>';
				echo '<div class="just-line-image">';
					echo '<img src="theory/images/line.png" alt="line">';
				echo '</div>';
			} else {
				echo '<div class="just-text">';
					echo $text[$i]."<br>";
				echo '</div>';
				// echo '<div class="main-image">';
				// 	echo '<img src="theory/images/main-image.png" alt="main-image">';
				// echo '</div>';
			}
		} else {
			$image = explode("$$", $text[$i])[1];
		}
	}
	echo '<form action="question.php" method="post">';
		echo '<button type="submit" name="submit_theory" value="'.$_POST['submit_question'].'" class="button">Перейти к вопросу</button>';
	echo '</form>';
?>
            </div>
        </div>
    </section>
    <section class="end">
        <div class="end-image">
            <img src="theory/images/end-cat.png" alt="end image">
        </div>
    </section>
</body>
</html>
