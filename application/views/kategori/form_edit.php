<h3>Edit Data</h3>
<?php
	echo form_open('kategori/edit');
?>
<input type="hidden" name="id" value="<?php echo $record['kategori_id'] ?>">
<table border="1">
	<tr><td>Nama Kategori</td>
		<td>
		<input type="text" name="kategori" placeholder="kategori" value="<?php echo $record['nama_kategori']  ?>">
		</td>
	</tr>
	<tr><td colspan="2">
			<button type="submit" name="submit">Submit</button>
		</td>
	</tr>

</table>
