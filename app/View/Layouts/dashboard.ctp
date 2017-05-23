<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js
"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link  href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
 <script src="<?php echo ABSOLUTE_URL;?>/js/bootstrap.min.js"  type="text/javascript"></script>
    <link href="<?php echo ABSOLUTE_URL;?>/css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php echo $this->Html->charset(); ?>
	<title>
	Coin-Desk
	</title>
	<?php
		echo $this->Html->meta('icon');
	?>
</head>
<style type="text/css">
	<style type="text/css">
                #container{
        padding-left: 0px!important;
		}
        .container{
                min-height:800px; margin-bottom:0px;
                padding-left: 0px!important;
               
        }
        .drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
    }
    .link{
    	color:white!important;
    	margin-left: 10%!important;
    }
    .nag-margin-42{margin-left: -42px!important;}
</style>
</style>
<body>
	<div id="container">

		<div id="content">
		<div id="wrapper">
		<?php $userData =$this->Session->read('User'); ?>
		    <!-- Sidebar -->
		    <div id="sidebar-wrapper" class="hidden-xs">
		        <ul class="sidebar-nav">
		        	<img align="center" height="150" width="115" style="margin-left: 40px;margin-top: 10px;" src="<?php echo ABSOLUTE_URL;?>/img/user.png">
		        	<li style="margin-left:5px; color:white;"><h4>Welcome&nbsp;<?php echo $userData['name'];?></h4></li> 
		            <li class="sidebar-brand"></li>
		            <li>
		            	<h4 style="margin-top: 40px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/dashboard">Home</a></h4>
		            </li>
		           
                  <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/transactions">History</a></h4>
                  </li>
                  <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/contactUs">Contact Us</a></h4>
                  </li>
                  <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/setting">Edit Profile</a></h4>
                  </li>
                  <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/buildOrder">Buy a package</a></h4>
                  </li>
                   <li class="dropdown ">
                       <a href="#" class="dropdown-toggle font-14 link" style="font-size:19px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Team<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                      <li><a  href="<?php echo ABSOLUTE_URL;?>/users/myTeamSide/left">Left Side</a>
                    <li><a href="<?php echo ABSOLUTE_URL;?>/users/myTeamSide/right">Right Side</a></li> 
                     <li><a href="<?php echo ABSOLUTE_URL;?>/users/myTeam">Genealogy</a></li> 
                      </ul>
                      </li> 
			            <!-- <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/testimony">Add a Testimonial</a></h4>
                  </li> -->
                  <li class="dropdown ">
                       <a href="#" class="dropdown-toggle font-14 link" style="font-size:19px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Incomes<span class="caret"></span></a>
                       <ul class="dropdown-menu">
                      <li><a  href="<?php echo ABSOLUTE_URL;?>/users/wallet">My Wallet</a>
                    <li><a href="<?php echo ABSOLUTE_URL;?>/users/incomes/binary">Binary Income</a></li> 
                     <li><a href="<?php echo ABSOLUTE_URL;?>/users/incomes/referals">Referal Income</a></li> 
                      <li><a href="<?php echo ABSOLUTE_URL;?>/users/incomes/daily">Daily Income</a></li> 
                      </ul>
                      </li> 
                  <li>
                  <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/pinWallet">Top Up Pin</a></h4>
                  </li>
                  <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/passwordReset/<?php echo $userData['id'];?>/1">Change Password</a></h4>
                  </li>
                  <li>
                      <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/logout">Logout</a></h4>
                  </li>
		        </ul>
		    </div>
            <nav class="navbar col-xs-12 col-md-3 navbar-default navbar-custom visible-xs " style="background-color: #000000; ">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            Menu <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="<?php echo ABSOLUTE_URL;?>"><?php echo strtoupper(COMPANY_NAME);?></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                      <?php if (empty($userInfo['id'])) { ?>
                         <li>
                            <a href="<?php echo ABSOLUTE_URL;?>/users/registration">Register</a>
                        </li>
                        <li>
                          <a data-toggle="modal" href="#login">Login</a>
                      </li>
                      <li>
                          <a href="<?php echo ABSOLUTE_URL;?>">Home</a>
                      </li>
                      <?php } else { ?>
                         <li>
                              <h4 style="margin-top: 40px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/pages/dashboard">Home</a></h4>
                            </li>
                           
                              <li>
                                  <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/transactions">History</a></h4>
                              </li>
                              <li>
                                  <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/pages/contactUs">Contact Us</a></h4>
                              </li>
                              <li>
                                  <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/setting">Edit Profile</a></h4>
                              </li>
                              <li>
                                <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/buildOrder">Buy a package</a></h4>
                              </li>
                               <li class="dropdown ">
                                   <a href="#" class="dropdown-toggle font-14 link" style="font-size:19px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Team<span class="caret"></span></a>
                                   <ul class="dropdown-menu">
                                  <li><a  href="<?php echo ABSOLUTE_URL;?>/users/myTeamSide/left">Left Side</a>
                                <li><a href="<?php echo ABSOLUTE_URL;?>/users/myTeamSide/right">Right Side</a></li> 
                                 <li><a href="<?php echo ABSOLUTE_URL;?>/users/myTeam">Genealogy</a></li> 
                                  </ul>
                                  </li> 
                              <li>
                                  <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/testimony">Add a Testimonial</a></h4>
                              </li>
                              <li class="dropdown ">
                                   <a href="#" class="dropdown-toggle font-14 link" style="font-size:19px;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Incomes<span class="caret"></span></a>
                                   <ul class="dropdown-menu">
                                  <li><a  href="<?php echo ABSOLUTE_URL;?>/users/wallet">My Wallet</a>
                                <li><a href="<?php echo ABSOLUTE_URL;?>/users/incomes/binary">Binary Income</a></li> 
                                 <li><a href="<?php echo ABSOLUTE_URL;?>/users/incomes/referals">Referal Income</a></li> 
                                  <li><a href="<?php echo ABSOLUTE_URL;?>/users/incomes/daily">Daily Income</a></li> 
                                  </ul>
                              </li> 
                              <li>
                              <li>
                                  <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/pinWallet">Top Up Pin</a></h4>
                              </li>
                              <li>
                                  <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/passwordReset/<?php echo $userData['id'];?>/1">Change Password</a></h4>
                              </li>
                              <li>
                                  <h4 style="margin-top: 20px;"><a class="link" href="<?php echo ABSOLUTE_URL;?>/users/logout">Logout</a></h4>
                              </li>
                        <?php } ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>
    
		    <div class="pull-left"><a href="#menu-toggle" style="position: absolute;z-index: 999999;"  class="btn btn-default hidden-xs nag-margin-42" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span></a></div>
		    <div class="clearfix"></div>
        <div id="flash">
          <?php echo $this->Session->flash(); ?>
        </div>
        
			<?php echo $this->fetch('content'); ?>
        <?php echo $this->element('bankForm'); ?>
			</div>
		</div>

		<div id="footer">
		
		</div>
	</div>

	<?php echo $this->element('sql_dump'); ?>
</body>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js
"></script>
 <link  href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
<script type="text/javascript">
  	$("#menu-toggle").click(function(e) {
  	    e.preventDefault();
  	    $("#wrapper").toggleClass("toggled");
        if ($("#wrapper").hasClass('toggled')) {
            $("#menu-toggle").removeClass('nag-margin-42');
        } else{
            $("#menu-toggle").addClass('nag-margin-42');
        }
  	});
    $("#mobile-menu-toggle").click(function(e) {
        e.preventDefault();
        $("#mobile-wrapper").toggleClass("toggled");
    });
	$(document).ready(function(){
		$("#flash").removeClass('hidden').show();
		setTimeout(function() {
	        $("#flash").addClass('hidden').hide();
	    }, 5000);
	});
	function deleteFunction(id , model){
		var confirmed = confirm('Do you really want to do this?');
		if(confirmed) {
		    $.ajax({
		        dataType: "JSON",
		        url: "<?php echo ABSOLUTE_URL ;?>/pages/delete/"+id+"/"+model,
		        type: "POST",
		        success: function(res) {
		            alert("success");
		            location.reload();
		        }
		    });
		}
	}
	function getConfirmed(){
		var confirmed = confirm('Do you really want to do this?');
		if (confirmed) {
			return true;
		} else {
			return false;
		}
	}
</script>
  <script type="text/javascript">
  $(document).ready(function () {
        ABSOLUTE_URL = "<?php echo ABSOLUTE_URL;?>";     
        $("#bkForm").bootstrapValidator({
            live: false,
            trigger: 'blur',
            fields: {
                "bankName": {
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: "Please enter your Bank name"
                        },
                        stringLength: {
                            enabled: true,
                            min: 1,
                            max: 40,
                            message: 'Please enter your Bank name'
                        }
                    }
                },
                "accountNumber": {
                    message: "Please enter your bank account number",
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: 'Please enter your bank account number',
                        },
                        callback: {
                            message: 'Please enter valid bank account number',
                            callback: function (value, validator, $field) {
                                
                                if (value === '') {
                                    return(true);
                                }
                                if(isNaN(value)){
                                    return(false);
                                 }else{
                                    return(true);
                                 }
                                return {
                                    valid: false,
                                    message: 'Please enter valid bank account number'
                                };
                            }
                        }
                    }
                },
                "actName": {
                    validators: {
                        notEmpty: {
                            enabled: true,
                            message: "Please enter your Bank account name"
                        },
                        stringLength: {
                            enabled: true,
                            min: 1,
                            max: 40,
                            message: 'Please enter your Bank account name'
                        }
                    }
                }
              }
            }).on('success.form.bv', function(e) {
                    
                    // Prevent form submission
                    e.preventDefault();
                    bankDetailSubmit();
                });
          });
      function bankDetailSubmit() {
        $.ajax({
            url:'<?php echo ABSOLUTE_URL;?>/users/saveBankDetails/',
            method:'post',
            data:  $('#bkForm').serialize(),
            success: function (data) {
                alert("Your request submitted successfully");
            },
            error: function (){
                alert('Something went wrong..');
            }
        });
        window.location.href = "<?php echo ABSOLUTE_URL;?>/pages/dashboard";
    }
    $(document).ready(function(){
    $("#flash").removeClass('hidden').show();
    setTimeout(function() {
          $("#flash").addClass('hidden').hide();
      }, 3000);
  });
  </script>
</html>

