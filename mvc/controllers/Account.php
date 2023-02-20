<?php

// http://localhost/live/Home/Show/1/2

class Account extends Controller
{

	function Login()
	{
		$GetModel = $this->model("tbl_theme");
		$GetTheme = $GetModel->GetTheme();
		if (isset($_SESSION["username"])) {
			header("Location: ../Home");
		} else {
			$this->view("master", ["Page" => "login", "GetTheme" => $GetTheme]);
		}
	}

	function CheckLogin()
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
		$passwordHash = md5($password);
		$GetModel = $this->model("tbl_account");
		$CheckLogin = $GetModel->CheckLogin($username, $passwordHash);
		if ($CheckLogin == 2) {
			$_SESSION["username"] = $username;
			echo 1;
		} else {
			echo 2;
		}
	}
	function Logout()
	{
		if (isset($_SESSION["username"])) {
			unset($_SESSION["username"]);
			header("Location: ../Account/Login");
		}
	}
	// test--------------------
	function AccountsManage()
	{
		if (isset($_SESSION["username"])) {
			$GetModel = $this->model("tbl_theme");
			$GetTheme = $GetModel->GetTheme();
			$GetModel = $this->model("tbl_account");
			$AccountsManage = $GetModel->AccountsManage();
			$this->view("master", ["Page" => "account", "AccountsManage" => $AccountsManage, "GetTheme" => $GetTheme]);
		} else {
			header("Location: ../Account/Login");
		}
	}

	function GetAddAccount()
	{
		if (isset($_SESSION["username"])) {
			$GetModel = $this->model("tbl_theme");
			$GetTheme = $GetModel->GetTheme();
			$this->view("master", ["Page" => "add-account", "GetTheme" => $GetTheme]);
		} else {
			header("Location: ../Account/Login");
		}
	}
	function SetAddAccount()
	{
		$GetModel = $this->model("tbl_theme");
		$GetTheme = $GetModel->GetTheme();

		$namedisplay = trim($_POST["namedisplay"]);
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		$role = $_POST["role"];
		$phone = $_POST["phone"];
		$gender = $_POST["gender"];
		$image = '';
		$tmpFilePath = $_FILES['upload']['tmp_name'];

		$GetModel2 = $this->model("tbl_account");
		$AddCheckDuplicate = $GetModel2->AddCheckDuplicate($namedisplay);

		if ($namedisplay == null) {
			$this->view("master", ["Page" => "add-account", "addaccount-alert" => "Product namedisplay cannot be empty.", "GetTheme" => $GetTheme]);
		} else if ($username == null) {
			$this->view("master", ["Page" => "add-account", "addaccount-alert" => "Product username cannot be empty.", "GetTheme" => $GetTheme]);
		} else if ($password == null) {
			$this->view("master", ["Page" => "add-account", "addaccount-alert" => "Product password cannot be empty.", "GetTheme" => $GetTheme]);
		}else if ($phone == null) {
			$this->view("master", ["Page" => "add-account", "addaccount-alert" => "Product phone cannot be empty.", "GetTheme" => $GetTheme]);
		}else if ($tmpFilePath == null) {
			$this->view("master", ["Page" => "add-account", "addaccount-alert" => "Product image cannot be empty.", "GetTheme" => $GetTheme]);
		} else {
			if ($AddCheckDuplicate == 1) {
				$this->view("master", ["Page" => "add-account", "addaccount-alert" => "Duplicate Account Namedisplay.", "GetTheme" => $GetTheme]);
			} else {
				$image .= date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
				if ($tmpFilePath != "") {
					$newFilePath = "./public/images/profile/" . date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
					if (move_uploaded_file($tmpFilePath, $newFilePath)) {
					}
				}
				$GetModel = $this->model("tbl_account");
				$AddAccount = $GetModel->AddAccount($namedisplay, $username, $password, $role, $phone, $gender, $image);
				header("Location: ../Account/AccountsManage");
			}
		}
	}
	function GetEditAccount($id)
	{
		if (isset($_SESSION["username"])) {
			$GetModel = $this->model("tbl_theme");
			$GetTheme = $GetModel->GetTheme();
			$GetModel = $this->model("tbl_account");
			$GetEditAccount = $GetModel->GetEditAccount($id);
			$this->view("master", ["Page" => "edit-account", "account" => $GetEditAccount, "GetTheme" => $GetTheme]);
		} else {
			header("Location: ../Account/Login");
		}
	}

	function SetEditAccount()
	{

		$id = $_POST["idaccount"];
		$namedisplay = trim($_POST["namedisplay"]);
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		$role = $_POST["role"];
		$phone = $_POST["phone"];
		$gender = $_POST["gender"];
		$image = '';
		$tmpFilePath = $_FILES['upload']['tmp_name'];

		$GetModel2 = $this->model("tbl_account");
		$EdCheckDuplicate = $GetModel2->EdCheckDuplicate($namedisplay, $id);

		if ($namedisplay == null) {
			echo ("<script type='text/javascript'>
						window.location.href='../Account/GetEditAccount/$id';
						localStorage.setItem('eda-check', 'Account namedisplay cannot be empty.');
					</script>");
		} else if ($username == null) {
			echo ("<script type='text/javascript'>
						window.location.href='../Account/GetEditAccount/$id';
						localStorage.setItem('eda-check', 'Account username cannot be empty.');
					</script>");
		} else if ($phone == null) {
			echo ("<script type='text/javascript'>
						window.location.href='../Account/GetEditAccount/$id';
						localStorage.setItem('eda-check', 'Account phone cannot be empty.');
					</script>");
		} else if ($password == 'd41d8cd98f00b204e9800998ecf8427e' && $tmpFilePath == null) {

			if ($EdCheckDuplicate == 1) {
				echo ("<script type='text/javascript'>
							window.location.href='../Account/GetEditAccount/$id';
							localStorage.setItem('eda-check', 'Duplicate Account NameDisplay.');
						</script>");
			} else {

				$image = 1;
				$GetModel = $this->model("tbl_account");
				$EditAccount = $GetModel->SetEditAccount($id, $namedisplay, $username, $password, $role, $phone, $gender, $image);
				header("Location: ../Account/AccountsManage");
			}
		} else if ($password != 'd41d8cd98f00b204e9800998ecf8427e' && $tmpFilePath == null) {

			if ($EdCheckDuplicate == 1) {
				echo ("<script type='text/javascript'>
						window.location.href='../Account/GetEditAccount/$id';
						localStorage.setItem('eda-check', 'Duplicate Account NameDisplay.');
					</script>");
			} else {

				$image = 2;
				$GetModel = $this->model("tbl_account");
				$EditAccount = $GetModel->SetEditAccount($id, $namedisplay, $username, $password, $role, $phone, $gender, $image);
				header("Location: ../Account/AccountsManage");
			}
		} else if ($password == 'd41d8cd98f00b204e9800998ecf8427e' && $tmpFilePath != null) {

			if ($EdCheckDuplicate == 1) {
				echo ("<script type='text/javascript'>
							window.location.href='../Account/GetEditAccount/$id';
							localStorage.setItem('eda-check', 'Duplicate Account NameDisplay.');
						</script>");
			} else {

				$password = 3;
				$image .= date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
				if ($tmpFilePath != "") {
					$newFilePath = "./public/images/profile/" . date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
					if (move_uploaded_file($tmpFilePath, $newFilePath)) {
					}
				}
				$GetModel = $this->model("tbl_account");
				$EditAccount = $GetModel->SetEditAccount($id, $namedisplay, $username, $password, $role, $phone, $gender, $image);
				header("Location: ../Account/AccountsManage");
			}
		} else {
			$image .= date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
			if ($tmpFilePath != "") {
				$newFilePath = "./public/images/profile/" . date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
				if (move_uploaded_file($tmpFilePath, $newFilePath)) {
				}
			}
			$GetModel = $this->model("tbl_account");
			$EditAccount = $GetModel->SetEditAccount($id, $namedisplay, $username, $password, $role, $phone, $gender, $image);
			header("Location: ../Account/AccountsManage");
		}
	}
	function DeleteAccount()
	{
		$id = $_POST['id'];
		$namedisplay = $_POST['namedisplay'];
		$GetModel = $this->model("tbl_account");
		$DeleteAccount = $GetModel->DeleteAccount($id, $namedisplay);
		header("Location: ../../Account/AccountsManage");
	}
}
