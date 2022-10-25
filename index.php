<?php
	extract($_POST);

	if (isset($_POST['submit_exit'])) {
		SetCookie("username", "");
	} else {
		if (isset($_COOKIE["username"])) {
			$f = fopen("users/".$_COOKIE["username"].".csv", "r+");
			if ($f) {
				header('Location: personal_page.php');
			}
		}

	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENERGY CAT GAME</title>
    <link rel="stylesheet" href="main_page/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@200&family=Inter&family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <section class="main">
        <div class="container">
            <div class="main-info">
                <h1 class="main-title">ENERGY CAT GAME</h1>
            </div>
	        <div class="main-text">
	            Помоги котенку стать инженером-энергетиком!
	        </div>

            <div class="main-action">
				<a href="registration_page.php">
                	<button class="button1" id="button1">РЕГИСТРАЦИЯ</button>
				</a>
				<a href="login_page.php">
                	<button class="button2" id="button2">ВХОД</button>
				</a>
            </div>
            <div class="main-image-cat">
                <img src="main_page/images/main_cat1.png" alt="Main image">
            </div>
        </div>
    </section>
    <section class="cat">
        <div class="container">
            <div class="cat-info">
                <h2 class="info-title">Привет, студент!</h2>
            </div>
            <div class="info-text">Если ты здесь, значит из тебя в будущем может получится отличный инженер энергетик.
                Возможно, ты ещё не так много знаешь об этой науке, но наши котята-инженеры хотят немного поднять твой
                уровень.<p>
                Сейчас ты получишь доступ к секретной системе обучения студентов-энергетиков. Эта система воспитала уже
                не одно поколение настоящих профессионалов. А чтобы тебе не было скучно, мы дадим тебе пушистого товарища.</p>
                Вместе веселее!
            </div>
        </div>
    </section>
    <section class="levels">
        <div class="container">
            <h2 class="sub-title">Познакомиться с котятами-инженерами</h2>
            <div class="cat-items">
                <div class="cat-item">
                    <div class="cat-item-image">
                        <img src="main_page/images/evrika_base3.png" alt="Base">
                    </div>
                    <div class="cat-item-title">Новичок</div>
                    <div class="cat-item-info">Заветной мечтой этого малыша была энергетика. Он всегда хотел открыть
                        собственный источник чистой энергии. <p> Вот незадача - этот котик совсем новичок! Но он уверен, что
                        вместе вы сможете изучить что-то новое.
                    </div>
                </div>
                <div class="cat-item">
                    <div class="cat-item-image">
                        <img src="main_page/images/evrika_cool2.png" alt="Cool">
                    </div>
                    <div class="cat-item-title">Продвинутый</div>
                    <div class="cat-item-info">У него папа-энергетик, у него мама-энергетик, да он сам у себя энергетик!
                        <p>С этим пушистым шутки плохи, он настроен серьёзно и готов сотрудничать с тобой только в том
                        случае, если ты сам не оплошаешь.
                    </div>
                </div>
                <div class="cat-item">
                    <div class="cat-item-image">
                        <img src="main_page/images/evrika_cosmo1.png" alt="Cosmo">
                    </div>
                    <div class="cat-item-title">Эксперт</div>
                    <div class="cat-item-info">Этот котенок не с нашей планеты . В его родной галактике он познал уже
                        все области энергетики. Полосатый прибыл на обучение к Землянам на своей собственной ракете!
                        Готов ли ты поделиться с ним своими знаниями?
                    </div>
                </div>
            </div>
            <div class="cat-action">
                <button class="button-play">Я готов к игре!</button>
            </div>
        </div>
    </section>
</body>

</html>