<?php 
include('config.php');
$id = $_POST['id'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];

$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(@is_array(getimagesize($_FILES["foto"]["tmp_name"]))) {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        // echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
        $namafile= basename($_FILES["foto"]["name"]);
        $query = "UPDATE user_biodata 
        SET nama='$nama',
         tgl_lahir='$tgl_lahir',
         email='$email',
         no_hp= '$no_hp',
         foto='$namafile'
        WHERE id_biodata = '$id'
        ;";
        $_SESSION["foto"] = $namafile;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}else{
    $query = "UPDATE user_biodata 
                SET nama='$nama',
                 tgl_lahir='$tgl_lahir',
                 email='$email',
                 no_hp= '$no_hp'
                WHERE id_biodata = '$id'
                ;";

}
$_SESSION["nama"] = $nama;
echo mysqli_query($link, $query);
header("Location:profile.php?edit=sukses");
?>