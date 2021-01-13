<!doctype html>
<html lang="en" class="h-100">

  <!-- Header | additionally you can specify a custom css file by adding ( $style=file.css ) before the requirement -->
  <?php require_once('./template/header.php') ?>

  <body class="d-flex flex-column h-100">

    <!-- Navigation bar | additionally you can specify the type of the navigation bar adding ( $navbar=type ) before the requirement -->
    <?php $tab=0; $navbar=0; require_once('./template/navbar.php') ?>

	<div class="banner text-center text-white"><h3 class="d-inline bg-dark px-2 py-1">Institut</h3></div>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
      <div class="container py-5">
      
        <h1 class="mt-5">Sticky footer with fixed navbar</h1>
        <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code class="small">main &gt; .container</code>.</p>
        <p>Back to <a href="#">the default sticky footer</a> minus the navbar.</p>
    		<div class="container-fluid">
    			<h4 class="display-4">bg-*</h4>
    			<p class="bg-muted">Muted.</p>
    			<p class="bg-primary">Primary.</p>
    			<p class="bg-success">Success.</p>
    			<p class="bg-info">Info.</p>
    			<p class="bg-warning">Warning.</p>
    			<p class="bg-danger">Danger.</p>
    			<p class="bg-secondary">Secondary.</p>
    			<p class="bg-dark">Dark.</p>
    			<p class="bg-body">Default.</p>
    			<p class="bg-light">Light.</p>
    			<p class="bg-white">White</p>
    		</div>
        <div class="container-fluid">
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
	  </div>
    </main>

    <!-- Footer | additionally you can specify the type of the navigation bar adding ( $footer=type ) before the requirement -->
    <?php require_once('./template/footer.php') ?>

    <script src="./js/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>
