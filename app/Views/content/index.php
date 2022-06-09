<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
		
		<div class="d-flex justify-content-end">
			<a href="/create" class="btn btn-sm btn-primary">Create</a>
		</div>
		<table class="table table-secondary table-striped table-responsive">
			<thead>
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>Description</th>
					<th>Created At</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					foreach ($data as $datas) { ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $datas['title']; ?></td>
						<td><?php echo $datas['description']; ?></td>
						<td>
							<?php 
								$original = $datas['created_at'];
								$convert = date('d M Y', strtotime($original));
								echo $convert;
							?>
						</td>
						<td>
							<div class="d-flex justify-content-center">
								<a href="/edit/<?= $datas['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="/destroy/<?= $datas['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
							</div>
						</td>
					</tr>
				<?php $no++; } ?>
			</tbody>
		</table>

<?= $this->endSection() ?>