<?php
	session_start();
	unset($_SESSION['id_for']);
	echo "<meta http-equiv='content-type' content='text/html; charset=UTF-8'>";
	echo "<script type='text/javascript'>alert('成功登出!!');</script>";
	echo "<html><head><meta http-equiv='refresh' content='0;url=index.php'></head></html>";
?>