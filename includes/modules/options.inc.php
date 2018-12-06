<?php
//Изменение пароля
if(isset($_POST['change_psw'])) {
	$tpsw = $_POST['tpsw'];
	$npsw = $_POST['npsw'];
	$rnpsw = $_POST['rnpsw'];
	$change_psw_query_0 = mysql_query("SELECT * FROM users WHERE id='$id'");
	$cpq0_arr = mysql_fetch_array($change_psw_query_0);
	if($cpq0_arr['password'] == $tpsw) {
		if($npsw == $rnpsw) {
			$change_psw_query_1 = mysql_query("UPDATE users SET password='$npsw' WHERE id='$id'");
			gen_success("Пароль успешно изменен!");
		} else {
			gen_error("Новые пароли не совпадают");
			unset($_POST);
		}
	} else {
		gen_error("Недействительный текущий пароль");
		unset($_POST);
	}
}
//Изменение порядка вывода информации
if(isset($_POST['change_out_order'])) {
	$new_order = $_POST['new_order'];
	$query017 = mysql_query("UPDATE users SET data_order='$new_order' WHERE id='$id'");
	gen_success("Настройки изменены");
	unset($_POST);
}
//Изменение цвета
if(isset($_POST['change_color'])) {
	$new_color = $_POST['new_color'];
	$query018 = mysql_query("UPDATE users SET color='$new_color' WHERE id='$id'");
	header("Location: $cPage");
	unset($_POST);
}
//Изменение критерии вывода тем
if(isset($_POST['change_topics_out'])) {
	$new_out = $_POST['new_out'];
	$query019 = mysql_query("UPDATE users SET only_my_topics='$new_out' WHERE id='$id'");
	gen_success("Настройки изменены");
	unset($_POST);
}