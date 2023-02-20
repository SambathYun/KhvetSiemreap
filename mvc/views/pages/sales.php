<?php include("./mvc/views/partials/theme.php"); ?>
<div id="sale-box" class="container-fluid p-0">
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
		<!-- side 2 -->
		<div class="sidebar-2 change p-0 bg1">

			<div class="head-content py-3 mx-3 bg1" style="border-bottom: 1px solid rgba(0,0,0,.125);">

				<div id="toggle-bar">
					<a class="toggle float-left btn mr-3 bgh ">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</a>
				</div>

				<div class="float-left pt-1" style="height:45px">
					<p class="float-left font-weight-bold mb-0 header-text">
						Sales~Manage
					</p>
				</div>

				<div id="pos-button" class="btn bgh float-right" title="Back to Home">
					<span class="pos-text">
						POS
					</span>

				</div>
				<div style="clear: both;"></div>

			</div>





			<div class="text-center p-2" style="display: flex;align-items: center;justify-content: center;">

				<div id="box-search-sale" class="search_sale bgh ">

					<div class="text-center" style="width: 40px;height: 40px;">
						<i class="fa fa-search " aria-hidden="true" style="font-size: 90%;line-height:40px;cursor:pointer"></i>
					</div>

					<input id="search-receipt" type="number" name="" placeholder="Search..." style="background:none;width:90%;border: 0;outline: none;">

				</div>

				<div>
					<div id="saleofdate" class="float-left text-center ml-2" data-provide="datepicker" style="position:relative;" title="Select Sales Date">
						<input id="input" class="form-control cursor" type="text" style=" width:235px;height: 40px;border-radius: 0.25rem;" readonly />
						<span class="date-button">
							<button type="button"><i class="fa fa-calendar" style="cursor:pointer;color:#6f42c1;"></i></button>
						</span>
					</div>
				</div>

				<button id="find-sale" class="btn btn-primary mx-2" style="border-radius:6px;" title="Find Sale">
					<div>
						<i class="fa fa-arrow-right" aria-hidden="true" style="font-size: 90%;"></i>
					</div>
				</button>

			</div>

			<div class="px-2" style="height: calc(100vh - 140px);overflow-y: auto;">
				<div id="sale-db"></div>

				<div class="p-2" style="display:flex;align-items: center;justify-content: center;margin-top:35px">
					<div id="seemore" class="btn btn-success align-center" style="width:150px;font-size: 80%;display:none">
						See More 
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- <div id="print1" style="width: 400px;height: auto;display: none;"> -->
<div id="print1" style="display: none;">
	<div id="invoice-POS">

		<center>
			<img src="../public/images/logo/khvetsiemreap2.jpg" width="130px" height="130px;" style="object-fit: cover;">
		</center>
		<div id='content-bill'> </div>
		<div class="text-center mb-0 mt-2" style="font-size: 10px;">
			<img src="../public/images/logo/qrcode.png" width="80px" height="80px;" style="object-fit: cover;">
			<p class="mt-1 mb-1">Thank You! See You Again</p>
		</div>

	</div>

</div>

<script type="text/javascript">
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
					$('#table-box').append(data);
				});
			}
		});
	}

	function getSale(startfind, endfind, limit) {

		document.getElementById("sale-db").innerHTML = '';
		$.ajax({
			url: "../Sales/GetSale",
			type: 'post',
			dataType: 'json',
			data: {
				startfind: startfind,
				endfind: endfind,
				limit: limit
			},
			async: false,
			cache: false,
			success: function(data) {

				if (data.length == '') {
					$("#seemore").hide();
					var nosale = `
						<div class="alert alert-success " role="alert" style="width: 800px;margin: 0 auto;font-size: 80%;">
							No Sale on that day ! <a href="../Home" class="alert-link text-underline">Please choose table for order</a>. Give it a click if you like.
						</div>`
					document.getElementById("sale-db").innerHTML = nosale;

				} else {
					$("#seemore").show();
				}

				var sessionrole = "<?php echo $_SESSION['role'] ?>";
				var hidevoice;
				var today = moment().format('L');

				$.each(data, function(key, item) {
					if (sessionrole == 'Cashier' || item.close_date != today) {
						hidevoice = 'none';
					} else if (sessionrole == 'Administrator' || sessionrole == "Accountant" || item.close_date == today) {
						hidevoice = 'block';
					}

					if (item.max_limit <= limit) {
						$("#seemore").hide();
					} else {
						$("#seemore").show();
					}


					var data = `
					<div class="table-sales">
						
						<div class="float-left mb-1  w-100">

							<div class="float-left p-2 bgh">

								<span id="reciept-no">Receipt N&#186; : ` + item.id + `</span>
								<div style="clear: both;"></div>

								<span>Cashier by : ` + item.account_name + `</span>
								<span> | Guest : ` + item.guest_num + `</span>
								<div style="clear: both;"></div>

								<span>Opened : ` + item.opened_sale + `</span>

								<span> | Closed : ` + item.closed_sale + `</span>
								<div style="clear: both;"></div>
							
							</div>

						</div>
						
						<table class="table table-striped table-hover bgh mb-1">
								` + item.content + `
							
						</table>

						<div class="btn btn-info p-1 float-right " style="width:100px;font-size: 100%" onclick="getInvoice(` + item.id + `)">
							<span>
								Print 
							</span>
						</div>

						<div class="btn btn-danger p-1 float-right mr-2" style="display:` + hidevoice + `;width:100px;font-size: 100%" onclick="deleteInvoice(` + item.id + `)">
							<span>
								Void
							</span>
						</div>
						

					</div>

				`
					$('#sale-db').append(data);
				})
			}
		})

	}

	function getSaleByID(id) {

		document.getElementById("sale-db").innerHTML = '';
		$.ajax({
			url: "../Sales/GetSaleByID",
			type: 'post',
			dataType: 'json',
			data: {
				id: id
			},
			async: false,
			cache: false,

			success: function(data) {
				if (data.length == '') {
					var nosaleid = `
							<div class="alert alert-success" role="alert" style="width: 800px;margin: 0 auto;font-size: 80%;">
								No Sale on that Receipt N&#186; !
							</div>`
					$("#sale-db").html(nosaleid);
				}
				var sessionrole = "<?php echo $_SESSION['role'] ?>";
				var hidevoice;
				var today = moment().format('L');

				$.each(data, function(key, item) {
					if (sessionrole == 'Cashier' || item.close_date != today) {
						hidevoice = 'none';

					} else if (sessionrole == 'Administrator' || sessionrole == "Accountant" || item.close_date == today) {
						hidevoice = 'block';
					}

					var data = `
						<div class="table-sales">

						<div class="float-left mb-1  w-100">

							<div class="float-left p-2 bgh">

								<span>Receipt N&#186; : ` + item.id + `</span>
								<div style="clear: both;"></div>

								<span>Cashier by : ` + item.account_name + `</span>
								<span> | Guest : ` + item.guest_num + `</span>
								<div style="clear: both;"></div>

								<span>Opened : ` + item.opened_sale + `</span>

								<span> | Closed : ` + item.closed_sale + `</span>
								<div style="clear: both;"></div>
							
							</div>

						</div>

						<table class="table table-striped table-hover bgh mb-1">
								` + item.content + `
							
						</table>

						<div class="btn btn-info p-1 float-right " style="width:100px;font-size: 100%" onclick="getInvoice(` + item.id + `)">
							<span>
								Print
							</span>
						</div>

						<div class="btn btn-danger p-1 float-right mr-2" style="display:` + hidevoice + `;width:100px;font-size: 100%" onclick="deleteInvoice(` + item.id + `)">
							<span>
								Void
							</span>
						</div>


						</div>

						`
					$('#sale-db').append(data);

				})
			}
		})


	}

	function getInvoice(id) {
		$.post("../Sales/GetInvoice/", {
			idpayment: id
		}, function(data) {
			console.log(data)
			document.getElementById("content-bill").innerHTML = data;
			$("#print1").show();
			window.print();
			$("#print1").hide();

		})
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


		var today = moment().format('YYYY-MM-DD');
		var limit = 10;
		localStorage.setItem('local-limit', limit);
		var getlocal_start = localStorage.getItem("local-sale-start");
		var getlocal_end = localStorage.getItem("local-sale-end");
		var getlimit = localStorage.getItem("local-limit");


		if (getlocal_start == null && getlocal_end == null) {
			getSale(today, today, limit); //today
		} else {
			getSale(getlocal_start, getlocal_end, limit);
		}

		// ===========================
		$('#input').attr('readonly', true);
		$('#input').css("background-color", "#fff");
		var start = moment();
		var end = moment();

		$('#saleofdate').daterangepicker({
			opens: 'left',
			timePicker: true,
			startDate: start,
			endDate: end,
			drops: 'down',
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
				'All Time': ['04/01/2022', moment()],
			}
		}, getpicker_date);

		function getpicker_date(start, end) {
			$('#input').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
		}

		function getlocal_date() {
			var startinput = localStorage.getItem("local-start-input");
			var endinput = localStorage.getItem("local-end-input")
			$('#input').val(startinput + ' - ' + endinput);
		}

		if (getlocal_start == null && getlocal_end == null) {
			getpicker_date(start, end);
		} else {
			getlocal_date();
		}

		// ===========================

		$("#find-sale").on('click', function() {
			var startfind = $('#saleofdate').data('daterangepicker').startDate.format('YYYY-MM-DD');
			var endfind = $('#saleofdate').data('daterangepicker').endDate.format('YYYY-MM-DD');

			var startinput = $('#saleofdate').data('daterangepicker').startDate.format('MM/DD/YYYY');
			var endinput = $('#saleofdate').data('daterangepicker').endDate.format('MM/DD/YYYY');

			localStorage.setItem("local-start-input", startinput);
			localStorage.setItem("local-end-input", endinput);

			localStorage.setItem("local-sale-start", startfind);
			localStorage.setItem("local-sale-end", endfind);

			var getlocal_start = localStorage.getItem("local-sale-start");
			var getlocal_end = localStorage.getItem("local-sale-end");

			getSale(getlocal_start, getlocal_end, limit);

		})

		$("#seemore").on('click', function() {

			var getlocal_start = localStorage.getItem("local-sale-start");
			var getlocal_end = localStorage.getItem("local-sale-end");

			$("<i class='fas fa-spinner fa-spin ml-1'></i>")
				.appendTo('#seemore')
				.delay(200)
				.queue(function() {
					$(this).remove();

					limit = limit + 10;
					getSale(getlocal_start, getlocal_end, limit);

				});
		})

		$("#search-receipt").keyup(function() {
			var id = $("#search-receipt").val();
			var getlocal_start = localStorage.getItem("local-sale-start");
			var getlocal_end = localStorage.getItem("local-sale-end");

			if (id == '') {
				if (getlocal_start == null && getlocal_end == null) {
					getSale(today, today, limit); //today
				} else {
					getSale(getlocal_start, getlocal_end, limit);
				}
			} else {
				getSaleByID(id);
				$("#seemore").hide();
			}
		})
		$('#pos-button,#lgimg,#lgname').on('click', function() {
			CheckTable2();
			getTable2();
			window.location.href = "../Home";
		})




	});

	function deleteInvoice(id) {

		today = moment().format('YYYY-MM-DD');
		getlocal_start = localStorage.getItem("local-sale-start");
		getlocal_end = localStorage.getItem("local-sale-end");
		getlimit = localStorage.getItem("local-limit");

		if (confirm('Are you want to delete Receipt ' + id + ' ?')) {
			$.ajax({
				url: '../Sales/DeleteInvoice/',
				type: 'post',
				data: {
					idpayment: id
				},
				success: function(data) {

					if (getlocal_start == null && getlocal_end == null) {
						getSale(today, today, getlimit); //today
					} else {
						getSale(getlocal_start, getlocal_end, getlimit);
					}

				}
			})
		}
	}
</script>