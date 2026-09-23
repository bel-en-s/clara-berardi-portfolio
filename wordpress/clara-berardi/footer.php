<?php
/**
 * Theme footer.
 */
?>
</main>

<footer class="footer">
	<div class="container">
		<div class="footer-item">
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Clara Berardi</a></p>
		</div>
		<div class="footer-item" id="footer-contact">
			<p>
				Work with me — write to
				<a href="mailto:hola@claraberardi.com">hola@claraberardi.com</a>
			</p>
		</div>
		<div class="footer-item footer-credit">
			<p>Developed by</p>
			<a href="https://divinodivino.com" target="_blank" rel="noreferrer" class="footer-credit-link">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-dd.png' ); ?>" alt="divino divino" class="footer-logo" />
			</a>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
