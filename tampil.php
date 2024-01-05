<!DOCTYPE html>
<head>
	<title>tampil data</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="style-tampil.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@800&display=swap" rel="stylesheet">   
</head>
<body>
 <div class="head">
	<h1>User Management</h1>
	<p> Tambahkan, ubah, dan hapus data management DHNZ Laundry </p>
	<a role="button" class="btn-logout" href=formlogin.php>Log-Out</a>
</div>
<hr></hr>
    <form method="POST" action="tambah.php">
    <button type="input" class="button-tambah">Tambah User</button>

    </form>
	<div class="tabel">
	<table class="table table-striped">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th>Aksi</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from user");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['password']; ?></td>
				<td><?php echo $d['level']; ?></td>
				<td>
					<a role ="button" class="btn-ingfo" href="edit.php?id=<?php echo $d['id_user']; ?>">Ubah</a>
					<a role ="button" class="btn-hapus" href="hapus.php?id=<?php echo $d['id_user']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	</div>
</body>
</html>