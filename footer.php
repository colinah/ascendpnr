<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ascend_Performance_and_Rehab
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-wrapper">
			<div class="footer-menu__wrapper">
				<?php dynamic_sidebar('footer'); ?>
			</div>
			<div class="footer-newsletter__wrapper">
				<?php dynamic_sidebar('newsletter'); ?>
				<div class="footer-icons">
					<div class="footer-icon-text">Follow us on social media:</div>
					<div class="footer-icon"><a href="https://www.instagram.com/dr.jedidiah/?hl=en"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></div>
				</div>
			</div>
		</div> <!-- /footer-wrapper -->

		<div class="bottom-wrapper">

			<div class="site-info">
				<small>Designed and developed by: <a href="https://halecolin.com/">Colin Hale</a><small>
				<div>
				<small>&copy; Copyright <?php echo date("Y"); ?>, Ascend Performance and Rehab</small> 
			</div>
			<div>
				<small class="icons8">Icons from <a href="https://icons8.com/">https://icons8.com/</a></small>
			</div>
			</div><!-- .site-info -->
			<div class="theme-switch-wrapper">
							<label class="theme-switch" for="checkbox">
							<input type="checkbox" id="checkbox" />
							<div class="slider round"></div>
						</label>
						<em>Enable Dark Mode!</em>
				</div>
		</div> <!-- bottom-wrapper -->
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
