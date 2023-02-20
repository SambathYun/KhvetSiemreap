<?php 
class Inventory extends Controller
{
	function InventorysManage()
	{
		$GetModel = $this->model("tbl_theme");
		$GetTheme = $GetModel->GetTheme();
		if (isset($_SESSION["username"])) {

			$this->view("master", ["Page" => "inventory", "GetTheme" => $GetTheme]);
		} else {
			header("Location: ./Account/Login");
		}
	}
    function GetInventory()
	{
		$selectdate = $_POST["selectdate"];
		$GetModel = $this->model("tbl_inventory");
		$GetInventory = $GetModel-> GetInventory($selectdate);
		echo $GetInventory;
	}
}


?>