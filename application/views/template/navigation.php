	<nav class="navigation-bar fixed-top shadow bg-cobalt">
		<div class="navigation-bar-content">
			<a href="<?php echo base_url();?>" class="element"><span class="icon-heart"></span> ทะเบียนสมาชืกศาลาบริการ <sup>2.0</sup></a>
			<span class="element-divider"></span>
			<a class="pull-menu" href="#"></a>
			
			
			<?php if($this->session->userdata['identity']=='administrator'):?>
			
			<ul class="element-menu">
				<li>
					<a class="dropdown-toggle"  href="#">Admin Menus</a>
					<ul class="dropdown-menu dark" data-role="dropdown">
						<li>
							<a href='<?php echo site_url('main/provinces')?>'>Provinces</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/issues')?>'>Issues</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/pocketbooks')?>'>Pocket Books</a>
						</li>
					</ul>
				</li>
			</ul> <!-- end element-menu -->
			
			<?php endif;?>

			<div class="no-tablet-portrait">
				<span class="element-divider"></span>
				<a class="element brand" href="#"><span class="icon-spin"></span></a>
				<a class="element brand" href="#"><span class="icon-printer"></span></a>
				<span class="element-divider"></span>

				<div class="element input-element">
					<form>
						<div class="input-control text">
							<input type="text" placeholder="Search...">
							<button class="btn-search"></button>
						</div>
					</form>
				</div>

				<div class="element place-right">
					<a class="dropdown-toggle" href="#"> <span class="icon-cog"></span> </a>
					<ul class="dropdown-menu place-right dark" data-role="dropdown">
						<li>
							<a href="<?php echo base_url().'auth/change_password';?>">เปลี่ยนรหัสผ่าน</a>
						</li>
						<li>
							<a href="<?php echo base_url().'auth/logout';?>">ออกจากระบบ</a>
						</li>
					</ul>
				</div>
				<span class="element-divider place-right"></span>
				<button class="element image-button image-left place-right">
					<?php echo $this->session->userdata('username');?>
					<!-- <img src="images/me.jpg"/> -->
				</button>
			</div>
		</div>
	</nav>
<!-- end nav -->

