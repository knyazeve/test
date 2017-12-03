<form action='<?= $_SERVER['REQUEST_URI']?>' method='post'>
	<table>
		<tr>
			<td>	<label>Дата (XX-XX-XXXX) </label></td>
			<td>	<input name='date' type='text' pattern="[0-9]{2}\-[0-9]{2}\-[0-9]{4}" value="<?php echo $data['date']?>" size="11"/><br /></td>		
		</tr>
		<tr>
			<td><label>Источник </label></td>
			<td><input name='source_url' type='text' value="<?php echo $data['source_url']?>" size="100"/><br /></td>
		</tr>
		<tr>
			<td><label>Заголовок </label></td>
			<td><input name='title' type='text' value="<?php echo $data['title']?>" size="100"/><br /></td>
		</tr>
		<tr>
			<td><label>Описание </label></td>
			<td><input name='description' type='text' value="<?php echo $data['description']?>" size="100"/><br /></td>
		</tr>
		<tr>
			<td><label>Контент </label></td>
			<td><textarea name='content' type='text' cols="91" rows="20"/><?php echo $data['content']?></textarea><br /></td>
		</tr>
	</table>
  <input hidden name='id' type='text' value="<?php echo $data['id']?>"/>
	<input type='submit' value='Сохранить' />
</form>	