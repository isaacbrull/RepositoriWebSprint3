<!DOCTYPE html>
<html lang="en">
  <body>

    <?php $style = 'estils-perfil.css'; require_once('./template/header.php'); ?>

    <body>
      <?php
        require_once('./php/database.php');
        require_once('./php/propostes.php');

        $DB = new Database();

        $pid = $_GET['pid'] ?? null;

        //ACCIO QUE ES REALITZA SOBRE L'USUARI 0: ALTA, 1: MODIFICACIÓ
        $action = $_GET['action'] ?? 0;

        $currentuser = $_SESSION['current-user'] ?? null;
        $targetproposta = null;
        $resultat = '';

		$GPP = new Proposta($DB->getDB());

		if ($pid) {
			$targetproposta = $DB->consultarPropostaId($pid);
		}

        if (!$currentuser ||  (($action == 1 || $action == 2) && !$targetproposta)) {
            header('HTTP/1.1 403 Forbidden');
            exit('403 Forbidden');
        }

      ?>

      <?php $navtype = 2; $profiletab = 3; require_once('./template/navbar.php'); ?>

      <div class="banner">
        <h2 class="banner-title">
          <?php

            switch ($action) {
              case  0:
                echo 'Alta Propostes';
                break;

              case  1:
                echo 'Modificació Propostes';
                break;

			  case  2:
                echo 'Eliminar Proposta';
              	break;
            }

      //$pid id de la proposta


            switch ($action) {
                case 0:
					//alta
					$idDepartament = $_POST['iddepartament'] ?? null;
					$idGrup = $_POST['idgrup'] ?? null;
					$idCategoria = $_POST['idcategoria'] ?? null;
					$Nom = $_POST['nom'] ?? null;
					$Descripcio = $_POST['descripcio'] ?? null;
					$Estat = $_POST['estat'] ?? null;
					if ($idDepartament && $idGrup && $idCategoria && $Nom && $Descripcio){
						$resultat = $GPP->alta($idDepartament, $idGrup, $idCategoria, $Nom, $Descripcio, date("Y-m-d"));
					}
                    break;
                case 1:
					$Nom = $_POST['nom'] ?? null;
					$Descripcio = $_POST['descripcio'] ?? null;
          //ucfirst converteix la primera lletra en majúscula
					$Estat = ucfirst($_POST['estat'] ?? null);  //$targetuser['Tipus']
				  	if ($Nom && $Descripcio && $Estat){
						if ($Nom != $targetproposta['Nom'] ||
							$Descripcio != $targetproposta['Descripcio'] ||
							$Estat != $targetproposta['Estat']) {


							$resultat = $GPP->modificar($targetproposta['idProposta'], $Nom, $Descripcio, $Estat);

							$targetproposta = $DB->consultarPropostaId($pid);

						}
					}
					break;
	          case 2:
	    //ELIMINACIO
                  if (array_key_exists('accepted', $_POST)) {
                    if($targetproposta) {
                      $resultat = $GPP->eliminar($targetproposta['idProposta']);
                      header('Location: ./perfil.php?tab=3');
                    } else {
                      $resultat = 'Proposta inexistent';
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
              <form action="./crudpropostes.php?<?php echo ($pid ? 'pid='. $pid. '&': ''). 'action='. $action; ?>" method="post">

				<?php switch($action):
					case 0: ?>
						<!-- Alta -->
			            <p>idDepartament: <input type="text" name="iddepartament" placeholder="La ID del Departament" required/></p>
			            <p>idGrup: <input type="text" name="idgrup" placeholder="La ID del Grup" required/></p>
			            <p>idCategoria: <input type="text" name="idcategoria" placeholder="La ID de la Categoria" required/></p>
						<p>Nom: <input type="text" name="nom" placeholder="Nom Proposta" required/></p>
            			<p>Descripció: <textarea  type="text" name="descripcio" placeholder="Descripció" required></textarea></p>
				<?php break; ?>
				<?php case 1: ?>
					<!-- Modificacio -->
					<p>Nom: <input type="text" name="nom" placeholder="Nom de la proposta" value="<?php echo $targetproposta['Nom']; ?>" required/></p>
					<p>Descripció: <textarea  type="text" name="descripcio" placeholder="Descripció" required><?php echo $targetproposta['Descripcio']; ?></textarea></p>
					<p>Estat: <select name="estat" required>
					  	<option value="no acceptat" <?php if ($targetproposta['Estat'] == 'No acceptat') echo 'selected'; ?>>No acceptat</option>
				    	<option value="acceptat" <?php if ($targetproposta['Estat'] == 'Acceptat') echo 'selected'; ?>>Acceptat</option>
            			<option value="realitzat" <?php if ($targetproposta['Estat'] == 'Realitzat') echo 'selected'; ?>>Realitzat</option>
					</select></p>
        		<?php break; ?>
		        <?php case 2: ?>
		            <input name="accepted" style="display: none;">
		            <p>Estas segur que desitjes esborrar a <?php echo $targetproposta['Nom']. ' amb el estat: '. $targetproposta['Estat']; ?>?</p>
		        <?php break; ?>
				<?php endswitch; ?>

				<button class="opcions" type="submit">Guardar</button>

              </div>
              </form>

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
