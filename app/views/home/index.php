<header>
<ul class="nav justify-content-center nav-pills nav-fill bg-danger">
  <li class="nav-item">
    <a class="nav-link text-white bg-warning disabled" href="<?= base_url; ?>"><h1><i class="bi bi-house"></i></h1></a>
</li>
    <li class="nav-item">
    <a class="nav-link text-white" href="<?= base_url; ?>/notifikasi"><h1><i class="bi bi-bell"></i></h1></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="<?= base_url; ?>/dashboard"><h1><i class="bi bi-columns-gap"></i></h1></a>
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
    <?php foreach($data["data"] as $data) : ?>
<div class="p-3 container">
    <div class="card">
        <div class="card-body">
            <div class="row grid">
                <div class="col-4 mx-auto mb-auto mt-auto">
                    <img class="img-thumbnail" width="200" height="300" src="<?= base_url; ?>/dist/image/pf.webp" alt="profile"/>
                </div>
                <div class="col-8 text-wrap">
                    <ul class="list-group list-group-flush text-wrap">
                        <li class="list-group-item d-flex justify-content-between">Nama <i class="ms-2 me-auto">: <?= $data["nama_lengkap"]; ?></i></li>
                        <li class="list-group-item">Pekerjaan <i class="ms-2 me-auto">: <?= $data["pekerjaan"]; ?></i></li>
                        <li class="list-group-item">Telepon <i class="ms-2 me-auto">: <?= $data["telepon"]; ?></i></li>
                        <li class="list-group-item">Alamat <i class="ms-2 me-auto">: <?= $data["alamat"]; ?></i></li>
                        <li class="list-group-item">Email <i class="ms-2 me-auto">: <?= $data["email"]; ?></i></li>
                        <li class="list-group-item">Masa Berlaku <i class="ms-2 me-auto">: <?= $data["expired"]; ?></i></li>
                        <p class="text-end mt-3">
                            <img src="<?= base_url; ?>/dist/qr_code-img/<?= $data["qr_code"]; ?>" width="50" height="50" class="img-thumbnail">
                        </p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link" href="#"><h1><i class="bi bi-star-fill"></i></h1></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-target="#message" data-bs-toggle="offcanvas"><h1><i class="bi bi-envelope-paper"></i><h1></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-bs-target="#share" data-bs-toggle="modal"><h1><i class="bi bi-share-fill"></i></h1></a>
        </li>
    </ul>
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="message" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header bg-primary bg-opacity-50">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel"><?= $data["nama_lengkap"]; ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    <form action="" method="POST">
        <div class="input-group mb-3">
            <input type="text" name="komentar" class="form-control" placeholder="Masuakan Komentar" autofocus="on" required/>
            <button type="submit" name="sendKomentar" class="btn btn-primary"><i class="bi bi-send"></i></button>
        </div>
    </form>
  </div>
</div>
    <?php endforeach; ?>
</div>
</main>
