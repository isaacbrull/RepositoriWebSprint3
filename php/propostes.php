<?php

class Proposta {

  private $DB;

  public function alta($idDepartament, $idGrup, $idCategoria, $Nom, $Descripcio, $DataPublicacio) {

    // AIXO \" (BARRA INVERTIDA + "), no sen vaiguen les dobles comilles quan s'utilitza el caracter
    $query = 'INSERT INTO Proposta(idDepartament, idGrup, idCategoria, Nom, Descripcio, Estat, DataPublicacio) VALUES '. "(\"" . $idDepartament . '","' .  $idGrup . '","' . $idCategoria . '","' . $Nom . '","' . $Descripcio . '","No acceptat","' . $DataPublicacio . '")';
    $query = $this->DB->query($query);
    if($query){
        return "A HUEVO DINERITO";
    } else {
        return "A PLORAR";
    }
  }

//$DB es del fitxer Database, la private static
  public function llistar() {
    $query = 'SELECT * FROM Proposta;';
    $query = $this->DB->query($query);

    if ($query) {
        echo '<table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Estat</th>
                        <th>Data Publicació</th>
                        <th>Data Acceptació</th>
                        <td><a href="./crudpropostes.php?action=0"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                    </tr>
                </thead>
                <tbody>';

        foreach ($query as $row) {

                echo '<tr>
                        <td>'. $row['Nom'] .'</td>
                        <td>'. ($row['Estat'] == 'No acceptat' ? 'Pendent per acceptar' : 'Proposta ja acceptada').'</td>
                        <td>'. $row['DataPublicacio'] .'</td>
                        <td>'. ($row['DataAcceptacio'] ? $row['DataAcceptacio'] : 'No acceptada') .'</td>
                        <td>
                            <div class="table-icons">
                                <a href="./crudpropostes.php?pid='. $row['idProposta']. '&action=1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="./crudpropostes.php?pid='. $row['idProposta']. '&action=2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <div>
                        </td>
                    </tr>';

      }

      echo '    </tbody>
            </table>';
    }
  }

  //Modificar
  public function modificar($idProposta, $Nom, $Descripcio, $Estat) {
    $query = 'UPDATE Proposta SET Nom="' . $Nom . '",Descripcio="' . $Descripcio . '",Estat="'. $Estat . '" WHERE idProposta = "'. $idProposta. '";';
    //Realitza la connexió i realitza una consulta, la qual la guarda dintre de $query
    $query = $this->DB->query($query);
    if ($query === true) {
        return "Canvis aplicats!";
    } else {
        return "No s'han pogut aplicar els canvis!";
    }

  }

  public function eliminar($idProposta) {
    $query = 'DELETE FROM Proposta WHERE idProposta = "'.$idProposta.'";';
    $query = $this->DB->query($query);
    if ($query === true) {
        return "La Proposta s'ha eliminat!";
    } else {
        return "No s'han pogut eliminar la Proposta!";
    }
  }

  function __construct($DB) {
      $this->DB = $DB;

  }
}

?>
