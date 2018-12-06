<?php
if(isset($_POST['auth'])) {
	$alogin = $_POST['alogin'];
	$apassword = $_POST['apassword'];
	$auth_arr = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE login = '$alogin'"));
	if($auth_arr['password'] == $apassword) {
		if($auth_arr['banned'] == 0) {
			$_SESSION['id'] = $auth_arr['id'];
			$_SESSION['login'] = $auth_arr['login'];
			$_SESSION['password'] = $auth_arr['password'];
			$_SESSION['name'] = $auth_arr['name'];
			$_SESSION['surname'] = $auth_arr['surname'];
			$_SESSION['reg_day'] = $auth_arr['reg_day'];
			$_SESSION['reg_month'] = $auth_arr['reg_month'];
			$_SESSION['reg_year'] = $auth_arr['reg_year'];
			$_SESSION['born_day'] = $auth_arr['born_day'];
			$_SESSION['born_month'] = $auth_arr['born_month'];
			$_SESSION['born_year'] = $auth_arr['born_year'];
			$_SESSION['status'] = $auth_arr['status'];
			$_SESSION['balance'] = $auth_arr['balance'];
			$_SESSION['banned'] = $auth_arr['banned'];
			$_SESSION['only_my_topics'] = $auth_arr['only_my_topics'];
			$_SESSION['hide_date_born'] = $auth_arr['hide_date_born'];
			$_SESSION['data_order'] = $auth_arr['data_order'];
			$_SESSION['color'] = $auth_arr['color'];
			$_SESSION['avatar'] = $auth_arr['avatar'];
			header('Location: topics.php');
		} else {
			gen_error("Данный пользователь заблокирован. Для разблокировки обратитесь к администратору.");
			unset($_POST);
		}
	} else {
		gen_error("Неправильный логин или пароль.");
	}
}