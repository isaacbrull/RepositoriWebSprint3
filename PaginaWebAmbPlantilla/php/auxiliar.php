<?php

  require_once('alumne.php');
  require_once('professor.php');

  class Auxiliar {

    private $alumnes;
    private $professors;
    private $contador;

    public function validarDades($nomusuari,$contraseña) {

      $usuari = $this->cercar($nomusuari);

      if ($usuari != null){
        if ($usuari->getContraseña() === $contraseña) {
          return $usuari;
        }
      }
    }

    public function cercar($nomusuari) {

      for ($i=0;$i<count($this->professors);$i++) {
        if ($this->professors[$i]->getNomUsuari() === $nomusuari) {
          return $this->professors[$i];
        }
      }

      for ($i=0;$i<count($this->alumnes);$i++) {
        if ($this->alumnes[$i]->getNomUsuari() === $nomusuari) {
          return $this->alumnes[$i];
        }
      }

    }

    public function cercarId($id) {

      for ($i=0;$i<count($this->professors);$i++) {
        if ($this->professors[$i]->getId() == $id) {
          return $this->professors[$i];
        }
      }

      for ($i=0;$i<count($this->alumnes);$i++) {
        if ($this->alumnes[$i]->getId() == $id) {
          return $this->alumnes[$i];
        }
      }

    }

    public function llistar($clase) {

      echo "<table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom d'usuari</th>
                  <th>Nom</th>
                  <th>Cognom</th>
                  <th>2n Cognom</th>
                  <th>DNI</th>
                  <th>". ($clase === 0 ? "Num Colegiat" : "Num Matriculat"). "</th>
                  <th>Contrasenya</th>
                  <td class = \"alta\"><a href =\"".($clase === 0 ? "./crudphp/altaProfessors.php" : "./crudphp/altaAlumnes.php")."\"><img src= \"./img/simbolCrear.svg\"/></a></td>
                <tr>
              </thead>
              <tbody>";

      foreach (($clase === 0 ? $this->professors : $this->alumnes) as $usuari) {
        echo "<tr>
            <td>". $usuari->getId() . "</td>
            <td>". $usuari->getNomUsuari(). "</td>
            <td>". $usuari->getNom(). "</td>
            <td>". $usuari->getPrimerCognom(). "</td>
            <td>". $usuari->getSegonCognom(). "</td>
            <td>". $usuari->getDni(). "</td>
            <td>". ($clase === 0 ? $usuari->getNumColegiat() : $usuari->getNumMatriculat()). "</td>
            <td>". $usuari->getContraseña(). "</td>
            <td class = \"edel\"><a href =\"".($clase === 0 ? "./crudphp/modificarProfessor.php?id=".$usuari->getId()."" : "./crudphp/modificarAlumne.php")."\"><img src= \"./img/simbolEditar.png\"/></a>
            <a href =\"".($clase === 0 ? "./crudphp/eliminarProfessor.php" : "./crudphp/eliminarAlumne.php")."\"><img src= \"./img/simbolEliminar.png\"/></a></td>

          </tr>";
      }

      echo '</tbody><tfoot><tr><td colspan="8"> Total usuaris: '. count(($clase ? $this->alumnes : $this->professors)). '</tr></td></tfoot></table>';
    }

    public function alta($nomusuari,$nom,$cognom,$segoncognom,$dni,$matriculacio,$contrasenya,$clase) {

      $this->contador++;

      if ($clase === 0) {
        return new Professor($this->contador, $nomusuari, $nom, $cognom, $segoncognom, $dni, $matriculacio, $contrasenya);
      } else {
        return new Alumne($this->contador, $nomusuari, $nom, $cognom, $segoncognom, $dni, $matriculacio, $contrasenya);
      }



    }

    public function modificar($nomusuari,$nom,$cognom,$segoncognom,$dni,$matriculacio,$contrasenya,$clase) {
      if ($clase === 0) {

      } else {

      }
    }

    function contador() {
      $_SESSION['contador'] = (isset($_SESSION['contador']) ? $_SESSION['contador'] + 1 : 1);

    }

    function __construct() {

      session_start();

      $this->alta("JoanP","Joan Professor","España","","","","123",0);
      $this->alta("JosepP","Josep Professor","Lopez","","","","12345",0);
      $this->alta("VladP","Vlad Professor","Udod","","","","1234",0);


      $this->alta("VladU","Vlad","Udod","","","","1234",1);
      $this->alta("MarcE","Marc","España","","","","123",1);
      $this->alta("JosepL","Josep","Lopez","","","","12345",1);

      $this->alumnes = $_SESSION['alumnes'];
      $this->professors = $_SESSION['professors'];


    }

  }




?>
