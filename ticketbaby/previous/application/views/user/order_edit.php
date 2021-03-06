

<div class="container-fluid content-bg">
	<div class="container content">
        <div class="row no-mar main-content leftPad">
			<div class="col-md-6 col-xs-12">
				<h2 class="text-orange">Dashboard - Order Details</h2>
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
				   <li><a href="<?php echo base_url();?>index.php/user/order_detail">My Orders</a></li>
				   <li class="active">Order Details</li>
				</ol>
			</div>
			<div class="col-xs-12">
			 <form role="form" method="post" class="form-admin-order-creation"  action="<?=base_url()?>index.php/admin/order/edit?order_id=<?php echo isset($order_id) ? $order_id : "";?>&page_start=<?php echo isset($page_start) ? $page_start : "";?>">
                   <?php
					 $a=count($order_edit);
					 $a=$a-1;

					for($j=0; $j < $a ; $j++)
					{
			?>
				<div class="col-xs-12 well welli">
					<h3 class="order_edit">Details</h3>
				</div>
				
				<div class="col-md-3 col-xs-12">
					<label>Pay ID</label>
					<p><?php echo $order_edit[$j]["pay_id"];?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Order ID</label>
					<p><?php echo $order_edit[$j]["id"];?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Event</label>
					<p><?php echo ucfirst($order_edit[$j]["event_title"]);?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Date</label>
					<p><?php echo date("d F Y",strtotime($order_edit[$j]["date"]));?></p>
				</div>
				
				<div class="col-md-3 col-xs-12">
					<label>Total Amount</label>
					<p>&pound; <?php echo $order_edit[$j]["total_amount"];?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Promo/Coupon code</label>
					<p><?php echo $order_edit[$j]["customer_promo_code"];?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Donation</label>
					<p><?php echo $order_edit[$j]["customer_add_donation"];?></p>
				</div>
				<div class="col-md-3 col-xs-12"></div>
				<div class="col-xs-12 well welli">
					<h3 class="order_edit">Billing Details</h3>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>First Name</label>
					<p><?php echo ucfirst($order_edit[$j]["first_name"]);?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Last Name</label>
					<p><?php echo ucfirst($order_edit[$j]["last_name"]);?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Email</label>
					<p><?php echo $order_edit[$j]["email"];?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Contact Number</label>
					<p><?php echo $order_edit[$j]["mobile_number"];?></p>
				</div>
				
				<div class="col-md-3 col-xs-12">
					<label>Area</label>
					<p><?php echo $order_edit[$j]["area"];?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>City</label>
					<p><?php echo $order_edit[$j]["city"];?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Post code</label>
					<p><?php echo $order_edit[$j]["post_code"];?></p>
				</div>
				<div class="col-md-3 col-xs-12"></div>
				<div class="col-xs-12 well welli">
					<h3 class="order_edit">Customer Details</h3>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Customer First name</label>
					<p><?php if($order_edit[$j]["customer_first_name"]){echo $order_edit[$j]["customer_first_name"];}else{echo "-";}?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Customer Last name</label>
					<p><?php if($order_edit[$j]["customer_last_name"]){echo $order_edit[$j]["customer_last_name"];}else{echo "-";}?></p>
				</div>
				<div class="col-md-3 col-xs-12">
					<label>Customer email</label>
					<p><?php if($order_edit[$j]["customer_email"]){echo $order_edit[$j]["customer_email"];}else{echo "-";}?></p>
				</div>
				 <?php
                    }
                    ?>
				<div class="col-md-3 col-xs-12"></div>
				<div class="col-xs-12 well welli">
					<h3 class="order_edit">Table/Seat Details</h3>
				</div>
				
				<div class="col-xs-12 table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>#</th>
							<th>Type</th>
							<th>Class</th>
							<th>Table Number</th>
							<th>Seat Numbers</th>
						</tr>
						 <?php
					//print_r($order_edit);die;
                     if( isset($order_edit) && isset($order_edit['seat_details']) ) { foreach ($order_edit['seat_details'] as $k=>$seat_detail) {
                    ?>
					<tr>
							<td><?php echo $k+1; ?></td>
							<td><?php echo $seat_detail['ticket_section_title']; ?></td>
							<td><?php echo $seat_detail['ticket_class_title']; ?></td>
							<td><?php echo $seat_detail['table_number']; ?></td>
							  <?php 
                                 if ( $seat_detail['ticket_section'] == "ticket" ) {
                                    $seat_number_arr = explode( "," , $seat_detail['seat_numbers']);
                                    //echo sort($seat_number_arr,SORT_NUMERIC);
                                   // echo implode(", " , $seat_number_arr) . " [Qty -<strong>" . sizeof($seat_number_arr) . "</strong>]"; 
                                
                            ?>
							<td><?php     echo implode(", " , $seat_number_arr) . " [Qty -<strong>" . sizeof($seat_number_arr) . "</strong>]"; ?></td>
						<?php  }
								 else{
								 
                                    echo "<td>NA</td>";
                                 }
                                 ?>
						</tr>
						
           
                    
                    </div>
                    <?php
                    }}
                    ?>
						
						
					</table>
					
				</div>
			</div>
			 </form>
        </div>
    </div>
</div>