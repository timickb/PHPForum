<?php require_once('./includes/top.inc.php'); ?>
<?php back_a(); ?>
<div class="header">Регистрация</div>
<br /><br />
<form action="" method="post">
	<input type="text" name="login" class="field" placeholder="Придумайте логин" required /><br />
	<input type="password" name="password" class="field" placeholder="Придумайте пароль" required /><br />
      <input type="password" name="repassword" class="field" placeholder="Повторите пароль" required /><br />
	<input type="text" name="name" class="field" placeholder="Ваше имя" required /><br />
	<input type="text" name="surname" class="field" placeholder="Ваша фамилия" required /><br />
      <input type="email" name="email" class="field" placeholder="Электронный адрес" required /><br />
	Дата рождения: <select name="born_day" class="select" required>
		<option disabled>День рождения</option>
      	<option value="1">1</option>
      	<option value="2">2</option>
      	<option value="3">3</option>
      	<option value="4">4</option>
      	<option value="5">5</option>
      	<option value="6">6</option>
      	<option value="7">7</option>
      	<option value="8">8</option>
      	<option value="9">9</option>
      	<option value="10">10</option>
      	<option value="11">11</option>
      	<option value="12">12</option>
      	<option value="13">13</option>
      	<option value="14">14</option>
      	<option value="15">15</option>
      	<option value="16">16</option>
      	<option value="17">17</option>
      	<option value="18">18</option>
      	<option value="19">19</option>
      	<option value="20">20</option>
      	<option value="21">21</option>
      	<option value="22">22</option>
      	<option value="23">23</option>
      	<option value="24">24</option>
      	<option value="25">25</option>
      	<option value="26">26</option>
      	<option value="27">27</option>
      	<option value="28">28</option>
      	<option value="29">29</option>
      	<option value="30">30</option>
      	<option value="31">31</option>
    </select>
	<select name="born_month" class="select" required>
		<option disabled>Месяц рождения</option>
      	<option value="1">Январь</option>
      	<option value="2">Февраль</option>
      	<option value="3">Март</option>
      	<option value="4">Апрель</option>
      	<option value="5">Май</option>
      	<option value="6">Июнь</option>
      	<option value="7">Июль</option>
      	<option value="8">Август</option>
      	<option value="9">Сентябрь</option>
      	<option value="10">Октябрь</option>
      	<option value="11">Ноябрь</option>
      	<option value="12">Декабрь</option>
        </select>
	<select name="born_year" class="select" required>
		<option disabled>Год рождения</option>
      	<option value="2012">2012</option>
      	<option value="2011">2011</option>
      	<option value="2010">2010</option>
      	<option value="2009">2009</option>
      	<option value="2008">2008</option>
      	<option value="2007">2007</option>
      	<option value="2006">2006</option>
      	<option value="2005">2005</option>
      	<option value="2004">2004</option>
      	<option value="2003">2003</option>
      	<option value="2002">2002</option>
      	<option value="2001">2001</option>
      	<option value="2000">2000</option>
      	<option value="1999">1999</option>
      	<option value="1998">1998</option>
      	<option value="1997">1997</option>
      	<option value="1996">1996</option>
      	<option value="1995">1995</option>
      	<option value="1994">1994</option>
      	<option value="1993">1993</option>
      	<option value="1992">1992</option>
      	<option value="1991">1991</option>
      	<option value="1990">1990</option>
      	<option value="1989">1989</option>
      	<option value="1988">1988</option>
      	<option value="1987">1987</option>
      	<option value="1986">1986</option>
      	<option value="1985">1985</option>
      	<option value="1984">1984</option>
      	<option value="1983">1983</option>
      	<option value="1982">1982</option>
      	<option value="1981">1981</option>
      	<option value="1980">1980</option>
      	<option value="1979">1979</option>
      	<option value="1978">1978</option>
      	<option value="1977">1977</option>
      	<option value="1976">1976</option>
      	<option value="1975">1975</option>
      	<option value="1974">1974</option>
      	<option value="1973">1973</option>
      	<option value="1972">1972</option>
      	<option value="1971">1971</option>
      	<option value="1970">1970</option>
      </select><br>
      <input type="submit" name="register" class="button" value="Зарегистрироваться" />
</form>
<?php require_once('./includes/bottom.inc.php'); ?>