<style>
.active a{
	   /* display: none;*/
}
</style>
<div class="container-fluid content-bg">
	<div class="container content">
        <div class="row no-mar main-content">
        	<div class="col-md-3 col-xs-12">
				<div class="col-xs-12 cus-form3">
					<form id='search_form' action="<?php echo base_url();?>index.php/event/search">
					<div class="form-group input-group">
						
						<input type="text" class="form-control" value='<?php echo $country;?>' name='country' id='country' placeholder="Search by Country"/>
						<a class="input-group-addon" id="search_by" href="javascript:document.getElementById('search_form').submit();"><i class="glyphicon glyphicon-search"></i></a>
						
					</div>
					</form>
					<div class="panel-group cus-acc" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title active">
								Category
							</h4>
						</div>
						</a>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						  <div class="panel-body">
							<div class="list-group">
							  <?php $color	=	'';
									$color	=	'background-color: #FFB584;color:#fff';
							  ?>
							  <a href="<?php echo $cate_url;?>"  <?php if($cat_id == ''){ echo "style='{$color}'";}?>class="list-group-item">All Categories</a>
							  <?php if($category_all){
								foreach($category_all as $_category_all){
									$color	=	'';
									if($cat_id == $_category_all['cat_id'])
										$color	=	'background-color: #FFB584;color:#fff';
									 echo "<a style='{$color}' href='{$cate_url}&cat_id={$_category_all['cat_id']}' class='list-group-item'>{$_category_all['category_name']}</a>";
								}
								}?>
							
							</div>
						  </div>
						</div>
					  </div>
					  
					  <!--div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title active">
								Event Type
							</h4>
						</div>
						</a>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						  <div class="panel-body">
							<div class="list-group">
							  <a href="#" class="list-group-item">All Categories</a>
							  <a href="#" class="list-group-item">Business</a>
							  <a href="#" class="list-group-item">Art</a>
							  <a href="#" class="list-group-item">Food & Drink</a>
							  <a href="#" class="list-group-item">Music</a>
							</div>
						  </div>
						</div>
					  </div-->
					  
					  <div class="panel panel-default">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThe" aria-expanded="true" aria-controls="collapseThe">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title active">
								Date
							</h4>
						</div>
						</a>
						<div id="collapseThe" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						  <div class="panel-body">
							<div class="list-group">
							  <?php $color	=	'';
									$color	=	'background-color: #FFB584;color:#fff';
							  ?>
							  <a href="<?php echo $url.'&day=';?>" <?php if($day == ''){ echo "style='{$color}'";}?> class="list-group-item">All Date</a>
							  <a href="<?php echo $url.'&day=today';?>"<?php if($day == 'today'){ echo "style='{$color}'";}?> class="list-group-item">Today</a>
							  <a href="<?php echo $url.'&day=tomorrow';?>" <?php if($day == 'tomorrow'){ echo "style='{$color}'";}?> class="list-group-item">Tomorrow</a>
							  <a href="<?php echo $url.'&day=this-week';?>" <?php if($day == 'this-week'){ echo "style='{$color}'";}?> class="list-group-item">This Week</a>
							  <a href="<?php echo $url.'&day=next-week';?>" <?php if($day == 'next-week'){ echo "style='{$color}'";}?> class="list-group-item">Next Week</a>
							</div>
						  </div>
						</div>
					  </div>
					  
					</div>
					<div class="col-xs-12">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15243406.195009712!2d82.7792231!3d21.131108349999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2s!4v1440401472577" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			
			
			
			<div class="col-md-9 col-xs-12">
				<div class="col-xs-12"><h2 class="no-mar"><?php if($country){?>Events in <?php echo $country;?>.<?php }?></h2><br/></div>
			<?php
			if($home_page_event_list){
                foreach ($home_page_event_list as $event_item):
                   // print_r($event_item);
					//if($event_item['show_main_carousel'] == "Y") { 
            ?>
				<div class="col-xs-12">&nbsp;</div>
				 <?php 
				 $href_start	=	'';
				 $href_end		=	'';
				 if ( $event_item['ticketseatrows'] > 0 ) { 
					$base_url	=	base_url();
					$href_start	=	"<a href='{$base_url}/index.php/event/{$event_item['slug']}' title='{$event_item['title']}'>";
					$href_end	=	"<a>";
				 }
				 echo $href_start;
				 ?>
				 
				<div class="col-xs-12 event-s">
					<div class="col-md-3 col-xs-12">
						<div class="thumbnail">
							<?php 
							$thumb1_recommended_carousel	=	$event_item['thumb1_recommended_carousel'];
							if($thumb1_recommended_carousel){
								$img	=	base_url()."assets/upload/event/thumb/".$thumb1_recommended_carousel; 
							}	
							
							?>
							<img width='100%' style='height: 130px;' src="<?php echo $img;?>" class="img-responsive" alt="<?php echo $event_item['slug']; ?>">
							<div class="caption text-center">
								<?php echo $event_item['title']; ?>
							</div>
						</div>
					</div>
					<div class="col-md-9 col-xs-12">
						<small><?php 
					 	$date	=	date('D, M d h:i A',strtotime($event_item['start_date']));
						echo $date;?>
						</small><br/>
						<h4 class="no-mar"><?php echo  word_limiter($event_item['summary'], 20); ?></h4><br/></br/></br/></br/>
						<p class="no-mar"> <?php echo $event_item['category_name']; ?> </p>
						<p class="no-mar"><?php echo $event_item['address']; ?> </p>
					</div>
				</div>
			<?php echo $href_end;
                //}
                endforeach;
            }else{
			echo "No event found.";
			}?>
				<div class="col-xs-12">&nbsp;</div>
				<div class="col-xs-12 text-center">
					<?php echo $this->pagination->create_links();  ?>
					<!--nav>
					  <ul class="pagination">
						<li>
						  <a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						  </a>
						</li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
						  <a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						  </a>
						</li>
					  </ul>
					</nav-->
				</div>
			</div>
        </div>
    </div>
     
     <!--div class="container no-pad intrest">
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


     </div-->

    </div>
    

<script>
$(document).ready(function(){

	$("li a").each(function() {
		var href	=	$(this).attr('href');
		if(typeof href === 'undefined'){
			$(this).hide();		
		}
		
	});
		
});
</script>


