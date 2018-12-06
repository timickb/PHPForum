<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['id'])) {
	echo back_a().'<div class="header">Параметры учетной записи</div><br><br>';
	echo 'Изменить пароль';
	echo '<form method="post">';
	echo '<input type="password" name="tpsw" class="field" placeholder="Текущий пароль" required /><br>';
	echo '<input type="password" name="npsw" class="field" placeholder="Новый пароль" required /><br>';
	echo '<input type="password" name="rnpsw" class="field" placeholder="Повторите новый пароль" required /><br>';
	echo '<input type="submit" name="change_psw" class="button" value="Изменить" />';
	echo '</form><br>';
	echo 'Изменить цвет:';
	echo '<form method="post">';
	echo '<select name="new_color" class="select">';
	echo '<option value="default">Стандартный</option>';
	echo '<option value="deepskyblue">Голубой</option>';
	echo '<option value="orange">Оранжевый</option>';
	echo '<option value="green">Зеленый</option>';
	echo '<option value="purple">Фиолетовый</option>';
	echo '</select><br>';
	echo '<input type="submit" class="button" name="change_color" value="Изменить" />';
	echo '</form><br>';
	echo 'Изменить порядок вывода информации:';
	echo '<form method="post">';
	echo '<select name="new_order" class="select">';
	echo '<option value=0>От новой записи к старой</option>';
	echo '<option value=1>От старой записи к новой</option>';
	echo '</select><br>';
	echo '<input type="submit" class="button" name="change_out_order" value="Изменить" />';
	echo '</form><br>';
	echo 'Какие темы отображать?';
	echo '<form method="post">';
	echo '<select name="new_out" class="select">';
	echo '<option value=0>Все</option>';
	echo '<option value=1>Только мои</option>';
	echo '</select><br>';
	echo '<input type="submit" class="button" name="change_topics_out" value="Изменить" />';
	echo '</form><br>';
} else {
	auth_r();
}
?>
<?php require_once('./includes/bottom.inc.php'); ?>