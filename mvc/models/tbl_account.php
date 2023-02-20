  
<?php
class tbl_account extends DB
{

	public function CheckLogin($username, $passwordHash)
	{
		$qr = "SELECT * FROM tbl_account WHERE tbl_account.username='$username' AND tbl_account.password='$passwordHash'";
		$rows = mysqli_query($this->con, $qr);
		$rs = mysqli_fetch_assoc($rows);
		$kq = 1;
		if (mysqli_num_rows($rows) > 0) {
			$_SESSION["id"] = $rs['id'];
			$_SESSION["namedisplay"] = $rs['namedisplay'];
			$_SESSION["role"] = $rs['role'];
			$_SESSION["profile"] = $rs['profile'];
			$kq = 2;
		}
		return $kq;
	}
	// test--------------------
	public function AccountsManage()
	{
		$qr = "SELECT * FROM tbl_account";
		return mysqli_query($this->con, $qr);
	}

	public function AddCheckDuplicate($namedisplay)
	{
		$namedisplay = $this->con->real_escape_string($namedisplay);
		$qr = $this->con->query("SELECT namedisplay FROM tbl_account WHERE namedisplay='$namedisplay'");
		$count = 0;
		if ($qr !== false && $qr->num_rows > 0) {
			$count = 1;
		} else {
			$count = 2;
		}
		return $count;
	}


	public function AddAccount($namedisplay, $username, $password, $role, $phone, $gender, $profile)
	{
		$qr = "INSERT INTO tbl_account (namedisplay,username,password,role,phone,gender,profile)
		VALUES ('$namedisplay','$username','$password','$role','$phone','$gender','$profile')";
		return mysqli_query($this->con, $qr);
	}

	function GetEditAccount($id)
	{
		$qr = "SELECT * FROM tbl_account WHERE id= $id ";
		return mysqli_query($this->con, $qr);
	}

	public function EdCheckDuplicate($namedisplay, $id)
	{
		$namedisplay = $this->con->real_escape_string($namedisplay);
		$qr = $this->con->query("SELECT namedisplay FROM tbl_account WHERE namedisplay='$namedisplay' AND id!=$id");
		$count = 0;
		if ($qr !== false && $qr->num_rows > 0) {
			$count = 1;
		} else {
			$count = 2;
		}
		return $count;
	}

	public function SetEditAccount($id, $namedisplay, $username, $password, $role, $phone, $gender, $image)
	{
		if ($image == 1) {
			$qr = "UPDATE tbl_account SET 
					tbl_account.namedisplay='$namedisplay',
					tbl_account.username='$username', 
					tbl_account.role='$role', 
					tbl_account.phone= '$phone',
					tbl_account.gender='$gender' 
						WHERE tbl_account.id='$id'";
		} else if ($image == 2) {
			$qr = "UPDATE tbl_account SET 
					tbl_account.namedisplay='$namedisplay',
					tbl_account.username='$username',
					tbl_account.password='$password',
					tbl_account.role='$role', 
					tbl_account.phone= '$phone',
					tbl_account.gender='$gender' 
						WHERE tbl_account.id='$id'";
		} else if ($password == 3) {
			$qr = "UPDATE tbl_account SET 
						tbl_account.namedisplay='$namedisplay',
						tbl_account.username='$username',
						tbl_account.role='$role', 
						tbl_account.phone= '$phone',
						tbl_account.gender='$gender',
						tbl_account.profile='$image' 
							WHERE tbl_account.id='$id'";
		} else {
			$qr = "UPDATE tbl_account SET 
					tbl_account.namedisplay='$namedisplay',
					tbl_account.username='$username',
					tbl_account.password='$password',
					tbl_account.role='$role', 
					tbl_account.phone= '$phone',
					tbl_account.gender='$gender',
					tbl_account.profile='$image' 
						WHERE tbl_account.id='$id'";
		}

		return mysqli_query($this->con, $qr);
	}
	public function DeleteAccount($id, $namedisplay)
	{
		if ($id == 1) {
			$qr1 = "SELECT * FROM `tbl_account` WHERE 1";
		} else {
			$qr = "DELETE FROM tbl_account WHERE id=$id AND namedisplay='$namedisplay'";
		}

		return mysqli_query($this->con, $qr);
	}
}



?>