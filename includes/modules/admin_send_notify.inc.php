<?php
if(isset($_POST['send_admin_notify'])) {
	$ns_login = htmlspecialchars(trim($_POST['ns_login']));
	if(strlen($_POST['ns_text']) <= 1024) {
		$query010 = mysql_query("SELECT * FROM users WHERE login='$ns_login'");
		if(mysql_num_rows($query010) == 1) {
			$ns_text = htmlspecialchars(trim($_POST['ns_text']));
			$ns_sender = 'Администратор <a class="link" href="user.php?id='.$id.'">'.$login.'</a>';
			$query011 = mysql_query("INSERT INTO notifies VALUES ('','$ns_sender','$ns_login','$ns_text',3,'$cDate','$cTime',0,0)");
			gen_success("Уведомление успешно отправлено");
		} else {
			gen_error("Данного пользователя не существует.");
		}
	} else {
		gen_erorr("Длина уведомления превышает 1024 символа.");
	}
}