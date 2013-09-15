<div class="row-fluid">
    <div class="span4">
		<?php
			$data['item'] = '1'; //3=manage property
			$this->load->view('treasure/sidebar',$data);
		?>
	</div>
	<div class="span8">
		<?php
			//$this->load->view('treasure/dash');
			if(!$question[0])
			{
				echo "End of the level";
			}
			else
			{
				$question=$question[0];
				?>
				<h3> <?php echo $question['title']; ?> </h3>
				<section> <?php echo $question['description']; ?> </section>
				<img src="<?php echo base_url(); ?>assets/images/<?php echo $question['photo'];?>" width="500" height="300"/>
				<?php echo validation_errors();
		               if(isset($error)) {echo $error;}
		       ?>
				<form class="form-horizontal" method="post">
					<div class="control-group">
					    <label class="control-label" for="answer">Answer</label>
					    <div class="controls">
					      	<input type="text" id="answer" placeholder="Answer" name="answer">
					    </div>
				  	</div>
				  	<div class="control-group">
					    <div class="controls">
					      	<button type="submit" class="btn btn-primary">Submit</button>
					    </div>
		  			</div>
				</form>
				<?php
				}

				?>
		
	</div>
</div>
