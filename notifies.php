<?php
require_once('./includes/top.inc.php');
if(isset($_SESSION['id'])) {
	echo back_a().'<div class="header">Центр уведомлений</div><br><br>';
	if($status > 1) {
		echo '<a href="notify_send.php" class="link">Отправить уведомление</a><br><br>';
	}
	echo 'Новые уведомления:<br><br>';
	$notify_out_query = mysql_query("SELECT * FROM notifies WHERE to_ = '$login' OR to_ = 'all' ORDER BY id DESC");
	//Отметка сообщения
	if(isset($_POST['read_notify'])) {
		$notify_id = $_POST['nid'];
		$s01 = mysql_query("UPDATE notifies SET readed=1 WHERE id='$notify_id'");
		header('Location: notifies.php');
	}
	if(mysql_num_rows($notify_out_query) > 0) {
		while($row1 = mysql_fetch_assoc($notify_out_query)) {
			if($row1['readed'] == 0) {
				$nid = $row1['id'];
				$sender = $row1['from_'];
				$noq_arr = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE login='$sender'"));
				$sender_id = $noq_arr['id'];
				$topic_id = $row1['topic_id'];
				$blbl_arr = mysql_fetch_array(mysql_query("SELECT * FROM topics WHERE id='$topic_id'"));
				$topic_title = $blbl_arr['title'];
				echo '<div class="message">';
				switch($row1['type']) {
					case 0:
					echo 'Уведомление ';
					break;
					case 1:
					echo '<a class="link" href="user.php?id='.$sender_id.'">'.$sender.'</a> ответил на ваше сообщение в теме <a class="link" href="topic.php?id='.$topic_id.'">'.$topic_title.'</a><br>';
					break;
					case 3:
					echo 'Уведомление от: '.$sender.', ';
					break;
				}
				echo $row1['date'].' '.$row1['time'].'<br /><br />';
				echo '<hr>';
				$text012 = $row1['text'];
				$text012 = preg_replace($pattern,$replacement,$text012);
				echo $text012;
				echo '<hr>';
				echo '<form method="post">';
				echo '<input type="hidden" value="'.$nid.'" name="nid" />';
				echo '<input type="submit" class="button" value="Отметить как прочитанное" name="read_notify" />';
				echo '</form>';
				echo '</div><br><br>';
			}
		}
	} else {
		echo 'Новых уведомлений нет.<br><br>';
	}
	echo '<a class="link" href="notifies_all.php">Все уведомления -></a>';
} else {
	auth_r();
}
require_once('./includes/bottom.inc.php');