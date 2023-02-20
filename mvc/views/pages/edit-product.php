<?php include("./mvc/views/partials/theme.php"); ?>
<div class="container-fluid p-0">
	<div class="row m-0">

		<div id="side1" class="sidebar-1 closed p-2 bg2 scroll_hide">

			<div id="logo1" class="col-12 p-0">
				<div class="d-flex justify-content-center" style="width: 100%;height: 100px;">
					<div style="width: 65px; height:65px;margin-top:6px;">
						<img id="lgimg" src="../../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">

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
						<img src="../../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;">

					</div>
					<div class="link_name ml-1" style="height:100px;margin-top:30px;">
						<p class="khmer-font cl" style="font-size:140%">ខ្វិតសៀមរាប</p>
					</div>
				</div>
			</div>
			<div id="menu-box" class="row m-0">

				<div class="col-12 p-0">
					<div class="p-2" style="width: 100%;height: 55px;">
						<div class="float-left" style="width: 50px;height: 40px;">
							<img src="../../public/images/profile/<?php echo $_SESSION['profile'] ?>" width="40px" height="40px;" style="object-fit: cover;border-radius:100px;">
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
		<!-- side 2 -->
		<!-- side 2 -->
		<div class="sidebar-2 change p-0 bg1">

			<!--  -->
			<div class="head-content py-3 mx-3 bg1" style="border-bottom: 1px solid rgba(0,0,0,.125);">

				<div id="toggle-bar">
					<a class="toggle float-left btn mr-3 bgh ">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</div>

				<div class="float-left pt-1" style="height:45px">
					<p class="float-left font-weight-bold mb-0 header-text">
						Product / Edit~Product
					</p>
				</div>

				<div id="back-button" class="btn bgh float-right" title="Cancel">
					<span class="pos-text">
					</span>
					<i class="fa fa-arrow-right" aria-hidden="true"></i>
				</div>

				<div style="clear: both;"></div>

			</div>

			<div class="p-2" style="height: calc(100vh - 78px);overflow-y: auto;">

				<div class="py-2 px-4 bgh table-editproduct">
					<form action="../SetEditProduct" method="post" enctype='multipart/form-data' onsubmit="return OnSubmit()">
						<?php
						$selectType;
						$hideType;

						while ($row = mysqli_fetch_array($data["product"])) {
							if ($row["type"] == 1) {
								$selectType = "Food";
							} else if ($row["type"] == 2) {
								$selectType = "Drink";
							} else if ($row["type"] == 3) {
								$selectType = "Beer";
							} else if ($row["type"] == 4) {
								$selectType = "Hot Cafe";
							} else if ($row["type"] == 5) {
								$selectType = "Ice Cafe";
							} else if ($row["type"] == 6) {
								$selectType = "Frappe";
							} else if ($row["type"] == 7) {
								$selectType = "Khvet Signature";
							};


							if ($row["type"] == 1) {
								$hideType = "
								<option value='2'>Drink</option>
								<option value='3'>Beer</option>
								<option value='4'>Hot Cafe</option>
								<option value='5'>Ice Cafe</option>
								<option value='6'>Frappe</option>
								<option value='7'>Khvet Signature</option>	
								";
							} else if ($row["type"] == 2) {
								$hideType = "
								<option value='2'>Food</option>
								<option value='3'>Beer</option>
								<option value='4'>Hot Cafe</option>
								<option value='5'>Ice Cafe</option>
								<option value='6'>Frappe</option>
								<option value='7'>Khvet Signature</option>	
								";
							} else if ($row["type"] == 3) {
								$hideType = "
								<option value='2'>Food</option>
								<option value='3'>Drink</option>
								<option value='4'>Hot Cafe</option>
								<option value='5'>Ice Cafe</option>
								<option value='6'>Frappe</option>
								<option value='7'>Khvet Signature</option>	
								
								";
							} else if ($row["type"] == 4) {
								$hideType = "
								<option value='2'>Food</option>
								<option value='3'>Drink</option>
								<option value='4'>Beer</option>
								<option value='5'>Ice Cafe</option>
								<option value='6'>Frappe</option>
								<option value='7'>Khvet Signature</option>	
								
								";
							} else if ($row["type"] == 5) {
								$hideType = "
								<option value='2'>Food</option>
								<option value='3'>Drink</option>
								<option value='4'>Beer</option>
								<option value='5'>Hot Cafe</option>
								<option value='6'>Frappe</option>
								<option value='7'>Khvet Signature</option>	
								";
							} else if ($row["type"] == 6) {
								$hideType = "
								<option value='2'>Food</option>
								<option value='3'>Drink</option>
								<option value='4'>Beer</option>
								<option value='5'>Hot Cafe</option>
								<option value='6'>Ice Cafe</option>
								<option value='7'>Khvet Signature</option>	
								";
							} else if ($row["type"] == 7) {
								$hideType = "
								<option value='2'>Food</option>
								<option value='3'>Drink</option>
								<option value='4'>Beer</option>
								<option value='5'>Hot Cafe</option>
								<option value='6'>Ice Cafe</option>
								<option value='7'>Frappe</option>	
								";
							}


							echo '
							<input value="' . $row["id"] . '" name="idproduct" style="display:none">
							
							<p class="text-center font-weight-bold" style="font-size: 130%">Edit a New Product</p>

							<label>Name</label>
							<input id="ed-name" type="text" class="form-control khmer" value="' . $row["name"] . '" style="background: none;" name="name" >

							<label class="mt-2">Type</label>
							<select class="form-control" id="ed-type" style="background: none;" name="type" >
								<option value="' . $row["type"] . '">' . $selectType . '</option>
								' . $hideType . '
							</select>

							<label class="mt-2">Cost</label>
							<input id="ed-cost" type="number" class="form-control"  step=any style="background: none;" name="cost" value="' . $row["cost"] . '" >

							<label class="mt-2">Price</label>
							<input id="ed-price" type="number" class="form-control"  step=any style="background: none;" name="price" value="' . $row["price"] . '" >
						
							<label class="mt-2">Stock</label>
							<input id="ed-stock" type="number" class="form-control" style="background: none;" name="stock" value="' . $row["stock"] . '" >

							<label class="mt-2">Image</label><br>
							<input type="file" name="upload" accept="image/png, image/gif, image/jpeg">

							<div class="text-center mt-3 mb-3">
								<button type="submit" id="btnsubmit" class="btn btn-success">Edit Product</button>
							</div>';
						}
						?>

						<p id="edp-status" class="text-center text-danger"></p>

					</form>

				</div>

			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	function OnSubmit() {
		var edname = $('#ed-name').val();
		var edtype = $('#ed-type option:selected').text();
		var edcost = $('#ed-cost').val();
		var edprice = $('#ed-price').val();
		var edstock = $('#ed-stock').val();

		localStorage.setItem("local-ed-name", edname);
		localStorage.setItem("local-ed-type", edtype);
		localStorage.setItem("local-ed-cost", edcost);
		localStorage.setItem("local-ed-price", edprice);
		localStorage.setItem("local-ed-stock", edstock);

		if ($('input').val() != '') {
			return confirm("Are you sure ! ");
		}
	}

	$(document).ready(function() {
		$('head > title').text('KhvetSiemreap | EditProduct');

		var get_toggle = localStorage.getItem("tgl-bar");
		if (get_toggle == 72) {
			$('.sidebar-1').removeClass("closed");
			$('.sidebar-2').removeClass("change");
			$('.link_name').addClass('hide');
			$('#logo1').hide();
			$('#logo2').show();
		} else {
			$('.sidebar-1').addClass("closed");
			$('.sidebar-2').addClass("change");
			$('.link_name').removeClass('hide');
		}


		var status = localStorage.getItem('edp-check');
		$('#edp-status').text(status);

		$('#back-button').on('click', function() {
			window.location.href = "../../Product/ProductsManage";
		})
		$('#lgimg,#lgname').on('click', function() {
			window.location.href = "../../Home";
		})
	})
</script>