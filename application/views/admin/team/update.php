 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Team/update') ?>" method="post" enctype="multipart/form-data">
 			<input type="hidden" name="team_id" value="<?php echo $list->team_id ?>">
 			<div class="form-group">
 				<label>Team Name</label>
 				<input type="text" name="team_name" class="form-control" value="<?php echo $list->team_name ?>">
 				<?php echo form_error('team_name') ?>
 			</div>

 			<div class="form-group">
 				<label>Country</label>
 				<select name="country" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($country as $c) : ?>
 						<option value="<?php echo $c->coun_id ?>" <?php if ($c->coun_id == $list->team_country) {
																		echo 'selected';
																	} ?>><?php echo $c->coun_country_name ?></option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('country') ?>
 			</div>

 			<div class="form-group">
 				<label>Description</label>
 				<textarea name="description" rows="5" cols="5" class="form-control"><?php echo $list->team_description; ?></textarea>
 				<?php echo form_error('description') ?>
 			</div>

 			<div class="form-group">
 				<label>Logo</label>
 				<input type="file" name="gambar" class="form-control">
 				<input type="hidden" name="gambar_old" value="<?php echo $list->team_logo ?>">
 				<?php echo form_error('gambar'); ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
