 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Tournament/insert') ?>" method="post">

 			<div class="form-group">
 				<label>Tournament Name</label>
 				<input type="text" name="tournament_name" class="form-control" value="<?php echo set_value('tournament_name') ?>">
 				<?php echo form_error('tournament_name') ?>
 			</div>

 			<div class="form-group">
 				<label>Game</label>
 				<select name="game" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($game as $g) : ?>
 						<option value="<?php echo $g->gm_id ?>" <?php echo set_value('game') == $g->gm_id ? 'selected' : null ?>><?php echo $g->gm_name ?>
 						</option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('game') ?>
 			</div>

 			<div class="form-group">
 				<label>Start Date</label>
 				<input type="date" name="start_date" class="form-control" value="<?php echo set_value('start_date') ?>">
 				<?php echo form_error('start_date') ?>
 			</div>

 			<div class="form-group">
 				<label>End Date</label>
 				<input type="date" name="end_date" class="form-control" value="<?php echo set_value('end_date') ?>">
 				<?php echo form_error('end_date') ?>
 			</div>

 			<div class="form-group">
 				<label>Location</label>
 				<input type="text" name="location" class="form-control" value="<?php echo set_value('location') ?>">
 				<?php echo form_error('location') ?>
 			</div>

 			<div class="form-group">
 				<label>Tour Prize</label>
 				<input type="number" name="tour_prize" class="form-control" value="<?php echo set_value('tour_prize') ?>">
 				<?php echo form_error('tour_prize') ?>
 			</div>

 			<div class="form-group">
 				<label>Tour Team 1</label>
 				<select name="team_1" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($team as $t) : ?>
 						<option value="<?php echo $t->team_id ?>" <?php echo set_value('team_1') == $t->team_id ? 'selected' : null ?>><?php echo $t->team_name ?>
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
 						<option value="<?php echo $t->team_id ?>" <?php echo set_value('team_1') == $t->team_id ? 'selected' : null ?>><?php echo $t->team_name ?>
 						</option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('team_2') ?>
 			</div>

 			<div class="form-group">
 				<label>Poin Team 1</label>
 				<input type="text" name="poin_1" class="form-control" value="<?php echo set_value('poin_1') ?>">
 				<?php echo form_error('poin_1') ?>
 			</div>

 			<div class="form-group">
 				<label>Poin Team 2</label>
 				<input type="text" name="poin_2" class="form-control" value="<?php echo set_value('poin_2') ?>">
 				<?php echo form_error('poin_2') ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
