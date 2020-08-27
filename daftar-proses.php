<?php 

include("config.php");
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];

$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
$foto = $_FILES["foto"]["name"];

$query = "SELECT * FROM user_akun WHERE username='$username'";
$hasil = mysqli_num_rows(mysqli_query($link, $query));
if($hasil <= 0){
    $query = "INSERT INTO user_akun (username, password)
    VALUES ('$username','$password');";
    mysqli_query($link, $query);

    $query = "SELECT * FROM user_akun ORDER BY id DESC LIMIT 1";
    $hasil = mysqli_fetch_assoc(mysqli_query($link, $query));
    $id =  $hasil['id'];

    $query = "INSERT INTO user_biodata (username, nama, no_hp, foto)
        VALUES ('$id','$nama','$no_hp','$foto');";
    mysqli_query($link, $query);
}

header("Location:login.php?daftar=".$username);

?>