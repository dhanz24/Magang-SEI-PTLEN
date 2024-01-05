<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@800&display=swap" rel="stylesheet"> 
</head>
<body id="tambah">

    <form id="userForm" method="post" action="inputuser.php">
        <div class="form-tambah">
            <div id="card-tambah">
                <h2>Registrasi Pengguna</h2>
                <table>
                    <div class="formulir">
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" placeholder="Masukkan username" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" placeholder="Masukkan password" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="Masukkan Email" id="email" name="email" required>
                        </div>
                    </div>
                    <tr>
                        <td></td>
                        <td><input class="btn-simpan" type="button" value="SIMPAN" onclick="addUser()"></td>
                        <td><a href="formlogin.php">Kembali</a></td>
                    </tr>        
                </table>
            </div>
        </div>
    </form>

    <script>
        // Fungsi untuk menambahkan user
        function addUser() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;

            if (!username || !password || !name || !email) {
                alert('Semua field harus diisi!');
                return;
            }

            fetch('http://localhost:8080/user', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    username: username,
                    password: password,
                    name: name,
                    email: email,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'Success') {
                    alert('User berhasil ditambahkan!');
                    // You may choose to redirect or perform any other actions here
					window.location.href = 'login.php';
                } else {
                    alert('Gagal menambahkan user. Silakan coba lagi.');
                }
            })
            .catch(error => console.error('Error adding user:', error));
        }
    </script>

</body>
</html>