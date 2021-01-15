<!DOCTYPE html>
<html lang="en">
  <body>

    <?php $style = 'estils-perfil.css'; require_once('./template/header.php'); ?>

    <body>

      <?php
        require_once('./php/database.php');
        require_once('./php/alumne.php');
        require_once('./php/professor.php');

        $DB = new Database();

        $uid = $_GET['uid'] ?? null;

        //ACCIO QUE ES REALITZA SOBRE L'USUARI 0: ALTA, 1: MODIFICACIÓ
        $action = $_GET['action'] ?? 0;

        //TIPUS D'USUARI QUE ES DESITJA MODIFICAR O AFEGIR 0: ALUMNE, 1: PROFESSOR
        $type = $_GET['type'] ?? 0;

        $currentuser = $_SESSION['current-user'] ?? null;
        $targetuser = null;
        $resultat = '';

        switch ($type) {
            case 0:
                $GA = new Alumne($DB->getDB());
                break;
            case 1:
                $GP = new Professor($DB->getDB());
                break;
        }

		if ($uid) {
			$targetuser = $DB->consultarUsuariId($uid);
		}

        if (!$currentuser || $currentuser['Tipus'] !== 'Professor' || (($action == 1 || $action == 2) && !$targetuser)) {
            header('HTTP/1.1 403 Forbidden');
            exit('403 Forbidden');
        }

      ?>

	  <?php $navtype = 2; $profiletab = (($type ?? 1) == 0 ? 1 : 0); require_once('./template/navbar.php'); ?>

      <div class="banner">
        <h2 class="banner-title">
          <?php

            switch ($action) {
              case  0:
                echo 'Alta '. ($type == 1 ? 'Professor' : 'Alumne');
                break;

              case  1:
                echo 'Modificació '. ($type == 1 ? 'Professor' : 'Alumne');
                break;

              case 2:
                echo 'Eliminar '. ($type == 1 ? 'Professor' : 'Alumne');
                break;

            }

            switch ($action) {
                case 0:
					//ALTES
                    switch ($type) {
                        case 0:
	                        // ALUMNE
	                        $idrol = $_POST['idrol'] ?? null;
	                        $nom = $_POST['nom'] ?? null;
	                        $cognom = $_POST['cognom'] ?? null;
	                        $cognom2 = $_POST['cognom2'] ?? null;
	                        $dni = $_POST['dni'] ?? null;
	                        $nomusuari = $_POST['username'] ?? null;
	                        $contrasenya = $_POST['password'] ?? null;
	                        $email = $_POST['email'] ?? null;
	                        $telefon = $_POST['telefon'] ?? null;
	                        $datanaixement = $_POST['datanaixement'] ?? null;
	                        /*$estat = $_POST['estat'] ?? null;*/
	                        //echo "start - ". $idrol. " - ". $nom. " - ". $cognom. " - ". $cognom2. " - ". $dni. " - ". $nomusuari. " - ". $contrasenya. " - ". $email. " - ". $telefon. " - ". $datanaixement;
	                        if ($idrol && $nom && $cognom && $cognom2 && $dni && $nomusuari && $contrasenya && $email && $telefon && $datanaixement) {
	                            $targetuser = $DB->consultaUsuari($nomusuari);
	                            if (!$targetuser) {
	                                $resultat = $GA->alta($idrol, $nom, $cognom, $cognom2, $dni, $nomusuari, $contrasenya, $email, $telefon, $datanaixement);
	                            } else {
	                                $resultat = 'Usuari ja existent!';
	                            }
	                        }
	                        //prova Andrei borrar despres
	                        //public function alta($idUsuari, $idRol, $nom, $cognom, $segonCognom, $dni, $username, $password, $tipus, $email, $telefon, $dataNaixement, $estat) {
	                        break;
                        case 1:
                            // PROFESSORS
                            $idrol = $_POST['idrol'] ?? null;
                            $nom = $_POST['nom'] ?? null;
                            $cognom = $_POST['cognom'] ?? null;
                            $cognom2 = $_POST['cognom2'] ?? null;
                            $dni = $_POST['dni'] ?? null;
                            $nomusuari = $_POST['username'] ?? null;
                            $contrasenya = $_POST['password'] ?? null;
                            $email = $_POST['email'] ?? null;
                            $telefon = $_POST['telefon'] ?? null;
                            $datanaixement = $_POST['datanaixement'] ?? null;
                            /*$estat = $_POST['estat'] ?? null;*/
                            //echo "start - ". $idrol. " - ". $nom. " - ". $cognom. " - ". $cognom2. " - ". $dni. " - ". $nomusuari. " - ". $contrasenya. " - ". $email. " - ". $telefon. " - ". $datanaixement;
                            if ($idrol && $nom && $cognom && $cognom2 && $dni && $nomusuari && $contrasenya && $email && $telefon && $datanaixement) {
                                $targetuser = $DB->consultaUsuari($nomusuari);
                                if (!$targetuser) {
                                    $resultat = $GP->alta($idrol, $nom, $cognom, $cognom2, $dni, $nomusuari, $contrasenya, $email, $telefon, $datanaixement);
                                } else {
                                    $resultat = 'Usuari ja existent!';
                                }
                            }
                            //prova Andrei borrar despres
                            //public function alta($idUsuari, $idRol, $nom, $cognom, $segonCognom, $dni, $username, $password, $tipus, $email, $telefon, $dataNaixement, $estat) {
                            break;
                    }
                    break;
                case 1:
					//MODIFICACIONS
                    switch ($type) {
						//ALUMNES
                        case 0:
							$idrol = $_POST['idrol'] ?? null;
							$contrasenya = $_POST['password'] ?? null;
							$tipus = ucfirst($_POST['tipus'] ?? null);  //$targetuser['Tipus']
							$telefon = $_POST['telefon'] ?? null;
							/*$estat = $_POST['estat'] ?? null;*/ //$targetuser['Estat']
							$email = $_POST['email'] ?? null;
							if ($idrol && $contrasenya && $tipus && $email && $telefon /*&& $estat*/){
								//var_dump($targetuser);
								if ($idrol != $targetuser['idRol'] ||
									$contrasenya != $targetuser['Contraseña'] ||
									$tipus != $targetuser['Tipus'] ||
									$telefon != $targetuser['Telefon'] ||
									/*$estat != $targetuser['Estat'] ||  potser sobra*/
									$email != $targetuser['Email']) {
									$resultat = $GA->modificar($uid, $idrol, $contrasenya, $tipus, $email, $telefon/*, $estat*/);
									$targetuser = $DB->consultarUsuariId($uid);
								}
							}
                            break;
						//PROFESSORS
                        case 1:
                            $idrol = $_POST['idrol'] ?? null;
                            $contrasenya = $_POST['password'] ?? null;
                            $tipus = ucfirst($_POST['tipus'] ?? null);  //$targetuser['Tipus']
                            $telefon = $_POST['telefon'] ?? null;
                            /*$estat = $_POST['estat'] ?? null;*/ //$targetuser['Estat']
                            $email = $_POST['email'] ?? null;
                            if ($idrol && $contrasenya && $tipus && $email && $telefon /*&& $estat*/){
                                if ($idrol != $targetuser['idRol'] ||
                                    $contrasenya != $targetuser['Contraseña'] ||
                                    $tipus != $targetuser['Tipus'] ||
                                    $telefon != $targetuser['Telefon'] ||
                                    $email != $targetuser['Email']) {
                                    $resultat = $GP->modificar($uid, $idrol, $contrasenya, $tipus, $email, $telefon/*, $estat*/);
                                    $targetuser = $DB->consultarUsuariId($uid);
                                }
                            }
                            break;
                    }
                    break;
                case 2:
					//ELIMINACIO
                    switch ($type) {
						//ALUMNES
                        case 0:
  							if (array_key_exists('accepted', $_POST)) {
  								if($targetuser) {
  									$resultat = $GA->eliminar($targetuser['idUsuari']);
  									header('Location: ./perfil.php?tab=1');
  								} else {
  									$resultat = 'Usuari inexistent';
  								}
  							}
  							break;
						//PROFESSORS
                        case 1:
                            if (array_key_exists('accepted', $_POST)) {
                                if($targetuser) {
                                    $resultat = $GP->eliminar($targetuser['idUsuari']);
                                    header('Location: ./perfil.php?tab=0');
                                } else {
                                    $resultat = 'Usuari inexistent';
                                }
                            }
                            break;
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
              <form action="./crudusuaris.php?<?php echo ($uid ? 'uid='. $uid. '&': ''). 'action='. $action. '&type='. $type; ?>" method="post">

				<?php switch($action):
          //alta
					case 0: ?>

						<p>Rol: <input type="text" name="idrol" placeholder="La ID del Rol" required/></p>
						<p>Nom: <input type="text" name="nom" placeholder="Nom Alumne" required/></p>
						<p>1r Cognom: <input type="text" name="cognom" placeholder="Cognom Alumne" required/></p>
						<p>2n Cognom: <input type="text" name="cognom2" placeholder="2n Cognom Alumne" required/></p>
						<p>DNI: <input type="text" name="dni" placeholder="DNI" required/></p>
						<p>Nom usuari: <input type="text" name="username" placeholder="Nom usuari" required/></p>
						<p>Contrasenya: <input type="password" name="password" placeholder="Contrasenya" required/></p>
                        <p>Correu: <input type="email" name="email" placeholder="Correu" required></p>

						<!-- <input type="text" name="tipus" placeholder="Alumne, Professor, Gerent o Empleat" required/></p>-->
						<p>Telefon: <input type="number" name="telefon" placeholder="34XXXXXXXXX" required/></p>
						<p>Data Naixement: <input type="text" name="datanaixement" placeholder="Any-Mes-Dia" required/></p>
				<?php break; ?>
        //modificacio
				<?php case 1: ?>
					<p>Rol: <input type="text" name="idrol" placeholder="La ID del Rol" value="<?php echo $targetuser['idRol']; ?>" required/></p>
					<p>Contrasenya: <input type="password" name="password" placeholder="Contrasenya" value="<?php echo $targetuser['Contraseña']; ?>" required/></p>
					<p>Tipus: <select name="tipus" required>
					  <option value="alumne" <?php if ($targetuser['Tipus'] == 'Alumne') echo 'selected'; ?>>Alumne</option>
				      <option value="professor" <?php if ($targetuser['Tipus'] == 'Professor') echo 'selected'; ?>>Professor</option>
				      <!--<option value="professor">Gerent</option>
					  <option value="professor">Empleat</option>-->
					</select></p>
					<!--  <input type="text" name="tipus" placeholder="Alumne, Professor, Gerent o Empleat" required/></p>-->
					<p>Telefon: <input type="number" name="telefon" placeholder="34XXXXXXXXX" value="<?php echo $targetuser['Telefon']; ?>" required/></p>
                    <p>Correu: <input type="email" name="email" value="<?php echo $targetuser['Email']; ?>" required>
                    <!--<p>Estat: <select name="estat" required>
					  <option value="actiu" <?php if ($targetuser['Estat'] == 'actiu') echo 'selected'; ?>>Actiu</option>
					  <option value="inactiu" <?php if ($targetuser['Estat'] == 'inactiu') echo 'selected'; ?>>Inactiu</option>
					</select></p>-->
				<?php break; ?>
                <?php case 2: ?>
                    <input name="accepted" style="display: none;">
                    <p>Estas segur que desitjes esborrar a <?php echo $targetuser['Nom']. ' '. $targetuser['Cognom']. ' '. $targetuser['SegonCognom']; ?>?</p>
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
