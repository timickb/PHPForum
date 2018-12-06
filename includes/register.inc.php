<?php
if(isset($_POST['register'])) {
	$password = htmlspecialchars(trim($_POST['password']));
	$repassword = htmlspecialchars(trim($_POST['repassword']));
	if($password == $repassword) {
		$login = htmlspecialchars(trim($_POST['login']));
		$name = htmlspecialchars(trim(ucfirst($_POST['name'])));
		$surname = htmlspecialchars(trim(ucfirst($_POST['surname'])));
		if(strlen($login) <=12 && strlen($name) <= 20 && strlen($surname) <=28) {
			$sql=mysql_query("SELECT * FROM users WHERE login = '$login'");
      		if (!($sql) || (mysql_num_rows($sql) == 0)) {
      			$email = htmlspecialchars(trim($_POST['email']));
				$born_day = $_POST['born_day'];
				$born_month = $_POST['born_month'];
				$born_year = $_POST['born_year'];
				$register_query_1 = mysql_query("INSERT INTO users VALUES
												('','$login','$password','$name','$surname',
												'$email','$cDay', '$cMonth','$cYear',
												'$born_day','$born_month','$born_year',0,200,0,
												0,0,0,'default','')");
				$register_query_2 = mysql_query("SELECT * FROM users WHERE login='$login'");
				$rq2_arr = mysql_fetch_array($register_query_2);
				$id = $rq2_arr['id'];
				$register_query_3 = mysql_query("INSERT INTO notifies VALUES ('','Администрация','$login',
																'Поздравляем с успешной регистрации на форуме! Здесь ты можешь общаться и весело провести время!',
																0,'$cDate','$cTime',0,0)");
				$_SESSION['register_s'] = true;
				$_SESSION['registered'] = true;
				unset($_POST);
				header('Location: register_s.php');
			} else {
				gen_error("Пользователь с таким ником уже зарегистрирован!");
			}
		} else {
			gen_error("Логин, имя или фамилия слишком длинные!");
		}

	} else {
		gen_error("Пароли не совпадают!");
	}
}