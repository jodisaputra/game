	<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url('assets/frontend/'); ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<h1 class="mb-3 bread"><?php echo $berita->news_title ?></h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog</a></span></p>
				</div>
			</div>
		</div>
	</section>


	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ftco-animate">
					<p><?php echo $berita->news_description ?></p>
				</div> <!-- .col-md-12 -->

			</div>
		</div>
	</section> <!-- .section -->
