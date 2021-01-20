<!doctype html>
<html lang="en" class="h-100">


  <!-- Header | additionally you can specify a custom css file by adding ( $style=file.css ) before the requirement -->
  <?php require_once('./template/header.php') ?>

  <body class="d-flex flex-column h-100">

    <!-- Navigation bar | additionally you can specify the type of the navigation bar adding ( $navbar=type ) before the requirement -->
    <?php $tab=0; $navbar=0; require_once('./template/navbar.php') ?>

    <?php
      require_once('./php/database.php');
      require_once('./php/alumne.php');
      require_once('./php/professor.php');
      require_once('./php/grups.php');
      require_once('./php/propostes.php');

      $DB = new Database();
      $GA = new Alumne($DB->getDB());
      $GP = new Professor($DB->getDB());
      $GPG = new Grups($DB->getDB());
      $GPP = new Proposta($DB->getDB());


      $currentuser = $_SESSION['current-user'] ?? null;
      $tab = $_GET['tab'] ?? 0;

      if ($tab < 0) {
          $tab = 0;
      } elseif ($tab > 3) {
          $tab = 3;
      }

      // if (!$currentuser) {
      //     header('HTTP/1.1 403 Forbidden');
      //     exit('403 Forbidden');
      // }

      //echo $usuariactual;
    ?>

	<div class="banner text-center text-white"><h3 class="d-inline bg-dark px-2 py-1">PROVA</h3></div>

  <?php if($currentuser['Tipus'] !==  'Professor' || 'Alumne' || null): ?>
    <div class="col-sm-8 align-self-center text-center" style="width:25%; background-color: lightblue;">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="./perfil.php?tab=0" class="w3-bar-item w3-button">Gestió de professors</a>
  <br></br>
  <a href="./perfil.php?tab=1" class="w3-bar-item w3-button">Gestió de alumnes</a>
  <br></br>
  <a href="./perfil.php?tab=2" class="w3-bar-item w3-button">Gestió de grups</a>
  <br></br>
  
</div>
  <!--<p><a href="./perfil.php?tab=0">Gestió de professors</a></p>
  <p><a href="./perfil.php?tab=1">Gestió de alumnes</a></p>
  <p><a href="./perfil.php?tab=2">Gestió de grups</a></p>-->
        <?php endif; ?>
        <a href="./perfil.php?tab=3" class="col-sm-8 align-self-center text-center" style="width:25%; background-color: lightblue;">Gestió de propostes</a>
  <!--<p><a href="./perfil.php?tab=3">Gestió de propostes</a></p>-->
      </section>
    </div>
    <div class="container">
      <?php

        //if ($currentuser['Tipus'] === 'Professor') {
          switch ($tab) {
            case 0:
                $GP->llistar();
                break;
            case 1:
                $GA->llistar();
                break;
            case 2:
                $GPG->llistar();
               break;
          }
        //}

  switch ($tab) {
  case 3:
    $GPP->llistar();
    break;
  }

      ?>

</div>


    <!-- Footer | additionally you can specify the type of the navigation bar adding ( $footer=type ) before the requirement -->
    <?php require_once('./template/footer.php') ?>

    <!--Fitxer Javascript-->
    <script src="/js/sprint3.js" language="javascript" type="text/javascript"></script>

    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>
