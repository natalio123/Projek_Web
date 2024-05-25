<?php
session_start();

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Pengguna belum login, arahkan ke halaman login
    header("Location: index.php");
    exit();
}

// Koneksi ke database (ganti dengan detail koneksi Anda)
$host = "localhost";
$username = "root";
$password = "";
$db = "reservasi_form";

$conn = new mysqli($host, $username, $password, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data reservasi
$query = "SELECT * FROM reservasi_form";
$result = $conn->query($query);
// Ambil data reservasi ke dalam array
$reservasiData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reservasiData[] = $row;
    }
}

?>

<?php
header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Manajer</title>
    <link rel="stylesheet" href="manager/style.css" />
    <link rel="icon" href="gambar/img.jpg">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="#">WarongWarem</a>
            <div class="search_box">
                <input type="text" placeholder="Search ">
            </div>
        </div>

        <button class="tombol" onclick="logout()">Logout</button>
        </div>
    </header>

    <div class="container">
        <nav>
            <div class="side_navbar">
                <span>Main Menu</span>
                <a href="manajer_dashboard.php" class="active">Dashboard</a>
                <a href=" laporan_reservasi.php" class="active">Laporan Reservasi</a>
                <a href="manejemen_meja.php" class="active">Manajemen Meja</a>
            </div>
        </nav>

        <div class="main-body">
            <h2>Dashboard</h2>

            <div class="promo_card" style="height: 125px; margin: 20px;">
                <h1>Welcome </h1>
                <span>Manajer WarongWarem</span>
            </div>

            <div class=" history_lists">
                <div class="list1">
                    <div class="row" style="margin: 1rem 40px;">
                        <h4>Laporan Reservasi</h4>
                    </div>
                    <table style="margin: 0 40px;">
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jumlah Orang</th>
                            <th>Jenis Meja</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $counter = 0;
                        foreach ($reservasiData as $row) {
                            echo "<tr>
                                <td>" . $row['tanggal'] . "</td>
                                <td>" . $row['waktu'] . "</td>
                                <td>" . $row['jumlah_orang'] . "</td>
                                <td>" . $row['jenis_meja'] . "</t>
                                <td>" . ($row['status'] ?? 'Belum Konfirmasi') . "</td>
                                </tr>";
                            $counter++;
                            if ($counter >= 3) {
                                break; // Hentikan iterasi setelah tiga baris
                            }
                        }
                        ?>
                    </table>
                </div>

                <div class="list2">
                    <div class="row">
                        <h4>Manajemen Meja</h4>
                    </div>
                    <table>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                        </tr>
                        <?php
                        $counter = 0;
                        foreach ($reservasiData as $row) {
                            echo "<tr>
                                <td>" . $row['nama'] . "</td>
                                <td>" . ($row['status'] ?? 'Belum Konfirmasi') . "</td>
                                </tr>";
                            $counter++;
                            if ($counter >= 3) {
                                break; // Hentikan iterasi setelah tiga baris
                            }
                        }

                        //close koneksi
                        $conn->close();
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="manager/script.js"></script>
</body>

</html>
