<?php

class Alumne {

  //Variable que realitza la connexió a la BD
  private $DB;

  public function alta($idRol, $nom, $cognom, $segonCognom, $dni, $username, $password, $email, $telefon, $dataNaixement) {
	//INSERT INTO Usuari ('idUsuari', 'idRol', 'Nom', 'Cognom', 'SegonCognom', 'DNI', 'UserName', 'Password', 'Tipus', 'Email', 'Telefon', 'DataNaixement') VALUES (NULL, $this->idRol, $this->nom, $this->cognom, $this->segonCognom, $this->dni, $this->username, $this->password, $this->tipus, $this->email, $this->telefon, $this->dataNaixement);
	$query = 'INSERT INTO Usuari(idRol, Nom, Cognom, SegonCognom, DNI, UserName, Password, Tipus, Email, Telefon, DataNaixement, Estat) VALUES '. "(". '"' . $idRol . '","' . $nom . '","' . $cognom . '","' . $segonCognom . '","' . $dni . '","' . $username . '","' . $password . '","Alumne","' . $email . '","' . $telefon . '","' . $dataNaixement . '","actiu");';
    $query = $this->DB->query($query);
    if ($query === true) {
        return "Alumne afegit!";
    } else {
        return "No s'han pogut afegir el alumne!";
    }
  }

//$DB es del fitxer Database, la private static
  public function llistar() {
    $query = 'SELECT idUsuari, idRol, Nom, Cognom, SegonCognom, DNI, UserName, Tipus, Email, Telefon, DataNaixement, Estat FROM Usuari WHERE Tipus = "Alumne";';

    $query = $this->DB->query($query);

    if ($query) {
        echo '<table border="1" frame="void" rules="cols">
                <thead>
                    <tr>
                        <th>Nom Complet</th>
                        <th>DNI</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Data Naixement</th>
                        <!--  <th>Estat</th> -->
                        <td><a href="./crudusuaris.php?action=0&type=0"><i class="fas fa-plus"></i></a></td>
                    </tr>
                </thead>
                <tbody>';

        foreach ($query as $row) {
          if($row['Estat'] === 'actiu') {
              echo '<tr>
                      <td>'. $row['Nom'] .' '. $row['Cognom'] .' '. $row['SegonCognom'] .'</td>
                      <td>'. $row['DNI'] .'</td>
                      <td>'. $row['UserName'] .'</td>
                      <td>'. $row['Email'] .'</td>
                      <td>'. $row['Telefon'] .'</td>
                      <td>'. $row['DataNaixement'] .'</td>
                      <!--  <td>'. $row['Estat'] .'</td> -->
                      <td>
                          <div class="table-icons">
                              <a href="./crudusuaris.php?uid='. $row['idUsuari']. '&action=1&type=0"><i class="fas fa-edit"></i></a>
                              <a href="./crudusuaris.php?uid='. $row['idUsuari']. '&action=2&type=0"><i class="fas fa-trash-alt"></i></a>
                          <div>
                      </td>
                  </tr>';
          }
        }
        echo '    </tbody>
              </table>';
    }
  }

  //Modificar
  public function modificar($idusuari, $idrol, $password, $tipus, $email, $telefon) {
	$query = 'UPDATE Usuari SET idRol ="'. $idrol. '", Password = "'. $password . '" , Tipus = "'.$tipus.'", Telefon = "'.$telefon.'", Email = "'.$email.'" WHERE idUsuari ="'.$idusuari.'";';
    $query = $this->DB->query($query);
    if ($query === true) {
        return "Canvis aplicats!";
    } else {
        return "No s'han pogut aplicar els canvis!";
    }
  }
//@Andrei borrar o editar si gethostbynamel
  public function eliminar($idusuari) {
    $query = 'UPDATE Usuari SET Estat = "inactiu" WHERE idUsuari = "'.$idusuari.'";';
    $query = $this->DB->query($query);
    if ($query === true) {
        return "L'usuari s'ha eliminat!";
    } else {
        return "No s'han pogut eliminar l'usuari!";
    }
  }

  function __construct($DB) {
      $this->DB = $DB;

  }

}
?>
