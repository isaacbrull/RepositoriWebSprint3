<?php

class Grups {

  private $DB;

  public function alta($idInstitut, $idTutor, $Nom) {

    // AIXO \" (BARRA INVERTIDA + "), no sen vaiguen les dobles comilles quan s'utilitza el caracter
    $query = 'INSERT INTO GrupClasse(idInstitut, idTutor, Nom) VALUES '. "(" . '"' . $idInstitut . '","' . $idTutor . '","' . $Nom . '");';
    $query = $this->DB->query($query);
	if ($query === true) {
        return "Grup afegit!";
    } else {
        return "No s'han pogut afegir el grup!";
    }
  }

//$DB es del fitxer Database, la private static
  public function llistar() {
    $query ="SELECT gc.idGrup, gc.Nom AS nomGrup, CONCAT(u.Nom, ' ', u.Cognom, ' ', u.SegonCognom) as nomTutor, i.Nom as nomInstitut
              FROM GrupClasse AS gc
              INNER JOIN Institut AS i ON i.idInstitut = gc.idInstitut
              INNER JOIN Professor as p ON p.idProfessor = gc.idTutor
              INNER JOIN Usuari as u ON u.idUsuari = p.idUsuari";

    $query = $this->DB->query($query);

    if ($query) {
        echo '<table border="1" frame="void" rules="cols">
                <thead>
                    <tr>
                        <th>Nom grup</th>
                        <th>Nom tutor</th>
                        <th>Nom institut</th>
                        <td><a href="./crudgrups.php?action=0"><i class="fas fa-plus"></i></a></td>
                    </tr>
                </thead>
                <tbody>';

        foreach ($query as $row) {

                echo '<tr>
                        <td>'. $row['nomGrup'] .'</td>
                        <td>'. $row['nomTutor'] .'</td>
                        <td>'. $row['nomInstitut'] .'</td>
                        <td>
                            <div class="table-icons">
                                <a href="./crudgrups.php?gid='. $row['idGrup']. '&action=1"><i class="fas fa-edit"></i></a>
                                <a href="./crudgrups.php?gid='. $row['idGrup']. '&action=2"><i class="fas fa-trash-alt"></i></a>
                            <div>
                        </td>
                    </tr>';
      }

      echo '    </tbody>
            </table>';
    }
  }

  //Modificar
  public function modificar($idGrup, $Nom, $idInstitut, $idTutor) {
	$query = 'UPDATE GrupClasse SET Nom="' . $Nom . '", idInstitut="' . $idInstitut . '", idTutor="'. $idTutor. '" WHERE idGrup = "'. $idGrup. '";';

    //Realitza la connexió i realitza una consulta, la qual la guarda dintre de $query
    $query = $this->DB->query($query);
    if ($query === true) {
        return "Canvis aplicats!";
    } else {
        return "No s'han pogut aplicar els canvis!";
    }

  }

  public function eliminar($idGrup) {
	$query = 'DELETE FROM GrupClasse WHERE idGrup = "'.$idGrup.'";';
	$query = $this->DB->query($query);
	if ($query === true) {
		return "El grup s'ha eliminat!";
	} else {
		return "No s'han pogut eliminar el grup!";
	}
  }

  function __construct($DB) {
      $this->DB = $DB;

  }
  }

  ?>
