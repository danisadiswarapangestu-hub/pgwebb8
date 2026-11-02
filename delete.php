<?php
// Ambil nilai id dari parameter URL
$id = $_GET['id'];

// Konfigurasi database MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk menghapus data berdasarkan id
$sql = "DELETE FROM penduduk WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    // Jika berhasil dihapus, arahkan kembali ke halaman utama index.php
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>