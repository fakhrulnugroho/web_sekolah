<?php 

$query_artikel_terbaru = mysqli_query($koneksi, "SELECT * FROM tbl_artikel ORDER BY tanggal ASC LIMIT 4");
$query_kategori_artikel= mysqli_query($koneksi, "SELECT * FROM tbl_kategori_artikel LIMIT 4");

?>
<div class="col-sm-4">
	<div class="list-group">
		<span class="list-group-item text-white" style="background-color: #ED8240">Artikel Terbaru</span>
		<?php while($artikel_terbaru = mysqli_fetch_assoc($query_artikel_terbaru)) : ?>
			<a href="detail_artikel.php?id=<?= $artikel_terbaru['id'] ?>" class="list-group-item list-group-item-action"><?= $artikel_terbaru['judul'] ?></a>
		<?php endwhile; ?>
	</div>

	<div class="list-group">
		<span class="list-group-item text-white mt-3" style="background-color: #ED8240">Kategori Artikel</span>
		<?php while($kategori_artikel = mysqli_fetch_assoc($query_kategori_artikel)) : ?>
			<a href="kategori.php?id=<?= $kategori_artikel['id'] ?>" class="list-group-item list-group-item-action"><?= $kategori_artikel['nama_kategori'] ?></a>
		<?php endwhile; ?>
	</div>
</div>