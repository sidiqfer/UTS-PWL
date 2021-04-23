<?php
require_once '../koneksi.php';
require_once '../models/Pegawai.php';
//1.tangkap request element form
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$agama = $_POST['agama'];
$divisi = $_POST['divisi'];
$foto = $_POST['foto'];
$tombol = $_POST['proses'];
//2.menyimpan data2 di atas sebuah array
$data = [
    $nip, //? 1
    $nama, //? 2
    $email, //? 3
    $agama, //? 4
    $divisi, //? 5
    $foto, //?6
];
//3.proses
$obj = new Pegawai();
switch ($tombol) {
    case 'simpan':
        $obj->simpan($data);
    break;
    case 'ubah':
        $data[] = $_POST['idx'];//tangkap hidden field u/ ? ke-8
        $obj->ubah($data);
    break;
    case 'hapus':
        $id[] = $_POST['idx'];//tangkap hidden field u/ ? ke-1
        $obj->hapus($id);
    break;
    default://tombol batal
        header('Location:http://localhost/PWL/index.php?hal=dataPegawai');
        break;
}

//4.landing page
header('Location:http://localhost/PWL/index.php?hal=dataPegawai');