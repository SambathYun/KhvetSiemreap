<?php include("./mvc/views/partials/theme.php"); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<div class="container-fluid bgl scroll_hide" style="height: 100vh;padding: 50px;overflow:auto">
	<div class="row mt-1">

		<div class="bgh" style="width: 450px;margin: auto;">
			<div class="col-12 pb-3 ">

				<p class="mt-3" style="font-weight: bold;font-size:110%;color:#003e49;">
					<img src="../public/images/logo/khvetsiemreap2.jpg" width="60px" height="60px;" style="object-fit: cover;">
					POINT OF SALE
				</p>

				<div class="form-floating mb-3">
					<input id="username" type="text" name="username" class="form-control" placeholder="Username">
					<label for="form-floating">Username</label>
				</div>
				<div class="form-floating mb-3">
					<input id="password" type="password" name="password" class="form-control" placeholder="Password">
					<label for="floatingPassword">Password</label>
				</div>

				<div id="check-login-status" class="text-center text-danger mb-3" role="alert" style="font-size: 80%;display: none;">
					<p id="login-eror-msg" class="text-center mb-0"></p>
				</div>

				<button type="submit" id="enter-key" class="btn btn-primary  mb-3" style="width: 100%;font-size: 120%;" onclick="Login()">Log In</button>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
	function Login() {
		username = $("#username").val();
		password = $("#password").val();
		if (username == '' && password == '') {
			$("#check-login-status").show();
			$("#login-eror-msg").text("Please input Username & Password");

		} else if (username == '') {
			$("#check-login-status").show();
			$("#login-eror-msg").text("Please input Username");
		} else if (password == '') {

			$("#check-login-status").show();
			$("#login-eror-msg").text("Please input Passoword");
		} else {
			var data = "username=" + username + "&password=" + password;
			$.post("../Account/CheckLogin/", {
				username: username,
				password: password
			}, function(data) {
				console.log(data);
				if (data == 1) {
					window.location.href = "../Home";
				} else {
					$("#check-login-status").show();
					$("#login-eror-msg").text("The Username and Password is Incorrect");
					$("input").css("border", "1px solid red");
				}
			})

		}
	}

	function GetSoldOut() {
		$.ajax({
			url: '../Order/AddInventory/',
			type: 'post',
			success: function(data) {}
		});
	}

	$(document).ready(function() {
		$('head > title').text('KhvetSiemreap | Login');

		localStorage.removeItem("tgl-bar");

		GetSoldOut();


	});

	$('#username,#password').keydown(function(e) {
		if (e.keyCode == 13) {
			$('#enter-key').click();
		}
	});
</script>