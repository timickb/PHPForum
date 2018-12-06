<?php
require_once('./includes/top.inc.php');
if(isset($_SESSION['id'])) {
	echo back_a().'<div class="header">Отправить уведомление пользователю</div><br>';
	switch($status) {
		case 2:
		echo '<form method="post">';
		echo '<input type="text" name="ns_login" class="field" placeholder="Логин получателя" required /><br>';
		echo '<textarea cols="88" rows="3" name="ns_text" class="field" placeholder="Текст уведомления" required></textarea><br>';
		echo '<input type="submit" name="send_moder_notify" class="button" value="Отправить" />';
		echo '</form>';
		break;
		case 3:
		echo '<form method="post">';
		echo '<input type="text" name="ns_login" class="field" placeholder="Логин получателя" required /><br>';
		echo '<textarea cols="48" rows="4" name="ns_text" class="field" placeholder="Текст уведомления" required></textarea><br>';
		echo '<input type="submit" name="send_admin_notify" class="button" value="Отправить" />';
		echo '</form>';
		break;
		default:
		echo 'У вас нет прав для доступа к данной странице.';
		break;
	}
} else {
	auth_r();
}
require_once('./includes/bottom.inc.php');
?>