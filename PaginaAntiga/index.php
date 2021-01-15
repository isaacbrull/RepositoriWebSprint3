<!DOCTYPE html>
<html lang="en">

    <!-- Header -->
    <?php require_once('./template/header.php'); ?>

    <body>

      <?php $navtype = 0; require_once('./template/navbar.php'); ?>

      <div class="banner">
        <h2 class="banner-title">Institut</h2>
        <div class="banner-background"></div>
      </div>

      <div class="body">
        <div class="body-container">
          <div class="body-column-left">
            <section>
              <h3>Qui som?</h3>
              <p>
                What is Lorem Ipsum?
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </section>
            <section>
              <h3>A que ens dediquem?</h3>
              <p>
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s.
              </p>
            </section>
          </div>
          <div class="body-column-right">
              <img src="./img/logo_inst_n.png"/>
          </div>
        </div>
      </div>

      <?php $footertype = 0; require_once('./template/footer.php'); ?>

    </body>
    <script src="./js/principal.js"></script>

</html>
