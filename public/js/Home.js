
$(document).ready(function(){
	$('head > title').text('KhvetSiemreap | Home')
	CheckOrder();

	var get_toggle = localStorage.getItem("tgl-bar");
	if (get_toggle == 72) {
		$('.sidebar-1').removeClass("closed");
		$('.sidebar-2').removeClass("change");
		$('.link_name').addClass('hide');
		$('#logo1').hide();
		$('#logo2').show();
	} else{
		$('.sidebar-1').addClass("closed");
		$('.sidebar-2').addClass("change");
		$('.link_name').removeClass('hide');		
	}


	localStorage.removeItem("local-sale-start");	
	localStorage.removeItem("local-sale-end");
	localStorage.removeItem("local-limit");

	localStorage.removeItem("local-rp-start");	
	localStorage.removeItem("local-rp-end");

	localStorage.removeItem("local-inv-date");


	$("#all-filter").on('click',function(){
		type=0;
		localStorage.setItem("clickmenu", type);
		getProduct(type);
	})
	$("#food-filter").on('click',function(){
		type=1;
		localStorage.setItem("clickmenu", type);	
		getProduct(type);
	})
	$("#drink-filter").on('click',function(){
		type=2;
		localStorage.setItem("clickmenu", type);
		getProduct(type);	
	})
	$("#beer-filter").on('click',function(){
		type=3;
		localStorage.setItem("clickmenu", type);
		getProduct(type);
	})
	$("#hotcafe-filter").on('click',function(){
		type=4;
		localStorage.setItem("clickmenu", type);
		getProduct(type);
	})
	$("#icecafe-filter").on('click',function(){
		type=5;
		localStorage.setItem("clickmenu", type);
		getProduct(type);	
	})
	$("#frappe-filter").on('click',function(){
		type=6;
		localStorage.setItem("clickmenu", type);
		getProduct(type);
	})
	$("#khvet-filter").on('click',function(){
		type=7;
		localStorage.setItem("clickmenu", type);
		getProduct(type);	
	})
	$("#search-input").keyup(function(){
		var searchInput = $("#search-input").val();
		if(searchInput == ''){
			var clickmenu =localStorage.getItem('clickmenu');
			getProduct(clickmenu);
		}else{
			getProduct(searchInput);	
		}
	})
});

function getTable(){
	$("#table-box").html('');
	$.ajax({
		url: './Table/GetTable',
		type: 'get',
		dataType : 'json',
		cache: false,
		beforeSend: function () {
			$('#loader').show();
		
		},
		complete: function(){
			$('#loader').hide();
		},		
		 success: function(data){
			var table_color;
			var type_table;
			$.each (data, function (key, item){
				if(item.status == 1){
					table_color='dot-success';
				}else {
					table_color='dot-danger';
				}
				if(item.type == 1){
					type_table ='100';
					circle_table ='10';
				}else if(item.type == 2){
					type_table ='200';
					circle_table ='10';
				}else if(item.type == 3) {
					type_table = '250';
					circle_table ='10';
				}else if(item.type == 4) {
					type_table ='100';
					circle_table ='100';
				}

				var data = `
				<div class="table-item float-left p-1 cursor" onclick="GetTable(`+item.id+`,`+item.number+`)" >
					<div class="bgh text-center" style="width: `+type_table+`px;height: 100px;border-radius:`+circle_table+`px;">
						<p id="tbname" class="mb-0 " style="font-size: 360%;">`+item.number+`</p>
						<i id="tablecolor" class="fa fa-circle mr-2 `+table_color+` float-right" aria-hidden="true" style="font-size: 75%;margin-top: -4px"></i>
					</div>
				</div>`
				$('#table-box').append(data);
			});
			
		}
	});

}


function getProduct(type){
	document.getElementById("product-box").innerHTML ='';

	$.ajax({
		url: './Product/GetProduct/'+type,
		type: 'get',
		dataType : 'json',
		cache: false,
		beforeSend: function (data) {

			$('#product-box').removeClass('product-wrapper');
			var data =  ` 
						<div id="loading" style=" display: flex;align-items: center;justify-content: center;">
							<div style="width: 150px;height: 150px;">
								<img src="./public/images/icons/loading.gif" style="max-width: 100%;border-radius:100px">
							</div>

						</div>
					`
			document.getElementById("product-box").innerHTML =data;
	
		},
		complete: function(){
			$('#loading').hide();
			$('#product-box').addClass('product-wrapper');
		},
			
		success: function(data){
			var pro_discount;
			var pro_normal;
			var stock;
			var namenormal;
			var namelong;
			$.each (data, function (key, item){
				if(item.discount > 0){
					pro_discount = 'block';
					pro_normal = 'none';
				}else{
					pro_discount = 'none';
					pro_normal = 'block';
				}
				if(item.stock >0){
					stock='none';

				}else{
					stock='block';

				}
				if(item.name.length >17){
					namenormal='none';
					namelong='block';

				}else{
					namenormal='block';
					namelong='none';
				}

				var data =
				`
				<div id='product`+item.id+`' class="product-items bgh text-center cursor" onclick='addToCart(`+item.id+`)' title="`+item.name+`">
					
					<div class="p-2 col-12 text-center d-flex justify-content-center" style="z-index:1;">
						<span id="out`+item.id+`" class="mb-0 khmer position-absolute mt-5" style="color:#fd7e14;font-size:100%;display:`+stock+`;">Out OF Stock</span>
						<div class="square">
							<img src="./public/images/product/`+item.image+`" class="img-pro">
						</div>					
					</div>
					<div class="py-2 mx-2 text-underline" style="height:35px;border-top: 1px solid rgba(0,0,0,.125);">
						<div style="display:`+namenormal+`!important;">
							<p class="mb-0 mt-1 khmer" style="font-size:90%"> `+item.name+`</p>	
						</div>
						<div id="text_wrapper" style="display:`+namelong+`!important;">
							<p id="text_overflow" class="mb-0 khmer " style="font-size:90%">`+item.name+`</p>
						</div>
		
					</div>
					
					<div class="m-2 text-center" style="background:#dbe9f4;">
						<div style="color:#007bff;display:`+pro_normal+`!important;font-size: 1.25rem;">
							<span class="p-1 khmer"><i class="fas fa-dollar-sign font-weight-normal" style="font-size:95%"></i>`+item.price+`</span>
						</div>
						<div class="row" style="color:#dc3545;display:`+pro_discount+`!important;font-size: 1.25rem;">
							<span class="p-1 khmer"><del class="khmer"><i class="fas fa-dollar-sign font-weight-normal" style="font-size:95%"></i>`+item.price+`</del></span>

							<span class="p-1 khmer"><i class="fas fa-dollar-sign font-weight-normal" style="font-size:95%"></i>`+item.price_discount+`</span>
						</div>
						
					</div>
			  	</div>
		
			 	`
				$('#product-box').append(data);
			});		
		}
		
	});
}


function addToCart(id){
	
	localStorage.setItem("idproduct", JSON.stringify(id));
	var table =JSON.parse(localStorage.getItem('idTable'));
	var idadmin = sessionid;
    
	$.ajax({
		url: './Order/GetProductCheckStock/'+id,
		type: 'post',
		dataType : 'json',
		beforeSend: function (data) {

			$('#product-box').css("pointer-events", "none");
	
		},
		success: function(data){
			if(data[0].stock <=0){
				$('#product'+id).css('pointer-events','none');
				$('#out'+id).show();
					alert("Add More Stock !");
				
			}else{

				$('#product'+id).removeAttr('style');
				$.post("./Order/AddOrder/",{idproduct:id,idtable:table,idadmin:idadmin},function(data){	
					CheckOrderForInventory();
					CheckOrder();
					GetOrder();
					$('#out'+id).hide();

				}) 

			}

		},
		complete: function(data){
			$('#product-box').css("pointer-events", "auto");

		}
	});

}

// =============Guest========
function EnterGuest(){
	$("#input-guest").show();
	$("#input-guest").val("");
	$("#add-guest").hide();
	$("#remove-input").show(); 

	$("#input-guest").keyup(function() {
		var inputguest = $("#input-guest").val();
		if( inputguest > 0){
			$("#submit-guest").show(); 
			$("#remove-input").hide(); 
		}else{
			$("#remove-input").show(); 
			$("#submit-guest").hide(); 
		}
		
	})
	$("#guest-db").hide();
	$("#guest-ok").hide();
	
}

function AddGuest(){
	var inputguest = $("#input-guest").val();
	var table =JSON.parse(localStorage.getItem('idTable'));
	$.ajax({
		url: './Guest/AddGuest/',
		type: 'post',
		data:{
			guest: inputguest,
			idtable: table,
		},
		success: function(data){	
		}
	});
}

function GetGuest(){  
	$("#input-guest").hide();
				
	$("#guest-box").show();
	$("#submit-guest").hide(); 
	$("#remove-input").hide(); 
	$("#add-guest").show();

	$("#guest-ok").show();
	$("#icon-guest").show();

	$("#guest-db").show();

	var table =JSON.parse(localStorage.getItem('idTable'));
	document.getElementById("guest-db").innerHTML='';
	$.ajax({
		url: './Guest/GetGuest/'+table,
		type: 'get',
		dataType: 'json',
		success: function(data){
			$.each (data, function (key, item){
			var data = `
				<div class="float-right text-center cl">
					<p id="guest-num" class="mb-0 float-left mr-1"style="font-size:100%" > `+item.guest+`</p>
				</div>

				`
				document.getElementById("guest-db").innerHTML +=data;
				
			})
		var guest = $('#guest-num').text();
		localStorage.setItem("guestNum", JSON.stringify(guest));

	}
		
	});

}


$(document).ready(function(){

	var idtable =JSON.parse(localStorage.getItem('idTable'));
	$("#submit-guest").on('click',function(){
		AddGuest();
		$.ajax({
			url: './Guest/GetGuest/'+idtable,
			type: 'get',
			success: function(data){							
				GetGuest();
				GetOrder();

			}
		});	
	})
	$("#remove-input").on('click',function(){
		$.ajax({
			url: './Guest/GetGuest/'+idtable,
			type: 'get',
			success: function(data){							
				$("#input-guest").hide();
				
				$("#guest-box").show();
				$("#submit-guest").hide(); 
				$("#remove-input").hide();
				$("#add-guest").show();

				$("#guest-ok").show();
				$("#icon-guest").show();

				$("#guest-db").show();
				GetGuest()
				GetOrder();
			}
		});	
	})

});



function GetTable(id,number){


	$('#side1').hide();
	$('#side2').hide();
	$('#side3').show();
	$('#side4').show();
	
	localStorage.setItem("idTable", JSON.stringify(id));
	localStorage.setItem("numberTable", JSON.stringify(number));

	GetOrder();
	CheckTable();
	CheckOrder();
	GetGuest();
	GetSoldOut();

	var type=0;
	localStorage.setItem("clickmenu",type);	
	var clickmenu =localStorage.getItem('clickmenu');
	$('#all-text').addClass('bg3 cl');
	getProduct(clickmenu);

	$('#table-order').text(localStorage.getItem('numberTable'));

	$('.sidebar-2').addClass('change');


}

function GetSoldOut() {
	$.ajax({
		url: './Order/AddInventory/',
		type: 'post',
		success: function(data) {
			// set quantity of stock to inventory when user click into table
		}
	});
}


function CheckTable(){
	var id =JSON.parse(localStorage.getItem('idTable'));
	$.ajax({
		url: './Table/CheckTable/'+id,
		type: 'get',
		dataType : 'json',
		success: function(data){
			console.log(data);
		}
	});
}


function CheckOrder(){
	var id =JSON.parse(localStorage.getItem('idTable'));
	$.ajax({
		url: './Table/CheckOrder/'+id,
		type: 'get',
		success: function(data){	
			if(data==1){	
				$("#link-addorder").show();
				$("#link-checkout").hide();	
			}else if(data ==2){
				$("#link-checkout").show();	
				$("#link-addorder").hide();		
				$("#link-checkout").attr("href", "./Checkout/Index/"+id);	
			}
		}
	});
}

function CheckOrderForInventory(){
	var idproduct =JSON.parse(localStorage.getItem('idproduct'));
	var idtable =JSON.parse(localStorage.getItem('idTable'));
	$.post("./Order/CheckOrderForInventory/",{idproduct:idproduct,idtable:idtable},function(data){	
		console.log(data);

	}) 
}


function GetOrder(){
	var total =0;
	var table =JSON.parse(localStorage.getItem('idTable'));
	$('#cart-item').html("");
	$.ajax({
		url: './Order/GetOrder/'+table,
		type: 'get',
		dataType : 'json',
		beforeSend: function (data) {

			$('#product-box').css("pointer-events", "none");
	
		},
		success: function(data){

			var namenormal;
			var namelong;
			$.each (data, function (key, item){

				if(item.name.length >10){
					namenormal='none';
					namelong='block';

				}else{
					namenormal='block';
					namelong='none';
				}

				total +=item.quanlity*item.price_discount;
				var data = `
				<div id="order" class="card-orders p-2 mb-2" style="height: 67px;width: 100%;border-radius:10px">
					<div class="mr-1 float-left" style="width: 50px;height: 50px;background: #ffffff">
						<img src="./public/images/product/`+item.image+`"  class="img-pro" title="`+item.name+`">
					</div>
					<div class="float-left">

						<div class="cl mb-1" style="width:110px;height: 22px;">
							<div style="display:`+namenormal+`!important;">
								<p class="mb-0 khmer" style="font-size:90%"> `+item.name+`</p>	
							</div>
							<div id="text_wrapper" style="display:`+namelong+`!important;">
								<p id="text_overflow" class="mb-0 khmer" style="font-size:90%">`+item.name+`</p>
							</div>
						</div>
						
						<div style="display: flex;">
							<div onclick="UpQuanlity(`+item.idproduct+`)" class="bg2 cl text-center cursor" style="width:20px;height: 20px;font-size: 70%;border-radius:100px;" title="Up">
								<i class="fa fa-plus mt-1" aria-hidden="true"></i>
							</div>
							<div id="product-quanlity`+item.idproduct+`" class="text-center cl" style="width: 20px;height: 20px;font-size:90%;font-weight:bold;">`+item.quanlity+`</div>
							<div class="bg2 cl text-center cursor" style="width: 20px;height:20px;font-size: 70%;border-radius:100px;" onclick="DowQuanlity(`+item.idproduct+`)" title="Down">
								<i class="fa fa-minus mt-1" aria-hidden="true"></i>
							</div>
						</div>
					</div>
					<div class="float-right" style="height: 50px;width:100px">
						<div class="float-right bg2 text-center mt-2 cursor" style="width: 30px;height:30px;border-radius:100px" onclick="DeleteOrder(`+item.idproduct+`)" title="Delete">
							<span class="cl " style="line-height: 30px"><i class="fa-regular fa-trash-can" aria-hidden="true"></i>
							</span>
						</div>
						<p class="float-right cl mr-1" style="font-size: 110%;line-height: 50px"><i class="fas fa-dollar-sign font-weight-normal"></i>`+(item.quanlity*item.price_discount).toFixed(2)+`</p>
					</div>
					<div style="clear: both;"></div>
				</div>
				`
				$('#cart-item').append(data);
				

			});	

			var discount = $('#discount-text').text();
			var fee1 = $('#VAT-text').text();
			var fee2 = $('#Service\\ Charge-text').text();
			total = parseFloat(total*(100 - discount)/100 + total*fee1/100 + total*fee2/100).toFixed(2);
			totalr= (total*4000).toLocaleString();

			localStorage.setItem("total", JSON.stringify(total));
			localStorage.setItem("totalr", JSON.stringify(totalr));
			localStorage.setItem("fee1", JSON.stringify(parseInt(fee1)));
			localStorage.setItem("fee2", JSON.stringify(parseInt(fee2)));
			localStorage.setItem("discount", JSON.stringify(parseInt(discount)));
			
			$('#total-text').text(total);
			$('#total-riel').text(totalr);
	
		},
		complete: function (data) {
			$('#product-box').css("pointer-events", "auto");
		},
			
	});
}

function UpQuanlity(idproduct){
	var idtable =JSON.parse(localStorage.getItem('idTable'));
	$.ajax({
		url: './Order/GetProductCheckStock/'+idproduct,
		type: 'post',
		dataType : 'json',
		success: function(data){
			$.each (data, function (key, item){
				if(data[0].stock <=0){
					$('#product'+idproduct).css('pointer-events','none');
					$('#out'+idproduct).show();
						alert("Add More Stock !");
				}else{
					$.post("./Order/AddOrder/",{idproduct:idproduct,idtable:idtable},function(data){
						CheckOrderForInventory();
						GetOrder();
						$('#out'+idproduct).hide();						
					})

				}	
			});


		
		}
	});


}
function DowQuanlity(idproduct){

	var checkQuanlity = $('#product-quanlity'+idproduct).text();

	$('#product'+idproduct).removeAttr('style');
	$('#out'+idproduct).hide();

	if(checkQuanlity>1){
		var idtable =JSON.parse(localStorage.getItem('idTable'));
		$.post("./Order/DowQuanlity/",{idproduct:idproduct,idtable:idtable},function(data){	 
			GetOrder();

		})
		$.post("./Order/CheckOrderInventoryWithDown/",{idproduct:idproduct},function(data){	 
			console.log(data);
		})
	}
	
}
function DeleteOrder(idproduct){

	$('#product'+idproduct).removeAttr('style');
	$('#out'+idproduct).hide();
	var idtable =JSON.parse(localStorage.getItem('idTable'));
	$.post("./Order/CheckOrderInventoryWithDelete/",{idproduct:idproduct,idtable:idtable},function(data){	
		console.log(data);
		$.post("./Order/DeleteOrder/",{idproduct:idproduct,idtable:idtable},function(data){	
			GetOrder();
			CheckOrder();
		})
	}) 


}
function ClearOrder(){
	var idtable =JSON.parse(localStorage.getItem('idTable'));
	var clickmenu =JSON.parse(localStorage.getItem('clickmenu'));

	$.post("./Order/CheckOrderInventoryWithClear/",{idtable:idtable},function(data){	
		console.log(data);
		$.post("./Order/ClearOrder/",{idtable:idtable},function(data){	
			console.log(data);
			GetOrder();
			getProduct(clickmenu);
		})
	}) 
}
function ClearGuest(){
	var idtable =JSON.parse(localStorage.getItem('idTable'));
	$.post("./Guest/ClearGuest/",{idtable:idtable},function(data){	
		GetGuest()
		GetOrder();
	})
}
function ClearAll(){
	var id =JSON.parse(localStorage.getItem('idTable'));
	if (confirm('Are you sure ?')) {	
		$("<i class='fas fa-spinner fa-spin ml-1'></i>")
		.appendTo('#clear-all')
		.delay(300)
		.queue(function() {
			ClearOrder();
			ClearGuest();
			CheckOrder();
			// CheckOrder ajax
			$.ajax({
				url: './Table/CheckOrder/'+id,
				type: 'get',
				success: function(data){
					if(data==1){
						$("#link-addorder").show();
						$("#link-checkout").hide();	
					}else if(data ==2){
						$("#link-checkout").show();	
						$("#link-addorder").hide();		
						$("#link-checkout").attr("href", "./Checkout/Index/"+id);	
					}
				}
			});
			GetGuest();		
			$(this).remove();
			
		});
        
    }

}



$(document).ready(function() {



	getTable();
	CheckTable();
			
	$('#save-button').on('click',function(){
		
			$('#side1').show();
			$('#side2').show();
			$('#side3').hide();
			$('#side4').hide();

			// getProduct(0);
			$('.item span').removeClass('bg3 cl');

			$("#guest-box").show();

			// GetOrder();
			CheckTable();
			getTable();
			CheckOrder();

			// // sidebar
			// $('.sidebar-1').addClass('closed');
			// $('.link_name').removeClass('hide');

			var get_toggle = localStorage.getItem("tgl-bar");
			if (get_toggle == 72) {
				$('.sidebar-1').removeClass("closed");
				$('.sidebar-2').removeClass("change");
				$('.link_name').addClass('hide');
				$('#logo1').hide();
				$('#logo2').show();
			} else{
				$('.sidebar-1').addClass("closed");
				$('.sidebar-2').addClass("change");
				$('.link_name').removeClass('hide');		
			}

	})
	$('#lgimg,#lgname').on('click', function() {
		window.location.href = "./Home";
	})


});






