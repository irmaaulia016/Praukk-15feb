<?php
include("koneksi.php");
if (isset($_POST['tambah'])){
    $nama_penyewa=$_POST['nama_penyewa'];
    $alamat=$_POST['alamat'];
    $genre_film=$_POST['genre_film'];
    $judul_film=$_POST['judul_film'];
    $tahun_film=$_POST['tahun_film'];
    $tanggal_sewa=$_POST['tanggal_sewa'];
    $tanggal_kembali=$_POST['tanggal_kembali'];
    $harga=$_POST['harga'];

    $sql="INSERT INTO tb_dvd(genre_film,judul_film,tahun_film,tanggal_sewa,tanggal_kembali,harga)
    VALUES ('$genre_film','$judul_film','$tahun_film','$tanggal_sewa','$tanggal_kembali','$harga')";
    $query=mysqli_query($koneksi, $sql);

    $sql="SELECT max(id_dvd) AS id_dvd FROM tb_dvd LIMIT 1";
    $query=mysqli_query($koneksi, $sql);

    $data=mysqli_fetch_array($query);
    $id_dvd= $data ['id_dvd'];

    $sql="INSERT INTO tb_penyewa(nama_penyewa,alamat,id_dvd)
    VALUES ('$nama_penyewa','$alamat','$id_dvd')";
    $query=mysqli_query($koneksi, $sql);

    if($query){
        header('location:tampil.php?status=sukses');
    }else{
        header('location:tampil.php?status=gagal');
    }
}
?>

