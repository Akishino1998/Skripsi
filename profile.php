<?php 
include('config.php');
include_once('layouts/header.php');
?>
          <div class="main-content-container container-fluid px-4" wfd-id="3">
            <div class="row" wfd-id="4">
              <div class="col-lg-8 mx-auto mt-4" wfd-id="5">
                <!-- Edit User Details Card -->
                <?php 
                  $query = "SELECT * FROM user_biodata WHERE username ='".$_SESSION["username"]."'";
                  $hasil = mysqli_query($link, $query);
                    if(mysqli_num_rows($hasil) > 0){
                      while ($data = mysqli_fetch_assoc($hasil)) {

                        ?>
                        <form action="save-profile.php" method="post" enctype="multipart/form-data">
                        <input type="text" value="<?php echo $data['id_biodata'] ?>" name="id" hidden>
                          <div class="card card-small edit-user-details mb-4" wfd-id="6">
                            <div class="card-body p-0" wfd-id="8">
                              
                              <div action="#" class="py-4" wfd-id="9">
                                <div class="form-row mx-4" wfd-id="117">
                                  <div class="col mb-3" wfd-id="118">
                                    <h3 class="form-text m-0">Biodata Saya</h3>
                                  </div>
                                </div>
                                <div class="form-row mx-4" wfd-id="88">
                                  <div class="col-lg-8" wfd-id="93">
                                    <div class="form-row" wfd-id="94">
                                      <div class="form-group col-md-12" wfd-id="115">
                                        <label for="nama_lengkap" wfd-id="116">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" value="<?php echo $data['nama'] ?>" name="nama" required>
                                      </div>
                                      <div class="form-group col-md-6" wfd-id="108">
                                        <label for="tgl_lahir" wfd-id="116">Tgl Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" value="<?php echo $data['tgl_lahir'] ?>" name="tgl_lahir" required>
                                      </div>
                                      <div class="form-group col-md-6" wfd-id="103">
                                        <label for="no_hp" wfd-id="107">No. HP</label>
                                        <div class="input-group input-group-seamless" wfd-id="104">
                                          <div class="input-group-prepend" wfd-id="105">
                                            <div class="input-group-text" wfd-id="106">
                                              <i class="material-icons"></i>
                                            </div>
                                          </div>
                                          <input type="text" class="form-control" id="no_hp" value="<?php echo $data['no_hp'] ?>" name="no_hp" required>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-12" wfd-id="98">
                                        <label for="email" wfd-id="102">Email</label>
                                        <div class="input-group input-group-seamless" wfd-id="99">
                                          <div class="input-group-prepend" wfd-id="100">
                                            <div class="input-group-text" wfd-id="101">
                                              <i class="material-icons"></i>
                                            </div>
                                          </div>
                                          <input type="email" class="form-control" id="email" value="<?php echo $data['email'] ?>" name="email">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-4" wfd-id="89">
                                    <label for="foto" class="text-center w-100 mb-4" wfd-id="92">Foto Profile</label>
                                    <div class="edit-user-details__avatar m-auto" wfd-id="90">
                                      <img id="foto" src="profile/<?php echo $data['foto'] ?>" alt="User Avatar">
                                      <label class="edit-user-details__avatar__change" wfd-id="91">
                                        <i class="material-icons mr-1"></i>
                                        <input type="file" id="userProfilePicture" id="foto" name="foto" class="d-none">
                                      </label>
                                    </div>
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer border-top" wfd-id="7">
                              <input type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">
                            </div>
                          </div>
                        </form>
                        <?php 
                      }
                    }
                ?>
                
                <!-- End Edit User Details Card -->
              </div>
            </div>
          </div>
<?php 
include_once('layouts/footer.php');
?>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#foto').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
$("#userProfilePicture").change(function() {
  readURL(this);
});
</script>
<?php 
if(isset($_GET['edit'])){
  ?>
  <script>
    swal({
      title: "Good job!",
      text: "Biodata berhasil di ubah!",
      icon: "success",
      button: "OK!",
    });
  </script>
  <?php
}
?>