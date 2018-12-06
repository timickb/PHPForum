<?php
if(isset($_POST['topic_change_title'])) {
	$topic_id = $_POST['tid'];
	$new_title = htmlspecialchars(trim($_POST['ttitle']));
	if(strlen($new_title) <= 96 && strlen($new_title) > 0) {
		$query022 = mysql_query("UPDATE topics SET title='$new_title' WHERE id='$topic_id'");
		gen_success("Информация изменена.");
		unset($_POST);
	} else {
		gen_error("Объем заголовка не должен превышать 96 символов или быть пустым.");
	}
}
if(isset($_POST['topic_change_text'])) {
	$topic_id = $_POST['tid'];
	$new_rules = htmlspecialchars(trim($_POST['trules']));
	if(strlen($new_rules) <= 1000) {
		$query023 = mysql_query("UPDATE topics SET rules='$new_rules' WHERE id='$topic_id'");
		gen_success("Информация изменена.");
		unset($_POST);
	} else {
		gen_error("Объем текста не должен превышать 1000 символов.");
	}
}
if(isset($_POST['topic_change_mm'])) {
	$topic_id = $_POST['tid'];
	$new_mm = $_POST['tmsg_max'];
	$query022 = mysql_query("UPDATE topics SET msg_max='$new_mm' WHERE id='$topic_id'");
	gen_success("Информация изменена.");
	unset($_POST);
}