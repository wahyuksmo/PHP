<?php 

$id = $_GET["id"];
$result = $conn->query("SELECT * FROM posts WHERE id_posts = $id");
$row = $result->fetch_assoc();

$fotopostingan = $row["foto"];

if(file_exists("../foto_postingan/$fotopostingan")) {
    unlink("../foto_postingan/$fotopostingan");
}
$conn->query("DELETE FROM posts WHERE id_posts = $id");
echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php?halaman=posts';
		</script>
	";

?>