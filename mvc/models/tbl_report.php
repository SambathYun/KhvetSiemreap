<?php

class tbl_report extends DB
{

	public function GetReport1($start, $end)
	{
		$qr = "SELECT product_name ,
				SUM(tbl_report.order_qty) as qty_sum ,
					ROUND(SUM(tbl_report.order_qty*tbl_report.product_price),2) as amount  
						FROM `tbl_report`
						  WHERE tbl_report.product_type=1 
							AND date(tbl_report.order_created) BETWEEN date('$start') AND date('$end') 
								GROUP BY tbl_report.product_name ORDER BY tbl_report.id ASC";

		$result = mysqli_query($this->con, $qr);
		$ReportArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ReportArr[] = $row;
		}
		echo json_encode($ReportArr);
	}
	public function GetReport2($start, $end)
	{
		$qr = "SELECT product_name ,
				SUM(tbl_report.order_qty) as qty_sum ,
				ROUND(SUM(tbl_report.order_qty*tbl_report.product_price),2) as amount  
					FROM `tbl_report`
					WHERE tbl_report.product_type=2 
						AND date(tbl_report.order_created) BETWEEN date('$start') AND date('$end') 
							GROUP BY tbl_report.product_name ORDER BY tbl_report.id ASC";

		$result = mysqli_query($this->con, $qr);
		$ReportArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ReportArr[] = $row;
		}
		echo json_encode($ReportArr);
	}
	public function GetReport3($start, $end)
	{
		$qr = "SELECT product_name ,
				SUM(tbl_report.order_qty) as qty_sum ,
				ROUND(SUM(tbl_report.order_qty*tbl_report.product_price),2) as amount  
					FROM `tbl_report`
					WHERE tbl_report.product_type=3 
						AND date(tbl_report.order_created) BETWEEN date('$start') AND date('$end') 
							GROUP BY tbl_report.product_name ORDER BY tbl_report.id ASC";

		$result = mysqli_query($this->con, $qr);
		$ReportArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ReportArr[] = $row;
		}
		echo json_encode($ReportArr);
	}
	public function GetReport4($start, $end)
	{
		$qr = "	SELECT product_name ,
					SUM(tbl_report.order_qty) as qty_sum ,
					ROUND(SUM(tbl_report.order_qty*tbl_report.product_price),2) as amount  
						FROM `tbl_report`
						WHERE tbl_report.product_type=4 
							AND date(tbl_report.order_created) BETWEEN date('$start') AND date('$end') 
								GROUP BY tbl_report.product_name ORDER BY tbl_report.id ASC";

		$result = mysqli_query($this->con, $qr);
		$ReportArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ReportArr[] = $row;
		}
		echo json_encode($ReportArr);
	}
	public function GetReport5($start, $end)
	{
		$qr = "SELECT product_name ,
				SUM(tbl_report.order_qty) as qty_sum ,
				ROUND(SUM(tbl_report.order_qty*tbl_report.product_price),2) as amount  
					FROM `tbl_report`
					WHERE tbl_report.product_type=5 
						AND date(tbl_report.order_created) BETWEEN date('$start') AND date('$end') 
							GROUP BY tbl_report.product_name ORDER BY tbl_report.id ASC";

		$result = mysqli_query($this->con, $qr);
		$ReportArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ReportArr[] = $row;
		}
		echo json_encode($ReportArr);
	}
	public function GetReport6($start, $end)
	{
		$qr = "SELECT product_name ,
				SUM(tbl_report.order_qty) as qty_sum ,
				ROUND(SUM(tbl_report.order_qty*tbl_report.product_price),2) as amount  
						FROM `tbl_report`
						WHERE tbl_report.product_type=6 
							AND date(tbl_report.order_created) BETWEEN date('$start') AND date('$end') 
							GROUP BY tbl_report.product_name ORDER BY tbl_report.id ASC";

		$result = mysqli_query($this->con, $qr);
		$ReportArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ReportArr[] = $row;
		}
		echo json_encode($ReportArr);
	}
	public function GetReport7($start, $end)
	{
		$qr = "SELECT product_name ,
				SUM(tbl_report.order_qty) as qty_sum ,
				ROUND(SUM(tbl_report.order_qty*tbl_report.product_price),2) as amount  
					FROM `tbl_report`
					WHERE tbl_report.product_type=7 
						AND date(tbl_report.order_created) BETWEEN date('$start') AND date('$end') 
							GROUP BY tbl_report.product_name ORDER BY tbl_report.id ASC";

		$result = mysqli_query($this->con, $qr);
		$ReportArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$ReportArr[] = $row;
		}
		echo json_encode($ReportArr);
	}



	public function SumaryTotal($start, $end)
	{
		$qr = "	SELECT * FROM 
					(SELECT *,
						ROUND(SUM(product_price*order_qty),2) AS sumary_total, 
						ROUND(SUM(product_cost*order_qty),2) AS sumary_expense , 
						ROUND(SUM(product_price*order_qty),2)-ROUND(SUM(product_cost*order_qty),2) AS sumary_profit 
					FROM `tbl_report` WHERE date(order_created) BETWEEN date('$start') AND date('$end') 
		   		GROUP BY product_name WITH ROLLUP)t WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}

	public function SumaryReport1($start, $end)
	{
		$qr = "SELECT * FROM
				(SELECT product_name,SUM(A) AS sumary_qty ,ROUND(SUM(B),2) AS sumary_report FROM 
					(SELECT product_name, SUM(order_qty) AS A , SUM(tbl_report.order_qty*tbl_report.product_price) AS B FROM `tbl_report` 
						WHERE product_type=1 AND date(order_created) BETWEEN date('$start') AND date('$end') GROUP BY product_name) 
							subquery_alias GROUP BY product_name WITH ROLLUP )t 
								WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}

	public function SumaryReport2($start, $end)
	{
		$qr = "SELECT * FROM
				(SELECT product_name,SUM(A) AS sumary_qty ,ROUND(SUM(B),2) AS sumary_report FROM 
					(SELECT product_name, SUM(order_qty) AS A , SUM(tbl_report.order_qty*tbl_report.product_price) AS B FROM `tbl_report` 
						WHERE product_type=2 AND date(order_created) BETWEEN date('$start') AND date('$end') GROUP BY product_name) 
							subquery_alias GROUP BY product_name WITH ROLLUP )t 
								WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}
	public function SumaryReport3($start, $end)
	{
		$qr = "SELECT * FROM
				(SELECT product_name,SUM(A) AS sumary_qty ,ROUND(SUM(B),2) AS sumary_report FROM 
					(SELECT product_name, SUM(order_qty) AS A , SUM(tbl_report.order_qty*tbl_report.product_price) AS B FROM `tbl_report` 
						WHERE product_type=3 AND date(order_created) BETWEEN date('$start') AND date('$end') GROUP BY product_name) 
							subquery_alias GROUP BY product_name WITH ROLLUP )t 
								WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}
	public function SumaryReport4($start, $end)
	{
		$qr = "SELECT * FROM
				(SELECT product_name,SUM(A) AS sumary_qty ,ROUND(SUM(B),2) AS sumary_report FROM 
					(SELECT product_name, SUM(order_qty) AS A , SUM(tbl_report.order_qty*tbl_report.product_price) AS B FROM `tbl_report` 
						WHERE product_type=4 AND date(order_created) BETWEEN date('$start') AND date('$end') GROUP BY product_name) 
							subquery_alias GROUP BY product_name WITH ROLLUP )t 
								WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}
	public function SumaryReport5($start, $end)
	{
		$qr = "SELECT * FROM
				(SELECT product_name,SUM(A) AS sumary_qty ,ROUND(SUM(B),2) AS sumary_report FROM 
					(SELECT product_name, SUM(order_qty) AS A , SUM(tbl_report.order_qty*tbl_report.product_price) AS B FROM `tbl_report` 
						WHERE product_type=5 AND date(order_created) BETWEEN date('$start') AND date('$end') GROUP BY product_name) 
							subquery_alias GROUP BY product_name WITH ROLLUP )t 
								WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}
	public function SumaryReport6($start, $end)
	{
		$qr = "SELECT * FROM
				(SELECT product_name,SUM(A) AS sumary_qty ,ROUND(SUM(B),2) AS sumary_report FROM 
					(SELECT product_name, SUM(order_qty) AS A , SUM(tbl_report.order_qty*tbl_report.product_price) AS B FROM `tbl_report` 
						WHERE product_type=6 AND date(order_created) BETWEEN date('$start') AND date('$end') GROUP BY product_name) 
							subquery_alias GROUP BY product_name WITH ROLLUP )t 
								WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}
	public function SumaryReport7($start, $end)
	{
		$qr = "SELECT * FROM
				(SELECT product_name,SUM(A) AS sumary_qty ,ROUND(SUM(B),2) AS sumary_report FROM 
					(SELECT product_name, SUM(order_qty) AS A , SUM(tbl_report.order_qty*tbl_report.product_price) AS B FROM `tbl_report` 
						WHERE product_type=7 AND date(order_created) BETWEEN date('$start') AND date('$end') GROUP BY product_name) 
							subquery_alias GROUP BY product_name WITH ROLLUP )t 
								WHERE product_name IS NULL";

		$result = mysqli_query($this->con, $qr);
		$SumaryArr = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$SumaryArr[] = $row;
		}
		echo json_encode($SumaryArr);
	}
}
