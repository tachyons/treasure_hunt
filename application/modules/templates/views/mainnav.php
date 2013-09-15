<?php if(!isset($page))
{
	$page="null";
}
?>
<header>
	<!--nav bar start-->
	<nav class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		      </button>
		      <a class="brand" href="<?php echo base_url() ?>home"><i class="fa-icon-beaker"></i>Treasure Hunt</a>
				<!--mobile nav icon (hidden:CSS)-->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
					menu
				</a><!--end btn-navbar-->
				<div class="nav-collapse">
					<ul class="nav">
						<li <?php if($page=="home"){echo 'class="active"';}?>>
							<a href="<?php echo base_url() ?>home">Home</a>
						</li>
						<li <?php if($page=="about"){echo 'class="active"';}?>>
							<a href="<?php echo base_url() ?>about">About Us</a>
						</li>
						<li <?php if($page=="contact"){echo 'class="active"';}?>>
							<a href="<?php echo base_url() ?>contact">Contact Us</a>
						</li>
					</ul>
					<ul class="nav pull-right">
					    	<?php //$is_logged_in=1; ?>
							<?php if ($is_logged_in) { ?>
									<li class="dropdown">
		                			<a class=" dropdown-toggle" data-toggle="dropdown" href="#" >
		                			 	&nbsp;  <i class="icon icon-user"></i>
		                			 	&nbsp; <?php echo $user_name;  ?>
		                			 	<b class="caret"></b>
		                			</a>
		                			<ul class="dropdown-menu">
		                				<li><a href="<?php echo base_url() ?>profile"> <i class="icon-user"></i>Profile</a></li>
		                            	<li><a href="#"> <i class="icon-user"></i> Edit Profile</a></li>
		                        		<li><a href="<?php echo base_url() ?>auth/change_password"> <i class="icon-pencil"></i> Change Password</a></li>
		                        		<li class="divider"></li>
		                             	<li><a href="<?php echo base_url() ?>auth/logout"><i class="icon-minus-sign"></i> Logout</a></li>
		                			</ul>
		            			</li>
							<?php 
							}elseif($this->session->userdata('admin_logged_in')){ ?>	
								<li class="dropdown">
		                			<a class=" dropdown-toggle" data-toggle="dropdown" href="#" > &nbsp;  <i class="icon icon-user"></i>&nbsp; admin<b class="caret"></b></a>
		                			<ul class="dropdown-menu">
		                				<li><a href="<?php echo base_url() ?>admin"> <i class="icon-user"></i> Dash board</a></li>
		                            	<li><a href="#"> <i class="icon-user"></i> Edit Profile</a></li>
		                        		<li><a href="#"> <i class="icon-pencil"></i> Change Password</a></li>
		                        		<li class="divider"></li>
		                             	<li><a href="<?php echo base_url() ?>admin/logout"><i class="icon-minus-sign"></i> Logout</a></li>
		                			</ul>
		            			</li>
		        			<?php }
		        			else { ?>
		        			<li><a href="<?php echo base_url() ?>auth/register">Sign Up</a></li>
						    <li class="divider-vertical"></li>
		        			<li class="dropdown">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
									<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
										<form method="post" action="<?php echo base_url() ?>auth/login" accept-charset="UTF-8">
											<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="login">
											<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
											<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
											<label class="string optional" for="user_remember_me"> Remember me</label>
											<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
										</form>
									</div>
								</li>

		        			<?php }  ?>
					    </ul>
				</div><!-- end nav-collapse -->
			</div><!-- end container-->
		</div><!-- end navbar-inner -->
	</nav><!--end nav bar-->
	<div class="well">
			<div class="container">
				<div class="row-fluid">
					<div class="span12">
						<h1>Challenge your brain,play with fun </h1>
					</div>
				</div>
			</div>
    </div>
</header>
<div class="container">
<section id="main">
