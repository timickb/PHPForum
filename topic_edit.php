<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['id'])) {
	if(isset($_GET['id'])) {
		$tid = $_GET['id'];
		$tidarr = mysql_fetch_array(mysql_query("SELECT * FROM topics WHERE id='$tid'"));
		$cid = $tidarr['id_creator'];
		if($id == $cid || $status == 3) {
			echo back_a().'<div class="header">Редактировать тему</div>';
			echo '<form method="post">';
			echo '<input type="text" name="ttitle" class="field" placeholder="Новый заголовок" required /><br />';
			echo '<input type="hidden" name="tid" value="'.$tid.'" />';
			echo '<input type="submit" class="button" name="topic_change_title" value="Применить" />';
			echo '</form>';
			echo '<form method="post">';
			echo '<textarea class="field" name="trules" rows="6" placeholder="Новые правила" required></textarea><br />';
			echo '<input type="hidden" name="tid" value="'.$tid.'" />';
			echo '<input type="submit" class="button" name="topic_change_text" value="Применить" />';
			echo '</form>';
			echo '<form method="post">';
			echo 'Новое максимальное кол-во сообщений: <select name="tmsg_max" class="select">
			<option value="32">4</option>
			<option value="32">8</option>
			<option value="32">16</option>
			<option value="32">32</option>
			<option value="64">64</option>
			<option value="128">128</option>
			<option value="256">256</option>
			<option value="512">512</option>
			<option value="1024">1024</option>
			<option value="2048">2048</option>
			<option value="4096">4096</option>
			</select><br />';
			echo '<input type="hidden" name="tid" value="'.$tid.'" />';
			echo '<input type="submit" name="topic_change_mm" class="button" value="Применить" />';
			echo '</form>';
		} else {
			echo 'Вы не можете редактировать данную тему';
		}
	}
} else {
	auth_r();
}
?>
<?php require_once('./includes/bottom.inc.php'); ?>