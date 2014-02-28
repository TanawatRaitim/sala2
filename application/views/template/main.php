<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css_responsive'); ?>" rel="stylesheet">
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_widget'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_js'); ?>"></script>
    <title><?php echo $title; ?></title>
    <script>
		$(function() {
			//something
			var element = document.getElementById('test');
		}); 
</script>
	<style>
		.test{
			background-color: red;
			
			/*
			 * 
			 * css comment
			 * 
			 */
		}
	</style>
</head>
<body class="metro">
	<?php $this->load->view('template/navigation');?>	
	<div class="container" style="margin-top: 50px;"><!-- div.container -->
	
	</div> <!-- end div.container -->
</body>
</html>