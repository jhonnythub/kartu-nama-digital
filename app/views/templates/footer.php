<div class="offcanvas offcanvas-end opacity-75" tabindex="-1" id="menu" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel"><b>Menu</b></h5>
    <hr>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <hr>
    <a href="<?= base_url; ?>" class="text-decoration-none"><i class="bi bi-house"></i> Home</a>
    <a href="<?= base_url; ?>/notifikasi" class="text-decoration-none d-block"><i class="bi bi-bell"></i> Notifikasi</a>
    <a href="<?= base_url; ?>/pengaturan" class="text-decoration-none d-block"><i class="bi bi-gear"></i> Pengaturan</a>
    <a href="<?= base_url; ?>/dashboard" class="text-decoration-none d-block"><i class="bi bi-columns-gap"></i> Dashboard</a>
    <a href="#" class="text-decoration-none d-block" data-bs-toggle="modal" data-bs-target="#search"><i class="bi bi-search"></i> Pencarian</a>
    <a href="<?= base_url; ?>/logout" class="text-decoration-none d-block"><i class="bi bi-box-arrow-right"></i> Keluar</a>
  </div>
</div>

<div class="modal" tabindex="-1" id="share">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Share <i class="bi bi-share"></i></h5>
      </div>
      <div class="modal-body">
        <p><h3><i class="bi bi-facebook text-primary"></i> Facebook</h3></p>
        <p><h3><i class="bi bi-instagram text-danger"></i> instagram</h3></p>
        <p><h3><i class="bi bi-whatsapp text-success"></i> whatsapp</h3></p>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="search">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pencarian</h5>
      </div>
      <div class="modal-body">
        <div class="input-group">
          <input type="text" name="search" class="form-control form-control-lg" placeholder="<i>Tulis disini....</i>"/>
          <button type="submit" name="btnSearch" class="btn btn-success"><i class="bi bi-search"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?= base_url; ?>/dist/jquery/jquery.min.js"></script>
<?php if(!isset($_SESSION["lokasi"])) : ?>
<script>
  if( navigator.geolocation.getCurrentPosition ){
    navigator.geolocation.getCurrentPosition(showPosition, errorPosition);
    function showPosition(position){
      var lokasi = position.coords.latitude+' '+position.coords.longitude;

      $.ajax({
        url: '<?= base_url; ?>/lokasi',
        type: 'POST',
        data: {'coordinat':lokasi},
        success: function(data){
          console.log('berhasil');
        }
      });
    }
    function errorPosition(error){
      switch(error.code){
        case error.PERMISSION_DENIED:
          alert('Aplikasi tidak akan berjalan, silahkan beri izin lokasi!');
          location.reload();
          break;
      }
    }
  }
</script>
<?php endif; ?>
<script>
  function pekerjaan(){
    document.getElementById('pekerjaan').innerHTML = "<input type='text' name='pekerjaan' class='form-control form-control-sm' placeholder='Masukan Pekerjaan' value='teknisi'/>";
  }

  function showHide(){
    var pass = document.getElementById('passLogin');
    var eye = document.getElementById('eye');
    if( pass.type == 'password' ){
      eye.innerHTML = '<i class="bi bi-eye-slash"></i>';
      pass.type = 'text';
    }else{
      eye.innerHTML = '<i class="bi bi-eye"></i>';
      pass.type = 'password';
    }
  }

(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
    <script src="<?= base_url; ?>/dist/bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>