<?php
include("koneksi.php");
?>
<html>
    <head>
</head>
<body>
    <center>
        <header>
            <h3> DATA PENYEWAAN DVD</h3>
</header>
<table border="3">
    <tr>
    <td>No</td>
    <td>Nama Penyewa</td>
    <td>Alamat</td>
    <td>Genre film</td>
    <td>Judul film</td>
    <td>Tahun film</td>
    <td>Tanggal sewa</td>
    <td>Tanggal kembali</td>
    <td>Harga</td>
    <td>Aksi</td>
    </tr>

    <?php
    include("koneksi.php");
    $query=mysqli_query($koneksi, "SELECT * FROM tb_penyewa INNER JOIN
    tb_dvd ON tb_penyewa.id_dvd = tb_dvd.id_dvd");

while($sewa= mysqli_fetch_array($query)){
    echo "<tr>";
        echo "<td>".$sewa['id_penyewa']."</td>";
        echo "<td>".$sewa['nama_penyewa']."</td>";
        echo "<td>".$sewa['alamat']."</td>";
        echo "<td>".$sewa['genre_film']."</td>";
        echo "<td>".$sewa['judul_film']."</td>";
        echo "<td>".$sewa['tahun_film']."</td>";
        echo "<td>".$sewa['tanggal_sewa']."</td>";
        echo "<td>".$sewa['tanggal_kembali']."</td>";
        echo "<td>".$sewa['harga']."</td>";
        echo"<td>";
        echo "<a href='edit.php?id_penyewa=".$sewa['id_penyewa']."'>Edit</a> |";
        echo "<a href='hapus.php?id_penyewa=".$sewa['id_penyewa']."'>Hapus</a> ";
        echo"</td>";
        echo"</tr>";
        
}
?>
<a href="tambah.php"><input type="button" value="Tambah">
</table>
</body>
</html>