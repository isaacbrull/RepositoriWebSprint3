<footer class="footer">
    <?php switch ($footertype):
		case 0: ?>
			<div class="footer-container">
				<div class="footer-title"><strong>Projekt</strong></div>
				<div class="footer-title"><strong>Menu</strong></div>
				<div class="footer-title"><strong>Informació</strong></div>
				<div class="footer-section">
					<span>
						Lorem Ipsum is simply dummy text of the printing and
						typesetting industry. Lorem Ipsum has been the industry's
						standard dummy text ever since the 1500s.
					</span>
				</div>
				<div class="footer-section">
					<span>Exemple2</span>
					<span>Registrat</span>
					<span>Contacta</span>
				</div>
				<div class="footer-info">
					<i class="fas fa-phone"></i> <span><strong>Telefon:</strong> +34 000 000 000</span>
					<i class="fas fa-envelope"></i><span><strong>Correu:</strong> placeholder@info.cat</span>
					<i class="fas fa-map-marker-alt"></i><span><strong>Adreça:</strong> Carrer ...</span>
				</div>
				<div><small>&copy; Copyright 2020-2021, <a href="https://agora.xtec.cat/insmontsia">Institut Montsià</a></small></div>
			</div>
	<?php break; ?>
	<?php case 1: ?>
		<div class="footer-container">
			<div><small>&copy; Copyright 2020-2021, <a href="https://agora.xtec.cat/insmontsia">Institut Montsià</a></small></div>
		</div>
	<?php break; ?>
	<?php endswitch; ?>
</footer>
