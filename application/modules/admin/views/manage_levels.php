<div class="row-fluid">
    <div class="span4">
		<?php
			$data['item'] = '7'; //3=manage property
			$this->load->view('admin/sidebar',$data);
		?>
	</div>
	<div class="span8">
		<table class="table table-striped table-bordered">
			<th>Level</th>
			<th>Name</th>
			<th>Titles</th>
			<th>Actions</th>
			<?php foreach ($levels as $level): ?>
			<tr>
				<td><?php echo $level['level'];?> </td>
				<td><?php echo $level['name'];?> </td>
				<td><?php echo $level['title'];?> </td>
				<td><a href="#editwindow" role="button" class="btn" data-toggle="modal">Edit</a></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
<!-- Modal -->
<div id="editwindow" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Modal header</h3>
	</div>
	<div class="modal-body">
		<p>One fine body…</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save changes</button>
	</div>
</div>