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
	    <link href="<?php echo ABSOLUTE_URL;?>/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo ABSOLUTE_URL;?>/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo ABSOLUTE_URL;?>/css/animate.css">
		<link href="<?php echo ABSOLUTE_URL;?>/css/prettyPhoto.css" rel="stylesheet">
		<link href="<?php echo ABSOLUTE_URL;?>/css/style.css" rel="stylesheet" />
	    <!-- =======================================================
	        Theme URL: https://www.coinigydex.com
	        Author: Vikrant Agrawal
	        Author URL: https://www.coinigydex.com
	    ======================================================= -->
	</head>
<body>
	<div id="container">
		<div id="header">
			<?php echo $this->element('header'); ?>
		</div>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
			<?php echo $this->element('footer'); ?>
	</div>
	<script src="<?php echo ABSOLUTE_URL;?>/js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo ABSOLUTE_URL;?>/js/bootstrap.min.js"></script>
	<script src="<?php echo ABSOLUTE_URL;?>/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo ABSOLUTE_URL;?>/js/jquery.isotope.min.js"></script>  
	<script src="<?php echo ABSOLUTE_URL;?>/js/wow.min.js"></script>
	<script src="<?php echo ABSOLUTE_URL;?>/js/functions.js"></script>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
