<?
header('Content-Type: text/html; charset=utf-8');
?>

<fieldset>
   <legend>Get key</legend>
	TEXT:
	<input type="text" id="inp" size="50" onkeyup="document.getElementById('img').src='image.php?in='+this.value">
	<br>
	<br> IMG:
	<img src="image.php?in=" id="img" onclick="window.open(this.src)" width="200" height="200">
	<br> Клікни по картинці шоб скачати її.
</fieldset>
<fieldset>
   <legend>Test key</legend>
	<form method="post" enctype="multipart/form-data" action="test.php">
		TEXT:
		<input type="text" name="KOD" value="<?php if(isset($_POST['KOD'])){echo $_POST['KOD'];} ?>" size="50">
		<br> FILE:
		<input type="hidden" name="UserID" value="<?php
			$ip = $_SERVER['REMOTE_ADDR'];
			$ua = $_SERVER['HTTP_USER_AGENT'];
			$d = getdate();

			$UserID = sha1($ip.$ua.$d["mday"].'Secret');
			$UserID = base64_encode($UserID);
			$UserID = rtrim($UserID,"=");
			echo $UserID;
?>">
		<input type="file" name="uploadfile">
		<br>
		<button type="submit">SUBMIT</button>
	</form>
</fieldset>