	<nav class="navigation-bar fixed-top shadow bg-cobalt">
		<div class="navigation-bar-content">
			<a href="<?php echo base_url();?>" class="element"><span class="icon-heart"></span> ทะเบียนสมาชืกศาลาบริการ <sup>2.0</sup></a>
			<span class="element-divider"></span>
			<a class="pull-menu" href="#"></a>
			<ul class="element-menu">
				<li>
					<a class="dropdown-toggle" href="#">CRUD Examples</a>
					<ul class="dropdown-menu dark" data-role="dropdown">
						<li>
							<a href='<?php echo site_url('main/customers_management')?>'>Customers</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/orders_management')?>'>Orders</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/products_management')?>'>Products</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/offices_management')?>'>Offices</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/employees_management')?>'>Employees</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/film_management')?>'>Films</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/film_management_twitter_bootstrap')?>'>Twitter Bootstrap Theme [BETA]</a>
						</li>
						<li>
							<a href='<?php echo site_url('main/multigrids')?>'>Multigrid [BETA]</a>
						</li>
						<!-- <li>
							<a href="#" class="dropdown-toggle">General CSS</a>
							<ul class="dropdown-menu dark" data-role="dropdown">
								<li>
									<a href="global.html">Global styles</a>
								</li>
								<li>
									<a href="grid.html">Grid system</a>
								</li>
								<div class="divider"></div>
								<li>
									<a href="typography.html">Typography</a>
								</li>
								<li>
									<a href="tables.html">Tables</a>
								</li>
								<li>
									<a href="forms.html">Forms</a>
								</li>
								<li>
									<a href="buttons.html">Buttons</a>
								</li>
								<li>
									<a href="images.html">Images</a>
								</li>
							</ul>
						</li> -->
						<li class="divider"></li>
						<li>
							<a href="responsive.html">Responsive</a>
						</li>
						<li class="disabled">
							<a href="layouts.html">Layouts and templates</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="icons.html">Icons</a>
						</li>
					</ul>
				</li>
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
						<!-- <li class="disabled">
							<a href="http://blog.metroui.net">Blog</a>
						</li>
						<li class="disabled">
							<a href="http://forum.metroui.net">Community Forum</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="https://github.com/olton/Metro-UI-CSS">Github</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="https://github.com/olton/Metro-UI-CSS/blob/master/LICENSE">License</a>
						</li> -->
					</ul>
				</li>
			</ul>

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
							<a href="#">Products</a>
						</li>
						<li>
							<a href="#">Download</a>
						</li>
						<li>
							<a href="#">Support</a>
						</li>
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

