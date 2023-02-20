<?php

// http://localhost/live/Home/Show/1/2

class Report extends Controller
{
	function ReportManage()
	{
		$GetModel = $this->model("tbl_theme");
		$GetTheme = $GetModel->GetTheme();
		if (isset($_SESSION["username"])) {

			$this->view("master", ["Page" => "report", "GetTheme" => $GetTheme]);
		} else {
			header("Location: ./Account/Login");
		}
	}
	function GetReport1()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$GetReport = $GetModel->GetReport1($start, $end);
		echo $GetReport;
	}
	function GetReport2()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$GetReport = $GetModel->GetReport2($start, $end);
		echo $GetReport;
	}
	function GetReport3()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$GetReport = $GetModel->GetReport3($start, $end);
		echo $GetReport;
	}
	function GetReport4()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$GetReport = $GetModel->GetReport4($start, $end);
		echo $GetReport;
	}	
	function GetReport5()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$GetReport = $GetModel->GetReport5($start, $end);
		echo $GetReport;
	}
	function GetReport6()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$GetReport = $GetModel->GetReport6($start, $end);
		echo $GetReport;
	}	function GetReport7()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$GetReport = $GetModel->GetReport7($start, $end);
		echo $GetReport;
	}



	function SumaryTotal()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryTotal($start, $end);
		echo $SumaryReport;
	}
	function SumaryReport1()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryReport1($start, $end);
		echo $SumaryReport;
	}
	function SumaryReport2()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryReport2($start, $end);
		echo $SumaryReport;
	}
	function SumaryReport3()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryReport3($start, $end);
		echo $SumaryReport;
	}
	function SumaryReport4()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryReport4($start, $end);
		echo $SumaryReport;
	}
	function SumaryReport5()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryReport5($start, $end);
		echo $SumaryReport;
	}
	function SumaryReport6()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryReport6($start, $end);
		echo $SumaryReport;
	}
	function SumaryReport7()
	{
		$start = $_POST["start"];
		$end = $_POST["end"];
		$GetModel = $this->model("tbl_report");
		$SumaryReport = $GetModel->SumaryReport7($start, $end);
		echo $SumaryReport;
	}

}
