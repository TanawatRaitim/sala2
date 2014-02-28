<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
	<link type="text/css" rel="stylesheet" href="http://172.168.0.184/sala2/assets/metro_ui/css/metro-bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="http://172.168.0.184/sala2/assets/metro_ui/css/metro-bootstrap-responsive.css" />
	<link type="text/css" rel="stylesheet" href="http://172.168.0.184/sala2/assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css" />
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
	<script src="http://172.168.0.184/sala2/assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="http://172.168.0.184/sala2/assets/metro_ui/min/metro.min.js"></script>
	
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}

.flexigrid div.form-div input[type="text"], .flexigrid div.form-div input[type="password"] {
    background: none repeat scroll 0 0 #FAFAFA;
    border: 1px solid #AAAAAA;
    font-size: 15px;
    height: auto;
    padding: 5px;
    width: 500px;
}
a.chzn-single{
	height: 50px;
	padding: 5px;
}
</style>
</head>
<body class="metro">
	
	<!-- <div>
		<a href='<?php echo site_url('examples/customers_management')?>'>Customers</a> |
		<a href='<?php echo site_url('examples/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('examples/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('examples/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('examples/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('examples/film_management')?>'>Films</a> | 
		<a href='<?php echo site_url('examples/film_management_twitter_bootstrap')?>'>Twitter Bootstrap Theme [BETA]</a> | 
		<a href='<?php echo site_url('examples/multigrids')?>'>Multigrid [BETA]</a>
		
	</div> -->
	<div style='height:20px;'></div>  
    <div class="container" style="margin-top: 50px;">
    	<?php $this->load->view('template/navigation');?>
		<?php echo $output; ?>
		   <div class="input-control text" data-role="datepicker" data-format="dd/mm/yyyy">
    <input type="text">
    <button class="btn-date"></button>
    </div>
    </div>
</body>
</html>
