<?php
if(isset($_POST['tcreate'])) {
	$ttitle = htmlspecialchars(trim($_POST['ttitle']));
	if(strlen($ttitle) <= 96 && strlen($ttitle) > 0) {
		$trules = htmlspecialchars(trim($_POST['trules']));
		if(strlen($trules) <= 1000) {
			$tmsg_max = $_POST['tmsg_max'];
			$topic_query_0 = mysql_query("INSERT INTO topics VALUES ('','$id','$ttitle','$cDate','$cTime',0,'$trules',0,'$tmsg_max','default')");
			$topic_query_1 = mysql_query("SELECT * FROM topics WHERE title='$ttitle'");
			$tq1_arr = mysql_fetch_array($topic_query_1);
			$tid = $tq1_arr['id'];
			$tlink = 'topic.php?id='.$tid;
			$tq_text = 'Пользователь '.$login.' создал тему <a class="link" href="'.$tlink.'">'.$ttitle.'</a>';
			$topic_query_2 = mysql_query("INSERT INTO notifies VALUES ('','$login','all','$tq_text','2','$cDate','$cTime',0,0)");
			header("Location: $tlink");
		} else {
			gen_error("Ошибка: правила темы не должны превышать 1000 символов.");
		}
	} else {
		gen_error("Ошибка: заголовок темы либо превышает 96 символов, либо вы его не заполнили.");
	}
}