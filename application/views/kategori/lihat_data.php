<h3>Kategori Barang</h3>
<?php
	echo anchor('kategori/post','Tambah Data',array('class'=>'btn btn-primary'));
?>
<hr>
<table class="table table-border">
<tr><th width="10">No</th>
	<th>Nama Ketegori</th>
	<th colspan="2">Operasi</th>
</tr>
<?php
	$no = 1;
	foreach ($record->result() as $r) {
		echo "<tr><td>$no</td>
				  <td>$r->nama_kategori</td>
				  <td>".anchor('kategori/edit/'.$r->kategori_id,'Edit')."</td> 	
				  <td>".anchor('kategori/hapus/'.$r->kategori_id,'Hapus')."</td>  
 			  </tr>";
 		$no++;
	}

?>
</table>