<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css" />
<link rel="stylesheet" href="css/style.css">
<!-- jQuery library -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $("#flexiselDemo1").flexisel();
});
</script>
<script src="js/bootstrap-select.js"></script>
<title>TicketBaby</title>
</head>
<body>

<div class="container-fluid content-bg">
	<div class="col-xs-12">
	<center>
		<img src="<?php echo base_url();?>images/cubeNite.png" class="img-responsive"/>
	</center>
	</div>
</div>
<div class="container-fluid content-bg">
	<div class="container content">
        <div class="row no-mar main-content">
        	<div class="col-md-4 col-sm-4 left-sidebar">
            	<div class="main-thumb">
                 <img src="<?=base_url()?>assets/upload/event/thumb/<?php echo $event["thumb1"]; ?>" />
                </div>  
            </div>
            <div class="col-md-8 col-sm-8">
            	<div class="movie-video-heading">
                	<h1><?php echo $event["title"]; ?></h1>
                    <h2>price - &pound; <?php echo $event["min_unit_price"]; ?></h2>
                    <p style="display:inline-block"><img src="<?php echo base_url();?>images/stars.png"/></p>&nbsp;&nbsp;&nbsp;&nbsp;
                    <p style="display:inline-block"><img src="<?php echo base_url();?>images/img0f.png"/></p><br/><br/>
                </div>
                <div class="seating-text">
                	<p><?php echo $event["details"]; ?></p>
				 </div>
            </div>
			<div class="col-xs-12">
			
				<div class="event-info col-xs-12 ">
					<h1 class="dark">Event Information</h1>
                	<!--h1 class="dark">MVisa Awards Afterparty dates and venues</h1-->
					<div class="col-md-4 col-xs-12"><br/>
						<div class="col-xs-4 orang-bk text-center">
						<strong><?php echo strtoupper($event["start_date_month"]); ?><br/><?php echo $event["start_date_date"]; ?></strong><br/><?php echo strtoupper(substr($event["start_date_day"],0,3)); ?>
								</div>
						<div class="p-no">
							<p>Venue : <?php echo $event["venue"]; ?></p>
								<p>Address : <?php echo $event["address"]; ?></p>
								<p>City : <?php echo $event["city"]; ?></p>
								<p>Country : <?php echo $event["country"]; ?></p>
						</div>
						<div class="col-xs-12">&nbsp;</div>
						
					</div>
					
                </div>  
				<div class="col-md-6 col-xs-12">
				<form  action='JavaScript:void(0);' id="add_cart_form" class='add_cart_form'>
              <div class="table-only">
                    <h1>TICKETS - choose your section</h1>
                    <ul>
                      
                        <?php 
						
						foreach ($event_seats as $events_item): if($events_item['ticket_section_section'] == "ticket") { 
                            $avaialble_ticket =  ($events_item['group_unit_total']-sizeof($events_item['occupied_seat_numbers'])) / $events_item['unit_min_purchase'];
                        
						
						?>
							<input type="hidden" data-event="<?php echo $events_item['event_id'] ?>" value='<?php echo $events_item['event_id'] ?>' data-ticket-class="<?php echo $events_item['ticket_class_id'] ?>" name="choose-table-number[]" class="seat_ticket_new"/>
							<input type="hidden" name="ticket_section_name[]" value="ticket"> 
							<input type="hidden" name="event_id[]" value="<?php echo $events_item['event_id'] ?>"> 
							<input type="hidden" name="ticket_class_id[]" value="<?php echo $events_item['ticket_class_id'] ?>"> 
							<input type="hidden" name="ticket_section_section_id[]" value="<?php echo $events_item['event_id'] ?>"> 
							<input type="hidden" name="ticket_class_title[]>" value="<?php echo $events_item['ticket_class_title'];  ?>"> 
							<input type="hidden" name="unit_price[]" value="<?php echo $events_item['unit_price'];  ?>"> 
							<input type="hidden" name="unit_min_purchase[]" value="1"> 
							<input type="hidden" name="ticket_class_class[]" value="<?php echo $events_item['ticket_class_title'];  ?>">
							<input type="hidden" name="table_price[]" value="<?php echo $avaialble_ticket*$events_item['unit_price'];  ?>">
							<input type="hidden" name="table_seat_count[]" value="<?php echo $avaialble_ticket;  ?>">
							<input type="hidden" name="event_ticket[]" value="Y">
							<input type="hidden" name="ticket_selection_type[]" value="1">
							
                  <li class="row">
					<input class="col-md-1 col-sm-1 col-xs-1" type="radio" data-event="<?php echo $events_item['event_id'] ?>" data-ticket-class="<?php echo $events_item['ticket_class_id'] ?>" name="clubnite_ticket" <?php if (intval($avaialble_ticket) < 1){ echo "disabled";} ?> />
                        
					<label class="col-md-11  col-sm-11 col-xs-10"> 
						
                    <strong><?php echo $events_item['ticket_class_title']; ?></strong>
                    
					<span  data-event="<?php echo $events_item['event_id'] ?>" data-ticket-class="<?php echo $events_item['ticket_class_id'] ?>" data-ticket-class-slug="<?php echo $events_item['ticket_class_class'] ?>" ></span>
                    
					<em>&pound; <?php echo $events_item['unit_price'] * $events_item['unit_min_purchase']; ?></em>
					
					<?php echo $avaialble_ticket;  ?></label>
                  </li>
						
                        <?php } endforeach ?>
                    </ul>
                </div>  
                <!--div class="table-only">
                	<h1>Select Quantity</h1>
					<input type="text" value="<?php if($events_item['ticket_class_id'] == $array_store_cart[$events_item['ticket_class_id']]['ticket_class_id_s']){ echo $array_store_cart[$events_item['ticket_class_id']]['seat_quantity'];}?>" name='quantity[]' min="1" max="<?php echo $avaialble_ticket;  ?>" class='quantity_class' on='onblur_add_session(this.value,"<?php echo $events_item['event_id'] ?>","<?php echo $events_item['ticket_class_id'] ?>");'></td>
                   
                    <ul>
                        <li class="row">
						<div class="form-group col-md-4 col-xs-10">
                        	<select class="selectpicker show-tick form-control">
                            	<option>Select</option>
                                <option>Select</option>
                                <option>Select</option>
                                <option>Select</option>
                            </select>
                        </div>
                        <p class="col-md-8 col-sm-8 toppad">Standard Type $ 24.19 ( $ 21.50 ticket price + $ 2.69 fees)</p>
                        </li>
                    </ul>
                </div-->   
                
                <!--div class="table-only outer-additional">
                	<h1>Additionals</h1>
                    <ul>
                        <li class="row">
                        	<input class="col-md-1 col-sm-1 col-xs-1" type="radio" />
							<label class="col-md-4 col-xs-10"><strong>After Party Tickets</strong></label>
							<select class="col-md-4 selectpicker show-tick form-control">
								<option>Select</option>
                                <option>Select</option>
                                <option>Select</option>
                                <option>Select</option>
							</select>
                        </li>
                    </ul>
                </div-->
                       <div class="table-only outer-additional">
                    <h1>TICKETS - Additionals</h1>

                    <ul>
                        
                        <?php
								
						foreach ($event_seats as $events_item): if($events_item['ticket_group'] == "additional") { 
                            $avaialble_ticket =  ($events_item['group_unit_total']-sizeof($events_item['occupied_seat_numbers'])) / $events_item['unit_min_purchase'];
                        ?>
                        <li class="row">
                        <input class="col-md-1 col-sm-1 col-xs-1" type="radio" data-event="<?php echo $events_item['event_id'] ?>" data-ticket-class="<?php echo $events_item['ticket_class_id'] ?>" name="clubnite_ticket" <?php if (intval($avaialble_ticket) < 1){ echo "disabled";} ?> />
                        <label class="col-md-11  col-sm-11 col-xs-10"> 
                        <strong><?php echo $events_item['ticket_class_title']; ?></strong>
                        <span class="ticket-class-tooltip" data-event="<?php echo $events_item['event_id'] ?>" data-ticket-class="<?php echo $events_item['ticket_class_id'] ?>" data-ticket-class-slug="<?php echo $events_item['ticket_class_class'] ?>" >?</span>
                        <em>&pound; <?php echo $events_item['unit_price'] * $events_item['unit_min_purchase']; ?>
                        </em><?php echo $avaialble_ticket;  ?></label>
						
                        </li>
							<?php } else
									{ 								
									 echo '<div class="text-center">
											Empty!
											</div>';
									}endforeach
							
							?>
                    </ul>

        
                </div>
                <!--div class="table-only qty">
                	<h1>
                    	<ul>
                        	<li class="col-md-3 col-xs-3">QTY</li>
                            <li class="col-md-3 col-xs-3">Table Type</li>
                            <li class="col-md-3 col-xs-3">Unit Price</li>
                            <li class="col-md-3 col-xs-3">Total</li>
                            <div class="clearfix"></div>
                        </ul>
                    </h1>
                    <ul>
                    		<li class="col-md-3 col-xs-3"><p>1</p></li>
                            <li class="col-md-3 col-xs-3"><p>VVIP Platinum</p></li>
                            <li class="col-md-3 col-xs-3"><p>200.00</p></li>
                            <li class="col-md-3 col-xs-3"><input type="text" value="2000.00" /></li>
                            <div class="clearfix"></div>
                    </ul>
                </div-->
				<div class="table-only outer-additional">
                    <h1>Promo Code</h1>

                    <ul>         
                        <li class="row text-center">
                        <input type="text" name="customer_promo_code" class="event-promo-code" value="<?php echo ($cart_captcha_session && $cart_captcha_session["event_customer_details"]) ? $cart_captcha_session["event_customer_details"]["customer_promo_code"] : ""; ?>" placeholder="Promo Code" autocomplete="off" />
                        </li>
                    </ul>
                </div>
                   <div class="table-only qty">
                    <h1>
                        <ul>
                            <li class="col-md-2 col-xs-2">&nbsp;</li>
                            <li class="col-md-3 col-xs-3">Table Type</li>
                            <li class="col-md-4 col-xs-4">Unit/Price</li>
                            <li class="col-md-3 col-xs-3">Total</li>
                            <div class="clearfix"></div>
                        </ul>
                    </h1>
                    <div class="session-cart-list text-center">
                    Empty!
                    </div>

                </div>
                <div class="note">
                	<div class="row no-mar">
                    	<div class="col-md-2 col-sm-4 col-xs-3 ii">
                        	<p>i</p>
                        </div>
                        <div class="col-md-10 col-sm-8 col-xs-9 ii-text">
                        	<p>Your order may be subjected to an fulfilment fee or postage feel it will be added to you shopping basket</p>
                        </div>
                    </div>
                </div>
                
                <div class="row no-mar"><br/>
                    <div class="col-md-4 col-xs-2"></div>
                   <div class="row no-mar">
                    <div class="col-md-3 col-xs-2"></div>
                    <div class="col-md-6 col-sm-12 col-xs-8 add-to-basket">
                        <a href="javascript:void(0);" class="button-add-to-cart">Add to Cart</a>
                    </div>
                    <div class="col-md-3 col-xs-2"></div>
                </div>
                    <div class="col-md-3 col-xs-2"></div>
                </div>
				</form>
			</div>
			
			<div class="col-md-6 col-xs-12">
				<div class="col-xs-12">
					<img src="<?php echo base_url();?>images/nimg01.png" class="img-responsive pull-right"/>
				</div>
				<div class="col-xs-12">&nbsp;</div>
				<div class="col-xs-12">
					<img src="<?php echo base_url();?>images/img001.jpg" class="img-responsive pull-right"/>
				</div>
				<div class="col-xs-12">&nbsp;</div>
				<div class="col-xs-12">
					<img src="<?php echo base_url();?>images/img002.jpg" class="img-responsive pull-right"/>
				</div>
				<div class="col-xs-12">&nbsp;</div>
				<div class="col-xs-12">
					<img src="<?php echo base_url();?>images/sitelock.png" class="img-responsive pull-right"/>
				</div>
			</div>
			</div>
        </div>
    </div>
 <div class="container line"></div>
     <div class="container no-pad intrest">
     	<h1>Related to your interest</h1>
     <ul id="flexiselDemo1"> 
    <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li>
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li>
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li>
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li>
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li>
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 
	 <li class="intrest-pic"><img src="<?php echo base_url();?>images/intrest1.png" />
            <p>Cowboy3 <img src="<?php echo base_url();?>images/stars.png" /></p>
     </li> 

             
</ul>
     </div>
    </div>
    
<div class="container-fluid search-bar">
	<div class="container no-pad">
    	<div class="col-md-8 col-sm-8 no-pad search">
        	<div class="col-md-1 col-sm-1 no-pad icon mobilenone">
        		<img src="<?php echo base_url();?>images/search-icon.png" />
            </div>
            <div class="col-md-10 col-sm-8 no-pad">
            <input type="text" placeholder="Enter an address, zip code or city..." />
            <input type="button" value="Search" />
            </div>
            
        </div>
        <div class="col-md-2 col-sm-1"></div>
        <div class="col-md-2 col-sm-3 barclay">
        	<img src="<?php echo base_url();?>images/barclay.png" />
        </div>
    </div>
</div>

