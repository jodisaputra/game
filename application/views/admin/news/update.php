 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('News/update') ?>" method="post" enctype="multipart/form-data">
 			<input type="hidden" name="news_id" value="<?php echo $list->news_id ?>">
 			<div class="form-group">
 				<label>News Title</label>
 				<input type="text" name="news_title" class="form-control" value="<?php echo $list->news_title ?>">
 				<?php echo form_error('news_title') ?>
 			</div>

 			<div class="form-group">
 				<label>News Description</label>
 				<textarea name="news_description" rows="5" cols="5" class="form-control"><?php echo $list->news_description; ?></textarea>
 				<?php echo form_error('news_description') ?>
 			</div>

 			<div class="form-group">
 				<label>News Image</label>
 				<input type="file" name="gambar" class="form-control">
 				<input type="hidden" name="gambar_old" value="<?php echo $list->news_image ?>">
 				<?php echo form_error('gambar'); ?>
 			</div>

 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
