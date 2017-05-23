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
		            
		        </ul>
		    </div>
            
    
		    <div class="pull-left"><a href="#menu-toggle" style="position: absolute;z-index: 999999;"  class="btn btn-default hidden-xs nag-margin-42" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span></a></div>
		    <div class="clearfix"></div>
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
	// $(document).ready(function(){
	// 	$("#flash").removeClass('hidden').show();
	// 	setTimeout(function() {
	//         $("#flash").addClass('hidden').hide();
	//     }, 5000);
	// });
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
  
     
</html>

