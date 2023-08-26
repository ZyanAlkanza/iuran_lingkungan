<!DOCTYPE html>
<html lang="en"><head>
		<title>Laporan Pengeluaran</title>
		<style>
			.konten .judul h1 {
				font-family: "Times New Roman", Times, serif;
				padding: 0;
				margin: 0px;
			}
			.konten .judul h3 {
				padding: 0;
				margin: 0px;
			}
			.konten .bungkus table{
				margin-top: 30px;
			}
			.konten .bungkus table,
			th,
			td {
				border: 1px solid black;
				border-collapse: collapse;
				padding: 5px;
			}
			.konten .bungkus table th {
				background-color: rgb(231, 231, 231);
			}
			.tanggal, .biaya{
				text-align: right;
			}

		</style>
</head><body>
		<div class="konten" style="text-align: center">
			<div class="judul">
				<h1>Laporan Pengeluaran</h1>
				<h3>Perumahan Puri Kencana Bekasi</h3>
				<!-- <h3>Periode <php echo date('d F Y', strtotime($_GET['dari'])); ?> - <php echo date('d F Y', strtotime($_GET['sampai'])); ?></h3> -->

				<?php if(!empty($_GET['dari'] && !empty($_GET['sampai']))):?>
					<h3>Periode <?php echo date('d F Y', strtotime($_GET['dari'])); ?> - <?php echo date('d F Y', strtotime($_GET['sampai'])); ?></h3>
				<?php else : ?>
					<h3>Periode Keseluruhan</h3>
				<?php endif; ?>

			</div>
			<div class="bungkus">
				<table style="width:100%">
					<tr>
						<th>No</th>
						<th>Nama Pengeluaran</th>
						<th>Tanggal</th>
						<th>Biaya Pengeluaran</th>
					</tr>
					<?php 
                $no = 1;
                foreach ($pengeluaran as $p) : 
                ?>
					<tr>
						<td style="text-align:center"><?php echo $no++ ?></td>
						<td><?php echo $p->nama_pengeluaran ?></td>
						<td class="tanggal">
							<?php echo date('d F Y', strtotime($p->tanggal_pengeluaran)) ?>
						</td>
						<td class="biaya">Rp. <?php echo number_format($p->biaya_pengeluaran, 0, ',', '.') ?></td>
					</tr>
					<?php endforeach; ?>
					<tr class="total">
						<th class="teks" colspan="3" style="text-align:left">Total</th>
						<th class="angka" colspan="1" style="text-align:right">Rp. <?php echo number_format($total_pengeluaran, 0, ',', '.') ?></th>
					</tr>
				</table>
			</div>
		</div>
</body></html>
