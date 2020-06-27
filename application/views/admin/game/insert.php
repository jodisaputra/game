 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Game/insert') ?>" method="post" enctype="multipart/form-data">
 			<div class="form-group">
 				<label>Game Name</label>
 				<input type="text" name="game_name" class="form-control" value="<?php echo set_value('game_name') ?>">
 				<?php echo form_error('game_name') ?>
 			</div>

 			<div class="form-group">
 				<label>Category</label>
 				<select name="category" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($category as $c) : ?>
 						<option value="<?php echo $c->gamca_id ?>" <?php echo set_value('category') == $c->gamca_id ? 'selected' : null ?>><?php echo $c->gamca_category_name ?></option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('category') ?>
 			</div>

 			<div class="form-group">
 				<label>Developer</label>
 				<select name="developer" class="form-control">
 					<option value="">Pilih Salah satu</option>
 					<?php foreach ($developer as $d) : ?>
 						<option value="<?php echo $d->gamde_id ?>" <?php echo set_value('developer') == $d->gamde_id ? 'selected' : null ?>><?php echo $d->gamde_developer_name ?></option>
 					<?php endforeach; ?>
 				</select>
 				<?php echo form_error('developer') ?>
 			</div>

 			<div class="form-group">
 				<label>Detail</label>
 				<textarea name="detail" rows="5" cols="5" class="form-control"><?php echo set_value('detail') ?></textarea>
 				<?php echo form_error('detail') ?>
 			</div>

 			<div class="form-group">
 				<label>Release date</label>
 				<input type="date" name="release_date" class="form-control" value="<?php echo set_value('release_date') ?>">
 				<?php echo form_error('release_date'); ?>
 			</div>

 			<div class="form-group">
 				<label>Image</label>
 				<input type="file" name="gambar" class="form-control">
 				<?php echo form_error('gambar'); ?>
 			</div>


 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
