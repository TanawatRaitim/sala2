<?php

header("Content-type: application/vnd.ms-word");

header("Content-Disposition: attachment; filename=sala_export.doc");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css_responsive'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_base'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_default'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('css'); ?>" rel="stylesheet">
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_widget'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_js'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('alertify_js'); ?>"></script>
    -->
    <title><?php echo $title; ?></title>
</head>
<body>
	

	<!-- <pre>
		<?php print_r($_POST);?>
	</pre>
	<pre>
		<?php print_r($result);?>
	</pre>
	<pre>
		<?php print_r($question);?>
	</pre> -->
	
<!-- <img width="100px" src="http://172.168.0.184/sala2/assets/images/history/2905_3887.jpg"> -->


			<!-- if not แนะนำเพื่อนใหม่			 -->
			<?php foreach ($result->result_array() as $rows): ?>
				
				<?php if($rows['image']):?>
				<img width="200px" style="width: 200px;" src="<?php echo $this->config->item('base_history_image').$rows['image']?>">	
				<?php else:?>
				<img width="200px" style="width: 200px;" src="<?php echo $this->config->item('base_assets_images').'no_img.png'?>">
				<?php endif;?>		
				
				<br />
				<strong>รหัสสมาชิก</strong> <?php echo $rows['member_code'];?>
				<br />
				<?php if($rows['alias'] == ""):?>
					<?php echo $rows['fname'];?> <?php echo $rows['lname'];?>
					<br />
					<?php echo $rows['nickname'];?>
					<br />  
				<?php else:?>
					<?php echo $rows['alias'];?> 
					<br />
				<?php endif;?>
				
				<strong><?php echo $question['q2'];?></strong> <?php echo $rows['q2'];?>
				<br />
				
				<strong><?php echo $question['q3'];?></strong> <?php echo $rows['q3'];?>
				<br />	
				
				
				<strong><?php echo $question['q4'];?></strong> <?php echo $rows['q4'];?>
				<br />	
				
				
				<strong><?php echo $question['q5'];?></strong> <?php echo $rows['q5'];?>
				<br />	
				
				
				<strong><?php echo $question['q6'];?></strong> <?php echo $rows['q6'];?>
				<br />	
				
				
				<strong><?php echo $question['q7'];?></strong> <?php echo $rows['q7'];?>
				<br />	
				
				
				<strong><?php echo $question['q8'];?></strong> <?php echo $rows['q8'];?>
				<br />	
				
				
				<strong><?php echo $question['q9'];?></strong> <?php echo $rows['q9'];?>
				<br />	
				
				<?php if($this->input->post('issue_export')==3):?>
					<!-- แนะนำเพื่อนใหม่ -->
					
				<strong><?php echo $question['q10'];?></strong> <?php echo $rows['q10'];?>
				<br />	
					
				<strong><?php echo $question['q11'];?></strong> <?php echo $rows['q11'];?>
				<br />	
					
				<strong><?php echo $question['q12'];?></strong> <?php echo $rows['q12'];?>
				<br />	
					
				<strong><?php echo $question['q13'];?></strong> <?php echo $rows['q13'];?>
				<br />	
					
				<strong><?php echo $question['q14'];?></strong> <?php echo $rows['q14'];?>
				<br />	
					
				<strong><?php echo $question['q15'];?></strong> <?php echo $rows['q15'];?>
				<br />	
					
				<strong><?php echo $question['q16'];?></strong> <?php echo $rows['q16'];?>
				<br />	
					
				<strong><?php echo $question['q17'];?></strong> <?php echo $rows['q17'];?>
				<br />	
					
				<strong><?php echo $question['q18'];?></strong> <?php echo $rows['q18'];?>
				<br />	
					
				<strong><?php echo $question['q18_1'];?></strong> <?php echo $rows['q18_1'];?>
				<br />	
					
				<strong><?php echo $question['q18_2'];?></strong> <?php echo $rows['q18_2'];?>
				<br />	
					
				<strong><?php echo $question['q19'];?></strong> <?php echo $rows['q19'];?>
				<br />	
				
				<?php endif;?>	
				
				<strong><?php echo $question['q20'];?></strong> <?php echo $rows['q20'];?>
				<br />
				
				<strong><?php echo $question['q21'];?></strong> <?php echo $rows['q21'];?>
				<br />
				
				<strong><?php echo $question['q22'];?></strong> <?php echo $rows['q22'];?>
				<br />
				
				<strong><?php echo $question['q23'];?></strong> <?php echo $rows['q23'];?>
				<br />
				<br />
				<br />
				<br />
				
				
				
			<?php endforeach ?>
			 
			

			
	
	
</body>
</html>