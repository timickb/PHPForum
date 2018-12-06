<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['id'])) {
	if(isset($_GET['id'])) {
		$mid = $_GET['id'];
		$midarr = mysql_fetch_array(mysql_query("SELECT * FROM messages WHERE id='$mid'"));
		$wid = $midarr['id_writer'];
		$wtext = $midarr['text'];
		if($id == $wid || $status == 3) {
			echo back_a().'<div class="header">Редактировать сообщение</div>';
			echo '<form method="post">';
			echo '<textarea name="new_msg" class="field" rows="5" required />'.$wtext.'</textarea><br />';
			echo '<input type="hidden" name="msg_id" value="'.$mid.'" />';
			echo '<input type="submit" name="msg_edit" class="button" value="Изменить" />';
			echo '</form>';
		} else {
			echo 'Вы не можете редактировать данное сообщение';
		}
	}
} else {
	auth_r();
}
?>
<?php require_once('./includes/bottom.inc.php'); ?>