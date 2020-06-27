 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-body">
 		<form action="<?php echo base_url('Country/update') ?>" method="post">
 			<input type="hidden" name="country_id" value="<?php echo $list->coun_id ?>">
 			<div class="form-group">
 				<label>Country Name</label>
 				<input type="text" name="country_name" class="form-control" value="<?php echo $list->coun_country_name ?>">
 				<?php echo form_error('country_name') ?>
 			</div>
 			<button type="submit" class="btn btn-primary">Save</button>
 		</form>
 	</div>
 </div>
