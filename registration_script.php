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
      if (strlen($username) <= 50) {
        $filename = $username . ".csv";
      }
      else {
        $filename = substr($username, 0, 50).".csv";
      }

			if (@fopen("users/" . $filename, "r")) {
				die ("Команда с таким названием уже зарегистрирована.");
			}
    		// echo "Вы успешно зарегистрировались!";


			// open csv file for writing
			$f = fopen("users/" . $filename, 'w');
      $time = filemtime("users/" . $filename);
      $data = [ [$password, '0', '1', '0', '0', '0', 'zzzzzzzzzzzzzzzzzzzz', $time] ];

			if ($f === false) {
				die('Error opening the file ' . $filename);
			}

			// write each row at a time to a file
			foreach ($data as $row) {
				fputcsv($f, $row, ';');
			}

			setcookie("username", $username, 0);
			header('Location: difficulty.php');

			// close the file
		    fclose($f);
		}
	}
?>
