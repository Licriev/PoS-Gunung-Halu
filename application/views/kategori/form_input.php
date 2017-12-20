<h3>Tambah Data</h3>
<?php
	echo form_open('kategori/post');
?>
<table class="table table-border">
	<tr><td>Nama Kategori</td>
		<td>
		<div><input type="text" name="kategori" placeholder="kategori"></div>
		</td>
	</tr>
	<tr><td colspan="2">
			<button type="submit" name="submit">Submit</button>
		</td>
	</tr>

</table>
