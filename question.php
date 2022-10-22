<?php
	extract($_POST);

		// echo "YES";
		if (isset($_POST['submit_theory'])) {
		$f = fopen('tasks/q_'.$_POST['submit_theory'], 'r');
		// $text = fgets($f, 4096);
		$text = [];
		$i = 0;
		while (!feof($f)) {
			$text[$i] = fgets($f);
			$i++;
		}


		for ($i = 1; $i < count($text); $i++) {
			if ($text[$i][0] != "$") {
				echo $text[$i]."<br>";
				// echo "\n";
			} else {
				// echo $text[$i]."<br>";
				$image = explode("$$", $text[$i])[1];
				// echo $image;
				echo '<img src="tasks/'.$image.'">';
			}
		}

		echo '<form action="question.php" method="post">';
		echo "<div>";
		// echo "Вопрос";
		// echo $text;
		echo "</div>";
		echo '<button type="submit" name="submit_question" value="'.$_POST['submit_question'].'">Ответить</button>';
		echo '</form>';

		// echo $text;
	}

	if (isset($_POST['submit_question'])) {
		echo "CHECKING";
	}
?>