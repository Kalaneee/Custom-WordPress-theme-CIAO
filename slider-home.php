

<section class="m-dw-30">
	<div class="container">
		<div id="slider-01" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#slider-01" data-slide-to="0" class="active"></li>
				<li data-target="#slider-01" data-slide-to="1"></li>
				<li data-target="#slider-01" data-slide-to="2"></li>
				<li data-target="#slider-01" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="<?= wp_upload_dir_url() . "/2018/03/car-1.jpg"; ?> " alt="..." style="width: 100%">
					<div class="carousel-caption">
						...
					</div>
				</div>
				<div class="item">
					<img src="<?= wp_upload_dir_url() . "/2018/03/car-2.jpg"; ?> " alt="..." style="width: 100%">
					<div class="carousel-caption">
						...
					</div>
				</div>
				<div class="item">
					<img src="<?= wp_upload_dir_url() . "/2018/03/car-3.jpg"; ?> " alt="..." style="width: 100%">
					<div class="carousel-caption">
						...
					</div>
				</div>
				<div class="item">
					<img src="<?= wp_upload_dir_url() . "/2018/03/car-4.jpg"; ?> " alt="..." style="width: 100%">
					<div class="carousel-caption">
						...
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#slider-01" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#slider-01" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div> <!-- /carousel -->
	</div> <!-- /container -->
</section>
