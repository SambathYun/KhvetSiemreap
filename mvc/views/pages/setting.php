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
						<p class="khmer-font cl" style="font-size:140%">ខ្វិតសៀមរាប</p>
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
				} else {
					include("./mvc/views/partials/home-menu-staff.php");
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

				<div class="float-left pt-1" style="height:45px">
					<p class="float-left font-weight-bold mb-0 header-text">
						Settings~Manage
					</p>
				</div>

				<div id="pos-button" class="btn bgh float-right">
					<span class="pos-text">
						POS
					</span>
				</div>

				<div style="clear: both;"></div>


			</div>


			<div style="height: calc(100vh - 78px);overflow-y: auto;">


				<div class="table-settings">

					<div class="col-12 p-2">
						<div class="p-2 bgh">
							<form action="../Setting/ChangeColor" method="post" enctype='multipart/form-data' onsubmit="return confirm(' Do you really want to Change Themes ?')">
								<p class="text-center" style="font-size: 130%">Theme</p>
								<div class="row m-0">
									<?php
									foreach ($data["GetTheme"] as $value) {
										echo '
												<div class="col-6 p-2 mt-2 border border-right-0" style="background-color: #f5f5f5;">
													<label>Background 1</label><br>
													<input id="color1" type="color" value="' . $value["color1"] . '" name="color1">	<br>
												</div>
												<div class="col-6 p-2 mt-2  border border-left-0"  style="background-color: #f5f5f5;">
													<label>Background 2</label><br>
													<input id="color2" type="color" value="' . $value["color2"] . '" name="color2">	<br>
												</div>
												
												<div class="col-6 p-2 mt-2 border border-right-0">
													<label>Background 3</label><br>
													<input id="color3" type="color" value="' . $value["color3"] . '" name="color3">	<br>
												</div>
												<div class="col-6 p-2 mt-2 border border-left-0">
													<label>Text</label><br>
													<input id="color4" type="color" value="' . $value["color4"] . '" name="color4">	<br>
												</div>';
									}
									?>
								</div>
								<div>
									<button type="submit" class="btn btn-info mt-3 float-left cl" style="font-size: 100%;width: 70%">Change Themes</button>
									<button class="btn btn-primary float-right mt-3 cl" style="font-size: 100%;width: 25%" onclick="SetDefaultColor()">Set Default</button>
									<div style="clear: both;"></div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-12 p-2">
						<div class="p-2 bgh">
							<p class="text-center" style="font-size: 130%">Fee</p>
							<div style="clear: both;"></div>
							<div class="row m-0">
								<table class="table table-striped table-hover bgh mb-1 ">
									<thead>
										<tr>
											<th scope="col" style="width:45%">Name</th>
											<th scope="col" style="width:45%">Percent</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($data["GetFee"] as $value) {
											echo '<tr>
													<td style=" vertical-align: middle;">' . $value["name"] . '</td>
													<td style=" vertical-align: middle;">%' . $value["number"] . '</td>
													<td>
														<a style="text-decoration: none;color:black;" onclick="ChangeFee(' . $value["id"] . ',`' . $value["name"] . '`,`' . $value["number"] . '`)">
														<div class="btn btn-success float-left mr-1 cl" style="font-size: 90%">
														<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
														Edit
														</div>
														</a>
													
													</td>';
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-12 p-2">
						<div class="p-2  bgh">
							<p class="text-center" style="font-size: 130%">Discount</p>
							<div style="clear: both;"></div>
							<div class="row m-0">
								<table class="table table-striped table-hover bgh mb-1 ">
									<thead>
										<tr>
											<th scope="col" style="width:45%">Name</th>
											<th scope="col" style="width:45%">Percent</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($data["GetDiscount"] as $value) {
											echo '<tr>
												<td style=" vertical-align: middle;">' . $value["name"] . '</td>
												<td style=" vertical-align: middle;">%' . $value["number"] . '</td>
												<td>
													<a style="text-decoration: none;color:black;" onclick="ChangeDiscount(' . $value["id"] . ',`' . $value["name"] . '`,`' . $value["number"] . '`)">
													<div class="btn btn-success float-left mr-1 cl" style="font-size: 90%">
													<i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
													Edit
													</div>
													</a>

												</td>';
										}
										?>
									</tbody>
								</table>
							</div>

						</div>

					</div>


				</div>

			</div>
			<!-- dialog -->

			<div id="modalDialog" class="modal">
				<div class="modal-content animate-top">

					<!-- form fee -->

					<form id="form-fee" action="../Setting/EditFee" method="post" onsubmit="return confirm(' Do you really want to Edit Fee ?')">

						<div class="modal-header">
							<h5 class="modal-title">...</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							</button>
						</div>
						<div class="modal-body">

							<div style="display: flex;">
								<input id="idFee" type="" name="idFee" style="display: none;">
								<div class="px-2" style="width: 50%">
									<label>Name</label><br>
									<input id="nameFee" type="" class="form-control" name="nameFee" disabled>
								</div>
								<div class="px-2" style="width: 50%">
									<label>Percent</label><br>
									<input id="priceFee" type="number" class="form-control" name="priceFee" required>
								</div>

							</div>
							<!-- </form> -->
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-primary modal-btn">Edit Fee</button>
						</div>

					</form>

					<!-- form discount -->
					<form id="form-discount" action="../Setting/EditDiscount" method="post" style="display: none;" onsubmit="return confirm('Do you really want to Edit Discount ?')">
						<div class="modal-header">
							<h5 class="modal-title">...</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							</button>
						</div>
						<div class="modal-body">

							<div style="display: flex;">
								<input id="idDiscount" type="" name="idDiscount" style="display: none;">
								<div class="px-2" style="width: 50%">
									<label>Name</label><br>
									<input id="nameDiscount" type="" class="form-control" name="nameDiscount" disabled>
								</div>
								<div class="px-2" style="width: 50%">
									<label>Percent</label><br>
									<input id="priceDiscount" type="number" class="form-control" name="priceDiscount" required>
								</div>

							</div>

						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-primary modal-btn">Edit Discount</button>
						</div>

					</form>
				</div>
			</div>
			<!-- dialog -->

		</div>

	</div>
</div>
</div>

<script type="text/javascript">
	// When the user clicks anywhere outside of the modal, close it
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

	function SetDefaultColor() {
		$("#color1").val('#dbe9f4');
		$("#color2").val('#003e49');
		$("#color3").val('#007286');
		$("#color4").val('#ffffff');

	}
	// function SetDefaultColor(){
	// 	$("#color1").val('#121421');
	// 	$("#color2").val('#1e202c');	
	// 	$("#color3").val('#292b37');
	// 	$("#color4").val('#ffffff');
	// }
	// function SetDefaultColor(){
	// 	$("#color1").val('#dabddb');
	// 	$("#color2").val('#6b4e7e');	
	// 	$("#color3").val('#00d9ff');
	// 	$("#color4").val('#ffffff');
	// }

	function ChangeFee(id, name, price) {
		$('#modalDialog').show();
		$(".modal-title").text("Edit a New Fee");
		$("#form-discount").hide();
		$("#form-fee").show();
		$("#idFee").val(id);
		$("#nameFee").val(name);
		$("#priceFee").val(price);
	}

	function ChangeDiscount(id, name, price) {
		$('#modalDialog').show();
		$(".modal-title").text("Edit a New Discount");
		$("#form-discount").show();
		$("#form-fee").hide();
		$("#idDiscount").val(id);
		$("#nameDiscount").val(name);
		$("#priceDiscount").val(price);
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

		$('#pos-button,#lgimg,#lgname').on('click', function() {
			CheckTable2();
			getTable2();
			window.location.href = "../Home";
		})

	});
</script>