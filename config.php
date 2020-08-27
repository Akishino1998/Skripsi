<?php

$link = mysqli_connect('localhost', 'root', '', 'markir');

if(!$link){
    die('ada error' . mysqli_connect_error ());

}
// $query = "SELECT * FROM user_akun";
// $hasil = mysqli_query($link, $query);
// if(mysqli_num_rows($hasil) > 0){

//     while($data = mysqli_fetch_assoc($hasil) ){
//         echo $data['username'];
//     }
// }

// mysqli_close($link);

?>