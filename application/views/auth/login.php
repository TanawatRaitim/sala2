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
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation'); ?>"></script>
    <script>
		$(function() {
			//something
			$("#form_login").validate({
				errorPlacement: function(error, element){
				//for hide the error message
				//error.append($("div#error_message"));
				//alert(error);
				//console.log(error);
				//alert(element);
				//error.each(function(index, value)){
					//console.log(value);
				//}
				$('#error_message').text('กรุณากรอกชื่อผู้ใช้และรหัสผ่านให้ครบถ้วน');
				//alert(label.Error);
				//error.appendTo(element.next().next("span"));	
				},
    			rules:{
					identity:{
						required: true
					},
					password:{
						required: true
					}
				},//end rules
				messages:{
					identity:{
						required: "กรุณากรอก Username"
					},
					password:{
						required: "กรุณากรอก Password"
					}
				}//end messages	
    		});//end validate
		}); //end ready
	</script>
	<style>
		.box-login{
			/*background: red;*/
			width: 500px;
			padding: 30px 50px;
			margin:100px auto;
		}
		label.error,#infoMessage, #error_message{
			/*color: red;	*/
		}

	</style>
    <title><?php echo $title; ?></title>
    
</head>
<body class="metro">
	<div class="container">
		<div class="box-login shadow bg-lightBlue">
		<!-- <h1><?php echo lang('login_heading');?></h1> -->
		<h2 class="fg-darkBlue">ทะเบียนสมาชิกศาลาบริการ</h2>
		<br />
		<!-- <p><?php echo lang('login_subheading');?></p> -->
		<!-- <p class="subheader">กรุณากรอกชื่อและรหัสผ่านสำหรับเข้าระบบ</p> -->

		
		<?php echo form_open("auth/login",array('id'=>'form_login','name'=>'form_login'));?>
		<label>ชื่อผู้ใช้</label>
		 <div class="input-control text" data-role="input-control">
            <input type="text" name="identity" id="identity" placeholder="Username" autofocus autocomplete>
            <button class="btn-clear" tabindex="-1"></button>
        </div>
        <label>รหัสผ่าน</label>
        <div class="input-control password" data-role="input-control">
            <input type="password" placeholder="Password" name="password" id="password">
            <button class="btn-reveal" tabindex="-1"></button>
        </div>
		
		  <!-- <p>
		    <?php echo lang('login_identity_label', 'identity');?>
		    <?php echo form_input($identity);?>
		  </p>
		
		  <p>
		    <?php echo lang('login_password_label', 'password');?>
		    <?php echo form_input($password);?>
		  </p> -->
		
		  <!-- <p>
		    <?php echo lang('login_remember_label', 'remember');?>
		    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
		  </p> -->
		  <div class="input-control checkbox">
		  	<label>
		  		<input type="checkbox" name="remember" id="remember" />
		  		<span class="check"></span>
		  		Remember me:
		  	</label>
		  </div>
		  <div class="input-control">
		  	<input type="submit" name="submit" value="login" class="default large" />	
		  </div>
			
		
		  <!-- <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p> -->
		
		<?php echo form_close();?>
		
		
		<!-- <p><a href="forgot_password" style="color: white;"><?php echo lang('login_forgot_password');?></a></p> -->
		<div id="error_message"></div>
		<div id="infoMessage">
				<?php echo $message;?>
		</div>
	
		</div>
	</div>
</body>
</html>