<?php
if(isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
	$uarr = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$id'"));
	$login = $uarr['login'];
	$password = $uarr['password'];
	$name = $uarr['name'];
	$surname = $uarr['surname'];
	$reg_date = $uarr['reg_date'];
	$born_day = $uarr['born_day'];
	$born_month = $uarr['born_month'];
	$born_year = $uarr['born_year'];
	$status = $uarr['status'];
	$balance = $uarr['balance'];
	$banned = $uarr['banned'];
	$only_my_topics = $uarr['only_my_topics'];
	$hide_date_born = $uarr['hide_date_born'];
	$data_order = $uarr['data_order'];
	$color = $uarr['color'];
	$avatar = $uarr['avatar'];
}