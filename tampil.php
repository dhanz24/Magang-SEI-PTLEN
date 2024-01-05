<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style-tampil.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@800&display=swap" rel="stylesheet">   
</head>
<body>
    <div class="head">
        <h1>User Management</h1>
        <p> Tambahkan, ubah, dan hapus data management </p>
        <a role="button" class="btn-logout" href="formlogin.php">Log-Out</a>
    </div>
    <hr>
    <form method="POST" action="tambah.php">
        <button type="input" class="button-tambah">Tambah User</button>
    </form>
    <div class="tabel">
        <table class="table table-striped" id="userTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data akan ditambahkan di sini melalui JavaScript -->
            </tbody>
        </table>
    </div>

    <script>
        // Fungsi untuk mengambil data dari API dengan metode GET
        function getDataFromApi() {
            fetch('http://localhost:8080/user')
                .then(response => response.json())
                .then(data => {
                    // Bersihkan tabel sebelum menambahkan data baru
                    document.getElementById('userTable').getElementsByTagName('tbody')[0].innerHTML = '';
                    // Tambahkan data ke tabel
                    addDataToTable(data.data);
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Fungsi untuk menambahkan data ke tabel
        function addDataToTable(data) {
            const userTableBody = document.getElementById('userTable').getElementsByTagName('tbody')[0];
            data.forEach((user, index) => {
                const row = userTableBody.insertRow(index);
                const cellNo = row.insertCell(0);
                const cellUsername = row.insertCell(1);
                const cellName = row.insertCell(2);
                const cellEmail = row.insertCell(3);
                const cellActions = row.insertCell(4);

                cellNo.innerText = index + 1;
                cellUsername.innerText = user.username;
                cellName.innerText = user.name;
                cellEmail.innerText = user.email;

                // Tambahkan tombol ubah dan hapus
                const editButton = document.createElement('a');
                editButton.href = 'edit.php?id=' + user.userid; // Assuming "userid" is the correct property
                editButton.className = 'btn-ingfo';
                editButton.innerText = 'Ubah';

                const deleteButton = document.createElement('a');
                deleteButton.href = 'hapus.php?id=' + user.userid; // Assuming "userid" is the correct property
                deleteButton.className = 'btn-hapus';
                deleteButton.innerText = 'HAPUS';

                cellActions.appendChild(editButton);
                cellActions.appendChild(deleteButton);
            });
        }

        // Panggil fungsi untuk mengambil dan menampilkan data saat halaman dimuat
        document.addEventListener('DOMContentLoaded', getDataFromApi);
    </script>
</body>
</html>