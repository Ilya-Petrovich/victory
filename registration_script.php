<?php
	// echo "Hello 2";
	// require_once 'database.php';
	$db= $conn; // update with your database connection
	// by default error messages are empty
	// $register=$valid=$fnameErr=$lnameErr=$emailErr=$passErr=$cpassErr='';
	// by default set input values are empty
	// $set_firstName=$set_lastName=$set_email='';

	extract($_POST);

	// echo $_POST['username'];
	if(isset($_POST['submit'])) {
		$username = $_POST['username'];

		if (empty($username)) {
			echo "Нужно ввести название команды!";
		} else {
			// echo "asd";
			// // register via text file
			$filename = $username . ".csv";

			$data = [
				[$filename, '', ''],
				['GOOG', 'Google Inc.', '800'],
				['AAPL', 'Apple Inc.', '500'],
				['AMZN', 'Amazon.com Inc.', '250'],
				['YHOO', 'Yahoo! Inc.', '250'],
				['FB', 'Facebook, Inc.', '30'],
			];

			// open csv file for writing
			$f = fopen($filename, 'w');

			if ($f === false) {
				die('Error opening the file ' . $filename);
			}

			// write each row at a time to a file
			foreach ($data as $row) {
				fputcsv($f, $row);
			}
			// fputcsv($f, $filename);

			// close the file
			fclose($f);
		}
		// // function to insert user data into database table
		// function register($username) {
		// 	global $db;
		// 	$sql="INSERT INTO users(user_name) VALUES(?)";
		// 	$query=$db->prepare($sql);
		// 	$query->bind_param('ssss',$username);
		// 	$exec= $query->execute();
		//
		// 	if ($exec==true) {
		// 		return "Команда зарегистрирована!";
		// 	} else {
		// 		return "Ошибка регистрации!";
		// 		// return "Error: " . $sql . "<br>" .$db->error;
		// 	}

	}
?>
