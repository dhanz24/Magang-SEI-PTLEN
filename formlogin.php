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
          
    <form method="POST" >
    <div class="form-login">
    <div id="card">
      <h2>Log-in</h2>
      <div class="formulir">
        <div class="mb-3">
            <label>Username</label>
            <input type="username" class="form-control" id="username" placeholder="Masukan username anda" name="username" required>

          </div>

          <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" id="password" placeholder="Masukan password anda" name="password" required>
          </div>

          <center><button type="button" class="btn" onclick="login()">Login</button></center>
          <center><a href="Register.php">Register disini</a></center>

        </div>
      </div>
    </div>
    </form>

    <script>
    async function login() {

      const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            const url = 'http://localhost:8080/login';

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        username: username,
                        password: password,
                    }),
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();
                console.log(data);

                // Check if login was successful and log a success message
                if (data.status === 'Success') {
                    console.log('Login successful!');
                    alert('Login Berhasil');
                    window.location.href = 'tampil.php';
                }

                // Handle the response data as needed (e.g., show a message, redirect, etc.)
                // Note: This is a simple example, and you may want to implement more robust error handling.

            } catch (error) {
                console.error('Fetch error:', error);
            }
        }

  </script>

  </body>
</html>
