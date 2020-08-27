<?php
    session_start();
    include('config.php');
    $query = "SELECT * FROM user_akun, user_biodata WHERE user_akun.id = user_biodata.username AND user_akun.username ='".$_POST['username']."'";
    $hasil = mysqli_query($link, $query);
    if(mysqli_num_rows($hasil) > 0){
        while($data = mysqli_fetch_assoc($hasil) ){
            if(password_verify($_POST["password"],$data["password"])){
                header("Location:index.php?login=berhasil");
                $_SESSION["username"] = $data["username"];
                $_SESSION["nama"] = $data["nama"];
                $_SESSION["id"] = $data["id"];
                $_SESSION["foto"] = $data["foto"];
            }else{
                echo 1;
                header("Location:login.php?login=gagal");
            }
        }
    }else{
        // echo $query;
        header("Location:login.php?login=gagal");
    }



?>
