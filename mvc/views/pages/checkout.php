<?php include("./mvc/views/partials/theme.php"); ?>
<div id="checkout-box" class="container-fluid p-0">
	<div class="row m-0">
		<!-- side1 -->
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
						<p class="khmer-font cl" style="font-size:140%">ខ្វិត សៀមរាប</p>
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
		<div class="sidebar-2 change p-0 bg1">

			<div class="head-content py-3 mx-3 bg1" style="border-bottom: 1px solid rgba(0,0,0,.125);">


				<div id="toggle-bar">
					<a class="toggle float-left btn mr-3 bgh ">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</div>

				<div class="float-left pt-1" style="height:45px">
					<p onClick="document.Pdf2.printWithDialog()" class="float-left font-weight-bold mb-0 header-text">
						Checkouts
					</p>
				</div>

				<div id="pos-button" class="btn bgh float-right">
					<span class="pos-text">
						POS
					</span>
				</div>

				<div style="clear: both;"></div>



			</div>


			<div class="p-2" style=" height:calc(100vh - 78px);overflow-y: auto;">

				<div class="table-checkout">
					<div class="float-left mb-1 p-1 bgh">
						<?php
						foreach ($data["GetOrderDetail"] as $value) {
							echo '
		
							<p class="mb-0">Guest : <span id="guest-text"> </span></p>
							<div style="clear: both;"></div>

							<span>Cashier by : ' . $value['namedisplay'] . '</span>
							<div style="clear: both;"></div>

							<span>Opened : ' . $value['opened'] . '</span>
							<span id="open-time" hidden> ' . $value['created_at'] . '</span>
							<div style="clear: both;"></div>

							';
						}
						?>
					</div>
					<table id="get-html-table" class="table table-striped table-hover bgh ">
						<thead>
							<tr>
								<th scope="col" style="width:11%;">Table #<span id="table-text2"></span></th>
								<th scope="col" style="width:35%;">Name</th>
								<th scope="col">Qty</th>
								<th scope="col">Price</th>
								<th scope="col">Dis</th>
								<th scope="col">Amount</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$stt = 1;

							foreach ($data["GetOrderCheckout"] as $value) {
								if ($value["discount"] > 0) {
									$dis = "block";
									$normal = "none";
								} else {
									$dis = "none";
									$normal = "block";
								}
								echo '<tr>
								<td scope="row">' . $stt++ . '- </td>

								<td class="khmer"> ' . $value["name"] . '</td>
								<td class="khmer">' . $value["quanlity"] . '</td>
								<td class="khmer"><i class="fas fa-dollar-sign" style="font-weight:normal;font-size:95%"></i>' . $value["price1"] . '</td>
								<td class="khmer">%' . $value["discount"] . '</td>
								<td>
									
									<span  class="khmer" style="display:' . $normal . '" >
										<i class="fas fa-dollar-sign" style="font-weight:normal;font-size:95%">
										</i>' . $value["price_normal"] . '
									
									</span>
									<span  class="khmer" style="display:' . $dis . ';color:#dc3545;" >	

										<del><i class="fas fa-dollar-sign" style="font-weight:normal;font-size:95%">
											</i>' . $value["price_normal"] . '
										</del>
										&nbsp;
										
										<i class="fas fa-dollar-sign" style="font-weight:normal;font-size:95%">
										</i>' . $value["price_discount"] . '

									</span>

								</td>

							</tr>';
							}
							?>

						</tbody>
						<thead>
							<tr>

								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col">Service Charge</th>
								<th scope="col">Discount</th>
								<th scope="col">VAT</th>
								<th scope="col">Total Amount</th>

							</tr>
						</thead>
						<tbody style="font-size:115%;">
							<tr>
								<td class="khmer" scope="col">
									</th>
								<td class="khmer" scope="col">
									</th>
								<td class="khmer" id="ser"></td>
								<td class="khmer" id="discount"></td>
								<td class="khmer" id="vat"></td>
								<td class="khmer">
									<i class="fas fa-dollar-sign font-weight-normal">
									</i><span class="khmer" id="totald"></span> |
									R</span><span class="khmer" id="totalr">
								</td>

							</tr>
						</tbody>
					</table>

					<div style="width: 100%;height: 200px;">
						<div class="float-left bgh" style="width: 47%;height: 50px;display: flex;">
							<input id="received" class="pl-3" type="number" name="" style="width: 100%;height: 100%;background: none;border: 0;outline: none;" placeholder="Received">
							<div class="text-center" style="width: 50px;height: 50px;">
								<i class="fa-solid fa-money-check-dollar text-secondary" aria-hidden="true" style="line-height: 50px;font-size: 130%"></i>
							</div>
						</div>

						<div class="float-right bgh" style="width:47%;height: 50px;display: flex;">
							<div class="text-center pl-3" style="height:50px;">
								<i class="fas fa-dollar-sign font-weight-normal" style="line-height:50px;"></i>
							</div>
							<input id="return" type="" name="" style="width:100%;height: 100%;background:none;border:0;outline: none;" placeholder="Return" disabled>

							<div style="clear: both;"></div>
						</div>


						<div id="finish-button" style="display: none;">
							<button id="FinishCheckout" class="btn btn-primary mt-3 float-left btn-all" style="width: 78%;">Finish & Pay </button>
							<div class="js-print-link btn btn-info mt-3 float-right btn-all" style="width: 20%;">
								<span><i class="fa fa-print" aria-hidden="true" style="font-size: 100%"></i> Print Now</span>

							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>



<div id="print" style="display: none;">

	<!-- <div id="print" class="mt-5 p-4 shadow-ok" style="width:400px;height: 100%;display: none;"> -->
	<div id="invoice-POS">

		<center>
			<img src="../../public/images/logo/khvetsiemreap2.jpg" width="130px" height="130px;" style="object-fit: cover;">
		</center>
		<div id="invoice-checkout">
			<div class="text-center" style="border-bottom:2px solid #EEE;">
				<p class="mb-0 mt-1 khmertext">ផ្លូវ១០មករា សង្កាត់សាលាកំរើក</br>ក្រុងសៀមរាប​ ខេត្តសៀមរាប</p>
				<p class="mb-0 khmertext">Tel: +855 95 567 899 / 086 668 818</p>
				<p class="mb-0 khmertext">Table #<span id="table-text"></span> </p>
			</div>
			<?php
			foreach ($data["GetOrderDetail"] as $value) {
				echo '
			<div class="p-1 m-0">
			<p class="mb-0 contenttext">Receipt N&#186 : <span>' . $value['payment_id'] . '</span> </p>
			<p class="mb-0 contenttext">
				Cashier by : <span>' . $value['namedisplay'] . ' | Guest : <span id="guest-bill"></span> </span> 
			</p>
			<p class="mb-0 contenttext">Opened : <span> ' . $value['opened'] . '</span>	</p>
			<p class="m-0 contenttext">Closed  :  <span id="close-time-bill"></span> </p>
			</div>
			';
			}
			?>

			<div>
				<div style="border-bottom:2px solid #EEE;">
					<table class="table-invoice">

						<tr style="background:#EEE;border-bottom:5px solid white;">
							<td style="width:30mm;padding: 5px 0 5px 5px;">
								<p class="tabletitle">Name</p>
							</td>
							<td style="width: 15mm;">
								<p class="tabletitle ml-2">Qty</p>
							</td>
							<td style="width: 15mm;">
								<p class="tabletitle">Price</p>
							</td>
							<td style="width: 15mm;">
								<p class="tabletitle ml-4">Amt</p>
							</td>
						</tr>
						<?php
						$id = 1;
						foreach ($data["GetOrderCheckout"] as $value) {
							echo '
						<tr>
							<td>
								<p class="itemtext">' . $id++ . '-&nbsp;' . $value['name'] . '</p>
							</td>
							<td>
								<p class="itemtext ml-2">' . $value['quanlity'] . '</p>
							</td>
							<td>
								<p class="itemtext"><i class="fa-regular fa-dollar-sign" font-size:11px"></i>' . $value['price1'] . '</p>
							</td>
							<td>
								<p class="itemtext float-right mr-1"><i class="fa-regular fa-dollar-sign" style="font-size:11px"></i>' . $value["price_discount"] . '</p>
							</td>
						</tr>
						';
						}

						?>

					</table>
				</div>
				<div class="p-1">
					<p class="float-left mb-0 contenttext">VAT</p>
					<p id="vat-bill" class="float-right mb-0 contenttext">%10</p>
					<div style="clear: both;"></div>

					<p class="float-left mb-0 contenttext">Discount</p>
					<p id="discount-bill" class="float-right mb-0 contenttext">%20</p>
					<div style="clear: both;"></div>

					<p class="float-left mb-0 contenttext">Service Charge</p>
					<p id="ser-bill" class="float-right mb-0 contenttext">%20</p>
					<div style="clear: both;"></div>

				</div>

				<div style="background:#EEE;">

					<div class="p-1 py-3">
						<p class="float-left mb-0 font-weight-bold subtext">Grand Total (<i class="fas fa-dollar-sign"></i>)</p>
						<p id="totald-bill" class="float-right mb-0 font-weight-bold subtext">19</p>
						<div style="clear: both;"></div>

						<p class="float-left mb-0 font-weight-bold subtext">Grand Total (R)</p>
						<p id="totalr-bill" class="float-right mb-0 font-weight-bold subtext">178000</p>
						<div style="clear: both;"></div>
					</div>
				</div>
				<!--End Table-->
			</div>
		</div>

		<div class="text-center mb-0 mt-2" style="font-size:10px;">
			<img src="../../public/images/logo/qrcode.png" width="80px" height="80px;" style="object-fit: cover;">
			<p class="mt-2 mb-1">Thank You ! See You Again</p>
		</div>
	</div>
	<!--End InvoiceBot-->

</div>

<script type="text/javascript">
	$('.js-print-link').on('click', function() {
		// $("#checkout-box").hide();
		$("#print").show();
		window.print();
		$("#checkout-box").show();
		$("#print").hide();

	});

	var fee1 = JSON.parse(localStorage.getItem('fee1'));
	var fee2 = JSON.parse(localStorage.getItem('fee2'));
	var discount = JSON.parse(localStorage.getItem('discount'));
	var total = JSON.parse(localStorage.getItem('total'));
	var totalr = JSON.parse(localStorage.getItem('totalr'));
	var tableNumber = JSON.parse(localStorage.getItem('numberTable'));
	var today = moment();
	var guestnumber = JSON.parse(localStorage.getItem('guestNum'));



	$("#discount").text('%' + discount);
	$("#discount-bill").text('%' + discount);

	$("#vat").text('%' + fee1);
	$("#vat-bill").text('%' + fee1);

	$("#ser").text('%' + fee2);
	$("#ser-bill").text('%' + fee2);

	$("#totald").text(total);
	$("#totald-bill").text(total);

	$("#totalr").text(totalr);
	$("#totalr-bill").text(totalr);

	$("#return").val(total);


	if (guestnumber == "") {
		$("#guest-text").text(1);
		$("#guest-bill").text(1);
	} else {
		$("#guest-text").text(guestnumber);
		$("#guest-bill").text(guestnumber);
	}

	$('#table-text').text(tableNumber);
	$("#table-text2").text(tableNumber);
	$("#close-time-bill").text(today.format('llll'));



	$("#received").on('keyup', function() {
		var received = $("#received").val();
		$("#return").val((total - received * 1).toFixed(2));

		if (total - received * 1 <= 0) {
			$("#finish-button").show();

		} else {
			$("#finish-button").hide();
		}
	})



	function CheckTable2() {
		var id = JSON.parse(localStorage.getItem('idTable'));
		$.ajax({
			url: '../../Table/CheckTable/' + id,
			type: 'get',
			// dataType: 'json',
			success: function(data) {
				console.log(data);
			}
		});
	}

	function getTable2() {
		$("#table-box").html('');
		$.ajax({
			url: '../../Table/GetTable',
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


	function ItemClear2() {
		var id = JSON.parse(localStorage.getItem('idTable'));
		$.ajax({
			url: '../../Table/ResetTable/' + id,
			type: 'get',
			// dataType: 'json',
			success: function(data) {
				window.location.href = "../../Home";
			}

		});
	}

	function ClearGuest2() {
		var idtable = JSON.parse(localStorage.getItem('idTable'));
		$.post("../../Guest/ClearGuest/", {
			idtable: idtable
		}, function(data) {})
	}

	function GetOrderToReport() {
		var idtable = JSON.parse(localStorage.getItem('idTable'));
		var discount = JSON.parse(localStorage.getItem('discount'));
		var fee1 = JSON.parse(localStorage.getItem('fee1'));
		var fee2 = JSON.parse(localStorage.getItem('fee2'));
		$.ajax({
			url: '../../Order/GetOrderToReport/' + idtable,
			type: 'post',
			data: {
				idtable: idtable,
				discount: discount,
				fee1: fee1,
				fee2: fee2

			},
			success: function(data) {}
		});


	}

	function GetSoldOut() {
		$.ajax({
			url: '../../Order/AddInventory/',
			type: 'post',
			success: function(data) {}
		});
	}


	$(document).ready(function() {
		$('head > title').text('KhvetSiemreap | Checkouts');

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


		var getHtmlTable = document.getElementById("get-html-table").innerHTML;
		var getHtmlPrint = document.getElementById("invoice-checkout").innerHTML;
		var gettime = $("#open-time").text();
		var getguest = $("#guest-text").text();
		var sessionname = "<?php echo $_SESSION['namedisplay'] ?> ";


		$('#pos-button,#lgimg,#lgname').on('click', function() {
			CheckTable2();
			getTable2();
			window.history.back();
		})


		$("#FinishCheckout").on('click', function() {

			if (confirm('Are you sure ? Order will Finish & Pay')) {
				$.ajax({
					url: "../../Checkout/AddPayment/",
					type: 'post',
					data: {
						content: getHtmlTable,
						invoice: getHtmlPrint,
						accountname: sessionname,
						guestnumber: getguest,
						opened: gettime
					},
					success: function(data) {


						$("<i class='fas fa-spinner fa-spin ml-1'></i>")
							.appendTo('#FinishCheckout')
							.delay(300)
							.queue(function() {
								GetOrderToReport();
								GetSoldOut();
								ItemClear2();
								ClearGuest2();
								$(this).remove();

							});

					},

				});

			}

		})


	});
</script>