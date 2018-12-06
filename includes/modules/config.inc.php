<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "forum";
$cPage = basename($_SERVER['SCRIPT_FILENAME']);
if(isset($_SERVER['HTTP_REFERER'])) {
	$rPage = basename($_SERVER['HTTP_REFERER']);
}
$cYear = date('Y');
$cMonth = date('m');
$cDay = date('d');
$cHour = date('H');
$cMinute = date('i');
$cSecond = date('s');
$cDate = $cDay.".".$cMonth.".".$cYear;
$cTime = $cHour.":".$cMinute.":".$cSecond;