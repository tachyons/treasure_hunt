<div class="row-fluid">
    <div class="span4">
    <?php
      $data['item'] = '2'; //3=manage property
      $this->load->view('admin/sidebar',$data);
    ?>
  </div>
  <div class="span8">
    <h1>Leader Board</h1>
    <?php  
    	$this->load->library("table");
    	$tmpl = array ( 'table_open'  => '<table class="table table-striped  table-bordered">' );
		$this->table->set_template($tmpl);
		$query = $this->db->query("SELECT user_id,level FROM user_profiles ORDER BY level DESC ");
		echo $this->table->generate($query);
	?>
  </div>
</div>