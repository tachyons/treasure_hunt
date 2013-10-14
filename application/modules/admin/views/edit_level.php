<div class="row-fluid">
    <div class="span4">
		<?php
			$data['item'] = '7'; //3=manage property
			$this->load->view('admin/sidebar',$data);
		?>
	</div>
	<div class="span8">
		<?php //print_r($level_data);?>
		<?php
			echo validation_errors();
			if(isset($error)) {echo $error;}
			$attributes = array('class' => 'form-horizontal', 'id' => 'editlevel');
			echo form_open_multipart('admin/editlevel', $attributes);
			$this->form_builder->text('level', 'Level number', $level_data['level']);
           	$this->form_builder->text('name', 'Level name', $level_data['name']);
			$this->form_builder->text('title', 'Title', $level_data['title']);
			$this->form_builder->textarea('description', 'Desription', $level_data['description']);
			?>
			<div class="control-group">
			 <label class="control-label" for="photo">Photo</label>
			   <div class="controls">
			   	<img src="<?php echo base_url();?>assets/images/<?php echo $level_data['photo'];?>"/>
			   </div>
			</div>
			<div class="control-group">
			 <label class="control-label" for="photo">Photo</label>
			   <div class="controls">
			     <?php
			         echo form_upload('photo');
			     ?>
			   </div>
			</div>
			<?php  $this->form_builder->text('answer', 'Answer', $level_data['answer']); ?>
			<?php  $this->form_builder->text('cookie', 'Cookie hint', $level_data['cookie']); ?>
			<?php  $this->form_builder->text('javascript', 'JS hint', $level_data['javascript']); ?>
			<?php $this->form_builder->single_button('edit Level', 'submit_id', 'btn-primary'); ?>
			<!-- Beginning header -->
			<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-wysihtml5.css"></link>
			<style type="text/css">
			textarea#description{
			 width:100%
			}
			</style>
			<?php 
				echo '</form>';
			?>
	</div>
</div>