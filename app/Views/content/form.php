<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
	
	<div class="container">
		<form action="<?php echo ($data['title'] == null ? '/create' : '/edit/'.$data['id'] );?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="form-group py-2">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo ($data['title'] == null ? '' : $data['title'] );?>">
			</div>
			<div class="form-group py-2">
				<label for="description">Description</label>
				<textarea name="description" class="form-control" id="description" rows="5" placeholder="Description"><?php echo ($data['title'] == null ? '' : $data['description'] );?></textarea>
			</div>
			<div class="form-group py-2">
				<label for="description">File</label>
				<input type="file" name="file" class="form-control" id="file" accept="image/*">
			</div>
			<div class="d-flex justify-content-between py-2">
				<a href="/" class="btn btn-danger">Cancel</a>
				<button type="submit" class="btn btn-primary"><?php echo ($data['title'] == null ? 'Create' : 'Edit')?></button>
			</div>
		</form>
	</div>

<?= $this->endSection() ?>