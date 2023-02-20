<?php
class tbl_guest extends DB{

	public function AddGuest($guest,$idtable){
		$qr3 = "INSERT INTO `tbl_guest`(`id`, `guest`, `idtable`, `created_at`)   
				VALUES (null,'$guest','$idtable',NOW())";
		mysqli_query($this->con, $qr3);
	}
	public function ClearGuest($idtable){
		$qr ="DELETE FROM `tbl_guest` WHERE tbl_guest.idtable='$idtable'";
		mysqli_query($this->con, $qr);
	}

	public function GetGuest($idtable){
		$qr = "SELECT * FROM tbl_guest WHERE tbl_guest.idtable='$idtable' ORDER BY tbl_guest.id DESC Limit 1";
		$result = mysqli_query($this->con, $qr);
		$getguest = array();
		while ( $row = mysqli_fetch_assoc($result) ) {
			$getguest[] = $row;
		}
		echo json_encode($getguest);
	}
	
}
?>