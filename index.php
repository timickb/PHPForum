<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['id'])) {
	header('Location: topics.php');
} else {
	echo '<div class="header">Авторизация</div>';
	echo '<form method="post">';
	echo '<input type="text" name="alogin" class="field" placeholder="Логин" value="';
	if(isset($_POST['alogin'])) {
		echo $_POST['alogin'];
	}
	echo '" required /><br>';
	echo '<input type="password" name="apassword" class="field" placeholder="Пароль" value="';
	if(isset($_POST['apassword'])) {
		echo $_POST['apassword'];
	}
	echo '" required /><br>';
	echo '<input type="submit" name="auth" class="button" value="Войти" />';
	echo '</form>';
}
?>
<?php require_once('./includes/bottom.inc.php'); ?>