<?php 

include("config.php");
$query = "SELECT * FROM user_akun WHERE username='".$_POST["username"]."'";
$hasil = mysqli_query($link, $query);
echo mysqli_num_rows($hasil);


?>