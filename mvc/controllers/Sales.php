<?php


class Sales extends Controller{
	function SalesManage(){	
		if(isset($_SESSION["username"])){
			$GetModel= $this->model("tbl_theme");
			$GetTheme = $GetModel ->GetTheme();
			$this->view("master",["Page"=>"sales","GetTheme"=>$GetTheme]);
		}else{
			header("Location: ../Account/Login");
		}
	}

	function GetSale(){
		$start = $_POST["startfind"];
		$end = $_POST["endfind"];
		$limit = $_POST["limit"];
		$GetModel= $this->model("tbl_payment");
		$GetSale = $GetModel ->GetSale($start,$end,$limit);
		echo $GetSale;
	}
	function GetSaleByID(){
		$id = $_POST["id"];
		$GetModel= $this->model("tbl_payment");
		$GetSaleByID = $GetModel ->GetSaleByID($id);
		echo $GetSaleByID;
	}
	function GetInvoice(){
		$id = $_POST["idpayment"];
		$GetModel= $this->model("tbl_payment");
		$GetInvoice = $GetModel->GetInvoice($id);
	}
	function DeleteInvoice(){
		$id = $_POST["idpayment"];
		$GetModel= $this->model("tbl_payment");
		$DeleteInvoice = $GetModel->DeleteInvoice($id);
		echo $DeleteInvoice;
	}
}


?>