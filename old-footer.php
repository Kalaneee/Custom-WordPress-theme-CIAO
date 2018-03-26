<footer>
	<div class="container">
		<div class="row">

			<?php if(is_active_sidebar('widgetized-footer')): ?>

				<?php dynamic_sidebar('widgetized-footer'); ?>

			<?php else: ?>


			<div class="col-12">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</p>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				</p>
			</div>
		<?php endif; ?>
		</div>
	</div>
	</footer>

	<?php wp_footer(); ?>
</div> <!-- /wrapper -->
</body>
</html>