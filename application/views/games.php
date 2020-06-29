	<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url('assets/frontend/'); ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<h1 class="mb-3 bread">Games</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Games <i class="ion-ios-arrow-forward"></i></span></p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-game-schedule bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading-section ftco-animate mb-4">
					<span class="subheading">Teams</span>
				</div>
			</div>
			<div class="row ftco-animate">
				<div class="col-md-12 carousel-game-schedule owl-carousel">
					<?php foreach ($team as $t) : ?>
						<div class="item">
							<div class="game-schedule">
								<div class="sport-team d-flex align-items-center">
									<div class="img logo" style="background-image: url('<?php echo base_url('assets/team/' . $t->team_logo); ?>');"></div>
									<div class="pl-4 desc">
										<span class="venue"></span>
										<h4 class="team-name"><?php echo $t->team_name; ?></h4>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="heading-section ftco-animate">
						<span class="subheading">Game Report</span>
						<h2 class="mb-4">Tournament</h2>
					</div>
					<?php foreach ($team as $t) : ?>
						<div class="scoreboard mb-5 mb-lg-3">
							<div class="d-sm-flex mb-4">
								<div class="sport-team d-flex align-items-center">
									<div class="img logo" style="background-image: url('<?php echo base_url('assets/team/' . $t->team_logo); ?>');"></div>
									<div class="text-center px-1 px-md-3 desc">
										<h3 class="score win"><span>0</span></h3>
										<h4 class="team-name"><?php echo $t->team_name ?></h4>
									</div>
								</div>
								<div class="sport-team d-flex align-items-center">
									<div class="img logo order-sm-last" style="background-image: url('<?php echo base_url('assets/team/' . $t->team_logo); ?>');"></div>
									<div class="text-center px-1 px-md-3 desc">
										<h3 class="score lost"><span>0</span></h3>
										<h4 class="team-name"><?php echo $t->team_name ?></h4>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
