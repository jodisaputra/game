 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Game_patch/insert') ?>" method="post">

 			<div class="form-group">
 				<label>Title</label>
 				<input type="text" name="title" class="form-control" value="<?php echo set_value('title') ?>">
 				<?php echo form_error('title') ?>
 			</div>

 			<div class="form-group">
 				<label>Description</label>
 				<textarea name="description" rows="5" cols="5" class="form-control"><?php echo set_value('description') ?></textarea>
 				<?php echo form_error('description') ?>
 			</div>

 			<div class="form-group">
 				<label>Version</label>
 				<input type="text" class="form-control" name="version" value="<?php echo set_value('version') ?>">
 				<?php echo form_error('version') ?>
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

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
