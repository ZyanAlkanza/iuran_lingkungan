<!DOCTYPE html>
<html lang="en"><head>
		<title>Laporan Iuran Lingkungan</title>
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
		</style>
</head><body>
		<div class="konten" style="text-align: center">
			<div class="judul">
				<h1>Laporan Iuran Lingkungan</h1>
				<h3>Perumahan Puri Kencana Bekasi</h3>
				<!-- <h3>Periode <php echo date('d F Y', strtotime($_GET['dari'])); ?> - <php echo date('d F Y', strtotime($_GET['sampai'])); ?></h3> -->

				<!-- <php if(!empty($_GET['dari'] && !empty($_GET['sampai']))):?>
					<h3>Periode <php echo date('d F Y', strtotime($_GET['dari'])); ?> - <php echo date('d F Y', strtotime($_GET['sampai'])); ?></h3>
				<php else : ?>
					<h3>Periode Keseluruhan</h3>
				<php endif; ?> -->

			</div>
			<div class="bungkus">
				<table>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Blok Rumah</th>
						<th>Tanggal Pembayaran</th>
						<th>Pembayaran Bulan</th>
						<th>Jenis Iuran</th>
						<th>Status</th>
					</tr>
					<?php 
                $no = 1;
                foreach ($transaksi as $tr) : 
                ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $tr->nama_warga ?></td>
						<td><?php echo $tr->blok_rumah ?></td>
						<td>
							<?php echo date('d F Y', strtotime($tr->tanggal_pembayaran)) ?>
						</td>
						<td><?php echo $tr->pembayaran_bulan ?></td>
						<td><?php echo $tr->jenis_iuran ?></td>
						<td>
							<?php if ($tr->status == 0) { 
								echo '<span class="badge badge-pill badge-warning p-1 pr-2 pl-2">Belum di Verifikasi</span>'; 
								} elseif ($tr->status == 1) { 
								echo '<span class="badge badge-pill badge-secondary p-1 pr-2 pl-2">Ditolak</span>'; 
								}elseif ($tr->status == 2) { 
									echo '<span class="badge badge-pill badge-danger p-1 pr-2 pl-2">Belum Bayar</span>'; 
								} else { 
								echo '<span class="badge badge-pill badge-success p-1 pr-2 pl-2">Sudah Bayar</span>'; 
							}?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
</body></html>
