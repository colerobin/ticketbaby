
<div class="container-fluid content-bg">
	<div class="container content">
        <div class="row no-mar main-content leftPad">
			<div class="col-md-6 col-xs-12">
				<h2 class="text-orange">Dashboard - Invite People</h2>
			</div>
			<div class="col-md-6 col-xs-12 text-right"><br/>
				<!-- <button class="btn btn-success btn-lg">Profile Settings</button> -->
			</div>
			<div class="col-xs-12">
				<nav class="navbar navbar-default subNav">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#subNav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="collapse navbar-collapse" id="subNav">
                      <ul class="nav navbar-nav">
                      	<li><a href="<?php echo base_url();?>index.php/user/editProfile"><i class="glyphicon glyphicon-list-alt"></i> Account Details</a></li>
						<li><a href="<?php echo base_url();?>index.php/user/order_detail"><i class="glyphicon glyphicon-tasks"></i> Order Details</a></li>
						<li><a href="<?php echo base_url();?>index.php/user/my_event"><i class="glyphicon glyphicon-calendar"></i> My Events</a></li>
                       </ul>                                                                   
					  <ul class="nav navbar-nav navbar-right">
					  <li class="dropdown">
						<a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-cog"></i>&nbsp;<?php echo ($user['user_name']);?><b class="caret"></b></a>
						<ul class="dropdown-menu"> 
							<li><a href="<?php echo base_url();?>index.php/user/logout"><i class="glyphicon glyphicon-log-in"></i> Logout</a></li>
							<li><a href="<?php echo base_url();?>index.php/user/editProfile"><i class="glyphicon glyphicon-pencil"></i> Edit Profile</a></li>
							</ul>
					  </li> 
					  </ul>
                    </div>
                </nav>
			</div>
			<div class="col-xs-12"><hr/></div>
			<div class="col-xs-12">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>index.php/cart/home">Home</a></li>
				   <li><a href="<?php echo base_url();?>index.php/cart/home">Dashboard</a></li>
				   <li><a href="<?php echo base_url();?>index.php/user/my_event">My Events</a></li>
				  <li class="active">Invite People</li>
				</ol>
			</div>
		
			<div class="col-xs-12 ">

				   <?php if($this->session->flashdata('error')) { ?>                    
                        <p style="color:red">
                            <?php echo $this->session->flashdata('error');?>
                        </p>                   
                    <?php } 
					 elseif($this->session->flashdata('success')) { ?>                    
                        <p style="color:green">
                            <?php echo $this->session->flashdata('success');?>
                        </p>                   
                    <?php }?>    
				<?php if($event_id){?>
				<form class="form-horizontal" name="form" id="" method="POST" action="<?php echo base_url();?>index.php/user/invitation">   
						<div class="form-group cus-form4">
						<label class="col-md-2 form-label">
							Send a test invitation to:
						</label>
						<div class="col-md-10">
						<input type="hidden" name="event_id" value="<?php echo $event_id;?>">
		
							<input type="email" required='true' value="<?php echo $email;?>" name="email" class="form-control"/>
						</div>
					</div>
					<div class="form-group cus-form4">
						<label class="col-md-2"></label>
						<div class="col-md-5">
						<a href="<?php echo base_url();?>index.php/user/my_event"><button type="button" class="btn btn-block btn-warning" >Cancel</button></a>
						
						</div>
						<div class="col-md-5">
							<button  type="submit" class="btn btn-block btn-warning" name='send' value="Send">Invite Now</button>
						</div>
					</div>
				</form>
			<?php }?>
			</div>
        </div>
    </div>
</div>
