<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['id'])) {
	echo back_a().'<div class="header">Создать тему</div>';
	echo '<form method="post">';
	echo '<input type="text" name="ttitle" class="field" placeholder="Заголовок темы" required /><br />';
	echo '<textarea class="field" name="trules" rows="6" placeholder="Правила темы" required></textarea><br />';
	echo 'Максимальное кол-во сообщений: <select name="tmsg_max" class="select">
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
	/*echo 'Выберите цвет: <select name="tcolor" class="select">
		<option value="default">Стандартный</option>
		<option value="black">Черный</option>
		<option value="deepskyblue">Голубой</option>
		<option value="blue">Синий</option>
		<option value="gray">Серый</option>
		<option value="orange">Оранжевый</option>
		<option value="red">Красный</option>
		<option value="brown">Коричневый</option>
		<option value="green">Зеленый</option>
		<option value="purple">Фиолетовый</option>
	</select><br />';*/
	echo '<input type="submit" name="tcreate" class="button" value="Создать тему" />';
	echo '</form>';
} else {
	auth_r();
}
?>
<?php require_once('./includes/bottom.inc.php'); ?>