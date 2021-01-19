<!DOCTYPE html>
<html lang="en">

    <!-- Header -->
    <?php $style = 'estils-perfil.css'; require_once('./template/header.php'); ?>

    <body>

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

      <?php $navtype = 1; require_once('./template/navbar.php'); ?>

      <div class="banner">
        <h2 class="banner-title">Perfil de <?php echo $currentuser['Nom']. ' '. $currentuser['Cognom']. ' '. $currentuser['SegonCognom']; ?></h2>
        <div class="banner-background"></div>
      </div>

      <div class="body">
        <div class="body-container">
          <div class="body-column-left">
            <h3>Menu principal</h3>

            <section>

              <!-- POSSIBLE CANVIAR !== A === DEPENEN USUARI-->
			  <?php if($currentuser['Tipus'] !== 'Professor'): ?>
				<p><a href="./perfil.php?tab=0">Gestió de professors</a></p>
				<p><a href="./perfil.php?tab=1">Gestió de alumnes</a></p>
				<p><a href="./perfil.php?tab=2">Gestió de grups</a></p>
              <?php endif; ?>
			  <p><a href="./perfil.php?tab=3">Gestió de propostes</a></p>
            </section>
          </div>
          <div class="body-column-right">
            <?php

              if ($currentuser['Tipus'] !== 'Professor') {
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
              }

			  switch ($tab) {
				case 3:
					$GPP->llistar();
				  break;
			  }

            ?>

          </div>
        </div>

      </div>

      <?php $footertype = 1; require_once('./template/footer.php'); ?>

    </body>
    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>

    <script src="./js/perfil.js"></script>
    <script src="./js/principal.js"></script>
</html>
