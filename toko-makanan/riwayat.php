<?php include('include/header.php') ?>


<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
                    <h3 class="mt-5 mb-5 text-white">Riwayat Belanja <?= $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
    <section class="konten py-5">

<div class="container">
    
    <div class="row">
        <div class="col">
            <div class="table-responsive">
            <table class="table text-center  table-borderless">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
        $id_pelanggan  = $_SESSION["pelanggan"]["id_pelanggan"];
        $nomor = 1;

        $result = $conn->query("SELECT * FROM pembelian WHERE id_pelanggan ='$id_pelanggan'");
        while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                        <th scope="row"><?= $nomor; ?></th>
                        <td><?= $row["tanggal_pembelian"]; ?></td>
                        <td>
                            <?= $row["status_pembelian"]; ?>
                            <br>
                            <?php if (!empty($row["resi_pengiriman"])) :  ?>
                            Resi : <?= $row["resi_pengiriman"]; ?>
                            <?php endif; ?>
                        </td>
                        <td>Rp.<?= number_format($row["total_pembelian"]) ?></td>
                        <td>
                            <a href="nota.php?id=<?= $row["id_pembelian"]; ?>" class="btn btn-sm btn-info text-white">Nota</a>

                            <?php if ($row["status_pembelian"] == "Pending") : ?>
                            <a href="pembayaran.php?id=<?= $row["id_pembelian"]; ?>"
                                class="btn btn-sm btn-success">Kirim Bukti  
                                Pembayaran</a>
                            <?php else : ?>
                            <a href="lihat_pembayaran.php?id=<?= $row["id_pembelian"]; ?>"
                                class="btn btn-sm btn-warning text-white">Lihat Pembayaran</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $nomor++;
        } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>



</section>




<?php include('include/footer.php') ?>