<?php

class Setting extends Controller{
	function Index(){

		if(isset($_SESSION["username"])){
			$GetModel= $this->model("tbl_theme");
			$GetTheme = $GetModel ->GetTheme();

			$GetModel3= $this->model("tbl_fee");
			$GetFee = $GetModel3 ->GetFee();

			$GetModel4= $this->model("tbl_discount");
			$GetDiscount = $GetModel4 ->GetDiscount();

			$this->view("master",["Page"=>"setting","GetTheme"=>$GetTheme,"GetFee"=>$GetFee,"GetDiscount"=>$GetDiscount,]);
		}else{
			header("Location: ../Account/Login");
		}
		
	}

	function ChangeColor(){
		$color1 = $_POST["color1"];
		$color2 = $_POST["color2"];
		$color3 = $_POST["color3"];
		$color4 = $_POST["color4"];
		$GetModel= $this->model("tbl_theme");
		$ChangeColor = $GetModel ->ChangeColor($color1,$color2,$color3,$color4);
		header( "Location: ../Home" );
	}


	function EditFee(){
		$id = $_POST["idFee"];
		$name = $_POST["nameFee"];
		$price = $_POST["priceFee"];

		$GetModel= $this->model("tbl_fee");
		$EditFee = $GetModel ->EditFee($id,$name,$price);
		header( "Location: ../Setting/Index" );

	}

	function EditDiscount(){
		$id = $_POST["idDiscount"];
		$price = $_POST["priceDiscount"];
		$GetModel= $this->model("tbl_discount");
		$EditDiscount = $GetModel ->EditDiscount($id,$price);
		header( "Location: ../Setting/Index" );

	}

	

	
}
?>