 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Game/insert_image_action') ?>" method="post" enctype="multipart/form-data">

 			<div class="form-group">
 				<label>Image</label>
 				<input type="file" name="gambar" class="form-control">
 				<?php echo form_error('gambar'); ?>
 			</div>


 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
