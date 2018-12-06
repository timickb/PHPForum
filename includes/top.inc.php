<?php
/*Copyright by Timur Batrutdinov, 2016
All rights reserved
*/
session_start();
ob_start();
require_once('modules/functions.inc.php');
require_once('modules/config.inc.php');
require_once('modules/connect.inc.php');
require_once('modules/register.inc.php');
require_once('modules/patterns.inc.php');
require_once('modules/auth.inc.php');
require_once('modules/init.inc.php');
require_once('modules/topic_create.inc.php');
require_once('modules/topic_edit.inc.php');
require_once('modules/moder_send_notify.inc.php');
require_once('modules/admin_send_notify.inc.php');
require_once('modules/options.inc.php');
require_once('modules/msg_edit.inc.php');
echo '<html>';
	echo '<head>';
		echo '<title>Форум</title>';
		echo '<link rel="stylesheet" href="graphics/style.css" />';
		echo '<link rel="stylesheet" href="graphics/style-default.css" />';
		echo '<meta charset="utf-8" />';
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes" />';
	echo '</head>';
	echo '<body>';
		echo '<div class="top">';
			echo '<table cellspacing="8"><tr>';
				echo '<td><a href="index.php"><div class="logo"></div></a></td>';
				if(isset($_SESSION['id'])) {
					if($cPage == 'user.php') {
						echo '<td><div class="here">Я';
						switch($status) {
							case 1:
							echo ' (Premium)';
							break;
							case 2:
							echo ' (Moder)';
							break;
							case 3:
							echo ' (Admin)';
							break;
						}
						echo '</div></td>';
					} else {
						echo '<td><a class="goprofile" href="user.php?id='.$_SESSION['id'].'">Я';
						switch($status) {
							case 1:
							echo ' (Premium)';
							break;
							case 2:
							echo ' (Moder)';
							break;
							case 3:
							echo ' (Admin)';
							break;
						}
						echo '</a></td>';
					}
					//Подсчет новых уведомлений
					$query015 = mysql_query("SELECT * FROM notifies WHERE to_ = '$login' AND readed=0");
					$num_notifies = mysql_num_rows($query015);
					if($cPage == 'notifies.php' || $cPage == 'notifies_all.php') {
						echo '<td><div class="here">Ответы</div></td>';
					} else {
						echo '<td><a class="goprofile" href="notifies.php">Ответы';
						if($num_notifies > 0) {
						echo '<div class="num_notifies">'.$num_notifies.'</div>';
						}
						echo '</a></td>';
					}
					echo '<td><a class="goprofile" href="logout.php">Выйти</a></td>';
				} else {
					if($cPage == 'register.php') {
						echo '<td><div class="here">Регистрация</div></td>';
					} else {
						echo '<td><a class="goprofile" href="register.php">Регистрация</a></td>';
					}
				}
			echo '</tr></table>';
		echo '</div>';