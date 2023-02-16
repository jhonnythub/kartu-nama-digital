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
    <img src="<?= base_url; ?>/dist/image/frame.png" width="100" height="100" class="rounded mx-auto d-block"/>
    <form action="<?= base_url; ?>/auth/registerPost"  method="POST">
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Lembaga</label>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
            <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama Lengkap" required />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-broadcast-pin"></i></span>
            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukan Lokasi" value="" required />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-pc-display"></i></span>
            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Tulis Pekerjaan Anda" required />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email" required />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <input type="password" name="pass" class="form-control" id="passLogin" placeholder="Masukan Kata Sandi" required />
            <span class="input-group-text" onclick="showHide();" id="eye"><i class="bi bi-eye"></i></span>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" name="daftar" class="btn btn-success">Mendaftar</button>
        </div>
        <div class="d-grid gap-2 col-12 mx-auto text-center mt-3">
            <a href="<?= base_url; ?>/auth" class="text-decoration-none font-monospace">Sudah Punya Akun?</a> 
        </div>
    </form>
</main>