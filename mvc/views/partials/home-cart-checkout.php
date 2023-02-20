<div style="width: 100%;">

	<p id="guest-text" class="cl float-left mb-1">Guest</p>

	<div id="guest-box" onclick="EnterGuest()" class="float-right text-center cl" style="font-size: 100%">
		<i id="add-guest" class="fa fa-plus-circle" aria-hidden="true" style="cursor:pointer;"></i>
		<i id="submit-guest" class="fa fa-check-circle " aria-hidden="true" style="display:none;cursor:pointer;"></i>
		<i id="remove-input" class="fa fa-times-circle" aria-hidden="true" style="display: none;cursor:pointer;"></i>
	</div>

	<input id="input-guest" type="number" name="" class="float-right mr-1 bgh" placeholder="" style="border:0;outline:none;display: none;">

	<div id="guest-ok" class="float-right text-center cl">
		<i id="icon-guest" class="fa fa-user mb-0 mr-1" style="font-size:100%"></i>
	</div>

	<div id="guest-db">
	</div>
	<div style="clear: both;"></div>

	<?php
	while ($row = mysqli_fetch_array($data["discount"])) {
		echo
		'
		<div style="font-size: 80%">
 
			<p class="cl float-left mb-1">' . $row["name"] . '</p>
			<p id="discount-text" class="cl float-right mb-1">' . $row["number"] . '</p>
			<p class="cl float-right mb-1">%</p>
			<div style="clear: both;"></div>
		</div>
		';
	}
	?>

	<?php
	while ($row = mysqli_fetch_array($data["fee"])) {
		echo '
		<div style="font-size: 80%"> 
			<p class="cl float-left mb-1">' . $row["name"] . '</p>
			<p id="' . $row["name"] . '-text" class="cl float-right mb-1">' . $row["number"] . '</p>
			<p class="cl float-right mb-1">%</p>
			<div style="clear: both;"></div>
		</div>
		';
	}
	?>	
	
	<p class="cl float-left mb-0" style="font-size: 110%">Grand Total (<i class="fas fa-dollar-sign font-weight-normal"></i>)</p>
	<p id="total-text" class="cl float-right mb-1 font-weight-bold" style="font-size: 110%" step="any"></p>	
	<div style="clear: both;"></div>

	<p class="cl float-left mb-1" style="font-size: 110%">Grand Total (R)</p>
	<p id="total-riel" class="cl float-right mb-1 font-weight-bold" style="font-size: 110%" step="any"></p>
	<div style="clear: both;"></div>


	<a>
		<div id="clear-all" class="btn btn-danger btn-sm float-left mb-2" style="width: 38%; border-radius: 10px;" onclick="ClearAll()">
			Clear
		</div>
	</a>

	<a>
		<div id="save-button" class="btn btn-success btn-sm float-right mb-2" style="width: 58%; border-radius: 10px;">
			Save
		</div>
	</a>

	<a id="link-checkout" style="display:none;">
		<div class="btn btn-primary" style="width: 100%;border-radius: 10px;">Checkouts</div>
	</a>
	<a id="link-addorder">
		<div class="btn btn-primary" style="width: 100%;border-radius: 10px;">Please Order</div>
	</a>

</div>

<script type="text/javascript">
	$("#link-addorder").click(function() {
		alert("Please Create Order !");
	})
</script>