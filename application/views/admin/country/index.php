 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-header py-3">
 		<a href="<?php echo site_url('Country/insert_form') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data</a>
 	</div>
 	<?php echo $this->session->flashdata('message') ?>
 	<div class="card-body">
 		<div class="table-responsive">
 			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Country Name</th>
 						<th>Action</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php $no = 1;
						foreach ($list as $l) : ?>
 						<tr>
 							<td><?php echo $no++ ?></td>
 							<td><?php echo $l->coun_country_name ?></td>
 							<td>
 								<a href="<?php echo site_url('Country/update_form/' . $l->coun_id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit" data-toggle="modal" data-target="#staticBackdrop"></i> Update</a>
 								<a href="<?php echo site_url('Country/delete/' . $l->coun_id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
 							</td>
 						</tr>
 					<?php endforeach; ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
