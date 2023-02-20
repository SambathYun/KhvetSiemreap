<?php

class Order extends Controller{

	function GetOrder($idtable){
		$GetModel= $this->model("tbl_order");
		$GetOrder = $GetModel ->GetOrder($idtable);
		echo $GetOrder;
	}
	function AddOrder(){
		//post ban pi .post() home.js
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];
		$idadmin = $_POST["idadmin"];
		
		$GetModel= $this->model("tbl_order");
		$CheckTableProduct = $GetModel->CheckTableProduct($idproduct,$idtable);

		if($CheckTableProduct==1){
			$UpQuanlity= $this->model("tbl_order");
			$UpQuanlity->UpQuanlity($idproduct,$idtable);

		}else{
			$AddOrder= $this->model("tbl_order");
			$AddOrder->AddOrder($idproduct,$idtable,1,$idadmin);
		}	
	}

	function DowQuanlity(){
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];
		$DowQuanlity= $this->model("tbl_order");
		$DowQuanlity->DowQuanlity($idproduct,$idtable);
		
	}

	function DeleteOrder(){
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];
		$GetModel= $this->model("tbl_order");
		$DeleteOrder = $GetModel ->DeleteOrder($idproduct,$idtable);

		$GetModel= $this->model("tbl_order");
		$CheckOrderInventoryWithDown = $GetModel -> CheckOrderInventoryWithDown($idproduct);

	}

	function ClearOrder(){
		$idtable = $_POST["idtable"];
		$GetModel= $this->model("tbl_order");
		$ClearOrder = $GetModel ->ClearOrder($idtable);


	}
	function GetOrderToReport(){
		$idtable = $_POST["idtable"];
		$discount=$_POST["discount"];
		$fee1=$_POST["fee1"];
		$fee2=$_POST["fee2"];
		$GetModel= $this->model("tbl_order");
		$GetOrderToReport = $GetModel ->GetOrderToReport($idtable,$discount,$fee1,$fee2);
	}

	// 
	function AddInventory(){

		$GetModel= $this->model("tbl_order");
		$CheckTableInventory = $GetModel->CheckTableInventory();

		if($CheckTableInventory==1){
			$UpInventory= $this->model("tbl_order");
			$UpInventory-> UpInventory();
		}else{
			$AddInventory= $this->model("tbl_order");
			$AddInventory->AddInventory();

		}	
	}
	function CheckOrderForInventory(){
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];
		$GetModel= $this->model("tbl_order");
		$CheckOrderForInventory = $GetModel ->CheckOrderForInventory($idproduct,$idtable);
		$CheckOrderForInventory;
	}

	function CheckOrderInventoryWithDelete(){
		$idproduct = $_POST["idproduct"];
		$idtable = $_POST["idtable"];

		$GetModel= $this->model("tbl_order");
		$CheckOrderInventoryWithDelete = $GetModel ->CheckOrderInventoryWithDelete($idproduct,$idtable);
		$CheckOrderInventoryWithDelete;
	}

	function CheckOrderInventoryWithClear(){
		$idtable = $_POST["idtable"];

		$GetModel= $this->model("tbl_order");
		$CheckOrderInventoryWithClear = $GetModel ->CheckOrderInventoryWithClear($idtable);
		$CheckOrderInventoryWithClear;
	}

	function GetProductCheckStock($idproduct){
		$GetModel= $this->model("tbl_order");
		$GetProductCheckStock = $GetModel ->GetProductCheckStock($idproduct);
		echo $GetProductCheckStock;
	}

	function CheckOrderInventoryWithDown(){
		$idproduct = $_POST["idproduct"];

		$GetModel= $this->model("tbl_order");
		$CheckOrderInventoryWithDown = $GetModel -> CheckOrderInventoryWithDown($idproduct);

	}

}
?>