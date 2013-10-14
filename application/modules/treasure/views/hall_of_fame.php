<div class="row-fluid">
    <div class="span4">
    <?php
      $data['item'] = '4'; 
      $this->load->view('treasure/sidebar',$data);
    ?>
  </div>
  <div class="span8">
   <h1>Hall Of Fame </h1>
   <?php  
    	$this->load->library("table");
    	$tmpl = array ( 'table_open'  => '<table class="table table-striped  table-bordered">' );
		  $this->table->set_template($tmpl);
		  $query = $this->db->query("SELECT user FROM fame ORDER BY time ASC");
		  echo $this->table->generate($query);
	?>
  </div>
</div>