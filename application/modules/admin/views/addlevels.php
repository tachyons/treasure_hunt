<div class="row-fluid">
     <div class="span4">
     <?php
          $data['item'] = '6'; //3=manage property
          $this->load->view('admin/sidebar',$data);
     ?>
     </div>
     <div class="span8">
          <h2>Add Levels</h2>
         <?php
               echo validation_errors();
               if(isset($error)) {echo $error;}
               $attributes = array('class' => 'form-horizontal', 'id' => 'addproperty');
               echo form_open_multipart('admin/addlevels', $attributes);
               $this->form_builder->text('level', 'Level name', '');
               $this->form_builder->text('title', 'Title', '');
               $this->form_builder->textarea('description', 'Desription', '');
         ?>
          <div class="control-group">
             <label class="control-label" for="photo">Photo</label>
               <div class="controls">
                 <?php
                     echo form_upload('photo');
                 ?>
               </div>
          </div>
         <?php  $this->form_builder->text('answer', 'Answer', ''); ?>
         <?php  $this->form_builder->text('cookie', 'Cookie hint', ''); ?>
         <?php  $this->form_builder->text('javascript', 'JS hint', ''); ?>
         <?php $this->form_builder->single_button('Add Level', 'submit_id', 'btn-primary'); ?>
         <!-- Beginning header -->
         <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-wysihtml5.css"></link>
         
         <script>
         </script>
         <style type="text/css">
         textarea#description{
             width:100%
         }
         </style>
     </div>
</div>