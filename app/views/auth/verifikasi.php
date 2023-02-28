<header>
<nav class="navbar bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">
      <img src="<?= base_url; ?>/dist/image/frame.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      Kartu Nama Digital
    </a>
  </div>
</nav>
</header>

<main class="form-signin w-100 m-auto">
  <p class="text-center font-monospace">Kami mengirimi anda kode OTP, silahkan masukan kode disini</p>
    <form action="<?= base_url; ?>/otp/otp"  method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-file-earmark-check"></i></span>
            <input type="text" name="otp" class="form-control" id="otp" placeholder="Masukan Kode OTP" required />
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" name="daftar" class="btn btn-success">Kirim</button>
        </div>
        <div class="d-grid gap-2 col-12 mx-auto text-center mt-3">
            <a href="<?= base_url; ?>/auth" class="text-decoration-none font-monospace">Sudah Punya Akun?</a> 
        </div>
    </form>
</main>