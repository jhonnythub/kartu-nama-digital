<header>
<ul class="nav justify-content-center nav-pills nav-fill bg-danger">
  <li class="nav-item">
    <a class="nav-link text-white" href="<?= base_url; ?>"><h1><i class="bi bi-house"></i></h1></a>
</li>
    <li class="nav-item">
    <a class="nav-link text-white bg-warning disabled" href="<?= base_url; ?>/notifikasi"><h1><i class="bi bi-bell"></i></h1></a>
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
<ul class="list-group">
  <?php foreach( $data["notifikasi"] as $notif ) : ?>
  <li class="list-group-item"><?= $notif["from_user"]; ?> give your <?= $notif["type"]; ?></li>
  <?php endforeach; ?>
</ul>
</main>