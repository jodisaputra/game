 <!-- Page Heading -->
 <h1 class="h3 mb-2 text-gray-800"><?php echo $judul ?></h1>

 <!-- DataTales Example -->
 <div class="card shadow mb-4">
 	<div class="card-header py-3">
 		<a href="<?php echo site_url('Game/image_insert/' . $this->uri->segment(3)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data</a>
 	</div>
 	<?php echo $this->session->flashdata('message') ?>
 	<div class="card-body">
 		<div class="table-responsive">
 			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 				<thead>
 					<tr>
 						<th>No</th>
 						<th>Image</th>
 						<th>Action</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php foreach ($game as $g) : ?>
 						<tr>
 							<td>1</td>
 							<td><img width="20%" src="<?php echo base_url('assets/game/' . $g->gm_image_screenshot) ?>" alt=""></td>
 						</tr>
 					<?php endforeach; ?>
 					<?php $no = 2;
						foreach ($list as $l) : ?>
 						<tr>
 							<td><?php echo $no++ ?></td>
 							<td><img src="<?php echo base_url('assets/game/' . $l->gamsc_screenshot) ?>" alt=""></td>
 							<td>
 								<a href="<?php echo site_url('Game/delete_image/' . $l->gamsc_id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
 							</td>
 						</tr>
 					<?php endforeach; ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
