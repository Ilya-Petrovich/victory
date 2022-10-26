<?php
	// $tasks = scandir('tasks');
	// $i = 0;
	// $questions = [];
  //
	// $f = fopen("users/".$_COOKIE["username"].".csv", "r+");
  //
	// if ($f) {
	// 	$line = fgets($f, 100);
	// 	rewind($f);
	// 	$info = (explode(';', $line));
  //
	// 	$score = $info[4];
		// echo $info[6]."<br>";
	// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats_energy</title>
    <link rel="stylesheet" href="styles/style.css">
	<!-- <link rel="stylesheet" href="levels/style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&family=Inter&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header" style="padding-bottom: 20px;">
        <div class="container">
            <div class="menu">
                <ul>
                    <li class="menu-item-two">
						<form action="index.php" method="post">
                        	<button type="submit" name="submit_exit">Выйти</button>
						</form>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <section class="main">
        <div class="container" style="background-image:url('images/avatar.png');height: 1280px; width: 1680px; margin-left:115px">
            <div class="info" align="center">
                <div class="info-image">
                	<h3 class="leaders" style="position:relative; left:0; top:10%; padding-top:50px">Таблица лидеров</h3>
                    <!-- <img src="../Project_cat/image/avatar.png" alt="background"> -->
                </div>
                <h1 class="leaders" align="left" style="width:auto; position:relative; left:150px; right:0; top:0px">
					<?php
						$dir = opendir('users/');
						$index = 1;

						$results = [];

						// read users file
						$res_file = fopen("results.csv", "r+");
						if ($res_file) {
							for ($i = 0; $i < 15; $i++) {
								$line = explode(";", fgets($res_file, 100));
								array_push($results, $line);
								// echo ($i + 1).". ".$line."<br>";
							}
						}

						// show results
						echo "<table>";
						for ($i = 0; $i < count($results); $i++) {
							echo "<tr>";
							if ($results[$i][0] != "-") {
								echo '<td style="width:1300px">'.($i + 1).'. '.$results[$i][0].'</td><td >'.$results[$i][1].'</td><br>';
							}
							echo "</tr>";
						}
						echo "</table>";


						// read users files
						while(($f = readdir($dir)) !== false) {
							if($f != '.' && $f != '..') {
								$team = substr($f, 0, strlen($f) - 4);
								// array_push($results, $team);
								// echo $index.". ".$team."<br>";
								$index++;
							}
						}

						// show results
						echo "<table>";
						for ($i = 0; $i < count($results); $i++) {
							echo "<tr>";
							if ($results[$i][0] != "-") {
								echo '<td style="width:1300px">'.($i + 1).'. '.$results[$i][0].'</td><td >'.$results[$i][1].'</td><br>';
							}
							echo "</tr>";
						}
						echo "</table>";
							// 	continue;
							// }
							//
							// $file_path = "users/".$f;
	                        // $f = fopen($file_path, "r+");
	                        // $line = fgets($f, 100);
							//
							// rewind($f);
	                    	// $info = (explode(';', $line));
	                    	// $score = $info[5];
	                        // echo $score;
	                        // fclose($f);
							//
	                        // $ff = fopen("result.csv" 'w');
	                        // if ($f == ) {
	                        // 	if (($buffer = fgets($f, 100)) !== false) {
	                        // 		$old_pass = (explode(';', $buffer))[0];
                      		// 	}
							// }
						// }
                	?>
				</h1>

                <div class="top-image">
                    <!-- <img src="../Project_cat/image/1.png" alt="first"> -->
                    <!-- <img src="../Project_cat/image/2.png" alt="second"> -->
                    <!-- <img src="../Project_cat/image/3.png" alt="third"> -->
                    <!-- <div class="skip">
                        <img src="../Project_cat/image/propusk.png" alt="propusk">
                    </div>
                    <img src="../Project_cat/image/defolt.png" alt="defolt"> -->
                </div>
            </div>
        </div>
    </section>
</body>

</html>
