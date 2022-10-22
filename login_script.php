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
			// check if file exists
			if (@fopen("users/" . $filename, "r")) {
				
			}
			// open csv file for reading
			$f = fopen($filename, 'r');

			if ($f === false) {
				echo "Вы не зарегистрированы.";
			}

			// write each row at a time to a file
			foreach ($data as $row) {
				fputcsv($f, $row);
			}

			// close the file
			fclose($f);



			// echo "Вы успешно вошли!";
		}
	}
?>
