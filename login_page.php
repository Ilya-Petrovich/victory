<?php
	// echo "Hello 1";
	require_once 'login_script.php';
	// require_once 'registration_script.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Регистрация</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
</head>
<body style='    background-image: url("images/Frame2.png");
    background-position: center;
    background-size: cover;
    height: 843px;
    width: 1920px;
    background-color: #4C3375;
'>
	<main>
		<form action="login_script.php" method="post">
	        <h1>Вход</h1>
	        <div>
	            <label for="username">Название команды:</label>
	            <input type="text" name="username" id="username">
				<label for="password">Пароль:</label>
				<input type="password" name="password" id="password">
	        </div>
	        <button type="submit" name="submit">Войти</button>
	    </form>
	</main>
</body>
</html>