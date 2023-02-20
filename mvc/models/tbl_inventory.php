<?php 

class tbl_inventory extends DB
{
	public function GetInventory($selectdate)
	{
		$qr = "SELECT tbl_inventory.*,
				tbl_inventory.nameproduct AS name, 
					(tbl_inventory.stock+tbl_inventory.stock_in)-tbl_inventory.sold_out AS balance 
						FROM `tbl_inventory` 
							WHERE date(tbl_inventory.created_at)=date('$selectdate')  
								GROUP BY tbl_inventory.nameproduct ORDER BY tbl_inventory.id ASC";

		$result = mysqli_query($this->con, $qr);
		$InventoryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$InventoryArr[] = $row;
		}
		echo json_encode($InventoryArr);
	}
}



?>