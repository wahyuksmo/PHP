<?php 

$id = $_GET["id"];

$conn->query("DELETE FROM kategori WHERE id_kategori = $id");


echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=kategori';
		</script>
	";

?>