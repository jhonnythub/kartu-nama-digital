<header>
<ul class="nav justify-content-center nav-pills nav-fill bg-danger">
  <li class="nav-item">
    <a class="nav-link text-white" href="<?= base_url; ?>"><h1><i class="bi bi-house"></i></h1></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="<?= base_url; ?>/notifikasi"><h1><i class="bi bi-bell"></i></h1></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white bg-warning disabled" href="<?= base_url; ?>/dashboard"><h1><i class="bi bi-columns-gap"></i></h1></a>
  </li>
  <li class="nav-item">
    <button class="nav-link text-white" data-bs-toggle="modal" data-bs-target="#search"><h1><i class="bi bi-search"></i></h1></button>
  </li>
  <li class="nav-item">
    <button class="nav-link text-white" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-controls="offcanvasRight"><h1><i class="bi bi-sliders2"></i></h1></button>
  </li>
</ul>
</header>

<main>
  <div class="container">
    <div class="text-center">
        <img src="<?= base_url; ?>/dist/image/pf.webp" width="200" height="300" class="img-thumbnail" alt="pf"/>
        <h1 class="fw-italic"><?= $data["user"]["nama_lengkap"]; ?></h1>
    </div>
    <form action="" method="POST">
      <ul class="list-group">
        <li class="list-group-item justify-content-between d-flex align-items-start">
          <div class="fw-bolder">Pekerjaan</div>
          <span class="rounded-pill" id="pekerjaan"><?= $data["user"]["pekerjaan"]; ?> <i class="bi bi-pen" onclick="pekerjaan();"></i></span>
        </li>
        <li class="list-group-item justify-content-between d-flex align-items-start">
          <div class="fw-bolder">Telepon</div>
          <span class="rounded-pill"><?= $data["user"]["telepon"]; ?></span>
        </li>
        <li class="list-group-item justify-content-between d-flex align-items-start">
          <div class="fw-bolder">Alamat</div>
          <span class="rounded-pill"><?= $data["user"]["alamat"]; ?></span>
        </li>
        <li class="list-group-item justify-content-between d-flex align-items-start">
          <div class="fw-bolder">Email</div>
          <span class="rounded-pill"><?= $data["user"]["email"]; ?></span>
        </li>
        <li class="list-group-item justify-content-between d-flex align-items-start">
          <div class="fw-bolder">Masa Berlaku Akun</div>
          <span class="rounded-pill">24-01-2024</span>
        </li>
      </ul>
      <div class="text-center my-3">
        <button type="submit" name="updateUser" class="btn btn-primary" data-bs-toggle="modal">Sunting <i class="bi bi-pencil"></i></button>
      </div>
    </form>
  </div>
</main>