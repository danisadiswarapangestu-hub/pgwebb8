<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = ""; // Kosongkan jika password default XAMPP Anda kosong
$dbname = "latihan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

// Link menu Input
echo "<a href='input/index.html'>Input</a><br><br>";

if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
    <th>Kecamatan</th>
    <th>Longitude</th>
    <th>Latitude</th>
    <th>Luas</th>
    <th>Jumlah Penduduk</th>
    <th colspan='2'>Aksi</th>
    </tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["kecamatan"] . "</td>
        <td>" . $row["longitude"] . "</td>
        <td>" . $row["latitude"] . "</td>
        <td>" . $row["luas"] . "</td>
        <td align='right'>" . $row["jumlah_penduduk"] . "</td>
        <td><a href='delete.php?id=" . $row["id"] . "'>hapus</a></td>
        <td><a href='edit.php?id=" . $row["id"] . "'>edit</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>