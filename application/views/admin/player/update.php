 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Player/update') ?>" method="post">

 			<input type="hidden" name="player_id" value="<?php echo $list->play_id ?>">
 			<div class="form-group">
 				<label>Team</label>
 				<select name="team" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($team as $t) : ?>
 						<option value="<?php echo $t->team_id ?>" <?php if ($t->team_id == $list->play_team) {
																		echo 'selected';
																	} ?>><?php echo $t->team_name ?></option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('team') ?>
 			</div>

 			<div class="form-group">
 				<label>Country</label>
 				<select name="country" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($country as $c) : ?>
 						<option value="<?php echo $c->coun_id ?>" <?php if ($c->coun_id == $list->play_country) {
																		echo 'selected';
																	} ?>><?php echo $c->coun_country_name ?></option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('country') ?>
 			</div>

 			<div class="form-group">
 				<label>Player Name</label>
 				<input type="text" name="player_name" class="form-control" value="<?php echo $list->play_player_name ?>">
 				<?php echo form_error('player_name') ?>
 			</div>

 			<div class="form-group">
 				<label>Player Nickname</label>
 				<input type="text" name="player_nickname" class="form-control" value="<?php echo $list->play_player_nickname ?>">
 				<?php echo form_error('player_nickname') ?>
 			</div>

 			<div class="form-group">
 				<label>Description</label>
 				<textarea name="description" rows="5" cols="5" class="form-control"><?php echo $list->play_player_description ?></textarea>
 				<?php echo form_error('description') ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
