<form action='<?= $_SERVER['REQUEST_URI']?>' method='post'>
<br>
<br>
<br>
	<table>
		<tr>
			<td>	<label>Login: </label></td>
			<td>	<input name='login' type='text' size="50"/><br /></td>		
		</tr>
		<tr>
			<td><label>Пароль: </label></td>
			<td><input name='password' type='text' size="50"/><br /></td>
		</tr>
	</table>
	<input type='submit' value='Войти' />
</form>	