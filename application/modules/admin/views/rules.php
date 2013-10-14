<div class="row-fluid">
    <div class="span4">
    <?php
      $data['item'] = '3'; //3=manage property
      $this->load->view('admin/sidebar',$data);
    ?>
  </div>
  <div class="span8">
    <?php $this->load->view('rules/rules',$data); ?>
  </div>
</div>