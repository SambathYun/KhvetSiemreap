<?php include("./mvc/views/partials/theme.php"); ?>
<div class="container-fluid p-0">

	<div class="row m-0">
		<!-- side1 -->
		<div id="side1" class="sidebar-1 closed p-2 bg2 scroll_hide">

			<div id="logo1" class="col-12 p-0">
				<div class="d-flex justify-content-center" style="width: 100%;height: 100px;">
					<div style="width: 65px; height:65px;margin-top:6px;">
						<img id="lgimg" src="./public/images/logo/khvetsiemreap1.jpg" style="object-fit:cover;border-radius:5px;max-width: 100%;cursor:pointer;">
					</div>
					<div class="link_name ml-1" style="height:100px;margin-top:30px; position: relative;">
						<p id="lgname" class="khmer-font cl mb-0" style="font-size:140%;cursor:pointer;">ខ្វិត សៀមរាប</p>
						<span class="cl mb-0 eng_name">Khvet Siemreap</apan>
					</div>

				</div>
			</div>
			<div id="logo2" class="col-12 p-0 " style="display:none;">
				<div class="d-flex justify-content-center" style="width: 100%;height: 80px;">
					<div style="width: 50px; height:50px;margin-top:6px">
						<img id="lgimg" src="./public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">
					</div>
				</div>
			</div>

			<div id="menu-box" class="row m-0">

				<div class="col-12 p-0">
					<div class="p-2" style="width: 100%;height: 55px;">
						<div class="float-left" style="width: 50px;height: 40px;">
							<img src="./public/images/profile/<?php echo $_SESSION['profile'] ?>" width="40px" height="40px;" style="object-fit: cover;border-radius:100px;">
						</div>

						<div class="link_name float-left ">
							<p class="cl mb-0"><?php echo $_SESSION['namedisplay'] ?></p>
							<p class="cl mb-0" style="font-size: 80%;opacity: 0.7"><?php echo $_SESSION['role'] ?></p>
						</div>

					</div>
				</div>

				<?php
				if ($_SESSION['role'] == "Administrator" || $_SESSION['role'] == "Accountant") {
					include("./mvc/views/partials/home-menu-admin.php");
				} else {
					include("./mvc/views/partials/home-menu-staff.php");
				}
				?>
			</div>
		</div>
		<!-- side2 -->
		<div id="side2" class="sidebar-2 change p-0 bg1">
			<div class="head-content py-3 mx-3 bg1" style="height:80px;border-bottom: 1px solid rgba(0,0,0,.125);">


				<div id="toggle-bar">
					<a class="toggle float-left btn mr-3 bgh ">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</div>

				<div id="welcome-text" class="float-left" style="height:45px">
					<p class="mb-0 font-weight-bold">Welcome,&nbsp;&nbsp;<?php echo $_SESSION['namedisplay'] ?>
						<img src="https://images.emojiterra.com/google/noto-emoji/v2.034/128px/1f44b.png" width="25px" height="25px;" style="object-fit: cover;border-radius:100px;">
					</p>
					<p class="mb-0" style="font-size: 80%;color:#6c757d">Please choose your table for order!</p>
				</div>

			</div>


			<div id="table-box" class="table-wrapper p-2" style="height: calc(100vh - 80px);overflow-y: auto;">

			</div>
		</div>
		<!-- side 3 -->
		<div id="side3" class="sidebar-3 p-2 bg1">
			<div class="head-content py-3 mx-3 bg1" style="border-bottom: 1px solid rgba(0,0,0,.125);">


				<div id="search-box">
					<div id="box-search-product" class="search_container bgh">

						<div class="text-center" style="width: 45px;height: 45px;">
							<i class="fa fa-search " aria-hidden="true" style="color: #212529;line-height:45px;"></i>
						</div>

						<input id="search-input" type="" name="" placeholder="Search..." style="width:90%;background: none;border: 0;outline: none;">

					</div>
				</div>


				<div id="product-filter" class="product_container " style="height:45px;">

					<div class="menu-container">
						<div>
							<div class="arrow left" onclick="scrolll()">
								<i class="fa-solid fa-angle-left" style="font-size: 130%;"></i>
							</div>
						</div>
						<div id="menu-wrapper">
							<div id="menu-items">
								<ul class="nav">
									<li id="all-filter" class="item cursor"><span id="all-text">All</span></li>
									<li id="food-filter" class="item cursor"><span>Food</span></li>
									<li id="drink-filter" class="item cursor"><span>Soft Drink</span></li>
									<li id="beer-filter" class="item cursor"><span>Beer</span></li>
									<li id="hotcafe-filter" class="item cursor"><span>Hot Cafee</span></li>
									<li id="icecafe-filter" class="item cursor"><span>Ice Cafee</span></li>
									<li id="frappe-filter" class="item cursor"><span>Frappe</span></li>
									<li id="khvet-filter" class="item cursor"><span>Khvet Signature</span></li>

								</ul>
							</div>
						</div>
						<div>
							<div class="arrow right" onclick="scrollr()">
								<i class="fa-solid fa-angle-right" style="font-size: 130%;"></i>
							</div>
						</div>
					</div>
				</div>
				<div style="clear: both;"></div>

			</div>


			<div id="product-box">  </div>

		</div>

		<div id="side4" class="sidebar-4 p-2 bg2">
			<div class="d-flex justify-content-center" style="width:100%;height:80px;">
				<div style="width: 50px; height:50px;margin-top:6px">
					<img id="lgimg" src="./public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">
				</div>
				<div class="p-2" style="height:80px;margin-top:10px;">
					<p class="cl mt-1 font-weight-bold" style="font-size:130%">Table #<span id="table-order"></span></p>
				</div>
			</div>

			<div id="cart-box">
				<div class="cl m-1">
					<span class="float-left" aria-hidden="true">·&nbsp;</span>
					<span class="float-left " style="font-size: 80%" step="any">Current Order</span>
					<div style="clear: both;"></div>

				</div>


				<div id="cart-item" style="height: calc(100vh - 363px);width:100%;overflow-y:auto;">

				</div>

				<?php include("./mvc/views/partials/home-cart-checkout.php"); ?>
			</div>

		</div>
	</div>
</div>
<?php ?>