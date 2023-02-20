<?php

// http://localhost/live/Home/Show/1/2

class Guest extends Controller{

	function AddGuest(){
		$guest = $_POST["guest"];
		$idtable= $_POST["idtable"];
		$GetModel= $this->model("tbl_guest");
		$AddGuest = $GetModel ->AddGuest($guest,$idtable);
		echo $AddGuest;
	}
	function GetGuest($idtable){
		$GetModel= $this->model("tbl_guest");
		$GetGuest = $GetModel ->GetGuest($idtable);
		echo $GetGuest;
	}
	function ClearGuest(){
		$idtable = $_POST["idtable"];
		$GetModel= $this->model("tbl_guest");
		$ClearGuest = $GetModel ->ClearGuest($idtable);
	}

}
?>