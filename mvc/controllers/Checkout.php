<?php

class Checkout extends Controller{
	function Index($idtable){
		if(isset($_SESSION["username"])){
			$GetModel= $this->model("tbl_theme");
			$GetTheme = $GetModel ->GetTheme();
			$GetOrderCheckoutModel= $this->model("tbl_order");
			$GetOrderCheckout = $GetOrderCheckoutModel ->GetOrderCheckout($idtable);
			$GetOrderDetailModel= $this->model("tbl_order");
			$GetOrderDetail = $GetOrderDetailModel ->GetOrderDetail($idtable);

			$GetFee= $this->model("tbl_fee");
			$GetFee = $GetFee ->GetFee();
			$GetDiscount= $this->model("tbl_discount");
			$GetDiscount = $GetDiscount ->GetDiscount();
			$this->view("master",["Page"=>"checkout","fee"=>$GetFee,"discount"=>$GetDiscount,"GetOrderCheckout"=>$GetOrderCheckout,"GetOrderDetail"=>$GetOrderDetail,"GetTheme"=>$GetTheme]);
		}else{
			header("Location: ../Account/Login");
		}

	}

	function AddPayment(){
		$content = $_POST["content"];
		$invoice = $_POST["invoice"];
		$accountname =  $_POST["accountname"];
		$opened = $_POST["opened"];
		$guestnumber= $_POST["guestnumber"];

		$GetModel= $this->model("tbl_payment");
		$AddPayment = $GetModel->AddPayment($content,$invoice,$accountname,$opened,$guestnumber);	
	}
}
?>