<html>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@800&display=swap" rel="stylesheet">   

<head>
  <title> Form login </title>

  
   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="fav.ico" />
</head>

  <body id="formlogin">

    <!-- background page -->
    <img id="bg" src="bg-asset.png"/>
    <img id="logo" src="PT SEI.png"/>
          
    <form method="POST">
    <div class="form-login">
    <div id="card">
      <h2>Log-in</h2>
      <div class="formulir">
        <div class="mb-3">
            <label>Username</label>
            <input type="username" class="form-control" placeholder="Masukan username anda" name="username" required>
          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Masukan password anda" name="password" required>
          </div>

          <center><button type="submit" class="btn" onclick="login()">Login</button></center>

        </div>
      </div>
    </div>
    </form>

    <script>
    async function login() {
      // Ambil nilai dari formulir
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;

      // Buat objek data untuk dikirimkan ke API
      const data = {
        username: username,
        password: password
      };

      try {
        // Kirim permintaan ke API menggunakan Fetch API
        const response = await fetch('http://localhost:8080/Login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        });

        // Periksa status respons
        if (response.ok) {
          // Respons sukses, tambahkan logika keberhasilan di sini
          console.log('Login berhasil!');
        } else {
          // Respons gagal, tambahkan logika kegagalan di sini
          console.error('Login gagal!');
        }
      } catch (error) {
        // Tangkap dan tangani kesalahan yang terjadi selama pengiriman
        console.error('Error:', error);
      }
    }
  </script>

  </body>
</html>
