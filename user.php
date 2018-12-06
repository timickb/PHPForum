<?php
require_once('./includes/top.inc.php');
if(isset($_SESSION['id'])) {
if(isset($_GET['id'])) {
	$uid = $_GET['id'];
	$user_data_query = mysql_query("SELECT * FROM users WHERE id='$uid'");
	$udq_arr = mysql_fetch_array($user_data_query);
	//Определение информации
	$ulogin = $udq_arr['login'];
	$uname = $udq_arr['name'];
	$usurname = $udq_arr['surname'];
	$ureg_date = $udq_arr['reg_date'];
	$uborn_day = $udq_arr['born_day'];
	$uborn_month = $udq_arr['born_month'];
	$uborn_year = $udq_arr['born_year'];
	$ustatus = $udq_arr['status'];
	$ubalance = $udq_arr['balance'];
	$ubanned = $udq_arr['banned'];
	/*if($ureg_day < 10) { $ureg_day = '0'.$ureg_day; }
	if($ureg_month < 10) { $ureg_month = '0'.$ureg_month; }
	if($ureg_year < 10) { $ureg_day = '0'.$ureg_year; }*/
	if($uborn_day < 10) { $uborn_day = '0'.$uborn_day; }
	if($uborn_month < 10) { $uborn_month = '0'.$uborn_month; }
	if($uborn_year < 10) { $uborn_year = '0'.$uborn_year; }
	switch($ustatus) {
		case 0:
		$ustatus_t = 'Пользователь';
		break;
		case 1:
		$ustatus_t = 'Премиум';
		break;
		case 2:
		$ustatus_t = 'Модератор';
		break;
		case 3:
		$ustatus_t = 'Администратор';
		break;
	}
	//Вывод информации
	echo back_a().'<div class="header">Профиль: '.$ulogin.'</div><br/><br/>';
	echo '<div class="topic_info">';
	if($ubanned == 1) {
		echo '(Пользователь заблокирован)<br />';
	}
	echo 'Статус: '.$ustatus_t.'<br>';
	echo 'Имя: '.$uname.'<br>';
	echo 'Фамилия: '.$usurname.'<br>';
	echo 'Дата регистрации: '.$ureg_date.'<br>';
	echo 'Дата рождения: '.$uborn_day.".".$uborn_month.".".$uborn_year.'<br>';
	if($uid == $id) {
		echo '<br />';
		echo '<a href="acc_settings.php" class="lbutton">Изменить параметры аккаунта</a><br>';
	}
	if($uid != $id && $status > 1) {
		if($ustatus < 3) {
			if($ubanned == 0) {
				echo '<a href="ban.php?id='.$uid.'&action=0" class="lbutton">Заблокировать пользователя</a><br>';
			} else {
				echo '<a href="ban.php?id='.$uid.'&action=1" class="lbutton">Разблокировать пользователя</a><br>';
			}
		}
		if($uid != $id && $status == 3) {
			if($ustatus < 2) {
			echo '<a href="do_moder.php?id='.$uid.'&action=0" class="lbutton">Назначить пользователя модератором</a><br>';
			} else if($ustatus == 2) {
				echo '<a href="do_moder.php?id='.$uid.'&action=1" class="lbutton">Снять пользователя с модератора</a><br>';
			}
		}
	}
	echo '</div>';
} else {
	gen_error("Ошибка доступа: неизвестен идентификатор пользователя");
}
} else {
	auth_r();
}
require_once('./includes/bottom.inc.php');
?>