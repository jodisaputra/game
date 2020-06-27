 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Team/insert') ?>" method="post" enctype="multipart/form-data">
 			<div class="form-group">
 				<label>Team Name</label>
 				<input type="text" name="team_name" class="form-control" value="<?php echo set_value('team_name') ?>">
 				<?php echo form_error('team_name') ?>
 			</div>

 			<div class="form-group">
 				<label>Country</label>
 				<select name="country" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($country as $c) : ?>
 						<option value="<?php echo $c->coun_id ?>" <?php echo set_value('country') == $c->coun_id ? 'selected' : null ?>><?php echo $c->coun_country_name ?></option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('country') ?>
 			</div>

 			<div class="form-group">
 				<label>Description</label>
 				<textarea name="description" rows="5" cols="5" class="form-control"><?php echo set_value('description') ?></textarea>
 				<?php echo form_error('description') ?>
 			</div>

 			<div class="form-group">
 				<label>Logo</label>
 				<input type="file" name="gambar" class="form-control">
 				<?php echo form_error('gambar'); ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
