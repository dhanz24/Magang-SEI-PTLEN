<!DOCTYPE html>
<html>
<head>
	<title>tambah data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@800&display=swap" rel="stylesheet"> 
</head>
<body id="tambah">
	
	
	<form method="post" action="inputuser.php">
		<div class="form-tambah">
		<div id="card-tambah">
		<h2>Tambahkan  Data Pengguna</h2>
		<table>
		<div class="formulir">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Masukan username" id="username" required>
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="text" class="form-control" placeholder="Masukan password" id="password" required>
      </div>

	  <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" placeholder="Masukan Nama" id="name" required>
      </div>
	  <div class="mb-3">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="Masukan Email" id="email" required>
      </div>
	</div>
				<center><input class="btn-simpan" type="submit" value="SIMPAN"></center>
				<center><a href="tampil.php">Kembali</a></center>
			</tr>		
		</table>
</div>
</div>
	</form>
</body>
</html>