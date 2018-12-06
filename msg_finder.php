<?php
require_once('./includes/top.inc.php');
if(isset($_SESSION['id']) {
	if(isset($_GET['tid'])) {
		$tid = $_GET['id'];
		$obj051 = mysql_fetch_object(mysql_query("SELECT * FROM topics WHERE id = '$tid'"));
		$theme_name = $obj051->title;
		echo back_a()."Поиск по сообщениям темы \"".$theme_name."\""."<br />";
		echo '<form method="get">';
		echo '<input type="text" class="field" name="fmsg_text" placeholder="Введите текст для поиска"/>';
		echo '<input type="submit" class="button" value="Поиск" name="find_msg" />';
		echo '</form>';
	} else {
		echo back_a()."Глобальный поиск по сообщениям";
	}
}
require_once('./includes/bottom.inc.php');