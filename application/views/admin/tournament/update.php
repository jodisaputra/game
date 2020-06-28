 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Tournament/update') ?>" method="post">
 			<input type="hidden" name="tournament_id" value="<?php echo $list->tour_id ?>">
 			<div class="form-group">
 				<label>Tournament Name</label>
 				<input type="text" name="tournament_name" class="form-control" value="<?php echo $list->tour_name ?>">
 				<?php echo form_error('tournament_name') ?>
 			</div>

 			<div class="form-group">
 				<label>Game</label>
 				<select name="game" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($game as $g) : ?>
 						<option value="<?php echo $g->gm_id ?>" <?php if ($g->gm_id == $list->tour_game) {
																		echo 'selected';
																	} ?>><?php echo $g->gm_name ?>
 						</option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('game') ?>
 			</div>

 			<div class="form-group">
 				<label>Start Date</label>
 				<input type="date" name="start_date" class="form-control" value="<?php echo $list->tour_start_date ?>">
 				<?php echo form_error('start_date') ?>
 			</div>

 			<div class="form-group">
 				<label>End Date</label>
 				<input type="date" name="end_date" class="form-control" value="<?php echo $list->tour_end_date ?>">
 				<?php echo form_error('end_date') ?>
 			</div>

 			<div class="form-group">
 				<label>Location</label>
 				<input type="text" name="location" class="form-control" value="<?php echo $list->tour_location ?>">
 				<?php echo form_error('location') ?>
 			</div>

 			<div class="form-group">
 				<label>Tour Prize</label>
 				<input type="number" name="tour_prize" class="form-control" value="<?php echo $list->tour_prize; ?>">
 				<?php echo form_error('tour_prize') ?>
 			</div>

 			<div class="form-group">
 				<label>Tour Team 1</label>
 				<select name="team_1" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($team as $t) : ?>
 						<option value="<?php echo $t->team_id ?>" <?php if ($t->team_id == $list->tour_team_1) {
																		echo 'selected';
																	} ?>><?php echo $t->team_name ?>
 						</option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('team_1') ?>
 			</div>

 			<div class="form-group">
 				<label>Tour Team 2</label>
 				<select name="team_2" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($team as $t) : ?>
 						<option value="<?php echo $t->team_id ?>" <?php if ($t->team_id == $list->tour_team_2) {
																		echo 'selected';
																	} ?>><?php echo $t->team_name ?>
 						</option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('team_2') ?>
 			</div>

 			<div class="form-group">
 				<label>Poin Team 1</label>
 				<input type="text" name="poin_1" class="form-control" value="<?php echo $list->tour_poin_team_1 ?>">
 				<?php echo form_error('poin_1') ?>
 			</div>

 			<div class="form-group">
 				<label>Poin Team 2</label>
 				<input type="text" name="poin_2" class="form-control" value="<?php echo $list->tour_poin_team_2 ?>">
 				<?php echo form_error('poin_2') ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
