<?php
class tbl_payment extends DB
{
	public function AddPayment($content, $invoice, $accountname, $opened, $guestnumber)
	{
		$qr3 = "INSERT INTO `tbl_payment`(`id`,`content`, `invoice`,`account_name`,`guest_num`, `opened_at`, `closed_at`) 
				VALUES (null,'$content','$invoice','$accountname','$guestnumber','$opened',NOW())";
		mysqli_query($this->con, $qr3);
	}

	public function GetSale($start,$end,$limit)
	{
		$qr = "	SELECT * , 
				DATE_FORMAT(tbl_payment.closed_at,'%m/%d/%Y') as close_date,
				DATE_FORMAT( tbl_payment.opened_at,'%a, %b %e, %Y %h:%i %p') as opened_sale,
				DATE_FORMAT( tbl_payment.closed_at,'%a, %b %e, %Y %h:%i %p') as closed_sale,
				(Select COUNT(*) FROM `tbl_payment` WHERE date(tbl_payment.closed_at) BETWEEN date('$start') AND date('$end') ) as max_limit
				FROM `tbl_payment`
				WHERE date(tbl_payment.closed_at) BETWEEN date('$start') AND date('$end') ORDER BY tbl_payment.id DESC LIMIT $limit";

		$result = mysqli_query($this->con, $qr);
		$SaleArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SaleArr[] = $row;
		}
		echo json_encode($SaleArr);
	}
	public function GetSaleByID($id)
	{
		$qr = "SELECT * , 
					DATE_FORMAT(tbl_payment.closed_at,'%m/%d/%Y') as close_date,
					DATE_FORMAT( tbl_payment.opened_at,'%a, %b %e, %Y %h:%i %p') as opened_sale,
					DATE_FORMAT( tbl_payment.closed_at,'%a, %b %e, %Y %h:%i %p') as closed_sale 
				FROM `tbl_payment` WHERE tbl_payment.id LIKE '$id'";

		$result = mysqli_query($this->con, $qr);
		$SaleArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SaleArr[] = $row;
		}
		echo json_encode($SaleArr);
	}

	public function GetInvoice($id)
	{
		$qr3 = "SELECT LEFT(invoice,length(invoice)-1) AS newinvoice FROM tbl_payment WHERE tbl_payment.id=$id ";
		$result = mysqli_query($this->con, $qr3);
		while ($row = mysqli_fetch_assoc($result)) {
			$GetInvoice = $row['newinvoice'];
		}
		echo $GetInvoice;
	}
	public function DeleteInvoice($id)
	{
		$qr1 = "UPDATE tbl_product,tbl_report
					SET tbl_product.stock=tbl_product.stock+
						(SELECT SUM(tbl_report.order_qty) FROM tbl_report
			  				WHERE tbl_product.id=tbl_report.product_id
								AND tbl_report.payment_id=$id GROUP BY tbl_report.product_id)
	  			WHERE tbl_product.id=tbl_report.product_id AND tbl_report.payment_id=$id";
		mysqli_query($this->con, $qr1);

		$qr3 = "DELETE FROM tbl_report WHERE tbl_report.payment_id=$id";
		mysqli_query($this->con, $qr3);

		$qr2 = "DELETE FROM tbl_payment WHERE tbl_payment.id=$id";
		mysqli_query($this->con, $qr2);



	}
}
