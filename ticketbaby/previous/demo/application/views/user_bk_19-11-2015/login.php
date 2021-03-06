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
<title>Login - TicketBaby</title>
</head>

<div class="container-fluid content-bg">
	<div class="container content">
        <div class="row no-mar main-content">
			<div class="col-xs-12">
			
			<div class="col-md-4 col-md-offset-4 col-xs-12 bg-ar cus-form3"><br/>
						<center>
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
				
							<h2 class="text-center"><i class="glyphicon glyphicon-lock"></i></h2>
							<h3>Login into your TicketBaby</h3><br/>
						</center>
					

		<form name="form" action="<?php echo base_url();?>index.php/user/authentication" method="post">
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control"  name="email" required placeholder="Username"/>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" class="form-control" name="password" required placeholder="Password"/>
							</div>
							<div class="form-group text-right">
								<input type="submit" class="btn btn-default btn-block" name='login' value="Login"/><br/>
								<!--a href="#">Forget Your Password?</a-->
							</div>
						</form>
					</div>
					<div class="col-xs-12">&nbsp;</div>
					<div class="col-xs-12 text-center">
						<p>Don't have account? <a href="<?php echo base_url();?>index.php/user/registration"/>Register Now</a>!</p>
					</div>
			</div>
        </div>
    </div>

    </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Notes to send an email</h4>
      </div>
      <div class="modal-body cus-form3">
		<div class="form-group">
			<input type="email" class="form-control" required placeholder="Email"/>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" required placeholder="Your Name"/>
		</div>
        <textarea class="form-control" required placeholder="Notes"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

 <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

