<?php 
include('config.php');
include_once('layouts/header.php');
?>
        <div class="main-content-container container">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
                <!-- <span class="text-uppercase page-subtitle">Kendaraan</span> -->
                <h3 class="page-title">Kendaraanku <button class="btn btn-success " data-toggle="modal" data-target="#modaltambahKendaraan">Tambah Kendaraanku <i class="fa fa-plus-circle" aria-hidden="true"></i></button></h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
            <?php
              $query = "SELECT id_kendaraan, id_ref_kendaraan, ref_jenis_kendaraan.jenis_kendaraan, ref_merk.merk, ref_model_kendaraan.model, noRegistrasi, namaPemilik, alamat, seri, warna, foto, tahunPembuatan, stat_parkir FROM ref_jenis_kendaraan, ref_merk,ref_model_kendaraan,user_kendaraan WHERE user_kendaraan.jenis_kendaraan = ref_jenis_kendaraan.id_ref_kendaraan AND user_kendaraan.merk = ref_merk.id_merk AND user_kendaraan.model = ref_model_kendaraan.id_model AND username = '".$_SESSION['id']."'";
              $hasil = mysqli_query($link, $query);
                if(mysqli_num_rows($hasil) > 0){
                  while($data = mysqli_fetch_assoc($hasil) ){
                  ?>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-small card-post mb-4">                  
                  <div class="card-body">
                  <a href="editKendaraan.php?q=<?php echo $data['id_kendaraan']; ?>"><button class="btn btn-primary float-right"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                    <h5 class="card-title"><?php echo $data['noRegistrasi']; ?></h5>
                    <img src="kendaraan/<?php echo $data['foto']; ?>" alt="" width="100%">
                    <p class="card-text"> <?php echo $data['merk']; ?> - <?php echo $data['seri']; ?></p>
                  </div>
                  <div class="card-footer border-top d-flex">
                    <div class="card-post__author d-flex">
                      
                      <div class="d-flex flex-column justify-content-center ml-3">
                        <span class="card-post__author-name"><?php echo $data['namaPemilik']; ?></span>
                        <small class="text-muted"><?php echo $data['jenis_kendaraan']; ?> - <?php echo $data['model']; ?></small>
                      </div>
                    </div>
                    <?php 
                      if($data['stat_parkir'] == "Y"){
                        ?>
                        <div class="my-auto ml-auto">
                          <a class="btn btn-sm btn-warning" href="parkir-terkini.php?q=<?php echo $data['id_kendaraan']; ?>">
                          <i class="fa fa-product-hunt" aria-hidden="true"></i> Terpakir </a>
                        </div>
                        <?php 
                      }
                    ?>
                  </div>
                </div>
              </div>
              <?php
                        }
                    }
                ?>
            </div>
          </div>
          <!-- Modal -->
        <div class="modal fade" id="modaltambahKendaraan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <form action="kendaraan-input.php" method="post" enctype="multipart/form-data">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <ul class="list-group list-group-flush" wfd-id="13">
                    <li class="list-group-item p-3" wfd-id="14">
                      <div class="row" wfd-id="15">
                        <div class="col" wfd-id="16">
                          <div class="form-row" wfd-id="36">
                            <div class="form-group col-md-12" wfd-id="24">
                              <label for="feInputState" wfd-id="26">Jenis Kendaraan</label>
                              <select id="feInputState" class="form-control" name="jenis_kendaraan" required="">
                                <option value="" >Choose...</option>
                                  <?php
                                      $query = "SELECT * FROM ref_jenis_kendaraan";
                                      $hasil = mysqli_query($link, $query);
                                      if(mysqli_num_rows($hasil) > 0){
                                        while ($datas = mysqli_fetch_assoc($hasil)) {
                                          echo '<option value="'.$datas["id_ref_kendaraan"].'">'.$datas["jenis_kendaraan"].'</option>';
                                        }
                                      }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-row" wfd-id="36">
                              <div class="form-group col-md-2" wfd-id="39">
                                <label for="feFirstName" wfd-id="40">#</label>
                                <input type="text" class="form-control" id="feFirstName"  name="noRegistrasi[]" required>
                              </div>
                              <div class="form-group col-md-8" wfd-id="39">
                                <center><label for="feFirstName" wfd-id="40">No Registrasi</label></center>
                                <input type="text" class="form-control" id="feFirstName"  name="noRegistrasi[]" required>
                              </div>
                              <div class="form-group col-md-2 " wfd-id="39">
                                <label for="feFirstName" wfd-id="40">#</label>
                                <input type="text" class="form-control" id="feFirstName"  name="noRegistrasi[]" required>
                              </div>
                            </div>
                            <div class="form-row" wfd-id="36">
                              <div class="form-group col-md-12" wfd-id="37">
                                <label for="feLastName" wfd-id="38">Nama Pemilik</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Nama Anda..." name="namaPemilik" required>
                              </div>
                            </div>
                            <div class="form-row" wfd-id="18">
                              <div class="form-group col-md-12" wfd-id="19">
                                <label for="feDescription" wfd-id="20">Alamat</label>
                                <textarea class="form-control" rows="5" name="alamat" required></textarea>
                              </div>
                            </div>
                            <div class="form-row" wfd-id="36">
                              <div class="form-group col-md-6" wfd-id="24">
                                <label for="feInputState" wfd-id="26">Merk</label>
                                <select id="feInputState" class="form-control" name="merk" required>
                                  <option value="">Choose...</option>
                                  <?php
                                      $query = "SELECT * FROM ref_merk";
                                      $hasil = mysqli_query($link, $query);
                                      if(mysqli_num_rows($hasil) > 0){
                                        while ($datas = mysqli_fetch_assoc($hasil)) {
                                          echo '<option value="'.$datas["id_merk"].'">'.$datas["merk"].'</option>';
                                        }
                                      }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group col-md-6" wfd-id="39">
                                <label for="feFirstName" wfd-id="40">Seri Motor</label>
                                <input type="text" class="form-control" id="feFirstName" placeholder="Contoh : CRV..." name="seri" required>
                              </div>
                            </div>
                            <div class="form-row" wfd-id="36">
                              <div class="form-group col-md-4" wfd-id="24">
                                <label for="feInputState" wfd-id="26">Model</label>
                                <select id="feInputState" class="form-control" name="model" required>
                                  <option value="">Choose...</option>
                                  <?php
                                      $query = "SELECT * FROM ref_model_kendaraan";
                                      $hasil = mysqli_query($link, $query);
                                      if(mysqli_num_rows($hasil) > 0){
                                        while ($datas = mysqli_fetch_assoc($hasil)) {
                                          echo '<option value="'.$datas["id_model"].'">'.$datas["model"].'</option>';
                                        }
                                      }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group col-md-4" wfd-id="39">
                                <label for="feFirstName" wfd-id="40">Warna</label>
                                <input type="text" class="form-control" id="feFirstName" placeholder="Warna Motormu..." name="warna" required>
                              </div>
                              <div class="form-group col-md-4" wfd-id="39">
                                <label for="feFirstName" wfd-id="40">Tahun</label>
                                <input type="text" class="form-control" id="feFirstName" placeholder="Tahun Pembuatan..." name="tahunPembuatan" required>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="class-group col-md-12">
                                <div class="custom-file">
                                  <input type="file"  required="" name="fotoKendaraan" />
                                  <!-- <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                  <div class="invalid-feedback">Example invalid custom file feedback</div> -->
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </li>
                  </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
          </form>
        </div>
<?php 
include_once('layouts/footer.php');
?>
<script>
            $('#validatedCustomFile').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
</script>
<?php 
if(isset($_GET['simpan'])){
  ?>
  <script>
    swal({
      title: "Berhasil!",
      text: "Kendaraan telah ditambahkan!",
      icon: "success",
      button: "OK!",
    });
  </script>
  <?php
}
?>