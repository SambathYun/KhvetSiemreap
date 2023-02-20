<?php

class Product extends Controller
{
	function GetProduct($type)
	{
		$GetModel = $this->model("tbl_product");
		$GetProduct = $GetModel->GetProduct($type);
		echo $GetProduct;
	}

	function ProductsManage()
	{
		if (isset($_SESSION["username"])) {
			$GetModel = $this->model("tbl_theme");
			$GetTheme = $GetModel->GetTheme();
			$this->view("master", ["Page" => "products", "GetTheme" => $GetTheme]);
		} else {
			header("Location: ../Account/Login");
		}
	}
	function GetProductItem()
	{
		$GetModel = $this->model("tbl_product");
		$GetProductItem = $GetModel->GetProductItem();
		echo $GetProductItem;
	}

	function GetAddProduct()
	{
		if (isset($_SESSION["username"])) {
			$GetModel = $this->model("tbl_theme");
			$GetTheme = $GetModel->GetTheme();
			$this->view("master", ["Page" => "add-product", "GetTheme" => $GetTheme]);
		} else {
			header("Location: ../Account/Login");
		}
	}


	function SetAddProduct()
	{

		$GetModel = $this->model("tbl_theme");
		$GetTheme = $GetModel->GetTheme();
		$name = $_POST["name"];
		$type = $_POST["type"];
		$cost = $_POST["cost"];
		$price = $_POST["price"];
		$stock = $_POST["stock"];

		$image = '';
		$tmpFilePath = $_FILES['upload']['tmp_name'];

		$GetModel2 = $this->model("tbl_product");
		$AddCheckDuplicate = $GetModel2->AddCheckDuplicate($name);

		if ($name == null) {
			$this->view("master", ["Page" => "add-product", "status" => "Product name cannot be empty.", "GetTheme" => $GetTheme]);
		} else if ($cost == null) {
			$this->view("master", ["Page" => "add-product", "status" => "Product cost cannot be empty.", "GetTheme" => $GetTheme]);
		} else if ($price == null) {
			$this->view("master", ["Page" => "add-product", "status" => "Product price cannot be empty.", "GetTheme" => $GetTheme]);
		} else if ($stock == null) {
			$this->view("master", ["Page" => "add-product", "status" => "Product stock cannot be empty.", "GetTheme" => $GetTheme]);
		} else if ($tmpFilePath == null) {
			$this->view("master", ["Page" => "add-product", "status" => "Product image cannot be empty.", "GetTheme" => $GetTheme]);
		} else {
			if ($AddCheckDuplicate == 1) {
				$this->view("master", ["Page" => "add-product", "status" => "Duplicate Product Name.", "GetTheme" => $GetTheme]);
			} else {
				$image .= date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
				if ($tmpFilePath != "") {
					$newFilePath = "./public/images/product/" . date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
					if (move_uploaded_file($tmpFilePath, $newFilePath)) {
					}
				}

				$GetModel = $this->model("tbl_product");
				$AddProduct = $GetModel->AddProduct($name, $type, $cost, $price, $stock, $image);
				$AddProductToInventory = $GetModel->AddProductToInventory($name, $type, $stock);
				header("Location: ../Product/ProductsManage");
			}
		}
	}

	function DeleteProduct()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$GetModel = $this->model("tbl_product");
		$DeleteProduct = $GetModel->DeleteProduct($id, $name);
		header("Location: ../../Product/ProductsManage");
	}

	function GetEditProduct($id)
	{
		if (isset($_SESSION["username"])) {
			$GetModel = $this->model("tbl_theme");
			$GetTheme = $GetModel->GetTheme();
			$GetModel = $this->model("tbl_product");
			$EditProduct = $GetModel->GetEditProduct($id);
			$this->view("master", ["Page" => "edit-product", "product" => $EditProduct, "GetTheme" => $GetTheme]);
		} else {
			header("Location: ../Account/Login");
		}
	}

	function SetEditProduct()
	{

		$id = $_POST["idproduct"];
		$name = trim($_POST["name"]);
		$type = $_POST["type"];
		$cost = $_POST["cost"];
		$price = $_POST["price"];
		$stock = $_POST["stock"];
		$image = '';
		$tmpFilePath = $_FILES['upload']['tmp_name'];

		$GetModel1 = $this->model("tbl_product");
		$EditProduct = $GetModel1->GetEditProduct($id);

		$GetModel2 = $this->model("tbl_product");
		$EdCheckDuplicate = $GetModel2->EdCheckDuplicate($name, $id);

		if ($name == null) {
			echo ("<script type='text/javascript'>
					window.location.href='../Product/GetEditProduct/$id';
					localStorage.setItem('edp-check', 'Product name cannot be empty.');
			</script>");
		} else if ($price == null) {
			echo ("<script type='text/javascript'>
					window.location.href='../Product/GetEditProduct/$id';
					localStorage.setItem('edp-check', 'Product price cannot be empty.');
			</script>");
		} else if ($cost == null) {
			echo ("<script type='text/javascript'>
					window.location.href='../Product/GetEditProduct/$id';
					localStorage.setItem('edp-check', 'Product cost cannot be empty.');
			</script>");
		} else if ($stock == null) {
			echo ("<script type='text/javascript'>
					window.location.href='../Product/GetEditProduct/$id';
					localStorage.setItem('edp-check', 'Product stock cannot be empty.');
			</script>");
		} else if ($tmpFilePath == null) {

			if ($EdCheckDuplicate == 1) {
				echo ("<script type='text/javascript'>
							window.location.href='../Product/GetEditProduct/$id';
							localStorage.setItem('edp-check', 'Duplicate Product Name.');
						</script>");
			} else {
				$image = 1;
				$GetModel3 = $this->model("tbl_product");
				$EditProduct = $GetModel3->SetEditProduct($id, $name, $type, $cost, $price, $stock, $image);
				header("Location: ../Product/ProductsManage");
			}
		} else {

			if ($EdCheckDuplicate == 1) {
				echo ("<script type='text/javascript'>
						window.location.href='../Product/GetEditProduct/$id';
						localStorage.setItem('edp-check', 'Duplicate Product Name.');
						</script>");
			} else {
				$image .= date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
				if ($tmpFilePath != "") {
					$newFilePath = "./public/images/product/" . date("h") . date("i") . date("sa") . $_FILES['upload']['name'];
					if (move_uploaded_file($tmpFilePath, $newFilePath)) {
					}
				}
				$GetModel = $this->model("tbl_product");
				$EditProduct = $GetModel->SetEditProduct($id, $name, $type, $cost, $price, $stock, $image);
				header("Location: ../Product/ProductsManage");
			}
		}
	}


	function EditProductDiscount()
	{
		$id = $_POST["idDiscount"];
		$dis = $_POST["disDiscount"];

		$GetModel = $this->model("tbl_product");
		$EditProductDiscount = $GetModel->EditProductDiscount($id, $dis);
		header("Location: ../Product/ProductsManage");
	}

	function EditProductStock()
	{
		$id = $_POST["idStock"];
		$qty = $_POST["qtyStock"];

		$GetModel = $this->model("tbl_product");
		$EditProductStock = $GetModel->EditProductStock($id, $qty);
		header("Location: ../Product/ProductsManage");
	}
}
