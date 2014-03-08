<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_css_responsive'); ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('css'); ?>" rel="stylesheet">
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_ui_widget'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('metro_js'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation'); ?>"></script>
    <script src="<?php echo $this->config->item('base_assets'); ?><?php echo $this->config->item('jquery_validation_additional'); ?>"></script>
    <title><?php echo $title; ?></title>
    <script>
			$.validator.addMethod(
			  "pid13",
			  function(value, element) {
			    if(value.length != 13) return false;
				for(i=0, sum=0; i < 12; i++)
				sum += parseFloat(value.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(value.charAt(12)))
				return false; return true;
				},
			  "Please enter a valid personal ID."
			);
    		
		$(function(){
			
			$('input, select').keydown( function (event) { //event==Keyevent
			    if(event.which == 13) {
			        var inputs = $(this).closest('form').find(':input:visible');
			        inputs.eq( inputs.index(this)+ 1 ).focus();
			        event.preventDefault(); //Disable standard Enterkey action
			    }
			    // event.preventDefault(); <- Disable all keys  action
			});
			// if is not work search on google PlusAs Tab****
					
			
			
			//var jqueryNC = jQuery.noConflict();
			
			 $("#dob").datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+0",
				dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        		monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
        		dateFormat: 'yy-mm-dd'
        		//find date format
        
				});
			
			
			
			$("#form_idcard").validate({
					errorPlacement: function(error, element){
					error.appendTo($("span#idcard_error"));
				},
				rules: {
					idcard:{
						required: true,
						pid13: true
					}
				},messages:{
					idcard:{
						required: 'กรุณากรอกข้อมูลให้ครบถ้วน',
						pid13: 'รหัสไม่ถูกต้อง     <br />ถ้ายืนยันจะใช้รหัสนี้ <button class="button" id="valid_pass">กด</button>'
					}
				}
			});
			

			$("body").on('click','#valid_pass',function(e){
				$("#idcard").rules('remove', 'pid13');
				// $("#form_idcard").submit();
			});
		});
		
	</script>
</head>
<body class="metro">
	<?php $this->load->view('template/navigation');?>
	
	
	<!-- Message from system -->
	
	<!-- Member info -->
	
	<!-- Member contact -->
	
	<!-- Member personalize -->
	
		
	<div class="container" style="margin-top: 70px;"><!-- div.container -->
		<h2><i class="icon-user fg-magenta"></i> เพิ่มข้อมูลใหม่ </h2>
		<?php print_r($_POST);?>
		<?php echo base_url();?>
		<br />
		<?php echo site_url('history/big');?>
		
		
		
		
		
		<?php if($is_member):?>
		<div class="grid">
			<div class="row">
				<div class="span12">
					<table>
						<tr>
							<td>รหัสบัตรประชาชน : </td>
							<td><?php echo $member_info[0]['idcard'];?></td>
						</tr>
						<tr>
							<td>รหัสสมาชิก : </td>
							<td><?php echo $member_info[0]['member_code'];?></td>
						</tr>
					</table>	
				</div>
			</div>
		</div><!-- div.grid -->
		
		
		<form action="<?php echo site_url('history/add');?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="member_idcard" value="<?php echo $member_info[0]['idcard'];?>" />
		<input type="hidden" name="member_code" value="<?php echo $member_info[0]['member_code'];?>" />
		<input type="hidden" name="member_id" value="<?php echo $member_info[0]['id'];?>" />
		<input type="hidden" name="ismember" value="yes" />
		<div class="grid">
			<div class="row">
				<div class="span12">
					<table class="table">
						<thead>
							<tr>
								<th colspan="8"><h4 class="button">ข้อมูลสมาชิก</h4></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-right">
									<select name="member_title" id="member_title" autofocus="">
										<?php echo title_dropdown($member_info[0]['title']);?>
									</select>
								</td>
								<td class="text-right text-bold">ชื่อ</td>
								<td><input type='text' name="member_fname" id="fname" value="<?php echo $member_info[0]['fname'];?>" /></td>
								<td class="text-right">นามสกุล</td>
								<td><input type='text' name="member_lname" id="lname" value="<?php echo $member_info[0]['lname'];?>" /></td>
								<td class="text-right">ชื่อเล่น</td>
								<td><input type='text' size="12" name="member_nickname" id="nickname" value="<?php echo $member_info[0]['nickname'];?>" /></td>
							</tr>
							<tr>
								<td class="table-label" colspan="2">วันเกิด</td>
								<td class="table-input"><input type='text' name="member_dob" id="dob" value="<?php echo $member_info[0]['dob'];?>" readonly="readonly" /></td>
								<td class="text-right">นามแฝง</td>
								<td><input type='text' name="history_alias" id="history_alias" value="<?php echo $history_info[0]['alias'];?>" /></td>
								<td class="text-right">รสนิยม</td>
								<td>
									<select name="history_sexual" id="history_sexual">
										<?php echo sexual_dropdown($history_info[0]['sexual_id']);?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="table-label">รูปภาพ</td>
								<td colspan="5" class="table-input"><input type="file" name="history_img" id="history_img" /></td>
							</tr>
							<tr>
								<td colspan="2" class="text-right">ข้อความที่ต้องการลง</td>
								<td colspan="5"><input type='text' name="history_info" id="history_info" value="<?php echo $history_info[0]['info'];?>" size="100" /></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- div.grid -->
		
		
		<div class="grid">
			<div class="row">
				<div class="span12">
					<table class="table">
						<thead>
							<tr>
								<th colspan="8"><h4 class="button">ที่อยู่ตามบัตรประชาชน</h4></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="table-label">ที่อยู่</td>
								<td class="table-input" colspan="3"><input type='text' size="60" name="member_address" id="member_address" value="<?php echo $member_info[0]['address'];?>" /></td>
								<td class="text-right">แขวง/ตำบล</td>
								<td><input type='text' size="15" name="member_sub_district" id="member_sub_district" value="<?php echo $member_info[0]['sub_district'];?>" /></td>
								<td class="text-right">เขต/อำเภอ</td>
								<td><input type='text' size="15" name="member_district" id="member_district" value="<?php echo $member_info[0]['district'];?>" /></td>
							</tr>
							<tr>
								
								<td class="table-label">จังหวัด</td>
								<td class="table-input">
									<select name="member_province" id="member_province">
										<?php echo province_dropdown($member_info[0]['province_id']);?>
									</select>
								</td>
								<td class="table-label">รหัสไปรษณีย์</td>
								<td class="table-input"><input type="text" size="10" name="member_postcode" id="member_postcode" value="<?php echo $member_info[0]['postcode'];?>" /></td>
								<td class="text-right">ประเทศ</td>
								<td>
									<select name="member_country" id="member_country">
										<?php echo countries_dropdown($member_info[0]['country_id']);?>
									</select>
								</td>
								<td class="table-label"></td>
								<td class="table-input"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- div.grid -->
		
		<div class="grid">
			<div class="row">
				<div class="span12">
					<table class="table">
						<thead>
							<tr>
								<th colspan="8"><h4 class="button bg-lightPink fg-gray">ที่อยู่ปัจจุบันที่ใช้ติดต่อได้จริง</h4></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="table-label">ที่อยู่</td>
								<td class="table-input" colspan="3"><input size="55" type="text" name="contact_address" id="contact_address" value="<?php echo $contact_info[0]['address'];?>" /></td>
								<td class="text-left">แขวง/ตำบล</td>
								<td><input type="text" size="15" name="contact_sub_district" id="contact_sub_district" value="<?php echo $contact_info[0]['sub_district'];?>" /></td>
								<td class="text-left">เขต/อำเภอ</td>
								<td><input type="text" size="15" name="contact_district" id="contact_district" value="<?php echo $contact_info[0]['district'];?>" /></td>
							</tr>
							<tr>
								<td class="table-label">จังหวัด</td>
								<td class="table-input">
									<select name="contact_province" id="contact_province">
										<?php echo province_dropdown($contact_info[0][province_id]);?>
									</select>
								</td>
								<td class="table-label">รหัสไปรษณีย์</td>
								<td class="table-input"><input type="text" size="10" name="contact_postcode" id="contact_postcode" value="<?php echo $contact_info[0]['postcode'];?>" /></td>
								<td class="text-right">ประเทศ</td>
								<td>
									<select name="contact_country" id="contact_country">
										<?php echo countries_dropdown($contact_info[0]['country_id']) ;?>
									</select>
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="table-label">โทรศัพท์บ้าน</td>
								<td class="table-input"><input type="text" size="15" name="contact_phone" id="contact_phone" value="<?php echo $contact_info[0]['phone'];?>" /></td>
								<td class="table-label">มือถือ</td>
								<td class="table-input"><input type="text" size="15" name="contact_mobile" id="contact_mobile" value="<?php echo $contact_info[0]['mobile'];?>" /></td>
								<td class="table-label">Email</td>
								<td class="table-input" colspan="3"><input type="text" size="40" name="contact_email" id="contact_email" value="<?php echo $contact_info[0]['email'];?>" /></td>
							</tr>
							<tr>
								<td class="table-label">MSN</td>
								<td class="table-input" colspan="3"><input type="text" size="40" name="contact_msn" id="contact_msn" value="<?php echo $contact_info[0]['msn'];?>" /></td>
								<td class="table-label">Yahoo</td>
								<td class="table-input" colspan="3"><input type="text" size="40" name="contact_yahoo" id="contact_yahoo" value="<?php echo $contact_info[0]['yahoo'];?>" /></td>
							</tr>
							<tr>
								<td class="table-label">QQ</td>
								<td class="table-input" colspan="3"><input type="text" size="40" name="contact_qq" id="contact_qq" value="<?php echo $contact_info[0]['qq'];?>" /></td>
								<td class="table-label">Facebook</td>
								<td class="table-input" colspan="3"><input type="text" size="40" name="contact_facebook" id="contact_facebook" value="<?php echo $contact_info[0]['facebook'];?>" /></td>
							</tr>
							<tr>
								<td class="table-label">อื่นๆ</td>
								<td class="table-input" colspan="7"><input type="text" size="40" name="contact_social_other" id="contact_social_other" value="<?php echo $contact_info[0]['social_other'];?>" /></td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- div.grid -->
		
		
		<div class="grid">
			<div class="row">
				<div class="span12">
					<table class="table">
						<thead>
							<tr>
								<th colspan="2"><h4 class="button">ประวัติผู้ใช้บริการ</h4></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="table-label">ระดับการศึกษา</td>
								<td class="table-input">
									<select name="history_education" id="history_education" style="width: 200px;">
										<?php echo education_dropdown($history_info[0]['education_id']);?>
									</select>
									<input type="text" size="50" placeholder="การศึกษาอื่นๆ" name="history_education_other" id="history_education_other" value="<?php echo $history_info[0]['education_other'];?>" />
								</td>
							</tr>
							<tr>	
								<td class="table-label">อาชีพ</td>
								<td class="table-input">
									<select name="history_career" id="history_career" style="width: 200px;">
										<?php echo career_dropdown($history_info[0]['career_id']);?>
									</select>
									<input type="text" size="50" placeholder="อาชีพอื่นๆ" name="history_career_other" id="history_career_other" value="<?php echo $history_info[0]['career_other'];?>" />
								</td>
							</tr>
							<tr>	
								<td class="table-label">รายได้</td>
								<td class="table-input">
									<select name="history_salary" id="history_salary" style="width: 200px;">
										<?php echo salary_dropdown($history_info[0]['salary_id']);?>
									</select>
									<input type="text" size="50" placeholder="รายได้อื่นๆ" name="history_salary_other" id="history_salary_other" value="<?php echo $history_info[0]['salary_other'];?>" />
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- div.grid -->
		
		
		<div class="grid">
			<div class="row">
				<div class="span12">
					<table class="table hovered">
						<thead>
							<tr>
								<th colspan="6"><h4 class="button">ประวัติส่วนตัว</h4></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>2</td>
								<td class="table-label" style="width: 200px;">สีที่ชอบ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q2" id="personalize_q2" value="<?php echo $personalize_info[0]['q2'];?>" /></td>
							</tr>
							<tr>
								<td>3</td>
								<td class="table-label">อาหารที่ชอบ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q3" id="personalize_q3" value="<?php echo $personalize_info[0]['q3'];?>" /></td>
							</tr>
							<tr>
								<td>4</td>
								<td class="table-label">ของสะสม</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q4" id="personalize_q4" value="<?php echo $personalize_info[0]['q4'];?>" /></td>
							</tr>
							<tr>
								<td>5</td>
								<td class="table-label">เพลง/นักร้องที่ชอบ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q5" id="personalize_q5" value="<?php echo $personalize_info[0]['q5'];?>" /></td>
							</tr>
							<tr>
								<td>6</td>
								<td class="table-label">สถานที่ท่องเที่ยวที่ชอบ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q6" id="personalize_q6" value="<?php echo $personalize_info[0]['q6'];?>" /></td>
							</tr>
							<tr>
								<td>7</td>
								<td class="table-label">หนังสือที่ชอบอ่าน</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q7" id="personalize_q7" value="<?php echo $personalize_info[0]['q7'];?>" /></td>
							</tr>
							<tr>
								<td>8</td>
								<td class="table-label">งานอดิเรก</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q8" id="personalize_q8" value="<?php echo $personalize_info[0]['q8'];?>" /></td>
							</tr>
							<tr>
								<td>9</td>
								<td class="table-label">ความสามารถพิเศษ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q9" id="personalize_q9" value="<?php echo $personalize_info[0]['q9'];?>" /></td>
							</tr>
							<tr>
								<td>10</td>
								<td class="table-label">ฮีโร่ในดวงใจ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q10" id="personalize_q10" value="<?php echo $personalize_info[0]['q10'];?>" /></td>
							</tr>
							<tr>
								<td>11</td>
								<td class="table-label">สิ่งที่เกลียดที่สุด</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q11" id="personalize_q11" value="<?php echo $personalize_info[0]['q11'];?>" /></td>
							</tr>
							<tr>
								<td>12</td>
								<td class="table-label">เรื่องดีๆที่เคยทำ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q12" id="personalize_q12" value="<?php echo $personalize_info[0]['q12'];?>" /></td>
							</tr>
							<tr>
								<td>13</td>
								<td class="table-label">เรื่องแย่ๆที่เคยทำ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q13" id="personalize_q13" value="<?php echo $personalize_info[0]['q13'];?>" /></td>
							</tr>
							<tr>
								<td>14</td>
								<td class="table-label">วิธีจัดการกับปัญหา</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q14" id="personalize_q14" value="<?php echo $personalize_info[0]['q14'];?>" /></td>
							</tr>
							<tr>
								<td>15</td>
								<td class="table-label">วิธีจัดการกับความเหงา</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q15" id="personalize_q15" value="<?php echo $personalize_info[0]['q15'];?>" /></td>
							</tr>
							<tr>
								<td>16</td>
								<td class="table-label">คำแนะนำที่ดีที่สุดที่เคยได้รับ</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q16" id="personalize_q16" value="<?php echo $personalize_info[0]['q16'];?>" /></td>
							</tr>
							<tr>
								<td>17</td>
								<td class="table-label">เพื่อนที่ "ใช่เลย" สำหรับคุณคือเพื่อน</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q17" id="personalize_q17" value="<?php echo $personalize_info[0]['q17'];?>" /></td>
							</tr>
							<tr>
								<td>18</td>
								<td class="table-label">คนรักที่ "ใช่เลย" ในความหมายเป็นคนแบบไหน</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q18" id="personalize_q18" value="<?php echo $personalize_info[0]['q18'];?>" /></td>
							</tr>
							<tr>
								<td>18.1</td>
								<td class="table-label">รูปร่างหน้าตา</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q18.1" id="personalize_q18.1" value="<?php echo $personalize_info[0]['q18_1'];?>" /></td>
							</tr>
							<tr>
								<td>18.2</td>
								<td class="table-label">นิสัย</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q18.2" id="personalize_q18.2" value="<?php echo $personalize_info[0]['q18_1'];?>" /></td>
							</tr>
							<tr>
								<td>19</td>
								<td class="table-label">วิธีบอกรัก</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q19" id="personalize_q19" value="<?php echo $personalize_info[0]['q19'];?>" /></td>
							</tr>
							<tr>
								<td>20</td>
								<td class="table-label">นิยามรัก</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q20" id="personalize_q20" value="<?php echo $personalize_info[0]['q20'];?>" /></td>
							</tr>
							<tr>
								<td>21</td>
								<td class="table-label">คำพูดติดปาก</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q21" id="personalize_q21" value="<?php echo $personalize_info[0]['q21'];?>" /></td>
							</tr>
							<tr>
								<td>22</td>
								<td class="table-label">คติประจำตัว</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q22" id="personalize_q22" value="<?php echo $personalize_info[0]['q22'];?>" /></td>
							</tr>
							<tr>
								<td>23</td>
								<td class="table-label"> 	เป้าหมายสูงสุดในชีวิต</td>
								<td class="table-input"><input type="text" size="80" name="personalize_q23" id="personalize_q23" value="<?php echo $personalize_info[0]['q23'];?>" /></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- div.grid -->
		
		<div class="grid">
			<div class="row">
				<div class="span12 text-center">
					<input type="submit" value="บันทึกข้อมูล" class="button bg-cobalt fg-white large" />
				</div>
			</div>
		</div>
	</form>
		
		<?php else:?>
			//not a member
		<?php endif;?>	
			

			
	</div> <!-- end div.container -->
</body>
</html>