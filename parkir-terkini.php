<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('config.php');
include_once('layouts/header.php');

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    #mapBox1{
		height: 70vh;
        width: 100%;
    }
    div.ex1 {
      height: 65vh;
      width: auto;
      overflow-y: scroll;
    }
    #test{
      text-decoration: none;
    }

</style>

<br><br>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
        <?php  
          if(isset($_GET['q'])){
            $query = "SELECT * FROM showdetailkendaraanparkir WHERE id_kendaraan =".$_GET["q"];
            $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                  while($data = mysqli_fetch_assoc($hasil) ){
                    ?>
                      <div class="card card-small card-post card-post--aside card-post--1">
                        <div class="card-post__image" style="background-position: center;margin:10px;width:400px;background-image: url('kendaraan/<?php echo $data['foto'] ?>')">
                          <div href="#" class="card-post__category badge badge-pill badge-info"><?php echo $data['jenis_kendaraan']; ?></div>
                        </div>
                        <div class="card-body">
                              <h5 class="card-title">
                                <a class="text-fiord-blue" ><?php echo $data['noRegistrasi']." <br> ".$data['merk']." - ".$data['model'] ?></a>
                              </h5>
                              <p class="card-text d-inline-block mb-3">
                                <?php
                                
                                  date_default_timezone_set("Asia/Kuala_Lumpur");
                                  $date = new DateTime();
                                  $awal  = strtotime($data['tgl_masuk']); //waktu awal
                                  $akhir = strtotime($date->format('Y-m-d H:i:s')); //waktu akhir
                                  $diff  = $akhir - $awal;
                                  
                                  $jam   = floor($diff / (60 * 60));
                                  $menit = $diff - $jam * (60 * 60);

                                  $estimasi_biaya = "Rp " . number_format($jam*$data['biaya_per_jam'],2,',','.');
                                  
                                    // $estimasi_biaya = "Rp " . number_format($data['biaya_per_jam'],2,',','.');;
                                  
                                  echo 'Durasi Parkir: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit <br>';
                                ?>
                                Estimasi Biaya : <?php echo $estimasi_biaya; ?><br>
                                Juru Parkir : <?php echo $data['nama']." - ".$data['no_hp']; ?><br>
                                Lokasi Parkir : <span id="alamatParkir"></span>
                              </p>
                        </div>
                        <div class="card-post__image jukir" style="margin:10px;width:300px;background-image: url('profile/none.jpg')">
                         
                        </div>
                      </div>
                      <br>
                    <?php
                  }
                }else{
                  ?>
                  <div class="card card-small card-post card-post--aside card-post--1">
                        
                        <div class="card-body">
                              <h5 class="card-title">
                                Kendaraan tidak ditemukan atau tidak terdaftar.
                              </h5>
                        </div>

                      </div>
                      <br>
                  <?php
                }
            
          }
        ?>
        </div>
        <div class="col-md-4">
          <form action="parkir-terkini.php" method="get">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="search" name="search">
          </form>
          <div class="ex1">
            <!-- Search form -->
          <br>
          <?php
                $query = "SELECT * FROM showdetailkendaraanparkir WHERE username='".$_SESSION["username"]."'";
                if(isset($_GET['search'])){
                  $search = $_GET["search"];
                  $query = "SELECT * FROM showdetailkendaraanparkir WHERE username='".$_SESSION["username"]."' AND noRegistrasi LIKE '%".$search."%'";
                }
                $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                  while($data = mysqli_fetch_assoc($hasil) ){
                    ?>

                      <a href="parkir-terkini.php?q=<?php echo $data['id_kendaraan'] ?>" id="test">
                        <div class="card card-small card-post mb-4">
                            <div class="card-body">
                              <h5 class="card-title"><?php echo $data['noRegistrasi']; ?></h5>
                              <p class="card-text"> <?php echo $data['merk']; ?> - <?php echo $data['seri']; ?></p>
                            </div>
                            <div class="card-footer border-top d-flex">
                              <div class="card-post__author d-flex">
                                <div class="d-flex flex-column justify-content-center ml-3">
                                  <span class="card-post__author-name"><?php echo $data['namaPemilik']; ?></span>
                                  <small class="text-muted"><?php echo $data['jenis_kendaraan']; ?> - <?php echo $data['model']; ?></small>
                                </div>
                              </div>
                            </div>
                        </div>
                      </a>
                    <?php
                  }
                }else{
                  ?>
                  <div class="card card-small card-post card-post--aside card-post--1">
                        <div class="card-body">
                              <h5 class="card-title">
                                Tidak Ada Kendaraan Ditemukan
                              </h5>
                        </div>
                  </div>
                  <?php
                }
                
                    ?>
          </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div id="mapBox1" ></div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php 
include_once('layouts/footer.php');
?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback=initMap" type="text/javascript"></script>
<script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
<script>
var map;
var markers = [];
function initMap() {
  <?php 
    if(isset($_GET['q'])){
      $query = "SELECT * FROM showdetailkendaraanparkir WHERE id_kendaraan =".$_GET["q"];
        $hasil = mysqli_query($link, $query);
        if(mysqli_num_rows($hasil) > 0){
          while($data = mysqli_fetch_assoc($hasil) ){
            ?>
              var latitude = '<?php echo $data['lat']; ?>';
              var longtitude = '<?php echo $data['lng']; ?>';
              var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
              var plat = '<?php echo $data['noRegistrasi']; ?>';
              map = new google.maps.Map(document.getElementById('mapBox1'), {
                zoom: 17,
                center: myLatLng,
                mapTypeId: 'roadmap'
              });
                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  label: plat,
                  icon: "https://cdn.discordapp.com/attachments/701478331115241549/707636193604403270/eko.png"    
                });
                
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({"latLng":myLatLng}, function (results) {
                  $("#alamatParkir").html(results[0].formatted_address);
                });
            <?php
          }
        }else{
          ?>
            var latitude = '-0.501617';
            var longtitude = '117.126472';
            var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
            map = new google.maps.Map(document.getElementById('mapBox1'), {
              zoom: 12,
              center: myLatLng,
              mapTypeId: 'roadmap'
            });
          <?php
        }
        
    }else{
      ?>
      
      var latitude = '-0.501617';
      var longtitude = '117.126472';
      var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
      map = new google.maps.Map(document.getElementById('mapBox1'), {
        zoom: 12,
        center: myLatLng,
        mapTypeId: 'roadmap'
      });
      <?php
      $query = "SELECT * FROM showdetailkendaraanparkir WHERE username='".$_SESSION["username"]."'";
      if(isset($_GET['search'])){
        $search = $_GET["search"];
        $query = "SELECT * FROM showdetailkendaraanparkir WHERE username='".$_SESSION["username"]."' AND noRegistrasi LIKE '%".$search."%'";
      }
      
        $hasil = mysqli_query($link, $query);
        if(mysqli_num_rows($hasil) > 0){
          while($data = mysqli_fetch_assoc($hasil) ){
            ?>
                var latitude = '<?php echo $data['lat']; ?>';
                var longtitude = '<?php echo $data['lng']; ?>';
                var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
                var plat = '<?php echo $data['noRegistrasi']; ?>';
                 marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  label: plat,
                  icon: "https://cdn.discordapp.com/attachments/701478331115241549/707636193604403270/eko.png"  
                });
                
                marker.addListener('click', function() {
                  var id = <?php echo $data["id_kendaraan"] ?>;
                  window.location.href = "parkir-terkini.php?q="+id;
                    
                });   
            <?php
          }
        }
      
    }
  ?>
}


</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    var availableTags = [
      "KT 5155 I"
    ];
    $( "#search" ).autocomplete({
      source: availableTags
    });
  } );
  </script>