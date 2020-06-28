 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Game_patch/update') ?>" method="post">
 			<input type="hidden" name="gamepatch_id" value="<?php echo $list->gampa_id ?>">
 			<div class="form-group">
 				<label>Title</label>
 				<input type="text" name="title" class="form-control" value="<?php echo $list->gampa_title ?>">
 				<?php echo form_error('title') ?>
 			</div>

 			<div class="form-group">
 				<label>Description</label>
 				<textarea name="description" rows="5" cols="5" class="form-control"><?php echo $list->gampa_description; ?></textarea>
 				<?php echo form_error('description') ?>
 			</div>

 			<div class="form-group">
 				<label>Version</label>
 				<input type="text" class="form-control" name="version" value="<?php echo $list->gampa_version_update ?>">
 				<?php echo form_error('version') ?>
 			</div>

 			<div class="form-group">
 				<label>Game</label>
 				<select name="game" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($game as $g) : ?>
 						<option value="<?php echo $g->gm_id ?>" <?php if ($g->gm_id == $list->gampa_game) {
																		echo 'selected';
																	} ?>><?php echo $g->gm_name ?>
 						</option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('game') ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
