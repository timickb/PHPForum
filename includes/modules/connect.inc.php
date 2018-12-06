<?php
$connect = mysql_connect($db_host,$db_user,$db_password) or die("Ошибка подключения к серверу.");
$database = mysql_select_db($db_name) or die("База данных не найдена.");
mysql_query("SET NAMES 'cp1251'");