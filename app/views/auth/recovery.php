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
    <form action="<?= base_url; ?>/auth/recovery"  method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
            <input type="email" name="email" class="form-control" id="emailRecover" placeholder="Masukan Username atau Email" />
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" name="login" class="btn btn-danger">Cari Akun</button>
        </div>
    </form>
    <hr/>
    <div class="text-center font-monospace">
        <a href="<?= base_url; ?>/auth" class="btn btn-primary col-4">Masuk</a>
    </div>
</main>