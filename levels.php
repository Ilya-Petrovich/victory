<?php
	require_once 'question.php';

	$tasks = scandir('tasks');

	extract($_POST);

	if (isset($_POST['submit'])) {
		// echo "asdasd";
		$text = [];
		echo $_POST['submit'];
		$f = fopen('tasks/q_'.$_POST['submit'], 'r');

		$i = 0;

		while (!feof($f)) {
			$text[$i] = fgets($f);
			$i++;
		}

		fclose($f);

		// echo "FILE ".$text[0]."|";
		$file = "";
		$file = substr($text[0], 0, - 1);
		// $text = explode(" "; $text[0])[0];
		// echo "FILE ".$sss."|";;
		// echo "FILE ".$file."|";

		// echo "NDKANSDK";

		$f = fopen('tasks/'.$file, 'r');
		$i = 0;
		$text = [];

		while (!feof($f)) {
			// rewind($f);
			// echo "asd";
			$text[$i] = fgets($f);
			$i++;
		}

		fclose($f);

echo <<<HTML
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
		                        <a href="#level_selection">К выбору уровня</a>
		                    </li>
		                    <li class="menu-item-one">
		                        <a href="#my_progress">Мой прогресс</a>
		                    </li>
		                    <li class="menu-item-two">
		                        <a href="#exit">Выйти</a>
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
HTML;
		for ($i = 0; $i < count($text); $i++) {
			if ($text[$i][0] != "$") {
				if ($i == 0) {
					echo '<h1 class="sub-title">'.$text[$i].'</h1>';
					echo '<div class="just-line-image">';
					echo '	<img src="theory/images/line.png" alt="line">';
					echo '</div>';
				} else {
					echo '<div class="just-text">';
					echo $text[$i];
					echo '</div>';
					echo '<div class="main-image">';
					echo '	<img src="theory/images/main-image.png" alt="main-image">';
					echo '</div>';

				}
				// echo $text[$i]."<br>";
				// echo "\n";
			} else {
				// echo $text[$i]."<br>";
				$image = explode("$$", $text[$i])[1];
				// echo $image;
				// echo '<img src="tasks/'.$image.'">';
			}
		}
// 		echo <<<HTML
// 		                <div class="just-text">
// 		                    <strong>К внешней изоляции установок высокого напряжения относят изоляционные промежутки между
// 		                        электродами</strong> (проводами линий электропередачи (ЛЭП), шинами распределительных устройств (РУ), наружными
// 		                        токоведущими частями электрических аппаратов и т.д.), в которых <strong>роль основного диэлектрика
// 		                        выполняет атмосферный воздух. Изолируемые электроды располагаются на определенных расстояниях друг от друга и
// 		                        от земли</strong>(или заземленных частей электроустановок) и укрепляются в заданном положении с помощью изоляторов.
// 		                </div>
// 		                <div class="main-image">
// 		                    <img src="theory/images/main-image.png" alt="main-image">
// 		                </div>
// 		                <h2 class="title-one">Диэлектрики, используемые во внешней изоляции</h2>
// 		                <div class="second-text">
// 		                    Диэлектрики, из которых изготавливаются изоляторы, должны отвечать следующим
// 		                    <strong>требованиям:</strong>
// 		                </div>
// 		                <div class="num-text">
// 		                    <!-- <ol> -->
// 		                        <li class="one"> Они должны иметь высокую механическую прочность, поскольку изоляторы, являясь
// 		                            элементом
// 		                            конструкции, несут значительную нагрузку. Изоляторы ЛЭП несут нагрузку от тяжения проводов,
// 		                            исчисляемую тоннами, а иногда и десятками тонн. Опорные изоляторы, на которых крепятся шины
// 		                            РУ, выдерживают громадные нагрузки от электродинамических сил, возникающих между шинами при
// 		                            коротких замыканиях.
// 		                        </li>
// 		                        <li class="one">Диэлектрики должны <strong>иметь высокую электрическую прочность,</strong>
// 		                            позволяющую создавать экономичные
// 		                            и надежные конструкции изоляторов.
// 		                        </li>
// 		                    </ol>
// 		                </div>
// 		                <h2 class="third-title">Условия работы внешней изоляции в эксплуатации и предъявляемые к ней требования
// 		                </h2>
// 		                <div class="num-s-text">
// 		                    <strong>В эксплуатации на изоляцию воздействуют:</strong>
// 		                    <ul>
// 		                        <li class="two">
// 		                            длительно приложенное рабочее напряжение промышленной частоты,
// 		                        </li>
// 		                        <li class="two">
// 		                            грозовые перенапряжения, вызванные грозовой деятельностью,
// 		                        </li>
// 		                        <li class="two">
// 		                            коммутационные перенапряжения, обусловленные работой коммутационных аппаратов (выключателей,
// 		                            разъединителей),
// 		                            увлажнение, загрязнения;
// 		                        </li>
// 		                        <li class="two">
// 		                            механические воздействия: ветровые нагрузки, электродинамические удары во время коротких
// 		                            замыканий.
// 		                        </li>
// 		                    </ul>
// 		                </div>
// 		                <div class="action">
// HTML;
			                echo '<button type="submit" name="submit_theory" value="'.$_POST['submit'].'" class="button">Перейти к вопросу</button>';
							echo <<<HTML
		                </div>
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
HTML;
		// HTML;
		// echo <<<HTML
		// echo '<button type="submit" name="submit_theory" value="'.$_POST['submit'].'">Далее</button>'; -->
		// </form>
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
							$number = (explode('_', $tasks[$i]))[1];
							echo "<div>";
							echo "Вопрос ".$number;
							echo "</div>";
							echo '<button type="submit" name="submit" value="'.$number.'">Выбрать</button>';
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
