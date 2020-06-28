 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('News/insert') ?>" method="post" enctype="multipart/form-data">
 			<div class="form-group">
 				<label>News Title</label>
 				<input type="text" name="news_title" class="form-control" value="<?php echo set_value('news_title') ?>">
 				<?php echo form_error('news_title') ?>
 			</div>

 			<div class="form-group">
 				<label>News Description</label>
 				<textarea name="news_description" rows="5" cols="5" class="form-control"><?php echo set_value('news_description') ?></textarea>
 				<?php echo form_error('news_description') ?>
 			</div>

 			<div class="form-group">
 				<label>News Image</label>
 				<input type="file" name="gambar" class="form-control">
 				<?php echo form_error('gambar'); ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
