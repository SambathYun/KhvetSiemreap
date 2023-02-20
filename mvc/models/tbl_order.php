<?php
class tbl_order extends DB
{

	public function AddOrder($product, $table, $quanlity, $idadmin)
	{
		$qr = "INSERT INTO tbl_order(idproduct,idtable,idadmin,quanlity,created_at)
		VALUES ('$product', '$table','$idadmin','$quanlity',NOW())";
		return mysqli_query($this->con, $qr);
	}


	public function GetOrder($idtable)
	{
		$qr = "SELECT tbl_product.stock,tbl_product.name,tbl_product.image, ROUND(tbl_product.price*(100-tbl_product.discount)/100,2) as price_discount ,tbl_order.quanlity,tbl_order.idproduct
			FROM tbl_order,tbl_product,tbl_table WHERE tbl_order.idproduct = tbl_product.id 
			AND tbl_order.idtable = tbl_table.id and tbl_order.idtable='$idtable' ORDER BY tbl_order.id ASC";
		$result = mysqli_query($this->con, $qr);
		$OrderArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$OrderArr[] = $row;
		}
		echo json_encode($OrderArr);
	}


	public function CheckTableProduct($idproduct, $idtable)
	{
		$qr = "SELECT * FROM tbl_order WHERE tbl_order.idproduct = '$idproduct' AND tbl_order.idtable='$idtable'";
		$rows = mysqli_query($this->con, $qr);
		$count = 0;
		if (mysqli_num_rows($rows) > 0) {
			$count = 1;
		} else {
			$count = 2;
		}
		return $count;
	}

	public function UpQuanlity($idproduct, $idtable)
	{
		$qr = "UPDATE tbl_order SET tbl_order.quanlity=tbl_order.quanlity+1 WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable='$idtable'";
		return mysqli_query($this->con, $qr);
	}

	public function DowQuanlity($idproduct, $idtable)
	{
		$qr = "UPDATE tbl_order SET tbl_order.quanlity=tbl_order.quanlity-1 WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable='$idtable'";
		return mysqli_query($this->con, $qr);
	}

	public function DeleteOrder($idproduct, $idtable)
	{
		$qr = "DELETE FROM tbl_order WHERE tbl_order.idtable='$idtable' AND tbl_order.idproduct='$idproduct'";
		return mysqli_query($this->con, $qr);
	}

	public function GetOrderCheckout($idtable)
	{
		$qr = "SELECT tbl_product.*,
				ROUND(tbl_product.price,2) as price1,
				ROUND(tbl_product.price*tbl_order.quanlity,2) as price_normal,
				ROUND(tbl_product.price*(100-tbl_product.discount)/100,2)*ROUND(tbl_order.quanlity,2) as price_discount,
				tbl_order.quanlity,tbl_order.idproduct 
					FROM tbl_order,tbl_product,tbl_table 
						WHERE tbl_order.idproduct = tbl_product.id AND tbl_order.idtable = tbl_table.id and tbl_order.idtable='$idtable' ORDER BY tbl_order.id ASC";
		return mysqli_query($this->con, $qr);
	}
	public function GetOrderDetail($idtable)
	{
		$qr = "SELECT DATE_FORMAT( tbl_order.created_at,'%a, %b %e, %Y %h:%i %p') as opened, 
				tbl_order.created_at, tbl_account.namedisplay,tbl_order.idadmin, 
				(SELECT MAX(tbl_payment.id) FROM tbl_payment)+1 as payment_id
		 		FROM tbl_order,tbl_account,tbl_payment
		WHERE tbl_order.idtable='$idtable' AND tbl_order.idadmin=tbl_account.id  
		ORDER BY tbl_order.id ASC LIMIT 1";
		return mysqli_query($this->con, $qr);
	}
	public function GetOrderToReport($idtable, $discount, $fee1, $fee2)
	{
		$qr = "INSERT INTO tbl_report (payment_id,product_id,product_name,product_type,product_price,product_cost,order_qty,order_created)
			SELECT (SELECT MAX(tbl_payment.id) FROM tbl_payment),
					tbl_product.id,tbl_product.name,
					tbl_product.type,
					ROUND((tbl_product.price*(100-tbl_product.discount)/100)*(100-$discount)/100 
						+(tbl_product.price*(100-tbl_product.discount)/100)*$fee1/100
						+(tbl_product.price*(100-tbl_product.discount)/100)*$fee2/100,2) as price_discount,
					ROUND(tbl_product.cost,2),tbl_order.quanlity,tbl_order.created_at 
			FROM tbl_order,tbl_product,tbl_table
			WHERE tbl_order.idproduct = tbl_product.id AND tbl_order.idtable = tbl_table.id and tbl_order.idtable='$idtable' ";
		return mysqli_query($this->con, $qr);
	}

	public function ClearOrder($idtable)
	{
		$qr = "DELETE FROM tbl_order WHERE tbl_order.idtable='$idtable'";
		return mysqli_query($this->con, $qr);
	}

	public function CheckTableInventory()
	{
		$qr = "SELECT * FROM tbl_inventory WHERE date(tbl_inventory.created_at)= CURDATE()";
		$rows = mysqli_query($this->con, $qr);
		$count = 0;
		if (mysqli_num_rows($rows) > 0) {
			$count = 1;
		} else {
			$count = 2;
		}
		return $count;
	}

	public function AddInventory()
	{
		$qr = "INSERT INTO `tbl_inventory`(`idproduct`,`nameproduct`,`typeproduct`,`stock`)
					SELECT tbl_product.id,tbl_product.name,tbl_product.type,tbl_product.stock FROM tbl_product";
		return mysqli_query($this->con, $qr);
	}
	public function UpInventory()
	{
		$qr = "UPDATE tbl_inventory
			SET tbl_inventory.sold_out=(SELECT SUM(tbl_report.order_qty)
           FROM tbl_report WHERE tbl_report.product_id=tbl_inventory.idproduct AND date(tbl_report.order_created)=date(tbl_inventory.created_at) GROUP BY tbl_report.product_id)";
		return mysqli_query($this->con, $qr);
	}

	public function CheckOrderForInventory($idproduct, $idtable)
	{

		$qr_report = "SELECT quanlity FROM tbl_order WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable!='$idtable'";
		$rs = $this->con->query($qr_report);

		if ($rs !== false && $rs->num_rows == 0) {
			$qr1 = "UPDATE tbl_product,tbl_inventory 
			SET tbl_product.stock=((tbl_inventory.stock+tbl_inventory.stock_in)-tbl_inventory.sold_out)
								-(SELECT quanlity FROM tbl_order WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable='$idtable' ) 
								WHERE  tbl_product.id=$idproduct AND tbl_inventory.idproduct=$idproduct AND DATE(tbl_inventory.created_at)=CURDATE()";
		} else {
			$qr1 = "UPDATE tbl_product,tbl_inventory 
			SET tbl_product.stock=((tbl_inventory.stock+tbl_inventory.stock_in)-tbl_inventory.sold_out)
								-(SELECT SUM(quanlity) FROM tbl_order WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable!='$idtable') 
								-(SELECT quanlity FROM tbl_order WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable='$idtable' ) 
								WHERE  tbl_product.id=$idproduct AND tbl_inventory.idproduct=$idproduct AND DATE(tbl_inventory.created_at)=CURDATE()";
		}
		return mysqli_query($this->con, $qr1);
	}

	public function CheckOrderInventoryWithDelete($idproduct, $idtable)
	{
		$qr1 = "UPDATE tbl_product,tbl_order
					SET tbl_product.stock=(tbl_product.stock-1)+(SELECT quanlity FROM tbl_order WHERE tbl_order.idproduct='$idproduct' AND tbl_order.idtable='$idtable' ) WHERE tbl_product.id='$idproduct'";
		return mysqli_query($this->con, $qr1);
	}

	public function CheckOrderInventoryWithClear($idtable)
	{
		$qr1 = "UPDATE tbl_product,tbl_order 
					SET tbl_product.stock= tbl_product.stock+(SELECT quanlity FROM tbl_order 
					WHERE tbl_order.idproduct=tbl_product.id AND tbl_order.idtable='$idtable') 
					WHERE tbl_order.idproduct=tbl_product.id AND tbl_order.idtable='$idtable'";
		return mysqli_query($this->con, $qr1);
	}

	public function CheckOrderInventoryWithDown($idproduct)
	{

		$qr2 = "UPDATE tbl_product SET tbl_product.stock=tbl_product.stock+1 WHERE  tbl_product.id='$idproduct'";
		return mysqli_query($this->con, $qr2);
	}

	public function GetProductCheckStock($idproduct)
	{

		$qr = "SELECT stock FROM tbl_product WHERE id='$idproduct'";
		$result = mysqli_query($this->con, $qr);
		$ProductArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ProductArr[] = $row;
		}
		echo json_encode($ProductArr);
	}
}
