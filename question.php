<?php
	extract($_POST);

	if (isset($_POST['submit_theory'])) {
		$f = fopen('tasks/'.$_POST['submit'], 'r');
		$text = fgets($f, 4096);
	}
?>