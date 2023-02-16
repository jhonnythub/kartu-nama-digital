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
    <form action="<?= base_url; ?>/auth/resetPost"  method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-file-earmark-check"></i></span>
            <input type="password" class="form-control" name="pass1" id="pass1" placeholder="Masukan Password Baru" required />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-file-earmark-check"></i></span>
            <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Masukan Konfirmasi Password" required />
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" name="resetPass" class="btn btn-success">Ganti Password</button>
        </div>
    </form>
</main>