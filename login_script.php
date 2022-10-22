<?php
	// echo "Hello 2";
	// require_once 'database.php';

	extract($_POST);

	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($username) or empty($password)) {
			echo "Нужно ввести название команды и указать пароль!";
		} else {
			$filename = $username . ".csv";
			// $filename = "example.csv";

			// check file existion
			if (@fopen("users/" . $filename, "r")) {
				// echo "Yes ";
				// open csv file for reading
				$f = fopen("users/" . $filename, 'r');

				if ($f === false) {
					die('Error opening the file ' . $filename);
				}
	
				// compare password with database
				if (($buffer = fgets($f, 100)) !== false) {
					$old_pass = (explode(';', $buffer))[0];
					if ($old_pass !== $password) {
						echo "Неверный пароль!";
					} else {
						echo "Вы успешно вошли!";
						setcookie("username", $username);
					}
				}

				// close the file
				fclose($f);
			} else {
				die("Вы не зарегистрированы :(");
			}
		}
	}
?>
