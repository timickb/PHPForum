<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['id'])) {
if(isset($_GET['id'])) {
	$tid = $_GET['id'];
	$topic_query = mysql_query("SELECT * FROM topics WHERE id='$tid'");
	if($topic_query) {
		$topic_arr = mysql_fetch_array($topic_query);
		//Определение информации
		$tid = $topic_arr['id'];
		$tcreatorid = $topic_arr['id_creator'];
		$ttitle = $topic_arr['title'];
		$tdate_create = $topic_arr['date_create'];
		$ttime_create = $topic_arr['time_create'];
		$tclosed = $topic_arr['closed'];
		$trules = $topic_arr['rules'];
		$tmsg_count = $topic_arr['msg_count'];
		$tmsg_max = $topic_arr['msg_max'];
		$tcolor = $topic_arr['color'];
		$topic_creator_query = mysql_query("SELECT * FROM users WHERE id='$tcreatorid'");
		$tcq_arr = mysql_fetch_array($topic_creator_query);
		$tcreator = $tcq_arr['login'];
		//$tfmsg_id = $tcq_arr['fixed_msg_id'];
		switch($tclosed) {
			case 0:
			$tmod = "Открытая";
			break;
			case 1:
			$tmod = "Закрытая";
			break;
		}
		//Определение сообщений темы
		$topic_msgs = mysql_query("SELECT * FROM messages WHERE id_topic='$tid' ORDER BY id DESC");
		//Вывод информации
		echo back_a().'<div class="header">'.$ttitle.'</div><br>';
		echo '<div class="topic_info">Тип темы: '.$tmod.'</div>';
		echo '<div class="topic_info">Создатель: <a href="user.php?id='.$tcreatorid.'" class="white_link">'.$tcreator.'</a></div>';
		echo '<div class="topic_info">Дата создания: '.$tdate_create.' '.$ttime_create.'</div>';
		if($tcreatorid == $id || $status > 1) {
			echo '<form method="post">';
			if($tclosed == 0) {
				echo '<input type="submit" name="close_topic" class="button" value="Закрыть тему" />';
			} else {
				echo '<form method="post"><input type="submit" name="open_topic" class="button" value="Открыть тему" />';
			}
			echo '<input type="submit" name="remove_topic" class="button" value="Удалить тему" /><br>';
			echo '<input type="submit" name="edit_topic" class="button" value="Редактировать тему" />';
			echo '</form>';
		}
		echo '<br />';
		if($tclosed == 0) {
			$message_query_0 = mysql_query("SELECT * FROM topics WHERE id='$tid'");
			$mq0_arr = mysql_fetch_array($message_query_0);
			if($mq0_arr['msg_count'] < $mq0_arr['msg_max']) {
				if(!isset($_POST['answer_msg'])) {
					echo '<form method="post">';
					echo "<script>document.writeln('<textarea name=message cols=',screen.width/16,' rows=6 class=field placeholder=\"Напишите сообщение\" required></textarea><br />');</script>";
					echo '<input type="submit" name="post_msg" value="Отправить" class="button" /><input type="reset" value="Очистить" class="button" />';
					echo '</form>';
				} else {
					echo '<form method="post">';
					echo '<textarea name="answer_text" rows="6" class="field" placeholder="Ответьте пользователю '.$_POST['answer_ulogin'].'"></textarea><br />';
					echo '<input type="submit" name="post_answer_msg" value="Ответить" class="button" /><input type="reset" value="Очистить" class="button" />';
					echo '<input type="hidden" name="answer_uid" value="'.$_POST['answer_uid'].'"';
					echo '<input type="hidden" name="answer_ulogin" value="'.$_POST['answer_ulogin'].'"';
					echo '<input type="hidden" name="answerid" value="'.$_POST['answer_id'].'" />';
					echo '<input type="submit" name="deny_answer_msg" value="Отменить ответ" class="button" />';
					echo '</form>';
				}
			} else {
				echo 'Количество сообщений в теме достигнуто максимума.';
			}
		} else {
			echo 'Вы не можете оставлять сообщения в закрытой теме.';
		}
		echo '<br />';
		//Ответ на сообщение
		if(isset($_POST['post_answer_msg'])) {
			$answer_text = htmlspecialchars(trim($_POST['answer_text']));
			if(strlen($answer_text) <= 1024 && strlen($answer_text) > 0) {
				$answer_uid = $_POST['answer_uid'];
				$blabla_arr = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$answer_uid'"));
				$blabla = $blabla_arr['login'];
				$answer_query_1 = mysql_query("INSERT INTO messages VALUES ('','$tid','$id','$answer_text','$cDate','$cTime','default',0,1,'$answer_uid','$answerid')");
				$notify_query_0 = mysql_query("INSERT INTO notifies VALUES ('','$login','$blabla','$answer_text',1,'$cDate','$cTime',0,'$tid')");
				header("Location: topic.php?id=$tid");
			} else {
				echo 'Длина ответ слишком велика, либо вы не ввели ответ.';
			}
		}
		//Отмена ответа
		if(isset($_POST['deny_answer_msg'])) {
			unset($_POST);
			header('Location: topic.php?id='.$tid);
		}
		//Вывод сообщений
		while($row = mysql_fetch_assoc($topic_msgs)) {
			$mid = $row['id'];
			$wid = $row['id_writer'];
			$writer_get_query = mysql_query("SELECT * FROM users WHERE id='$wid'");
			$wgq_arr = mysql_fetch_array($writer_get_query);
			$wlogin = $wgq_arr['login'];
			echo '<div class="message">';
			if($row['answer'] == 0) {
				echo '<a class="link" href="user.php?id='.$wid.'">'.$wlogin.'</a>, '.$row['date'].' '.$row['time'].'<br/><br/>';
				$text011 = $row['text'];
				$text011 = preg_replace($pattern,$replacement,$text011);
				$text011 = str_replace($tsmile,$gsmile,$text011);
				$text011 = str_replace($tsmile_alter,$gsmile,$text011);
				echo $text011;
				if($wid != $id && $tclosed == 0) {
					echo '<form method="post">';
					echo '<input type="hidden" name="answer_ulogin" value="'.$wlogin.'" />';
					echo '<input type="hidden" name="answer_uid" value="'.$wid.'" />';
					echo '<input type="hidden" name="answer_id" value="'.$mid.'" />';
					echo '<input type="submit" name="answer_msg" value="Ответить" class="lbutton" />';
					echo '</form>';
				}
			} else {
				$aanswer_uid = $row['answer_uid'];
				$aanswer_id = $row['answer_mid'];
				$uq1_arr = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$aanswer_uid'"));
				$aanswer_ulogin = $uq1_arr['login'];
				$m1_arr = mysql_fetch_array(mysql_query("SELECT * FROM messages WHERE id='$aanswer_id'"));
				echo '<a class="link" href="user.php?id='.$wid.'">'.$wlogin.'</a> ответил пользователю <a class="link" href="user.php?id='.$aanswer_uid.'">'.$aanswer_ulogin.'</a>, '.$row['date'].' '.$row['time'].'<br/><br/>';
				$text011 = $row['text'];
				$text011 = preg_replace($pattern,$replacement,$text011);
				echo $text011.'<br>';
				echo $m1_arr['text'];
				if($wid != $id && $tclosed == 0) {
					echo '<form method="post">';
					echo '<input type="hidden" name="answer_ulogin" value="'.$wlogin.'" />';
					echo '<input type="hidden" name="answer_uid" value="'.$wid.'" />';
					echo '<input type="hidden" name="answer_id" value="'.$mid.'" />';
					echo '<input type="submit" name="answer_msg" value="Ответить" class="lbutton" />';
					echo '</form>';
				}				
			}
			if($wid == $id || $tcreatorid == $id || $status > 1) {
				echo '<form method="post">';
				echo '<input type="hidden" name="msg_id" value="'.$mid.'"/>';
				echo '<input type="submit" name="remove_msg" value="Удалить" class="lbutton" />';
				echo '</form><form method="post">';
				echo '<input type="hidden" name="msg_id" value="'.$mid.'" />';
				echo '<input type="submit" name="edit_msg" value="Редактировать" class="lbutton" />';
				echo '</form>';
			}
			echo '</div>';
		}
		echo '<br /><br />';
	//Отправка сообщения
	if(isset($_POST['post_msg'])) {
		$mtext = htmlspecialchars(trim($_POST['message']));
		if(strlen($mtext) <= 1024 && strlen($mtext) > 0) {
			$message_query_1 = mysql_query("INSERT INTO messages VALUES ('','$tid','$id','$mtext','$cDate','$cTime','default',0,0,0,0)");
			$message_query_2 = mysql_query("UPDATE topics SET msg_count = msg_count + 1 WHERE id='$tid'");
			header('Location: topic.php?id='.$tid);
		} else {
			gen_error("Превышена максимальная длина сообщения.");
		}
	}
	//Удаление сообщения
	if(isset($_POST['remove_msg'])) {
		$msg_id = $_POST['msg_id'];
		$rmsg_query = mysql_query("DELETE FROM messages WHERE id='$msg_id'");
		header('Location: topic.php?id='.$tid);
	}
	//Редактирование сообщения
	if(isset($_POST['edit_msg'])) {
		$msg_id = $_POST['msg_id'];
		header("Location: msg_edit.php?id=$msg_id");
	}
		//Закрытие темы
		if(isset($_POST['close_topic'])) {
			$close_topic_sql = mysql_query("UPDATE topics SET closed=1 WHERE id='$tid'");
			header('Location: topic.php?id='.$tid);
		}
		//Открытие темы
		if(isset($_POST['open_topic'])) {
			$open_topic_sql = mysql_query("UPDATE topics SET closed=0 WHERE id='$tid'");
			header('Location: topic.php?id='.$tid);
		}
		//Удаление темы
		if(isset($_POST['remove_topic'])) {
			$delete_topic_sql = mysql_query("DELETE FROM topics WHERE id='$tid'");
			header('Location: topics.php');
		}
		//Редактирование темы
		if(isset($_POST['edit_topic'])) {
			header("Location: topic_edit.php?id=$tid");
		}
	} else {
		gen_error("Ошибка доступа: тема удалена либо еще не создана");
	}
} else {
	gen_error("Ошибка доступа: неизвестен идентификатор топика");
}
} else {
	auth_r();
}
?>
<?php require_once('./includes/bottom.inc.php'); ?>