<!DOCTYPE html>
<html lang="en">

    <!-- Header -->
    <?php $style = 'estils-contacte.css'; require_once('./template/header.php'); ?>

    <body>

      <?php $navtype = 0; require_once('./template/navbar.php'); ?>

      <div class="banner">
        <h2 class="banner-title">Cerca d'instituts</h2>
        <div class="banner-background"></div>
      </div>

      <div class="body">
        <div class="body-container">
          <div class="body-column-left">
            <div class="mapa">
              <iframe class="zoom" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.395189901719!2d0.5803069505145204!3d40.70931604561608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a0fe735557799b%3A0x3fade49ba3687306!2sInstitut%20Montsi%C3%A0%20i%20CFA%20Sebasti%C3%A0%20Juan%20Arb%C3%B3!5e0!3m2!1sca!2ses!4v1603385016201!5m2!1sca!2ses" ></iframe>
            </div>

          </div>
          <div class="body-column-right">
            <div class="opcio">
              <select>
                   <option value="montsia">Ies Montsia</option>
                   <option value="deltebre">Ies Deltebre</option>
                   <option value="roquetes">Ins Roquetes</option>
               </select>
               <img class="canviimg" src="./img/montsia.jpeg"/>
              <p class = "Institut" ><a class="link" href="https://agora.xtec.cat/insmontsia/">Institut Montsia</a></p>
            </div>
          </div>
          <div class="body-column-bottom">

              <form class="flex-container" action="#" method="post">
                <div class="item1">
                  <label for="fname">Nom: </label>
                  <input type="text" id="fname" name="fname">
                  <label for="lname">Email: </label>
                  <input type="text" id="lname" name="lname">
                </div>

                <div class="flex-containerConsulta">
                  <label class="required" for="message">Consulta:</label><br />
                  <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea>
                </div>
                <div class="flex-containerButton">
                  <input class="button" type="submit" value="Submit" >
                </div>
              </form>

          </div>
<!--
          <div class="body-column-js">
            <input type="button" value= "parseFloat" onclick="parseFloat()"/>
          </div>
-->
        </div>
      </div>

      <?php $footertype = 0; require_once('./template/footer.php'); ?>

    </body>
    <script src="./js/principal.js"></script>
    <script src="./js/contacte.js"></script>

</html>
