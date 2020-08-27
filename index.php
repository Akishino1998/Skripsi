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
</style>

<br><br>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
        <h3 class="page-title">Kendaraan Terpakir Saat Ini</h3>
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
function initMap() {

      var latitude = '-0.501617';
      var longtitude = '117.126472';
      var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
      var map = new google.maps.Map(document.getElementById('mapBox1'), {
        zoom: 12,
        center: myLatLng,
        mapTypeId: 'roadmap'
      });
      geocoder = new google.maps.Geocoder();
      infowindow = new google.maps.InfoWindow();
      <?php
        $query = "SELECT * FROM showdetailkendaraanparkir WHERE username='".$_SESSION["username"]."'";
        $hasil = mysqli_query($link, $query);
        
        if(mysqli_num_rows($hasil) > 0){
          while($data = mysqli_fetch_assoc($hasil) ){
            ?>
              var latitude = '<?php echo $data['lat']; ?>';
              var longtitude = '<?php echo $data['lng']; ?>';
              var plat = '<?php echo $data['noRegistrasi']; ?>';
              var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
              // console.log(myLatLng);
              // setMapOnAll(null);
              marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                label: plat,
                icon: "https://cdn.discordapp.com/attachments/701478331115241549/707636193604403270/eko.png"
              });
              
              
                marker.addListener('click', function() {
                  var latitude = '<?php echo $data['lat']; ?>';
                  var longtitude = '<?php echo $data['lng']; ?>';
                  var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
                  geocoder.geocode({"latLng":myLatLng}, function (results) {
                        alamat = results[0].formatted_address;
                        map.setZoom(15);
                        map.setCenter(myLatLng);
                        var id = <?php echo $data["id_parkir"] ?>;
                        window.location.href = "parkir-terkini.php?q="+id;
                    
                  }); 
                });   
              
             
                
            <?php
          }
        }
      ?>
      
}


</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
