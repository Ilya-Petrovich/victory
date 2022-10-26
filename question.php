<?php
	error_reporting(E_ALL);

	if (isset($_POST['submit_continue'])) {
		header("Location: levels.php");
	}

	extract($_POST);

	// echo "YES";
	// echo $_POST['submit_theory'];
	$f_info = fopen("users/".$_COOKIE["username"].".csv", "r+");

	if ($f_info) {
		$line = fgets($f_info, 100);
		rewind($f_info);
		$info = (explode(';', $line));
	}

	fclose($f_info);

	$lives = $info[1];
	$rate = $info[2];
	$score = $info[4];

	if (isset($_POST['submit_theory'])) {
		$f = fopen('tasks/q_'.$_POST['submit_theory'], 'r');
		$number = $_POST['submit_theory'];
	}

	if (isset($_POST['submit_answer'])) {
		$f = fopen('tasks/q_'.$_POST['question'], 'r');
		$number = $_POST['question'];
	}

	$message = "";
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
	// if (isset($_POST['submit_answer'])) {
	//
	// 	echo "&".$correct."&<br>";
	// 	echo "&".$_POST['answer']."&<br>";
	// }
	// foreach ($_POST as $element) {
	// 	echo "^".$element."^"."<br";
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
    <link rel="stylesheet" href="styles/style.css">
    <title>Тестирование</title>
</head>
<body>
    <header class="lvl__head">
        <div class="container">
            <div class="navigation">
                <div class="nav__left">
                    <a href="levels.php" class="home">К выбору уровня</a>
                    <a href="personal_page.php">Мой прогресс</a>
                </div>
				<form action="index.php" method="post">
					<button class="exit" type="submit" name="submit_exit">Выйти</button>
				</form>
            </div>
            <div class="cat-line">
                <p>ТЕСТИРОВАНИЕ</p>
                <img src="images/main_cat 1.png" alt="">
            </div>
			<div class="test-info">
				Закрепим пройденный материал. За каждый правильный ответ ты получаешь баллы, за неверный - теряешь сердечки. Будь внимателен!
			</div>
			<div class="health-line">
				КОЛИЧЕСТВО ПОПЫТОК:
				<?php
				for ($i = 0; $i < $lives; $i++) {
					echo '<img src="images/point_'.$rate.'.png" alt="">';
				}
				?>
			</div>
			<div class="slider-block">
				<div class="slider">
					<div class="owl-carousel owl-theme">
						<div class="slide">
							<form action="question.php" method="post">
								<?php
								$img = "images/Котик новичок.png";
								if (isset($_POST['submit_answer'])) {
									if (isset($_POST['answer'])) {
										// $score = 500;
										$check_answer = $_POST['answer'];
										while ($check_answer[-1] != ".") {
											$check_answer = substr($check_answer, 0, strlen($check_answer) - 1);
										}
										// echo "&".$correct."&<br>";
										//
										// echo "&".$check_answer."&<br>";

										if ($check_answer == $correct) {
											$message = "ОТВЕТ ВЕРНЫЙ!";
											$img = "images/happy_base 1.png";
											$ans = 1;
											$add_score = 5 * $rate; // change value
											$score = $score + $add_score;
											// for ($i = 0; $i < count($info); $i++) {
											// 	echo $info[$i]."<br>";
											// }
											$info[4] = $score;
											// for ($i = 0; $i < count($info); $i++) {
											// 	echo $info[$i]."<br>";
											// }

											// $r = fgets($f_info, 100);


											$f_info = fopen("users/".$_COOKIE["username"].".csv", "w");

											if ($info[6][$number - 1] == "z") {
												$info[6][$number - 1] = "1";
												$info[7] = filemtime("users/".$_COOKIE["username"].".csv");

												if ($f_info) {
													$info = (implode(';', $info));
													fputs($f_info, $info, strlen($info));
												}
											}
											// for ($i = 0; $i < strlen($info); $i++) {
											// 	echo $info[$i]."<br>";
											// }

											fclose($f_info);
										} else {
											$message = "ОТВЕТ НЕВЕРНЫЙ!";
											$img = "images/sad_base 1.png";
											$ans = 0;
											$add_score = 0;

											$info[6][$number - 1] = "0";
											$lives = $lives - 1;
											$info[1] = $lives;

											$f_info = fopen("users/".$_COOKIE["username"].".csv", "w");
											if ($f_info) {
												$info = (implode(';', $info));
												fputs($f_info, $info, strlen($info));
											}

											fclose($f_info);

											// echo "NOT CORRECT!";
										}
									} else {
										$message = "Нужно выбрать ответ!";
									}
								}

								?>
								<div class="slide__title">
									<?php
										if (!isset($ans)) {
											echo $text[1];
										}
									?>
								</div>
								<div class="slide__question">
									<div class="img">
										<img src= <?php echo '"'.$img.'"'; ?> alt="">
									</div>

									<?php
										if (!isset($ans)) {
											echo '<div class="question__marks">';
												for ($i = 2; $i < count($text); $i++) {
													if ($text[$i][0] == "=") {
														echo '<div class="mark">';
															echo '<label class="label-light" style="width:1000px"><input type="radio" name="answer" value="'.substr($text[$i], 1).'" class="input-light" style="width:40px; height:40px; flex-shrink:0">'.substr($text[$i], 1).'</label>';
														echo '</div';
													}
												}
                            				echo '</div>';
											echo '<div>';
												echo '<input type="text" name="question" value="'.$number.'" style="display:none">';
												echo '<button class="answer" type="submit" name="submit_answer">Ответить</button>';
											echo '</div>';
										} else {
											echo '<div class="score" style="width:500px; display:grid; align-content:center">';
												echo '<div class="score__title">';
													echo $message;
												echo '</div>';
												echo '<div class="score__balls">';
													echo '+ '.$add_score;
												echo '</div>';
												echo '<div class="score__score">';
													echo 'Твои баллы: '.$score;
												echo '</div>';
												echo '<button class="go" type="submit" name="submit_continue">Продолжить</button>';
											echo '</div>';
											echo '<div>';
											echo '</div>';

										}
									?>
								<!-- <div>
									<input type="text" name="question" value="" style="display:none">
									<button type="submit" name="submit_answer">Ответить</button>
									<button type="submit" name="submit_continue">Продолжить</button> -->
								</div>
							</form>
                		</div>
                        <!-- <div class="slide">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
<!-- for ($i = 0; $i < count($text); $i++) { -->
<!-- if ($text[$i][0] == "=") {
	$answer = substr($text[$i], 1);
	// echo $answer;

	if ($answer[strlen($answer) - 1] != ".") {
		$answer = substr($answer, 0, strlen($answer) - 1);
	}
	// echo $answer;

	echo '<div class="mark">';
		echo '<label class="label-light"><input type="radio" name="answer" value="'.$answer.'" class="input-light">'.$answer.'</label>';
		echo '<input type="text" name="question" value="'.$number.'" style="display:none">';
		echo '</div>';
		// echo substr($text[$i], 1);
	}
} -->
<!-- // echo '<input type="text" name="number" value="'.$_POST['submit_theory'].'" style="display:none"'; -->
<!-- // echo <<<HTML -->