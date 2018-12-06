<?php
require_once('./includes/top.inc.php');
if($status > 2 && isset($_GET['id']) && isset($_GET['action'])) {
	$uid = $_GET['id'];
	$ulogin_arr = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$uid'"));
	$ulogin = $ulogin_arr['login'];
	if($_GET['action'] == 0) {
		$moder_query = mysql_query("UPDATE users SET status=2 WHERE id='$uid'");
		echo '<div class="header">Пользователь <a class="link" href="user.php?id='.$uid.'">'.$ulogin.'</a> назначен модератором</div>';
	} else {
		$unmoder_query = mysql_query("UPDATE users SET status=0 WHERE id='$uid'");
		echo '<div class="header"> Пользователь <a class="link" href="user.php?id='.$uid.'">'.$ulogin.'</a> снят с модератора</div>';
	}
}
require_once('./includes/bottom.inc.php');
?>