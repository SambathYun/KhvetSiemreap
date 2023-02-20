<?php
class tbl_product extends DB
{
	public function GetProduct($type)
	{
		if ($type == '0') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product ORDER BY view DESC";
		} else if ($type == '1') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.type=1 ORDER BY id ASC";
		} else if ($type == '2') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.type=2 ORDER BY id ASC";
		} else if ($type == '3') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.type=3 ORDER BY id ASC";
		} else if ($type == '4') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.type=4 ORDER BY id ASC";
		} else if ($type == '5') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.type=5 ORDER BY id ASC";
		} else if ($type == '6') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.type=6 ORDER BY id ASC";
		} else if ($type == '7') {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.type=7 ORDER BY id ASC";
		} else {
			$qr = "SELECT *, ROUND(price*(100-discount)/100,2) as price_discount FROM tbl_product WHERE tbl_product.name LIKE '%$type%'";
		}

		$result = mysqli_query($this->con, $qr);
		$ProductArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ProductArr[] = $row;
		}
		echo json_encode($ProductArr);
	}


	public function GetProductItem()
	{
		$qr = "SELECT *,ROUND(cost,2) as new_cost,ROUND(price,2) as new_price FROM tbl_product";

		$result = mysqli_query($this->con, $qr);
		$ProductArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ProductArr[] = $row;
		}
		echo json_encode($ProductArr);
	}

	public function AddCheckDuplicate($name)
	{
		$name = $this->con->real_escape_string($name);
		$qr = $this->con->query("SELECT name FROM tbl_product WHERE name='$name'");
		$count = 0;
		if ($qr !== false && $qr->num_rows > 0) {
			$count = 1;
		} else {
			$count = 2;
		}
		return $count;
	}

	public function AddProduct($name, $type, $cost, $price, $stock, $image)
	{
		$qr = "INSERT INTO tbl_product (name,type,cost,price,stock,image)
		VALUES ('$name','$type','$cost','$price','$stock','$image')";
		return mysqli_query($this->con, $qr);
	}

	public function AddProductToInventory($name,$type,$stock)
	{
		$qr1 = "INSERT INTO `tbl_inventory`(`idproduct`,`nameproduct`,`typeproduct`,`stock`)
			VALUE ((SELECT MAX(tbl_product.id) FROM tbl_product),'$name','$type','$stock')";
		return mysqli_query($this->con, $qr1);
	}
	
	public function DeleteProduct($id, $name)
	{
		//chiid 1
		$qr1 = "DELETE FROM tbl_inventory WHERE idproduct=$id";
		mysqli_query($this->con, $qr1);

		//chiid 2
		$qr1 = "DELETE FROM tbl_report WHERE product_id=$id";
		mysqli_query($this->con, $qr1);

		//parent
		$qr2 = "DELETE FROM tbl_product WHERE id=$id AND name='$name'";
		mysqli_query($this->con, $qr2);

		$qr3 = "DELETE FROM tbl_order WHERE idproduct=$id";

		mysqli_query($this->con, $qr3);

	}
	public function GetEditProduct($id)
	{
		$qr = "SELECT* FROM tbl_product WHERE id=$id";
		return mysqli_query($this->con, $qr);
	}


	public function EdCheckDuplicate($name, $id)
	{
		$name = $this->con->real_escape_string($name);
		$qr = $this->con->query("SELECT name FROM tbl_product WHERE name='$name' AND id!=$id");
		$count = 0;
		if ($qr !== false && $qr->num_rows > 0) {
			$count = 1;
		} else {
			$count = 2;
		}
		return $count;
	}
	public function SetEditProduct($id, $name, $type, $cost, $price, $stock, $image)
	{
		$name = $this->con->real_escape_string($name);
		$qr_report = "SELECT product_name FROM tbl_report
					WHERE product_id=$id AND DATE(order_created)=CURDATE()";
		$rs = $this->con->query($qr_report);

		if ($image == 1) {

			if ($rs !== false && $rs->num_rows > 0) {
				$qr = "UPDATE tbl_product,tbl_inventory,tbl_report SET 
					tbl_product.name='$name',
					tbl_product.price='$price',
					tbl_product.type='$type',
					tbl_product.cost='$cost',
					tbl_product.stock='$stock', 


					tbl_report.product_name='$name', 
					tbl_inventory.nameproduct='$name',
					
					tbl_inventory.stock_in=(tbl_inventory.stock_in-(((tbl_inventory.stock+tbl_inventory.stock_in)-tbl_inventory.sold_out)-tbl_product.stock))

					WHERE tbl_product.id=$id
						AND tbl_inventory.idproduct=$id AND DATE(tbl_inventory.created_at)=CURDATE()
						AND tbl_report.product_id=$id AND DATE(tbl_report.order_created)=CURDATE()";
			} else {
				$qr = "UPDATE tbl_product,tbl_inventory SET 
						tbl_product.name='$name',
						tbl_product.price='$price',
						tbl_product.type='$type',
						tbl_product.cost='$cost',
						tbl_product.stock='$stock', 

						tbl_inventory.nameproduct='$name',

						tbl_inventory.stock_in=(tbl_inventory.stock_in-(((tbl_inventory.stock+tbl_inventory.stock_in)-tbl_inventory.sold_out)-tbl_product.stock))
							WHERE tbl_product.id=$id
								AND tbl_inventory.idproduct=$id AND DATE(tbl_inventory.created_at)=CURDATE()";
			}
		} else {

			if ($rs !== false && $rs->num_rows > 0) {
				$qr = "UPDATE tbl_product,tbl_inventory,tbl_report SET 
					tbl_product.name='$name',
					tbl_product.price='$price',
					tbl_product.type='$type',
					tbl_product.cost='$cost',
					tbl_product.stock='$stock', 
					tbl_product.image='$image',

					tbl_report.product_name='$name', 
					tbl_inventory.nameproduct='$name',
					
					tbl_inventory.stock_in=(tbl_inventory.stock_in-(((tbl_inventory.stock+tbl_inventory.stock_in)-tbl_inventory.sold_out)-tbl_product.stock))

					WHERE tbl_product.id=$id
						AND tbl_inventory.idproduct=$id AND DATE(tbl_inventory.created_at)=CURDATE()
						AND tbl_report.product_id=$id AND DATE(tbl_report.order_created)=CURDATE()";
			} else {
				$qr = "UPDATE tbl_product,tbl_inventory SET 
						tbl_product.name='$name',
						tbl_product.price='$price',
						tbl_product.type='$type',
						tbl_product.cost='$cost',
						tbl_product.stock='$stock', 
						tbl_product.image='$image',

						tbl_inventory.nameproduct='$name',

						tbl_inventory.stock_in=(tbl_inventory.stock_in-(((tbl_inventory.stock+tbl_inventory.stock_in)-tbl_inventory.sold_out)-tbl_product.stock))
							WHERE tbl_product.id=$id
								AND tbl_inventory.idproduct=$id AND DATE(tbl_inventory.created_at)=CURDATE()";
			}
		}
		return  $this->con->query($qr);
	}

	public function EditProductDiscount($id, $dis)
	{
		if ($dis > 100) {
			$qr = "SELECT * FROM tbl_product";
			$msg = "Welcome to Geeks for Geek";
			return $msg;
		} else {
			$qr = "UPDATE tbl_product SET tbl_product.discount='$dis' WHERE tbl_product.id='$id'";
		}
		mysqli_query($this->con, $qr);
	}

	public function EditProductStock($id, $qty)
	{
		$qr = "UPDATE tbl_product,tbl_inventory SET tbl_product.stock=tbl_product.stock+'$qty' , tbl_inventory.stock_in=tbl_inventory.stock_in+'$qty' 
		
			WHERE tbl_product.id='$id' AND tbl_inventory.idproduct='$id' AND DATE(tbl_inventory.created_at)=CURDATE()";

		mysqli_query($this->con, $qr);
	}
}
