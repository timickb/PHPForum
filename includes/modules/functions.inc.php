<?php
function gen_error($message) {
	echo '<div class="error">'.$message.'</div>';
}
function gen_success($message) {
	echo '<div class="success">'.$message.'</div>';
}
function auth_r() {
	echo '<div class="header">Доступ запрещен</div><br>';
	echo '<p><a href="index.php">Войдите</a>, чтобы иметь доступ к данному разделу.</p>';
}
function back_a() {
	if(isset($_SERVER['HTTP_REFERER'])) {
		$rPage = basename($_SERVER['HTTP_REFERER']);
		echo '<script>
		if (screen.width >= 800) {
			document.writeln(\'<a class="back" href="'.$rPage.'"></a>\');
		}
		</script>';
	}
}