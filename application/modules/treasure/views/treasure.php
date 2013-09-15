<div class="row-fluid">
    <div class="span4">
		<?php
			$data['item'] = '1'; //3=manage property
			$this->load->view('treasure/sidebar',$data);
		?>
	</div>
	<div class="span8">
		<?php
			$this->load->view('treasure/dash');
		?>
	</div>
</div>
