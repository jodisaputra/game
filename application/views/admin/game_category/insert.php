 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Game_category/insert') ?>" method="post">
 			<div class="form-group">
 				<label>Category Name</label>
 				<input type="text" name="category_name" class="form-control" value="<?php echo set_value('category_name') ?>">
 				<?php echo form_error('category_name') ?>
 			</div>
 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
