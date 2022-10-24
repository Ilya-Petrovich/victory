<?php
	extract($_POST);

	// echo "YES";
	// echo $_POST['submit_theory'];
	$f_info = fopen("users/".$_COOKIE["username"].".csv", "r+");

	if ($f_info) {
		$line = fgets($f_info, 100);
		rewind($f_info);
		$info = (explode(';', $line));
	}

	$lives = $info[1];

	if (isset($_POST['submit_theory'])) {
		$f = fopen('tasks/q_'.$_POST['submit_theory'], 'r');
	}

	if (isset($_POST['submit_answer'])) {
		$f = fopen('tasks/q_'.$_POST['number'], 'r');
	}


	// $text = fgets($f, 4096);
	$text = [];
	$i = 0;

	while (!feof($f)) {
		$text[$i] = fgets($f);
		$i++;
	}
	// if (isset($_POST['submit_theory'])) {
	//
	// 	for ($i = 1; $i < count($text); $i++) {
	// 		if ($text[$i][0] != "$") {
	// 			echo $text[$i]."<br>";
	// 			// echo "\n";
	// 		} else {
	// 			// echo $text[$i]."<br>";
	// 			$image = explode("$$", $text[$i])[1];
	// 			// echo $image;
	// 			echo '<img src="tasks/'.$image.'">';
	// 		}
	// 	}
	//
	// 	// echo '<form action="question.php" method="post">';
	// 	// echo "<div>";
	// 	// echo "Вопрос";
	// 	// echo $text;
	// 	// echo "</div>";
	// 	// echo '<button type="submit" name="submit_question" value="'.$_POST['submit_question'].'">Ответить</button>';
	// 	// echo '</form>';
	//
	// 	// echo $text;
	// }

	// if (isset($_POST['submit_question'])) {
	// 	echo "CHECKING";
	// }
	// echo
	foreach ($text as $line) {
		if ($line[0] == "+") {
			$correct = substr($line, 1);
		}
	}
	// $correct = $text[5];

	foreach ($_POST as $element) {
		echo "^".$element."^"."<br";
	}

	// if (isset($_POST['submit_answer'])) {
	// 	echo "=".$correct."<br>";
	// 	echo "=".$_POST['answer']."<br>";
	// 	if ($_POST['answer'] == $correct) {
	// 		echo "CORRECT!";
	// 	} else {
	// 		echo "NOT CORRECT!";
	// 	}
	// }
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
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="levels/style.css">
    <title>Тестирование</title>
</head>
<body>
    <header class="lvl__head">
        <div class="container">
            <div class="navigation">
                <div class="nav__left">
                    <a href="levels.php" class="home">К выбору уровня</a>
                    <a href="">Мой прогресс</a>
                </div>
                <a href="" class="exit">Выйти</a>
            </div>
            <div class="cat-line">
                <p>ТЕСТИРОВАНИЕ</p>
                <img src="/images/main_cat 1.png" alt="">
            </div>
            <div class="test-info">
                Закрепим пройденный материал. За каждый правильный ответ ты получаешь баллы, за неверный - теряешь сердечки. Будь внимателен!
            </div>
            <div class="health-line">
                КОЛИЧЕСТВО ПОПЫТОК:
				<?php
					for ($i = 0; $i < $lives; $i++) {
	                	echo '<img src="levels/images/point_'.$lives.'.png" alt="">';
					}
				?>
            </div>
            <div class="slider-block">
                <div class="slider">
                    <div class="owl-carousel owl-theme">
                        <div class="slide">
							<form action="question.php" method="post">
                            <div class="slide__title">
								<?php echo $text[1]; ?>
                            </div>
                            <div class="slide__question">
                                <div class="img">
                                    <img src="levels/images/Котик новичок.png" alt="">
                                </div>
                                <div class="question__marks">
									<?php
										for ($i = 0; $i < 7; $i++) {
											if ($text[$i][0] == "=") {
												echo '<div class="mark">';
			                                    	echo '<label class="label-light"><input type="radio" name="answer" value="'.substr($text[$i], 1).'" class="input-light">'.substr($text[$i], 1).'</label>';
			                                    echo '</div>';
												// echo substr($text[$i], 1);
											}
										}
										// echo '<input type="text" name="number" value="'.$_POST['submit_theory'].'" style="display:none"';
									?>
                                </div>
                            </div>
							<div>
								<button type="submit" name="submit_answer">Ответить</button>
							</div>
							</form>
                        </div>
                        <div class="slide">
                            <div class="slide__title">
                                Какой диэлектрик определяет </br> электрическую прочность внешней</br> изоляции(Н2)?
                            </div>
                            <div class="slide__question">
                                <div class="img">
                                    <img src="/images/Котик новичок.png" alt="">
                                </div>
                                <div class="question__marks">
                                    <div class="mark">
                                        <label class="label-light"><input type="radio" class="input-light">Неверный вариант ответа.</label>
                                    </div>
                                    <div class="mark">
                                        <label class="label-light"><input type="radio" class="input-light">Неверный вариант ответа.</label>
                                    </div>
                                    <div class="mark">
                                        <label class="label-light"><input type="radio" class="input-light">Атмосферный воздух.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide__title">
                                Какой диэлектрик определяет </br> электрическую прочность внешней</br> изоляции(Н2)?
                            </div>
                            <div class="slide__question">
                                <div class="img">
                                    <img src="/images/Котик новичок.png" alt="">
                                </div>
                                <div class="question__marks">
                                    <div class="mark">
                                        <label class="label-light"><input type="radio" class="input-light">Неверный вариант ответа.</label>
                                    </div>
                                    <div class="mark">
                                        <label class="label-light"><input type="radio" class="input-light">Неверный вариант ответа.</label>
                                    </div>
                                    <div class="mark">
                                        <label class="label-light"><input type="radio" class="input-light">Атмосферный воздух.</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide__title-true">
                                <div class="true-img">
                                    <img src="/images/happy_base 1.png" alt="">
                                </div>
                                <div class="score">
                                    <div class="score__title">
                                        ОТВЕТ ВЕРНЫЙ!
                                    </div>
                                    <div class="score__score">
                                        Твои баллы:
                                    </div>
                                    <div class="score__balls">
                                        +5 баллов
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide__title-true">
                                <div class="true-img">
                                    <img src="/images/sad_base 1.png" alt="">
                                </div>
                                <div class="score">
                                    <div class="score__title">
                                        ОТВЕТ НЕВЕРНЫЙ!
                                    </div>
                                    <div class="score__score">
                                        Твои баллы:
                                    </div>
                                    <div class="score__balls">
                                        <a href="">Попробовать ещё раз</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>

        </div>
    </header>
</body>
</html>