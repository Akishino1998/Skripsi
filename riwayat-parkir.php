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
        <div class="col-md-8">
        <?php 
          
          if(isset($_GET['q'])){
            $query = "SELECT * FROM showriwayatparkir WHERE id_kendaraan = '".$_GET['q']."' GROUP BY id_kendaraan ";
            $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                  while($data = mysqli_fetch_assoc($hasil) ){
                    ?>
                      
                      <div class="card card-small card-post card-post--aside card-post--1">
                        <div class="card-post__image" style="background-position: center;margin:10px;width:400px;background-image: url('kendaraan/<?php echo $data['foto'] ?>')">
                          <div  class="card-post__category badge badge-pill badge-info"><?php echo $data['jenis_kendaraan']; ?></div>
                        </div>
                        <div class="card-body">
                              <h5 class="card-title">
                                <a class="text-fiord-blue" ><?php echo $data['noRegistrasi']." <br> ".$data['merk']." - ".$data['model'] ?></a>
                              </h5>
                              <p class="card-text d-inline-block mb-3" >
                                Nama Pemilik : <span id="namaPemilik"><?php echo $data["namaPemilik"] ?></span><br>
                                <!-- Juru Parkir : <span id="alamatParkir"></span><br>
                                Lokasi Parkir : <span id="alamatParkir"></span> -->
                              </p>
                        </div>
                        <!-- <div class="card-post__image jukir" style="margin:10px;width:300px;background-image: url('profile/none.jpg')">
                         
                        </div> -->
                      </div>
                      <br>
                    <?php
                  }
                }
            
          }else{
            ?>
                      <div class="card card-small card-post card-post--aside card-post--1">
                        
                        <div class="card-body">
                              <h5 class="card-title">
                                Pilih Kendaraan untuk mengetahui riwayat parkir.
                              </h5>
                        </div>

                      </div>
                      <br>
                    <?php
          }
        ?>
        </div>
        
            <div class="col-md-4">
              <?php 
                if (isset($_GET['q'])) {
              ?>
              <div class="card card-small card-post card-post--aside card-post--1">
                <div class="card-body" id="cardInfo1">
                  <h5 class="card-title">Pilih Lokasi Riwayat Kendaraan.</h5>
                </div>
                <div class="card-body" id="cardInfo2" hidden="true">
                  <p class="card-text d-inline-block mb-3">
                    Biaya : <span id="biayaParkir">1</span> <br>
                    Juru Parkir : <span id="juruParkir"></span> <br>
                    No. HP Jukir : <span id="nojuruParkir"></span> <br>
                    Lokasi Parkir : <span id="alamatParkir"></span>
                  </p>
                </div>
              </div>
              <?php } ?>
              <br>
            </div>
          
        <div class="col-md-4">
          <form action="riwayat-parkir.php" method="get">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="search" name="search">
          </form>
          <div class="ex1">
            <!-- Search form -->
          <br>
          <?php
                $query = "SELECT * FROM showriwayatparkir WHERE IDJUKIR='".$_SESSION["id"]."' GROUP BY id_kendaraan";
                if(isset($_GET['search'])){
                  $search = $_GET["search"];
                  $query = "SELECT * FROM showriwayatparkir WHERE IDJUKIR='".$_SESSION["id"]."' AND noRegistrasi LIKE '%".$search."%' GROUP BY id_kendaraan ";
                }
                $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                  while($data = mysqli_fetch_assoc($hasil) ){
                    ?>
                      <a href="riwayat-parkir.php?q=<?php echo $data['id_kendaraan'] ?>" id="test">
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
                                Tidak Riwayat Parkir Saat Ini.
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
var  alamat, geocoder;
function initMap() {
  <?php 
    if(isset($_GET['q'])){
        ?>
        var latitude = '-0.501617';
        var longtitude = '117.126472';
        geocoder = new google.maps.Geocoder();
        var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
        var map = new google.maps.Map(document.getElementById('mapBox1'), {
          zoom: 8,
          center: myLatLng,
          mapTypeId: 'roadmap'
        });
        var labels = '1';
        
        <?php
        $query = "SELECT * FROM showriwayatparkir WHERE IDJUKIR='".$_SESSION["id"]."' AND id_kendaraan ='".$_GET['q']."'";
        $hasil = mysqli_query($link, $query);
        
        if(mysqli_num_rows($hasil) > 0){
          while($data = mysqli_fetch_assoc($hasil) ){
            ?>
              var latitude = '<?php echo $data['lat']; ?>';
              var longtitude = '<?php echo $data['lng']; ?>';
              var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
              // console.log(myLatLng);
              // setMapOnAll(null);
              marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                label: labels.toString(),
              });
              labels = parseInt(labels)+1;
               
              <?php 
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date = new DateTime();
                $awal  = strtotime($data['tgl_masuk']); //waktu awal
                $akhir = strtotime($data['tgl_keluar']); //waktu akhir
                $diff  = $akhir - $awal;
                
                $jam   = floor($diff / (60 * 60));
                $menit = $diff - $jam * (60 * 60);
                $biaya = "Rp " . number_format($jam*$data['biaya_per_jam'],2,',','.');
              ?>
              
              
              
                marker.addListener('click', function() {
                  var latitude = '<?php echo $data['lat']; ?>';
                  var longtitude = '<?php echo $data['lng']; ?>';
                  var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
                  geocoder.geocode({"latLng":myLatLng}, function (results) {
                    alamat = results[0].formatted_address;
                    // alert(alamat);
                    // alert(alamat);
                      map.setZoom(15);
                      map.setCenter(marker.getPosition());
                      $("#biayaParkir").html("<?php echo $biaya; ?> (<?php echo $jam; ?>:<?php echo $menit; ?>)");
                      $("#juruParkir").html("<?php echo $data['NamaJukir']; ?>");
                      $("#nojuruParkir").html("<?php echo $data['no_hp']; ?>");
                      $("#alamatParkir").html(alamat);
                      $('#cardInfo2').removeAttr('hidden');
                      $('#cardInfo1').prop('hidden',true);
                    
                  }); 
                });   
              
             
                
            <?php
          }
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
  ?>
}


</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  // $( function() {
  //   var availableTags = [
  //     "KT 5155 I"
      
  //   ];
  //   $( "#search" ).autocomplete({
  //     source: availableTags
  //   });
  // });
  </script>