<?php

// http://localhost/live/Home/Show/1/2

class Table extends Controller{

	function TablesManage(){
		$GetModel= $this->model("tbl_theme");
		$GetTheme = $GetModel ->GetTheme();
		if(isset($_SESSION["username"])){
			$GetModel = $this->model("tbl_table");
			$TablesManage = $GetModel->TablesManage();		
			$this->view("master",["Page"=>"table","TablesManage"=>$TablesManage,"GetTheme"=>$GetTheme]);
		}else{
			header("Location: ./Account/Login");
		}
		
	}
	function GetTable(){
		$GetModel= $this->model("tbl_table");
		$GetTable = $GetModel ->GetTable();
		echo $GetTable;
	}

	function CheckTable($idtable){
		$GetModel= $this->model("tbl_table");
		$CheckTable = $GetModel ->CheckTable($idtable);
		echo $CheckTable;
	}

	function CheckOrder($idtable){
		$GetModel= $this->model("tbl_table");
		$CheckOrder = $GetModel ->CheckOrder($idtable);
		echo $CheckOrder;
	}

	function ResetTable($idtable){
		$GetModel= $this->model("tbl_table");
		$CheckTable = $GetModel ->ResetTable($idtable);
		echo "ok";
	}

	function EditTable(){
		$id = $_POST["idTable"];
		$number = $_POST["numberTable"];
		$type = $_POST["typeTable"];
		$GetModel= $this->model("tbl_table");
		$EditTable = $GetModel ->EditTable($id,$number,$type);
		if($EditTable==true){
			echo 1;
		}else{
			echo 2;
		}

	}

	function DeleteTable(){
		$id= $_POST['id'];
		$GetModel= $this->model("tbl_table");
		$DeleteTable = $GetModel ->DeleteTable($id);
		header( "Location: ../Table/TablesManage" );
	}

	function AddTable(){
		$number = $_POST["numbertable"];
		$type = $_POST["typetable"];
		$GetModel= $this->model("tbl_table");
		$AddTable = $GetModel ->AddTable($number,$type);
		if($AddTable==true){
			echo 1;
		}else{
			echo 2;
		}


	}

}
