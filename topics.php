<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['id'])) {
	echo back_a().'<div class="header">Темы форума</div><br />';
	echo '<a href="topic_create.php" class="link">Создать тему</a>';
	if($data_order == 0) {
		if($only_my_topics == 0) {
			$show_topics_sql = mysql_query("SELECT * FROM topics ORDER BY id DESC");
		} else {
			$show_topics_sql = mysql_query("SELECT * FROM topics WHERE id_creator='$id' ORDER BY id DESC");
		}
	} else {
		if($only_my_topics == 0) {
			$show_topics_sql = mysql_query("SELECT * FROM topics");
		} else {
			$show_topics_sql = mysql_query("SELECT * FROM topics WHERE id_creator='$id'");
		}
	}
	while($row0 = mysql_fetch_assoc($show_topics_sql)) {
		$cid = $row0['id_creator'];
		$creator_get_query = mysql_query("SELECT * FROM users WHERE id='$cid'");
		$cgq_arr = mysql_fetch_array($creator_get_query);
		$clogin = $cgq_arr['login'];
		echo '<div class="message">';
		echo '<a class="link" href="user.php?id='.$cid.'">'.$clogin.'</a>, '.$row0['date_create'].' '.$row0['time_create'].'<br/><br/>';
		echo '<hr>';
		echo '<a class="link" href="topic.php?id='.$row0['id'].'">'.$row0['title'].'</a>';
		echo '<hr>';
		echo '</div>';
	}
} else {
	auth_r();
}
?>
<br /><br />
<?php require_once('./includes/bottom.inc.php'); ?>