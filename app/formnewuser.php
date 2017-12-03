<form action='<?= $_SERVER['REQUEST_URI']?>' method='post'>
	<table>
		<tr>
			<td>	<label>Login: </label></td>
			<td>	<input name='login' type='text' value="<?php echo $newUser['login']?>" size="50"/><br /></td>		
		</tr>
		<tr>
			<td><label>Пароль: </label></td>
			<td><input name='password1' type='text' value="<?php echo $password1?>" size="50"/><br /></td>
		</tr>
		<tr>
			<td><label>Повторите пароль: </label></td>
			<td><input name='password2' type='text' value="<?php echo $password2?>" size="50"/><br /></td>
		</tr>
		<tr>
			<td><label>Email: </label></td>
			<td><input name='email' type='text' value="<?php echo $newUser['email']?>" size="50"/><br /></td>
		</tr>
		<tr>
			<td><label>Фамилия: </label></td>
			<td><input name='lastname' type='text' value="<?php echo $newUser['lastname']?>" size="50"/><br /></td>
		</tr>
		<tr>
			<td><label>Имя: </label></td>
			<td><input name='firstname' type='text' value="<?php echo $newUser['firstname']?>" size="50"/><br /></td>
		</tr>
	</table>
	<input type='submit' value='Зарегистрировать' />
</form>	