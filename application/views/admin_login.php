<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TCP International Inc</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="b2fdbbb0260d58d1a257c5c3-text/javascript" src="https://www.kevinleary.net/wp-samples/js/jquery.url.js"></script>
<script type="b2fdbbb0260d58d1a257c5c3-text/javascript">
	$(function(){
		$page = jQuery.url.attr("file");
		if(!$page) {
			$page = 'http://localhost/bu_erp/';
		}
		$('ul li a').each(function(){
			var $href = $(this).attr('href');
			if ( ($href == $page) || ($href == '') ) {
				$(this).addClass('on');
			} else {
				$(this).removeClass('on');
			}
		});
	});
	</script>
	<style>
	body{
  		font-family: sans-serif;
		}
	a:hover {
	  text-decoration: none;
		}
	.center {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
		} 

	fieldset {
	 /* background-color: #eeeeee; */
	  border-radius: 5px;
	/*  border: 1px solid #007bff; */
	}
	#login_btn {
	  display:block;
	  height: 40px;
	  width: 90px;
	  border-radius: 25px;
	  border: none;	  
	}
	
	.input-icons i { 
            position: absolute;

        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 

        } 
          
        .icon { 
            padding: 15px; 
            min-width: 40px; 
            text-align: left;
        }
        .input-field { 
            width: 70%; 
            padding: 10px; 
            text-align: center; 
            display:inline;
        }

        input {
		  outline: 0;
		  border-width: 0 0 1px;
		  border-color: blue
		}
		input:focus {
		  border-color: green
		}
		.icon-right { 
            padding: 15px; 
            min-width: 40px; 
            text-align: right;
        }
   /* unvisited link */
      a.fg_pwd:link {
        color: red;
      }
      
      /* visited link */
      a.fg_pwd:visited {
        color: green;
      }
      
      /* mouse over link */
      a.fg_pwd:hover {
        color: hotpink;
      }
      
      /* selected link */
      a.fg_pwd:active {
        color: blue;
      }

  /* The image used */
  body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-image: url("https://i.imgur.com/GMmCQHC.png");
    background-repeat: no-repeat;
    background-size: 100% 100%
}

  /* Control the height of the image */
  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
	</style>
<script>
         $(document).on('click', '.toggle-password', function() {            
            $(this).toggleClass("fa-eye fa-eye-slash");            
            var input = $("#pass_log_id");
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });
</script>
</head>
<body>
	
<nav class="navbar navbar-expand navbar-dark bg-light static-top"> 
		    <img src="<?php echo base_url('images/tcp_logo.png'); ?>" alt="No Image" width="400"
			         height="80" class="img-fluid center">
		</nav><br>
<div class="container"><br>
	<div class="row pt-1">
		<div class="col-sm-2 col-sm-offset-4"></div>
		<div class="col-sm-8 col-sm-offset-4">
			<center>
			<div class="login-panel panel panel-primary">
				<div class="container text-center">
							    <div class="btn-group w-100" role="group">
							    								    	
							    	<?php if(current_url()=="http://localhost/tcpproject/"){?>
							        <a href="http://localhost/tcpproject/" class="btn w-50" style="background-color: #253B80; color:white;">Admin</a>	
							        <?php }?>
							    
							    </div>
							</div>

		    	<div class="panel-body input-icons">		    		
		        	<form method="POST" action="<?php echo base_url(); ?>Admin_User/login">
		        		<div class = "shadow-lg p-3 mb-5 bg-white rounded">
		            	<fieldset>		           		
		           	            		
		                	<div class="form-group pt-4">
		                		<i class="fa fa-user icon"></i>
		                    	<input class="input-field" style="height:45px;" placeholder="Username" type="text" name="a_username" width="15" value="<?php if(isset($_COOKIE["loginId1"])) { echo $_COOKIE["loginId1"]; } ?>" required>
		                	</div>		                
		                	<div class="form-group pt-4">
		                		<i class="fa fa-key icon"></i>
		                    	<input class="input-field" style="height:45px" placeholder="Password" type="password" name="a_password" id="pass_log_id" value="<?php if(isset($_COOKIE["loginPass1"])) { echo $_COOKIE["loginPass1"]; } ?>" required>
		                    	<i class="fa fa-eye icon-right toggle-password" title="Show/Hide password"></i>
		                	</div>
							<div class="form-group">
		                        <div class="checkbox">
		                            <label>
		                                <input type="checkbox" name="remember1" <?php if(isset($_COOKIE["loginId1"])) { ?> checked="checked" <?php } ?>> <font style="font-size:12px;">Remember Me</font>
		                            </label>                                    
		                        </div>
		                    </div>
		                	<button type="submit" class="btn btn-md btn-block" id="login_btn" style="background-color: #253B80; color:white;"><span class="glyphicon glyphicon-log-in"></span>Login</button>
		                	<div style="text-align: right;"> <a href="#" style="font-size: 14px;" class="fg_pwd" >Forgot Password?</a> </div>
		                	
		                	<div class="pt-2"></div>
		            	</fieldset>
		            </div>
		        	</form>
		    	</div>
		    </div></center>		    

			<?php
				if($this->session->flashdata('error')){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $this->session->flashdata('error'); ?>
					</div>
					<?php
				}
			?>
		</div>
	</div>
</div><br>

<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="b2fdbbb0260d58d1a257c5c3-|49" defer=""></script>
</body>
<?php include APPPATH.'views/admin/includes/footer.php';?>
</html>
