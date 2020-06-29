	<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url('assets/frontend/'); ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
				<div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
					<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">How long can you last?</h1>
					<p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					<p class="d-flex align-items-center">
						<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center mr-3">
							<span class="ion-ios-play"></span>
						</a>
						<span class="watch">Watch Games</span>
					</p>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Blog</span>
					<h2>Recent News</h2>
				</div>
			</div>
			<div class="row d-flex">
				<div class="col-md-6 col-lg-3 ftco-animate">
					<?php foreach ($berita as $b) :  ?>
						<div class="blog-entry justify-content-end">
							<a href="<?php echo base_url('Homepage/news/' . $b->news_id); ?>" class="block-20" style="background-image: url('<?php echo base_url('assets/news/' . $b->news_image); ?>');">
							</a>
							<div class="text mt-3 float-right d-block">
								<div class="d-flex align-items-center p-2 pr-3 mb-4 topp">
									<!-- <div class="one">
										<span class="day mr-1">08</span>
									</div> -->
									<div class="two">
										<span class="mos"><?php echo date('d F y', strtotime($b->news_release_date)) ?></span>
									</div>
								</div>
								<h3 class="heading"><a href="<?php echo base_url('Homepage/news/' . $b->news_id); ?>"><?php echo $b->news_title ?></a></h3>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
