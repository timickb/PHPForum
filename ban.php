<?php
require_once('./includes/top.inc.php');
if($status > 1 && isset($_GET['id']) && isset($_GET['action'])) {
	$uid = $_GET['id'];
	$ulogin_arr = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$uid'"));
	$ulogin = $ulogin_arr['login'];
	if($_GET['action'] == 0) {
		$ban_query = mysql_query("UPDATE users SET banned=1 WHERE id='$uid'");
		echo '<div class="header">Пользователь <a class="link" href="user.php?id='.$uid.'">'.$ulogin.'</a> заблокирован</div>';
	} else {
		$unban_query = mysql_query("UPDATE users SET banned=0 WHERE id='$uid'");
		echo '<div class="header"> Пользователь <a class="link" href="user.php?id='.$uid.'">'.$ulogin.'</a> разблокирован</div>';
	}
}
require_once('./includes/bottom.inc.php');
?>