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
			if ($level>=25) {
				echo "congrats";
			}
			else
			{
				if(!isset($question[0]))
				{
					echo "<div class='alert alert-info'> End of the level wait till new levels are added </div>";
					echo "<img src='http://www.precisionnutrition.com/wordpress/wp-content/uploads/2013/02/coffee-black.jpg'/>";
					echo "<strong>Let's have a break</strong>";
				}
				else
				{
					$question=$question[0];
					if (isset($status)) {
						echo "<div class='alert alert-info'>";
						if ($status=='true') {
							if (($question['level']+1)%2==0) {
								echo '<img src="http://www.goodlightscraps.com/content/congrats/congrats_2.gif" alt="congrats" />';
							}
							else
							{
								echo "<img src='http://www.pictures88.com/p/congratulations/congratulations_001.jpg'/>";
							}
							echo "Congrats it was a correct answer,welcome to <a href='treasure'><strong>new level</strong></a>";
						}
						else
						{
							echo "We checked your answer and found that it is <strong>Wrong</strong>, But don't panic, wrong answers are just steps to the right answer";
						}
						echo "</div>";
					}
					else
					{
						$status="none";
					}
					if ($status!='true')
					{
						?>
						<p>Level:<?php echo $question['level'];?></p><br>
						<h3 id="title"> <?php echo $question['title']; ?> </h3>
						<section id="descrip"> <?php echo $question['description']; ?> </section>
						<img src="<?php echo base_url(); ?>assets/images/<?php echo str_replace(' ', '_', $question['photo']);?>" width="500" height="300"/>
						<?php echo validation_errors();
				               if(isset($error)) {echo $error;}
				       ?>
				       	<br>
						<br>
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
			}
		} ?>

	</div>
</div>