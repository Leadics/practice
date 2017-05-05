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
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CoinIgy</title>

      <!-- Bootstrap -->
      <link href="<?php echo ABSOLUTE_URL;?>/Imperial/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
      <!-- Libraries CSS Files -->
      <link href="<?php echo ABSOLUTE_URL;?>/Imperial/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="<?php echo ABSOLUTE_URL;?>/Imperial/lib/animate-css/animate.min.css" rel="stylesheet">
      
      <!-- Main Stylesheet File -->
      <link href="<?php echo ABSOLUTE_URL;?>/Imperial/css/style.css" rel="stylesheet">
     <script src="<?php echo ABSOLUTE_URL;?>/js/jquery-2.1.1.min.js"></script> 
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js
"></script>
  <link  href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
      <!-- =======================================================
          Theme URL: https://www.coinigydex.com
          Author: Vikrant Agrawal
          Author URL: https://www.coinigydex.com
      ======================================================= -->
  </head>
  <style type="text/css">
    #header{
      height: 60px!important;
      padding: 0px 0!important;
      position: fixed;
      z-index: 50;
      width:100%;
      margin-bottom: 60px;
    }
    @media(max-width:500px) {
        /*#mobile-nav-toggle{
          margin-right: 20%;
        }*/
      } 
    
  </style>
<body>
  <div id="container">
    <div id="header" >
      <?php echo $this->element('header'); ?>
    </div>
    
    <div id="content">

      <?php echo $this->Session->flash(); ?>

      <?php echo $this->fetch('content'); ?>
    </div>
      <?php echo $this->element('footer'); ?>
  </div>
 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo ABSOLUTE_URL;?>/js/bootstrap.min.js"></script>
  <script src="<?php echo ABSOLUTE_URL;?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/js/jquery.isotope.min.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/Imperial/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo ABSOLUTE_URL;?>/Imperial/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo ABSOLUTE_URL;?>/Imperial/lib/morphext/morphext.min.js"></script>
  <script src="<?php echo ABSOLUTE_URL;?>/Imperial/lib/wow/wow.min.js"></script>
  <script src="<?php echo ABSOLUTE_URL;?>/Imperial/lib/stickyjs/sticky.js"></script>
  <script src="<?php echo ABSOLUTE_URL;?>/Imperial/lib/easing/easing.js"></script>
   <script src="<?php echo ABSOLUTE_URL;?>/Imperial/js/custom.js"></script>

  <?php echo $this->element('sql_dump'); ?>
</body>
</html>
<script type="text/javascript">
// $(dooment).ready(function(){
//   $(".navigation").hide();
// });
    $(window).on('scroll', function() {
        st = $(this).scrollTop();
        if(st > 100) {
            $(".navigation").hide();
        }
        else {
            $(".navigation").show();
        }
        lastScrollTop = st;
    });
</script>