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
    <form action="<?= base_url; ?>/auth/loginPost"  method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-people"></i></span>
            <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username atau Email" />
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-key"></i></span>
            <input type="password" name="pass" class="form-control" id="passLogin" placeholder="Kata Sandi" />
            <span class="input-group-text" id="eye" onclick="showHide();"><i class="bi bi-eye"></i></span>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
        <div class="d-grid gap-2 col-12 mx-auto text-center mt-3">
            <a href="<?= base_url; ?>/auth/forgot" class="text-decoration-none font-monospace">Lupa Kata Sandi?</a> 
        </div>
    </form>
    <hr/>
    <div class="text-center font-monospace">
        <a href="<?= base_url; ?>/auth/register" class="btn btn-success">Mendaftar</a>
    </div>
</main>