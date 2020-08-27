<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('config.php');
include_once('layouts/header.php');
$id = $_GET['q'];
$query = "SELECT * FROM user_kendaraan WHERE user_kendaraan.id_kendaraan=$id";
$hasil = mysqli_query($link, $query);
  if (mysqli_num_rows($hasil) > 0) {
      while ($data = mysqli_fetch_assoc($hasil)) {
        $plat = explode(" ", $data['noRegistrasi']);
     
?>
        <div class="main-content-container container-fluid px-4">
            <div class="row">
              <div class="col-lg-8 mx-auto mt-4">
                <!-- Edit User Details Card -->
                <div class="card card-small edit-user-details mb-4">
                  <form  action="kendaraan-update.php" method="post" enctype="multipart/form-data">
                    <div class="card-body p-0">
                      <div class="form-row mx-4">
                        <div class="col mb-3">
                          <h6 class="form-text m-0">Edit Kendaraan</h6>
                          <p class="form-text text-muted m-0">Sesuaikan dengan kendaraan anda.</p>
                        </div>
                      </div>
                      <div class="form-row mx-4">
                        <div class="col-lg-12">
                        <label>No Registrasi</label>
                          <div class="form-row">
                            <div class="form-group col-md-2">
                              <input type="text" class="form-control" name="noRegistrasi[]" placeholder="KT ..." style="text-align: center;" value="<?php echo $plat[0]; ?>" required>
                            </div>
                            <div class="form-group col-md-8">
                              <input type="text" class="form-control" name="noRegistrasi[]"  placeholder="5155 ..." style="text-align: center;"  value="<?php echo $plat[1]; ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                              <input type="text" class="form-control" name="noRegistrasi[]"  placeholder="I" style="text-align: center;"  value="<?php echo $plat[2]; ?>" required>
                            </div>
                            <div class="form-group col-md-12">
                              <label for="namaPemilik">Nama Pemilik</label>
                              <div class="input-group input-group-seamless">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                  </div>
                                </div>
                                <input type="text" class="form-control" id="namaPemilik" name="namaPemilik" value="<?php echo $data['namaPemilik']; ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat">Alamat</label>
                                <textarea style="min-height: 87px;" id="alamat" name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="jenis_kendaraan">Jenis Kendaraan</label>
                              <select class="custom-select" name="jenis_kendaraan">
                                <?php 
                                    $query = "SELECT * FROM  ref_jenis_kendaraan";
                                    $hasil = mysqli_query($link, $query);
                                    if (mysqli_num_rows($hasil) > 0) {
                                        while ($data2 = mysqli_fetch_assoc($hasil)) {
                                            if($data2['id_ref_kendaraan'] == $data['jenis_kendaraan']){
                                              echo '<option value="'.$data2["id_ref_kendaraan"].'" selected>'.$data2["jenis_kendaraan"].'</option>';
                                            }else{
                                              echo '<option value="'.$data2["id_ref_kendaraan"].'">'.$data2["jenis_kendaraan"].'</option>';
                                            }
                                            
                                        }
                                    }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="merk">Merk</label>
                              <select class="custom-select" name="merk">
                                <?php 
                                    $query = "SELECT * FROM  ref_merk";
                                    $hasil = mysqli_query($link, $query);
                                    if (mysqli_num_rows($hasil) > 0) {
                                        while ($data2 = mysqli_fetch_assoc($hasil)) {
                                          if($data['merk'] == $data2['id_merk']){
                                            echo '<option value="'.$data2["id_merk"].'" selected>'.$data2["merk"].'</option>';
                                          }else{
                                            echo '<option value="'.$data2["id_merk"].'">'.$data2["merk"].'</option>';
                                          }
                                            
                                        }
                                    }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                            <label for="model">Model</label>
                              <select class="custom-select" name="model">
                                <?php 
                                    $query = "SELECT * FROM  ref_model_kendaraan";
                                    $hasil = mysqli_query($link, $query);
                                    if (mysqli_num_rows($hasil) > 0) {
                                        while ($data2 = mysqli_fetch_assoc($hasil)) {
                                          if($data['modal'] == $data2['id_model']){
                                            echo '<option value="'.$data2["id_model"].'" selected>'.$data2["model"].'</option>';
                                          }else{
                                            echo '<option value="'.$data2["id_model"].'">'.$data2["model"].'</option>';
                                          }
                                            
                                        }
                                    }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="seri">Seri</label>
                              <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" id="seri" placeholder="Beat ..." name="seri" value="<?php echo $data['seri']; ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="warna">Warna</label>
                              <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" id="warna" placeholder="Biru ..." name="warna" value="<?php echo $data['warna']; ?>">
                              </div>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="tahunPembuatan">Tahun Pembuatan</label>
                              <div class="input-group input-group-seamless">
                                <input type="text" class="form-control" id="tahunPembuatan" placeholder="Biru ..." name="tahunPembuatan"  value="<?php echo $data['tahunPembuatan']; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="form-row mx-4 ">
                        <label>Foto Kendaraan</label>
                        <div class="custom-file">
                        
                          <input type="file" accept="image/*" onchange="loadFile(event)"  class="custom-file-input" id="customFile" name="foto">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <br><br><br>
                        <div class="row">
                          
                          <div class="col-md-6">
                            <h6>Foto Sebelumnya</h6>
                            <img src="kendaraan/<?php echo $data['foto']; ?>" width="100%"/>
                            <input type="text" name="fotobefore" value="<?php echo $data['foto'] ?>" hidden>
                          </div>
                          <div class="col-md-6">
                            <h6>Foto Yang Akan Diubah</h6>
                            <img id="output" width="100%"/>
                          </div>
                        </div>
                        
                      </div>
                    <input type="text" name="id_kendaraan" value="<?php echo $data['id_kendaraan']; ?>" hidden>
                  </div>
                    <div class="card-footer border-top">
                      <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">
                    </div>
                  </form>
                </div>
                <!-- End Edit User Details Card -->
              </div>
            </div>
          </div>
        </div>
<?php 
 }
}
include_once('layouts/footer.php');
?>
<script>

  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
  $(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>