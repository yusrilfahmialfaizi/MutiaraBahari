<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
// foreach ($this->cart->contents() as $a)
foreach ($this->session->tempdata() as $a)
{
?>
<table>
	<tr>
		<td><?php echo $a['id']; ?></td>
		<td><?php echo $a['qty']; ?></td>
	</tr>
</table>
<?php } ?><?php 
$this->db->select('MAX(RIGHT(barang.id_barang,4)) AS id_barang', FALSE);
			$this->db->where("id_merek = 'A1' ");
			$this->db->order_by('id_barang','Desc');
			$this->db->limit(1);
			$query = $this->db->get('barang');
			if ($query->num_rows() <> 0) {
				# code...
				$data = $query->row();
				$id = intVal($data->id_barang) + 1;
			}else{
				$id = 1;
			}
			$batas = str_pad($id, 4,"0", STR_PAD_LEFT);
			$id_barang_tampil = "L".$batas;
			return $id_barang_tampil;
 ?>
</body>
</html>