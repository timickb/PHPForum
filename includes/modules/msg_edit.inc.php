<?php
if(isset($_POST['msg_edit'])) {
	$new_msg = htmlspecialchars(trim($_POST['new_msg']));
	if(strlen($new_msg) <= 1024 && strlen($new_msg) > 0) {
		$msg_id = $_POST['msg_id'];
		$query024 = mysql_query("UPDATE messages SET text='$new_msg' WHERE id='$msg_id'");
		gen_success("Сообщение отредактировано.");
		unset($_POST);
	} else {
		gen_error("Сообщение не должно превышать 1000 символов или быть пустым.");
	}
}