<!DOCTYPE html>
<html lang="en">

    <!-- Header -->
    <?php $style = 'estils-registre.css'; require_once('./template/header.php'); ?>

    <body>
      <?php $navtype = 0; require_once('./template/navbar.php'); ?>

      <div class="banner">
        <h2 class="banner-title">Institut</h2>
        <div class="banner-background"></div>
      </div>

      <div class="body">
        <p id="demo"></p>
        <div class="body-container">
            <form id="form" class="formulari" action="#" method="get">
              <input class="opcions" type="nom" name="nom" placeholder="Nom" value="<?php echo (isset($_GET['user']) ? $_GET['user'] : ''); ?>">
              <input class="opcions" type="cognoms" name="cognoms" placeholder="Cognoms">
              <input class="opcions" type="email" name="email" placeholder="Email">
              <input class="opcions" type="telefon" name="telefon" placeholder="Telefon">
              <input class="opcions" type="contrasenya" name="contrasenya" id="password" placeholder="Contrasenya">
              <input class="opcions" type="confirmar" name="confirmar" placeholder="Confirmar">
              <button class="opcions" type="submit">Registrat</button>
              <span id="missatge"></span>
            </form>
            <img class="foto" src="./img/perfil_2.jpg">
        </div>
      </div>

      <?php $footertype = 0; require_once('./template/footer.php'); ?>

    </body>
    <script src="./js/registre.js"></script>
    <script src="./js/principal.js"></script>

</html>
