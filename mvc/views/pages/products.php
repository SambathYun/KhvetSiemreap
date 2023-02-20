<?php include("./mvc/views/partials/theme.php"); ?>

<div class="container-fluid p-0">
	<div class="row m-0">
		<!-- side1 -->
		<div id="side1" class="sidebar-1 closed p-2 bg2 scroll_hide">

			<div id="logo1" class="col-12 p-0">
				<div class="d-flex justify-content-center" style="width: 100%;height: 100px;">
					<div style="width: 65px; height:65px;margin-top:6px;">
						<img id="lgimg" src="../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">
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
						<img id="lgimg" src="../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">
					</div>
					<div class="link_name ml-1" style="height:100px;margin-top:30px;">
						<p class="khmer-font cl" style="font-size:140%">ខ្វិត សៀមរាប</p>
					</div>
				</div>
			</div>

			<div id="menu-box" class="row m-0">

				<div class="col-12 p-0">
					<div class="p-2" style="width: 100%;height: 55px;">
						<div class="float-left" style="width: 50px;height: 40px;">
							<img src="../public/images/profile/<?php echo $_SESSION['profile'] ?>" width="40px" height="40px;" style="object-fit: cover;border-radius:100px;">
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
					$hidebyrole = '';
					$tblwidth = 900;
					$prowrap = 132;
					$p2 = 'px-2 pb-2';
				} else {
					include("./mvc/views/partials/home-menu-staff.php");
					$hidebyrole = 'none';
					$tblwidth = 600;
					$prowrap = 78;
					$p2 = 'p-2';
				}
				?>
			</div>
		</div>

		<!-- side2 -->
		<div class="sidebar-2 change p-0 bg1">

			<!--  -->
			<div class="head-content py-3 mx-3 bg1" style="border-bottom: 1px solid rgba(0,0,0,.125);">

				<div id="toggle-bar">
					<a class="toggle float-left btn mr-3 bgh ">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</div>

				<div class="float-left pt-1" style="height:45px" title="Back to Home">
					<p class="float-left font-weight-bold mb-0 header-text">
						Products~Manage
					</p>
				</div>

				<div id="pos-button" class="btn bgh float-right">
					<span class="pos-text">
						POS
					</span>
				</div>
				<div style="clear: both;"></div>

			</div>


			<!--  -->

			<a href="../Product/GetAddProduct" style="color: black;text-decoration: none;display:<?php echo $hidebyrole ?>">
				<div class="text-center p-2">
					<div class="btn btn-primary btn-all"><i class="fa-solid fa-plus mr-1"></i>Add Product</div>
				</div>
			</a>

			<!--  -->
			<div class="<?php echo $p2 ?>" style="height: calc(100vh - <?php echo $prowrap ?>px);overflow-y: auto;">

				<div id="loading-products"></div>
				<div class="table-products" style="display: none;">
					<table class="table table-striped table-hover bgh mb-1 " style="width:<?php echo $tblwidth ?>px;margin:0 auto">
						<thead>
							<tr>
								<th scope="col" style="width:10%;">Image</th>
								<th scope="col" style="width:30%;">Name</th>
								<th scope="col" style="width:5%;">Type</th>
								<th scope="col" style="width:10%;display:<?php echo $hidebyrole ?>">Cost</th>
								<th scope="col" style="width:10%;">Price</th>
								<th scope="col" style="width:5%;">Discount</th>
								<th scope="col" style="width:5%;">Stock</th>
								<th scope="col" style="width:25%;display:<?php echo $hidebyrole ?>">Action</th>
							</tr>
						</thead>
						<!-- TYPE 1 -->
						<thead>
							<tr style="font-size: 110%;">
								<th scope="col" class="pl-3 cl1"> Food</th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
							</tr>
						</thead>

						<tbody id="product-type1-box">
							<!-- json  -->
						</tbody>

						<!-- TYPE 2 -->
						<thead title="Drink Category">
							<tr style="font-size: 110%;">
								<th scope="col" class="pl-3 cl2"> Drink </th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>

							</tr>

						</thead>

						<tbody id="product-type2-box">
							<!-- json  -->
						</tbody>

						<!-- TYPE 3 -->
						<thead title="Beer Category">
							<tr style="font-size: 110%;">
								<th scope="col" class="pl-3 cl3">
									Beer
								</th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>

							</tr>

						</thead>

						<tbody id="product-type3-box">
							<!-- json  -->
						</tbody>

						<!-- TYPE 4 -->
						<thead title="Hot Cafe Category">
							<tr style="font-size: 110%;">
								<th scope="col" class="pl-3 cl4">
									Hot Cafe
								</th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
							</tr>

						</thead>

						<tbody id="product-type4-box">
							<!-- json  -->
						</tbody>
						<!-- TYPE 5 -->
						<thead title="Ice Cafe Category">
							<tr style="font-size: 110%;">
								<th scope="col" class="pl-3 cl5">
									Ice Cafe
								</th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
							</tr>

						</thead>

						<tbody id="product-type5-box">
							<!-- json  -->
						</tbody>

						<!-- TYPE 6 -->
						<thead title="Frappe Category">
							<tr style="font-size: 110%;">
								<th scope="col" class="pl-3 cl6">
									Frappe
								</th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
							</tr>

						</thead>

						<tbody id="product-type6-box">
							<!-- json  -->
						</tbody>

						<!-- TYPE 7 -->
						<thead title="Khvet Signature Category">
							<tr style="font-size: 110%;">
								<th scope="col" class="pl-3 cl7">Khvet Singature</th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col" style="display:<?php echo $hidebyrole ?>"></th>
							</tr>

						</thead>

						<tbody id="product-type7-box">
							<!-- json  -->
						</tbody>

					</table>
				</div>

				<div id="modalDialog" class="modal">
					<div class="modal-content animate-top">

						<!-- form fee -->

						<form id="form-discount" action="../Product/EditProductDiscount" method="post" onsubmit="return confirm(' Do you really want to Edit Discount ?')">

							<div class="modal-header">
								<h5 class="modal-title">...</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
								</button>
							</div>
							<div class="modal-body">

								<div style="display: flex;">
									<input id="id-discount" type="" name="idDiscount" style="display: none;">
									<div class="px-2" style="width: 50%">
										<label>Name</label><br>
										<input id="name-discount" type="" class="form-control khmer" name="nameDiscount" disabled>
									</div>
									<div class="px-2" style="width: 50%">
										<label>Percent</label><br>
										<input id="dis-discount" type="number" class="form-control" name="disDiscount" required>
									</div>

								</div>
								<!-- </form> -->
							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-primary modal-btn">Edit Discount</button>
							</div>

						</form>

						<!-- form discount -->
						<form id="form-stock" action="../Product/EditProductStock" method="post" style="display: none;" onsubmit="return confirm('Do you really want to Add Stock ?')">
							<div class="modal-header">
								<h5 class="modal-title">...</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
								</button>
							</div>
							<div class="modal-body">

								<div style="display: flex;">
									<input id="id-stock" type="" name="idStock" style="display: none;">
									<div class="px-2" style="width: 50%">
										<label>Name</label><br>
										<input id="name-stock" type="" class="form-control khmer" name="nameStock" disabled>
									</div>
									<div class="px-2" style="width: 50%">
										<label>Quantity</label><br>
										<input id="qty-stock" type="number" class="form-control" name="qtyStock" required>
									</div>

								</div>

							</div>

							<div class="modal-footer">
								<button type="submit" class="btn btn-primary modal-btn">Add Stock</button>
							</div>

						</form>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	$('body').bind('click', function(e) {
		if ($(e.target).hasClass("modal")) {
			$('#modalDialog').hide();
		}
	});


	$(document).ready(function() {

		// When the user clicks on  (x), close the modal
		$(".close").on('click', function() {
			$('#modalDialog').hide();
		});

	});

	function getProductItem() {

		document.getElementById("product-type1-box").innerHTML = '';
		document.getElementById("product-type2-box").innerHTML = '';
		document.getElementById("product-type3-box").innerHTML = '';
		document.getElementById("product-type4-box").innerHTML = '';
		document.getElementById("product-type5-box").innerHTML = '';
		document.getElementById("product-type6-box").innerHTML = '';
		document.getElementById("product-type7-box").innerHTML = '';

		$.ajax({
			url: "../Product/GetProductItem",
			type: 'get',
			dataType: 'json',
			cache: false,
			beforeSend: function(data) {
				var data =
					`<div id="loading" style=" display: flex;align-items: center;justify-content: center;">
							<div style="width: 150px;height: 150px;">
								<img src="../public/images/icons/loading.gif" style="max-width: 100%;border-radius:100px">
							</div>

						</div>
						`
				$('#loading-products').html(data);
			},
			complete: function() {
				$('#loading').hide();
				$('.table-products').show();
			},
			success: function(data) {

				$.each(data, function(key, item) {

					$jshiderole = "<?php echo $hidebyrole ?> ";

					if (item.type == 1) {
						$type = "Food";
					} else if (item.type == 2) {
						$type = "Drink";
					} else if (item.type == 3) {
						$type = "Beer";
					} else if (item.type == 4) {
						$type = "Hot Cafe";
					} else if (item.type == 5) {
						$type = "Ice Cafe";
					} else if (item.type == 6) {
						$type = "Frappe";
					} else if (item.type == 7) {
						$type = "Khvet Singature";
					}

					if (item.stock == 0) {
						$stockcl = "text-danger";
					} else if (item.stock <= 5) {
						$stockcl = "text-warning";
					} else if (item.stock > 5) {
						$stockcl = "text-primary";
					}

					if (item.type == 1) {
						var data = `
					<tr >
						<th ><img src="../public/images/product/` + item.image + `" width="80px" height="50px;" style="object-fit: cover;border-radius:5px"> </th>
						<td class="khmer"style="vertical-align:middle;">` + item.name + `</td>
						<td class="khmer"style="vertical-align:middle;">` + $type + `</td>

						<td class="khmer"style="vertical-align:middle;display:` + $jshiderole + `">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_cost + `
						</td>

						<td class="khmer"style="vertical-align:middle;">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_price + `
						</td>

						<td class="khmer"style="vertical-align:middle;cursor:pointer;" onclick="ChangeProductDiscount('` + item.id + `','` + item.name + `','` + item.discount + `')">%` + item.discount + `</td>
						<td class="khmer ` + $stockcl + ` "style="vertical-align: middle;cursor:pointer;font-weight:bold;" onclick="ChangeProductStock('` + item.id + `','` + item.name + `','` + item.stock + `')">` + item.stock + `</td>
						<td style="vertical-align: middle;">
							<a href="../Product/GetEditProduct/` + item.id + `" style="text-decoration: none;color:black;display:` + $jshiderole + `">
								<div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
								<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
								<span class="text-croud"> Edit </span>
								</div>
							</a>

							<a style="text-decoration: none;color:black;display:` + $jshiderole + `" onclick="DeleteProduct('` + item.id + `','` + item.name + `')">
								<div class="btn btn-danger btn-croud" style="font-size: 90%">
									<i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
									<span class="text-croud" > Delete </span>
								</div>
							</a>
						</td>
					</tr>`
						$('#product-type1-box').append(data);
					} else if (item.type == 2) {
						var data = `
					<tr >
						<th><img src="../public/images/product/` + item.image + `" width="80px" height="50px;" style="object-fit: cover;border-radius:5px"> </th>
						<td class="khmer"style="width: 300px;vertical-align: middle;">` + item.name + `</td>
						<td class="khmer"style="vertical-align: middle;">` + $type + `</td>

						<td class="khmer"style=" vertical-align: middle;display:` + $jshiderole + `">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_cost + `
						</td>

						<td class="khmer"style=" vertical-align: middle;">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_price + `
						</td>

						<td class="khmer"style=" vertical-align: middle;cursor:pointer;" onclick="ChangeProductDiscount('` + item.id + `','` + item.name + `','` + item.discount + `')">%` + item.discount + `</td>
						<td class="khmer ` + $stockcl + ` "style="vertical-align: middle;cursor:pointer;font-weight:bold;" onclick="ChangeProductStock('` + item.id + `','` + item.name + `','` + item.stock + `')">` + item.stock + `</td>
						<td style=" vertical-align: middle;">
							<a href="../Product/GetEditProduct/` + item.id + `" style="text-decoration: none;color:black;display:` + $jshiderole + `">
								<div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
								<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
								<span class="text-croud"> Edit </span>
								</div>
							</a>

							<a style="text-decoration: none;color:black;display:` + $jshiderole + `" onclick="DeleteProduct('` + item.id + `','` + item.name + `')">
								<div class="btn btn-danger btn-croud" style="font-size: 90%">
									<i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
									<span class="text-croud" > Delete </span>
								</div>
							</a>
						</td>
					</tr>`
						$('#product-type2-box').append(data);

					} else if (item.type == 3) {
						var data = `
					<tr >
					<th ><img src="../public/images/product/` + item.image + `" width="80px" height="50px;" style="object-fit: cover;border-radius:5px"> </th>
						<td class="khmer"style="width: 300px;vertical-align: middle;">` + item.name + `</td>
						<td class="khmer"style="vertical-align: middle;">` + $type + `</td>

						<td class="khmer"style=" vertical-align: middle;display:` + $jshiderole + `">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_cost + `
						</td>

						<td class="khmer"style=" vertical-align: middle;">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_price + `
						</td>

						<td class="khmer"style=" vertical-align: middle;cursor:pointer;" onclick="ChangeProductDiscount('` + item.id + `','` + item.name + `','` + item.discount + `')">%` + item.discount + `</td>
						<td class="khmer ` + $stockcl + ` "style="vertical-align: middle;cursor:pointer;font-weight:bold;" onclick="ChangeProductStock('` + item.id + `','` + item.name + `','` + item.stock + `')">` + item.stock + `</td>
						<td style=" vertical-align: middle;">
							<a href="../Product/GetEditProduct/` + item.id + `" style="text-decoration: none;color:black;display:` + $jshiderole + `">
								<div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
								<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
								<span class="text-croud"> Edit </span>
								</div>
							</a>

							<a style="text-decoration: none;color:black;display:` + $jshiderole + `" onclick="DeleteProduct('` + item.id + `','` + item.name + `')">
								<div class="btn btn-danger btn-croud" style="font-size: 90%">
									<i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
									<span class="text-croud" > Delete </span>
								</div>
							</a>
						</td>
					</tr>`
						$('#product-type3-box').append(data);

					} else if (item.type == 4) {
						var data = `
					<tr >
					<th ><img src="../public/images/product/` + item.image + `" width="80px" height="50px;" style="object-fit: cover;border-radius:5px"> </th>
						<td class="khmer"style="width: 300px;vertical-align: middle;">` + item.name + `</td>
						<td class="khmer"style="vertical-align: middle;">` + $type + `</td>

						<td class="khmer"style=" vertical-align: middle;display:` + $jshiderole + `">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_cost + `
						</td>

						<td class="khmer"style=" vertical-align: middle;">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_price + `
						</td>

						<td class="khmer"style=" vertical-align: middle;cursor:pointer;" onclick="ChangeProductDiscount('` + item.id + `','` + item.name + `','` + item.discount + `')">%` + item.discount + `</td>
						<td class="khmer ` + $stockcl + ` "style="vertical-align: middle;cursor:pointer;font-weight:bold;" onclick="ChangeProductStock('` + item.id + `','` + item.name + `','` + item.stock + `')">` + item.stock + `</td>
						<td style=" vertical-align: middle;">
							<a href="../Product/GetEditProduct/` + item.id + `" style="text-decoration: none;color:black;display:` + $jshiderole + `">
								<div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
								<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
								<span class="text-croud"> Edit </span>
								</div>
							</a>

							<a style="text-decoration: none;color:black;display:` + $jshiderole + `" onclick="DeleteProduct('` + item.id + `','` + item.name + `')">
								<div class="btn btn-danger btn-croud" style="font-size: 90%">
									<i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
									<span class="text-croud" > Delete </span>
								</div>
							</a>
						</td>
					</tr>`
						$('#product-type4-box').append(data);

					} else if (item.type == 5) {
						var data = `
					<tr >
					<th ><img src="../public/images/product/` + item.image + `" width="80px" height="50px;" style="object-fit: cover;border-radius:5px"> </th>
						<td class="khmer"style="width: 300px;vertical-align: middle;">` + item.name + `</td>
						<td class="khmer"style="vertical-align: middle;">` + $type + `</td>

						<td class="khmer"style=" vertical-align: middle;display:` + $jshiderole + `">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_cost + `
						</td>

						<td class="khmer"style=" vertical-align: middle;">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_price + `
						</td>

						<td class="khmer"style=" vertical-align: middle;cursor:pointer;" onclick="ChangeProductDiscount('` + item.id + `','` + item.name + `','` + item.discount + `')">%` + item.discount + `</td>
						<td class="khmer ` + $stockcl + ` "style="vertical-align: middle;cursor:pointer;font-weight:bold;" onclick="ChangeProductStock('` + item.id + `','` + item.name + `','` + item.stock + `')">` + item.stock + `</td>
						<td style=" vertical-align: middle;">
							<a href="../Product/GetEditProduct/` + item.id + `" style="text-decoration: none;color:black;display:` + $jshiderole + `">
								<div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
								<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
								<span class="text-croud"> Edit </span>
								</div>
							</a>

							<a style="text-decoration: none;color:black;display:` + $jshiderole + `" onclick="DeleteProduct('` + item.id + `','` + item.name + `')">
								<div class="btn btn-danger btn-croud" style="font-size: 90%">
									<i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
									<span class="text-croud" > Delete </span>
								</div>
							</a>
						</td>
					</tr>`
						$('#product-type5-box').append(data);

					} else if (item.type == 6) {
						var data = `
					<tr >
					<th ><img src="../public/images/product/` + item.image + `" width="80px" height="50px;" style="object-fit: cover;border-radius:5px"> </th>
						<td class="khmer"style="width: 300px;vertical-align: middle;">` + item.name + `</td>
						<td class="khmer"style="vertical-align: middle;">` + $type + `</td>

						<td class="khmer"style=" vertical-align: middle;display:` + $jshiderole + `">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_cost + `
						</td>

						<td class="khmer"style=" vertical-align: middle;">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_price + `
						</td>

						<td class="khmer"style=" vertical-align: middle;cursor:pointer;" onclick="ChangeProductDiscount('` + item.id + `','` + item.name + `','` + item.discount + `')">%` + item.discount + `</td>
						<td class="khmer ` + $stockcl + ` "style="vertical-align: middle;cursor:pointer;font-weight:bold;" onclick="ChangeProductStock('` + item.id + `','` + item.name + `','` + item.stock + `')">` + item.stock + `</td>
						<td style=" vertical-align: middle;">
							<a href="../Product/GetEditProduct/` + item.id + `" style="text-decoration: none;color:black;display:` + $jshiderole + `">
								<div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
								<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
								<span class="text-croud"> Edit </span>
								</div>
							</a>

							<a style="text-decoration: none;color:black;display:` + $jshiderole + `" onclick="DeleteProduct('` + item.id + `','` + item.name + `')">
								<div class="btn btn-danger btn-croud" style="font-size: 90%">
									<i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
									<span class="text-croud" > Delete </span>
								</div>
							</a>
						</td>
					</tr>`
						$('#product-type6-box').append(data);

					} else if (item.type == 7) {
						var data = `
					<tr >
					<th ><img src="../public/images/product/` + item.image + `" width="80px" height="50px;" style="object-fit: cover;border-radius:5px"> </th>
						<td class="khmer"style="width: 300px;vertical-align: middle;">` + item.name + `</td>
						<td class="khmer"style="vertical-align: middle;">` + $type + `</td>

						<td class="khmer"style=" vertical-align: middle;display:` + $jshiderole + `">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_cost + `
						</td>

						<td class="khmer"style=" vertical-align: middle;">
							<i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.new_price + `
						</td>

						<td class="khmer"style=" vertical-align: middle;cursor:pointer;" onclick="ChangeProductDiscount('` + item.id + `','` + item.name + `','` + item.discount + `')">%` + item.discount + `</td>
						<td class="khmer ` + $stockcl + ` "style="vertical-align: middle;cursor:pointer;font-weight:bold;" onclick="ChangeProductStock('` + item.id + `','` + item.name + `','` + item.stock + `')">` + item.stock + `</td>
						<td style=" vertical-align: middle;">
							<a href="../Product/GetEditProduct/` + item.id + `" style="text-decoration: none;color:black;display:` + $jshiderole + `">
								<div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
								<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
								<span class="text-croud"> Edit </span>
								</div>
							</a>

							<a style="text-decoration: none;color:black;display:` + $jshiderole + `" onclick="DeleteProduct('` + item.id + `','` + item.name + `')">
								<div class="btn btn-danger btn-croud" style="font-size: 90%">
									<i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
									<span class="text-croud" > Delete </span>
								</div>
							</a>
						</td>
					</tr>`
						$('#product-type7-box').append(data);

					}


				})
			}
		});
	}


	function ChangeProductDiscount(id, name, discount) {
		$('#modalDialog').show();
		$(".modal-title").text("Edit a New Discount");
		$("#form-discount").show();
		$("#form-stock").hide();

		$("#id-discount").val(id);
		$("#name-discount").val(name);
		$("#dis-discount").val(discount);
	}

	function ChangeProductStock(id, name) {
		$('#modalDialog').show();
		$(".modal-title").text("Add More Stock");
		$("#form-stock").show();
		$("#form-discount").hide();

		$("#id-stock").val(id);
		$("#name-stock").val(name);
	}

	function CheckTable2() {
		var id = JSON.parse(localStorage.getItem('idTable'));
		$.ajax({
			url: '../Table/CheckTable/' + id,
			type: 'get',
			dataType: 'json',
			success: function(data) {
				console.log(data);
			}
		});
	}


	function getTable2() {
		$("#table-box").html('');
		$.ajax({
			url: '../Table/GetTable',
			type: 'get',
			dataType: 'json',
			success: function(data) {
				var table_color;
				var type_table;
				$.each(data, function(key, item) {
					if (item.status == 1) {
						table_color = 'dot-success';
					} else {
						table_color = 'dot-danger';
					}
					if (item.type == 1) {
						type_table = '100';
					} else if (item.type == 2) {
						type_table = '200';
					}
					var data = `
				<div class="p-1 float-left" onclick="GetTable(` + item.id + `,` + item.number + `)">
					<div class="table-box bgh text-center" style="width: ` + type_table + `px;height: 100px;border-radius:15px">
						<p id="tbname" class="mb-0 " style="font-size: 360%;">` + item.number + `</p>
						<i id="tablecolor" class="fa fa-circle mr-2 ` + table_color + ` float-right" aria-hidden="true" style="font-size: 75%;margin-top: -4px"></i>
					</div>
				</div>`
					document.getElementById("table-box").innerHTML += data;
				});
			}
		});
	}



	$(document).ready(function() {
		var gettitlepage = localStorage.getItem("title_page");
		$('head > title').text('KhvetSiemreap | ' + gettitlepage);

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


		localStorage.removeItem("local-add-name");
		localStorage.removeItem("local-add-type");
		localStorage.removeItem("local-add-cost");
		localStorage.removeItem("local-add-price");
		localStorage.removeItem("local-add-stock");

		localStorage.removeItem("edp-check");

		getProductItem();

		$('#pos-button,#lgimg,#lgname').on('click', function() {
			CheckTable2();
			getTable2();
			window.location.href = "../Home";
		})

	});

	function DeleteProduct(id, name) {

		if (confirm('Are you sure you want to delete  ' + name + '  ?')) {
			$.post("../Product/DeleteProduct/", {
				id: id,
				name: name,
			}, function(data) {
				getProductItem();
			})
		}

	}
</script>