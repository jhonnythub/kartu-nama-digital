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
    <form action="<?= base_url; ?>/auth/registerPost"  method="POST" class="row g-3 needs-validation" novalidate>
        <div class="input-group mb-3 has-validation">
            <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap/Nama Lembaga" required />
            <div class="invalid-feedback">
                Nama Lengkap harus ditulis
            </div>
        </div>
        <div class="input-group mb-3 has-validation">
            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input type="number" name="telepon" class="form-control" id="telepon" placeholder="ex: 089606266677" required />
            <div class="invalid-feedback">
                Telepon harus ditulis
            </div>
        </div>
        <div class="input-group mb-3 has-validation">
            <span class="input-group-text"><i class="bi bi-broadcast-pin"></i></span>
            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukan Alamat Lengkap" value="<?= $_SESSION["ip"]; ?>" required />
            <div class="invalid-feedback">
                Masukan Alamat anda!
            </div>
        </div>
        <div class="input-group mb-3 has-validation">
            <span class="input-group-text"><i class="bi bi-pc-display"></i></span>
            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Tulis Pekerjaan Anda" required />
            <div class="invalid-feedback">
                Tulislah Pekerjaan Anda
            </div>
        </div>
        <div class="input-group mb-3 has-validation">
            <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
            <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email" required />
            <div class="invalid-feedback">
                Masukan email dengan benar!
            </div>
        </div>
        <div class="input-group mb-3 hash-validation">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <input type="password" name="pass" class="form-control" id="passLogin" placeholder="Masukan Kata Sandi" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required />
            <span class="input-group-text" onclick="showHide();" id="eye"><i class="bi bi-eye"></i></span>
            <div class="invalid-feedback">
                Kata Sandi tidak boleh kosong dan harus memiliki setidaknya 1 karakter 1 huruf besar dan 1 angka!
            </div>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" name="daftar" class="btn btn-success">Mendaftar</button>
        </div>
        <div class="d-grid gap-2 col-12 mx-auto text-center mt-3">
            <a href="<?= base_url; ?>/auth" class="text-decoration-none font-monospace">Sudah Punya Akun?</a> 
        </div>
    </form>
</main>