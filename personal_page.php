<?php
	// $tasks = scandir('tasks');
	// $i = 0;
	// $questions = [];

	$f = fopen("users/".$_COOKIE["username"].".csv", "r+");

	if ($f) {
		$line = fgets($f, 100);
		rewind($f);
		$info = (explode(';', $line));

		$score = $info[4];
		// echo $info[6]."<br>";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats_energy</title>
    <link rel="stylesheet" href="../Project_cat/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&family=Inter&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="menu">
							<div class="navigation">
											<a href="levels.php" style="text-decoration:none; width:1500px">К выбору уровня</a>
											<form action="index.php" method="post">
												  <button class="exit" type="submit" name="submit_exit">Выйти</button>
											</form>
							
        </div>
    </header>
    <section class="main">
        <div class="container">
            <div class="info">
                <h1 class="info-title" align="center">  <?php echo $_COOKIE["username"] ?>  </h1>
                <div class="info-image">
                    <img src="../Project_cat/image/avatar.png" alt="background">
                </div>
                <div class="info-cat">
                    <img src="../Project_cat/image/comp_base.png" alt="main-cat">
                </div>
                <div class="lifes-image" align="center">
									<?php
									$lives = $info[1];
									$rate = $info[2];


									for ($i = 0; $i < $lives; $i++) {
										echo '<img src="levels/images/point_'.$rate.'.png" alt="" style="width:100px;"> ';
									} ?>
                    <!-- <img src="../Project_cat/image/lifes.png" alt="lifes"> -->
                </div>
                <div class="top">
                    <h3 class="my-point">Мой счёт</h3>
					<?php echo '<h3 class="point">'.$score.'</h3>'; ?>
                    <!-- <h3 class="leaders">Таблица лидеро</h3> -->
										<h1 class="leaders" align="left" style="width:auto; left:1110px; right:0; top:-200px">
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


								// read users file
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
										echo '<td style="width:500px">'.($i + 1).'. '.$results[$i][0].'</td><td >'.$results[$i][1].'</td><br>';
									}
									echo "</tr>";
								}
								echo "</table>";
											?>
						</h1>
                    <div class="top-image">
                        <!-- <div class="skip">
                            <img src="../Project_cat/image/propusk.png" alt="propusk">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>