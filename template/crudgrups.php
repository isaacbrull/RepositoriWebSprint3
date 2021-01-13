<!DOCTYPE html>
<html lang="en">
  <body>

    <?php $style = 'estils-perfil.css'; require_once('./template/header.php'); ?>

    <body>
      <?php
        require_once('./php/database.php');
        require_once('./php/grups.php');

        $DB = new Database();

        $gid = $_GET['gid'] ?? null;

        //ACCIO QUE ES REALITZA SOBRE L'USUARI 0: ALTA, 1: MODIFICACIÓ
        $action = $_GET['action'] ?? 0;

        //TIPUS D'USUARI QUE ES DESITJA MODIFICAR O AFEGIR 0: ALUMNE, 1: PROFESSOR
        $type = $_GET['type'] ?? 0;

        $currentuser = $_SESSION['current-user'] ?? null;
        $targetgrup = null;
        $resultat = '';

        $GPG = new Grups($DB->getDB());

        if($gid) {
            $targetgrup = $DB->consultarGrupId($gid);
        }

        if (!$currentuser || $currentuser['Tipus'] !== 'Professor' || (($action == 1 || $action == 2) && !$targetgrup)) {
            header('HTTP/1.1 403 Forbidden');
            exit('403 Forbidden');
        }

      ?>

      <?php $navtype = 2; $profiletab = 2; require_once('./template/navbar.php'); ?>

      <?php /*$navtype = 1; require_once('./template/navbar.php'); */ ?>

      <div class="banner">
        <h2 class="banner-title">
          <?php

            switch ($action) {
              case  0:
                echo 'Alta Grup';
                break;

              case  1:
                echo 'Modificació Grup';
                break;

              case  2:
                echo 'Eliminar Grup';
                break;

            }

            switch ($action) {
                case 0:
                    $Nom = $_POST['Nom'] ?? null;
                    $idInstitut = $_POST['idInstitut'] ?? null;
                    $idTutor = $_POST['idTutor'] ?? null;
                    if ($idInstitut && $idTutor && $Nom){
                        $resultat = $GPG->alta($idInstitut, $idTutor, $Nom);
                      }
                      break;
                  case 1:
                      //modificació
                      $Nom = $_POST['Nom'] ?? null;
                      $idInstitut = $_POST['idInstitut'] ?? null;
                      $idTutor = $_POST['idTutor'] ?? null;
                      if ($Nom && $idInstitut && $idTutor){

                          if ($Nom != $targetgrup['Nom'] ||
                              $idInstitut != $targetgrup['idInstitut'] ||
                              $idTutor != $targetgrup['idTutor']) {

							  $resultat = $GPG->modificar($targetgrup['idGrup'], $Nom, $idInstitut, $idTutor);

                              $targetgrup = $DB->consultarGrupId($gid);

                          }
                      }
                      break;
                  case 2:
					  if (array_key_exists('accepted', $_POST)) {
						if($targetgrup) {
						  	$resultat = $GPG->eliminar($targetgrup['idGrup']);
						  	header('Location: ./perfil.php?tab=2');
					  	} else {
					  		$resultat = 'Usuari inexistent';
					  	}
					  }
					  break;
			  }
            ?>
          </h2>
          <div class="banner-background"></div>
        </div>
        <div class="body">
          <div class="body-container">
            <div class="body-column-left">
              <div class="formulari">
              <!--  <h2>Alta</h2>-->
              <!-- MIRAR-->
              <form action="./crudgrups.php?<?php echo ($gid ? 'gid='. $gid. '&': ''). 'action='. $action; ?>" method="post">

				<?php switch($action):
          		//alta
					case 0: ?>
						<p>Nom grup: <input type="text" name="Nom" placeholder="Nom del grup" required/></p>
						<p>ID tutor: <input type="number" name="idTutor" placeholder="Nom tutor" required/></p>
						<p>ID institut: <input type="number" name="idInstitut" placeholder="Nom institut" required/></p>
				<?php break; ?>

				<?php case 1: ?>
			        <p>Nom grup: <input type="text" name="Nom" placeholder="Nom del grup" value="<?php echo $targetgrup['Nom']; ?>" required/></p>
			        <p>ID tutor: <input type="number" name="idTutor" placeholder="Nom tutor" value="<?php echo $targetgrup['idTutor']; ?>" required/></p>
			        <p>ID institut: <input type="number" name="idInstitut" placeholder="Nom institut" value="<?php echo $targetgrup['idInstitut']; ?>" required/></p>
     			<?php break; ?>

         		<?php case 2: ?>
		            <input name="accepted" style="display: none;">
		            <p>Estas segur que desitjes esborrar el grup: <?php echo $targetgrup['Nom']; ?>?</p>
		        <?php break; ?>
     			<?php endswitch; ?>

     			<button class="opcions" type="submit">Guardar</button>

           </form>
		   </div>
           <div class="body-column-right">
               <?php echo $resultat; ?>
           </div>

         </div>
       </div>
     </div>

     <?php $footertype = 1; require_once('./template/footer.php'); ?>
 </body>
 <script src="./js/perfil.js"></script>
 <script src="./js/principal.js"></script>
</html>
