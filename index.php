<?
header('Content-Type: text/html; charset=utf-8');
?>

<fieldset>
   <legend>Get invite</legend>
	<button onclick="document.getElementById('img').src='image.php?rand='+(Math.floor(Math.random()*999))">Обновити</button>
	<br>
	<br> IMG:
	<img src="image.php?in=" id="img" onclick="window.open(this.src)" width="200" height="200">
	<br> Клікни по картинці шоб скачати її.
</fieldset>
<fieldset>
   <legend>Test invite</legend>
	<form method="post" enctype="multipart/form-data" action="test.php">
		<input type="hidden" name="UserID" value="<?php
			$ip = $_SERVER['REMOTE_ADDR'];
			$ua = $_SERVER['HTTP_USER_AGENT'];
			$d = getdate();

			$UserID = sha1($ip.$ua.$d["mday"].'Secret');
			$UserID = base64_encode($UserID);
			$UserID = rtrim($UserID,"=");
			echo $UserID;
?>">
		<input type="file" name="uploadfile" style="width:300px;height:100px;background:#fc0;">
		<br>
		<button type="submit">SUBMIT</button>
	</form>
</fieldset>