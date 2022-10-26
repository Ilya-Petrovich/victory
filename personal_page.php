<?php
	if (!isset($_COOKIE["username"])) {
		// header("Location: index.php");
	}

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
    <link rel="stylesheet" href="styles/personal_page_style.css">
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
			</div>
		</div>
    </header>
    <section class="main">
        <div class="container">
            <div class="info" style="background-image:url('images/avatar.png'); width:1680px; height:1100px; margin-left:115px; border-radius: 38px">
            <!-- <div class="info" style"background-color:#121212"> -->
				<table>
					<tr>
						<td>
							<h1 class="info-title" align="center">  <?php echo $_COOKIE["username"] ?>  </h1>
				            <!-- <div class="info-image">
				                <img src="images/avatar.png" alt="background">
				            </div> -->
				            <div class="info-cat" align="center">
				                <img src="images/comp_base.png" alt="main-cat" style="width:450px">
				            </div>
				            <div class="lifes-image" align="center">
								<?php
									$lives = $info[1];
									$rate = $info[2];


									for ($i = 0; $i < $lives; $i++) {
										echo '<img src="images/point_'.$rate.'.png" alt="" style="width:100px;"> ';
									}
								?>
				                <!-- <img src="../Project_cat/image/lifes.png" alt="lifes"> -->
				            </div>
						</td>
						<td>
				            <div class="top">
				                <h3 class="my-point" align="center" style="line-height: 115px;">Мой счёт</h3>
								<?php echo '<h3 class="point" align="center">'.$score.'</h3>'; ?>
				                <!-- <h3 class="leaders">Таблица лидеро</h3> -->
									<h1 class="leaders" align="left" style="width:auto; position:relative; left:900px; right:0; top:400px">
										<?php
											$dir = opendir('users/');
											$index = 1;

											$results = [];

											// read users files
											$new_res = [];
											while(($f = readdir($dir)) !== false) {
												if($f != '.' && $f != '..') {
													$team = substr($f, 0, strlen($f) - 4);
													$file = fopen("users/".$f, "r");
													$text = fgets($file, 100);
													$text = explode(";", $text);
													$a = array($text[4], 2000000000 - $text[7], $team);
													array_push($new_res, $a);
													// echo $a[0]." ".$a[1]." ".$a[2]."<br>";
													$index++;
												}
											}

											rsort($new_res);

											// for ($i = 0; $i < count($new_res); $i++) {
											// 	echo $new_res[$i][0]." ".$new_res[$i][1]." ".$new_res[$i][2]."<br>";
											// }

											// show results
											echo "<table>";
											for ($i = 0; $i < count($new_res); $i++) {
												echo "<tr>";
												if ($new_res[$i][2][0] != "-") {
													if ($i > 2) {
															if (count($new_res) >= 15) {
																if ($new_res[14][2][0] != "-") {
																	echo '<td style="width:600px; text-align:center;">'.'. . .'.'</td>'.'<tr>';
																	echo '<td style="width:600px">'.(15).'. '.$new_res[14][2].'</td><td >'.$new_res[$i][0].'</td>';
																}
															}
															break;

													}
													echo '<td style="width:600px">'.($i + 1).'. '.$new_res[$i][2].'</td><td >'.$new_res[$i][0].'</td>';
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
						</td>
					</tr>
				</table>
            </div>
        </div>
    </section>
</body>

</html>