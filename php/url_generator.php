<?php
	include "config.php";
	$original_url = mysqli_real_escape_string($conn, $_POST['original-url']);
	
	//Проверка на корректность URL
	if (!empty($original_url) && filter_var($original_url, FILTER_VALIDATE_URL)) {
		$ran_url = substr(md5(microtime()), rand(0, 26), 5); //генерация укороченного url состоящего из 5 символов
		//На тот случай, если url уже существует
		$sql = mysqli_query($conn, "SELECT short_url FROM urls WHERE short_url = '{$ran_url}'");
		if (mysqli_num_rows($sql) > 0) {
			echo "Thats url already exist. Please try agenerate new short url again!";
		} else {
			$sql2 = mysqli_query($conn, "INSERT INTO urls (short_url, original_url)
										VALUES ('{$ran_url}', '{$original_url}')");
			//Если запрос прошел успешно
			if ($sql2) {
				$sql3 = mysqli_query($conn, "SELECT short_url FROM urls WHERE short_url = '{$ran_url}'");
				if (mysqli_num_rows($sql3) > 0) {
					$shorten_url = mysqli_fetch_assoc($sql3);
					echo $shorten_url['short_url'];
				}
			} else {
				echo "Something wrong. Please try again";
			}
		}
	} else {
		echo "$original_url - incorrecr URL";
	}
?>