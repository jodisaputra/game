 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Game_developer/update') ?>" method="post">
 			<input type="hidden" name="developer_id" value="<?php echo $list->gamde_id ?>">
 			<div class="form-group">
 				<label>Developer Name</label>
 				<input type="text" name="developer_name" class="form-control" value="<?php echo $list->gamde_developer_name ?>">
 				<?php echo form_error('developer_name') ?>
 			</div>
 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
