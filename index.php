<?php
	if (isset($_GET['u'])) {
		include "php/config.php";
		$u = mysqli_real_escape_string($conn, $_GET['u']);
		
		$sql = mysqli_query($conn, "SELECT original_url FROM urls WHERE short_url = '{$u}'");
		if(mysqli_num_rows($sql) > 0) {
			$original_url = mysqli_fetch_assoc($sql);
			header("Location:".$original_url['original_url']);
		}
	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>SHORT URL</title>
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
		<div class="wrapper">
			<form action="#">
				<input type="text" name="original-url" placeholder="Enter or paste a long url" required>
				<button>Submit</button>
			</form>
		</div>
		
		<div class="shortURL-box">
			<input type="text" spellcheck="false" value="" id="input_short_url">
			<button onclick="saveFunc()">Save</button>
		</div>
		
		<script src="url.js"></script>
		<script src="save.js"></script>
		
	</body>
</html>