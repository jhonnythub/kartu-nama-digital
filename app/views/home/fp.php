<header>
<nav class="navbar bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">
      <img src="<?= base_url; ?>/dist/image/frame.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      Kartu Nama Digital
    </a>
  </div>
</nav>

<main class="form-signin w-100 m-auto">
    <form action="<?= base_url; ?>/auth/postProfile" method="POST" enctype="multipart/form-data">
        <input type="file" class="form-control" name="fp"/>
        <button type="submit" name="submitProfile" class="btn btn-primary">Kirim</button>
    </form>
</main>