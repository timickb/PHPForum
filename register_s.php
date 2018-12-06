<?php require_once('./includes/top.inc.php'); ?>
<?php
if(isset($_SESSION['registered'])) {
      echo '<div class="header">Вы успешно зарегистрированы на форуме!<br><a href="index.php" class="link">Войти<a></div>';
}
?>
<?php require_once('./includes/bottom.inc.php'); ?>