<?php 
    session_start();
    include('config.php');
    $username = $_SESSION['username'];
    $id_kendaraan = $_POST['id_kendaraan'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];



    $noRegistrasi = $_POST['noRegistrasi'];
    $plat = "";
    foreach($noRegistrasi as $item){
        if($plat == ""){
            $plat = strtoupper($item);
        }else{
            $plat = $plat." ".strtoupper($item);
        }
    }

    // echo $plat;

    $namaPemilik = $_POST['namaPemilik'];
    $alamat = $_POST['alamat'];
    $merk = $_POST['merk'];
    $seri = $_POST['seri'];
    $model = $_POST['model'];
    $warna = $_POST['warna'];
    $tahunPembuatan = $_POST['tahunPembuatan'];

    $foto = $_POST['fotobefore'];
    if($_FILES['foto']["name"] != "" ){
        $target_dir = "kendaraan/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
        $foto = $_FILES["foto"]["name"];
    }
    $query = "UPDATE user_kendaraan 
                SET username='$username',
                 foto='$foto',
                 jenis_kendaraan='$jenis_kendaraan',
                 noRegistrasi='$plat',
                 namaPemilik='$namaPemilik',
                 alamat= '$alamat',
                 merk= '$merk',
                 seri= '$seri',
                 model = '$model',
                 warna = '$warna',
                 tahunPembuatan= '$tahunPembuatan'
                WHERE id_kendaraan = '$id_kendaraan'
                ;";

    echo $query;
    echo mysqli_query($link, $query);
    header("Location:kendaraan.php?edit=sukses");


?>