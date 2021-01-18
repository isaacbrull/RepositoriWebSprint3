<!doctype html>
<html lang="en" class="h-100">

  <!-- Header | additionally you can specify a custom css file by adding ( $style=file.css ) before the requirement -->
  <?php require_once('../template/header.php') ?>

  <body class="d-flex flex-column h-100">

    <!-- Navigation bar | additionally you can specify the type of the navigation bar adding ( $navbar=type ) before the requirement -->
    <?php $tab=0; $navbar=0; require_once('../template/navbar.php') ?>

	<!--<div class="banner text-center text-white"><h2>Banner</h2></div>-->

    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container">
        <!--Section: Contact v.2-->
<section class="mb-4">

  <!--Section heading-->
  <h2 class="h1-responsive font-weight-bold text-center my-4">Contacta amb nosaltres</h2>
  <!--Section description-->
  <p class="text-center w-responsive mx-auto mb-5">Tens alguna pregunta? Contacta amb nosaltres emplenant aquest formulari.</p>

    <?php
    if(isset($_POST['email'])) {

    //<bold>// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias</bold>
    //Email destinatari, creat a Don Dominio
    $email_to = "formulari@uniproject.cat";
    $email_subject = "Contacte";

    //<bold>// Aquí se deberían validar los datos ingresados por el usuario</bold>
    if(!isset($_POST['name']) ||
    !isset($_POST['last_name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['message'])) {

    echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
    echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
    die();
    }


    echo 'Aixo es el cognom ' . $_POST['last_name'];

    $email_message = "Detalles del formulario de contacto:\n\n";
    $email_message .= "Nombre: " . $_POST['name'] . "\n";
    $email_message .= "Apellido: " . $_POST['last_name'] . "\n";
    $email_message .= "E-mail: " . $_POST['email'] . "\n";
    $email_message .= "Comentarios: " . $_POST['message'] . "\n\n";


    //<bold>// Ahora se envía el e-mail usando la función mail() de PHP</bold>
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "¡El formulario se ha enviado con éxito!";
    echo 'Aixo es el cognom ' . $_POST['last_name'];
    }
    ?>



          <!--POTSER LINK FALLA-->
          <div>
            <br></br>
            <video width="320" height="240" controls>
                <source src="../imatges/funerario.mp4" type="video/mp4">
            </video>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-3 text-center">
          <ul class="list-unstyled mb-0">
              <li><i class="fas fa-map-marker-alt fa-2x"></i>
                  <p>43870 Amposta, Tarragona, Espanya</p>
              </li>

              <li><i class="fas fa-phone mt-4 fa-2x"></i>
                  <p>+34 977 70 00 43</p>
              </li>

              <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                  <p>contacta@proiectus.cat</p>
              </li>
          </ul>
      </div>
      <!--Grid column-->
</section>
<!--Section: Contact v.2-->
	    </div>
    </main>

    <!-- Footer | additionally you can specify the type of the navigation bar adding ( $footer=type ) before the requirement -->
    <?php require_once('./template/footer.php') ?>

    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>
