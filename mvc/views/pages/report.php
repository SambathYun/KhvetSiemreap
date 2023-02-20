<?php include("./mvc/views/partials/theme.php"); ?>
<div id="report-wrapper" class="container-fluid p-0">
    <div class="row m-0">
        <!-- side1 -->
        <div id="side1" class="sidebar-1 closed p-2 bg2 scroll_hide">

            <div id="logo1" class="col-12 p-0">
                <div class="d-flex justify-content-center" style="width: 100%;height: 100px;">
                    <div style="width: 65px; height:65px;margin-top:6px;">
                        <img id="lgimg" src="../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">
                    </div>
                    <div class="link_name ml-1" style="height:100px;margin-top:30px; position: relative;">
                        <p id="lgname" class="khmer-font cl mb-0" style="font-size:140%;cursor:pointer;">ខ្វិត សៀមរាប</p>
                        <span class="cl mb-0 eng_name">Khvet Siemreap</apan>
                    </div>

                </div>
            </div>
            <div id="logo2" class="col-12 p-0 " style="display:none;">
                <div class="d-flex justify-content-center" style="width: 100%;height: 80px;">
                    <div style="width: 50px; height:50px;margin-top:6px">
                        <img id="lgimg" src="../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">
                    </div>
                    <div class="link_name ml-1" style="height:100px;margin-top:30px;">
                        <p class="khmer-font cl" style="font-size:140%">ខ្វិតសៀមរាប</p>
                    </div>
                </div>
            </div>

            <div id="menu-box" class="row m-0">

                <div class="col-12 p-0">
                    <div class="p-2" style="width: 100%;height: 55px;">
                        <div class="float-left" style="width: 50px;height: 40px;">
                            <img src="../public/images/profile/<?php echo $_SESSION['profile'] ?>" width="40px" height="40px;" style="object-fit: cover;border-radius:100px;">
                        </div>

                        <div class="link_name float-left ">
                            <p class="cl mb-0"><?php echo $_SESSION['namedisplay'] ?></p>
                            <p class="cl mb-0" style="font-size: 80%;opacity: 0.7"><?php echo $_SESSION['role'] ?></p>
                        </div>

                    </div>
                </div>

                <?php
                if ($_SESSION['role'] == "Administrator" || $_SESSION['role'] == "Accountant") {
                    include("./mvc/views/partials/home-menu-admin.php");
                    $hiderow = 'table-row';
                } else {
                    include("./mvc/views/partials/home-menu-staff.php");
                    $hiderow = 'none';
                }
                ?>
            </div>
        </div>
        <div class="sidebar-2 change p-0 bg1">

            <div class="head-content py-3 mx-3 bg1" style="border-bottom: 1px solid rgba(0,0,0,.125);">


                <div id="toggle-bar">
                    <a class="toggle float-left btn mr-3 bgh ">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="float-left pt-1" style="height:45px">
                    <p class="float-left font-weight-bold mb-0 header-text">
                        Reports~Manage
                    </p>
                </div>

                <div id="pos-button" class="btn bgh float-right" title="Back to Home">
                    <span class="pos-text">
                        POS
                    </span>
                </div>

                <div style="clear: both;"></div>



            </div>
            <div class="d-flex justify-content-center p-2">

                <div>
                    <div class="date-container">
                        <input class="input-date form-control text-center" type="date" id="start-date" title="Select Start Date" />
                        <span class="date-button">
                            <button type="button"><i class="fa fa-calendar" style="cursor:pointer;color:#6f42c1;"></i></button>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="date-container mx-2">
                        <input class="input-date form-control text-center" type="date" id="end-date" title="Select End Date" />
                        <span class="date-button">
                            <button type="button"><i class="fa fa-calendar" style="cursor:pointer;color:#6f42c1;"></i></button>
                        </span>
                    </div>
                </div>

                <button id="find-report" class="btn btn-primary " style="border-radius:6px;" title="Find Report">

                    <div>
                        <i class="fa fa-search" aria-hidden="true" style="font-size: 90%;"></i>
                    </div>

                </button>

            </div>


            <div class="px-2" style=" height:calc(100vh - 140px);overflow-y: auto;">

                <div id="loading-reports"></div>
                <div class="table-reports p-0" style="display: none;">

                    <table class="table table-sm table-striped table-hover bgh mb-1">


                        <thead>
                            <tr>
                                <th scope="col" style="width:18%" class="pl-3">N&#186;</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width:20%">Qty</th>
                                <th scope="col" style="width:15%">Amount</th>

                            </tr>
                        </thead>

                        <!-- TYPE 1 -->
                        <thead title="Food Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl1">
                                    Food
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="report-type1-box">
                            <!-- json  -->
                        </tbody>

                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="text-align:right;">Total - Food</th>
                                <th id="qty1-db" scope="col"></th>
                                <th scope="col">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="total1-db" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>

                        <!-- TYPE 2 -->
                        <thead title="Drink Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl2">
                                    Drink
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>
                        <tbody id="report-type2-box">
                            <!-- json  -->
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="text-align:right;">Total - Drink</th>
                                <th id="qty2-db" scope="col"></th>
                                <th scope="col" style="width:15%">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="total2-db" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>


                        <!-- TYPE 3 -->
                        <thead title="Beer Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl3">
                                    Beer
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>
                        <tbody id="report-type3-box">
                            <!-- json  -->
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="text-align:right;">Total - Beer</th>
                                <th id="qty3-db" scope="col"></th>
                                <th scope="col" style="width:15%">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="total3-db" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>


                        <!-- TYPE 4 -->
                        <thead title="Hot-Cafe Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl4">
                                    Hot Cafe
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="report-type4-box">
                            <!-- json  -->
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="text-align:right;">Total - Hot Cafe</th>
                                <th id="qty4-db" scope="col"></th>
                                <th scope="col" style="width:15%">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="total4-db" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>


                        <!-- TYPE 5 -->
                        <thead title="Ice-Cafe Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl5">
                                    Ice Cafe
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="report-type5-box">
                            <!-- json  -->
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="text-align:right;">Total - Ice Cafe</th>
                                <th id="qty5-db" scope="col"></th>
                                <th scope="col" style="width:15%">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="total5-db" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>


                        <!-- TYPE 6 -->
                        <thead title="Frappe Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl6">
                                    Frappe
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="report-type6-box">
                            <!-- json  -->
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="text-align:right;">Total - Frappe</th>
                                <th id="qty6-db" scope="col"></th>
                                <th scope="col" style="width:15%">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="total6-db" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>



                        <!-- TYPE 7 -->
                        <thead title="Khvet-Signature Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl7">
                                    Khvet Signature
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="report-type7-box">
                            <!-- json  -->
                        </tbody>

                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="text-align:right;">Total - Khvet Signature</th>
                                <th id="qty7-db" scope="col"></th>
                                <th scope="col" style="width:15%">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="total7-db" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>


                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Grand Total Amount</th>
                                <th scope="col">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                                    <span id="sumary-total" style="font-size:120%;"></Span>

                                </th>
                            </tr>

                        </thead>

                        <thead>
                            <tr style="display:<?php echo $hiderow ?>;">
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Grand Total Expenses</th>
                                <th scope="col">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:130%;"></i>
                                    <span id="sumary-expense" style="font-size:130%;"></Span>

                                </th>
                            </tr>

                        </thead>
                        <thead>
                            <tr style="display:<?php echo $hiderow ?>;">
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col" class="pb-2">Grand Total Profit</th>
                                <th scope="col">
                                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:140%;"></i>
                                    <span id="sumary-profit" style="font-size:140%;"></Span>

                                </th>
                            </tr>

                        </thead>

                    </table>
                    <div id="rp-print-pdf" class="btn btn-danger p-1 float-right mb-3" style="width:100px;font-size: 100%" onclick="GetReportPrint()">
                        <span>
                            PDF
                        </span>
                    </div>

                    <div id="rp-print-xls" class="btn btn-success p-1 float-right mb-3 mr-2" style="width:100px;font-size: 100%">
                        <span>
                            XLS
                        </span>
                    </div>

                </div>

                <!-- dsfds -->

            </div>
        </div>
    </div>
</div>

<div id="report-print" class="table-checkout p-2" style="size:A4;margin:0 auto;font-size: 80%; display:none">

    <div class="float-right" style="width: 40%">
        <p class="mb-0 text-center" style="font: 20px Moul;">ព្រះរាជាណាចក្រកម្ពុជា</p>
        <p class="mb-0 text-center" style="font: 20px Moul;">ជាតិ សាសនា ព្រះមហាក្សត្រ</p>
        <div style=" margin:0 auto;width: 150px;height: 100px;">
            <img src="../public/images/icons/Tacteing.png" style="object-fit:cover;max-width: 100%;">
        </div>

    </div>

    <div class="mb-2 mt-4 text-center" style="width: 40%">
        <img src="../public/images/logo/khvetsiemreap2.jpg" width="140px" height="140px;" style="object-fit: cover;">
    </div>

    <p class="mb-2 text-center font-weight-bold" style="font-size: 130%;">Daily Check Reports</p>
    <p class="mb-2 text-center font-weight-bold mt-0" style="font-size: 110%;">
        From : <span id="rp-date-start"></span>&nbsp;&nbsp;&nbsp;To :
        <span id="rp-date-end"></span>
    </p>

    <table class="table table-sm bgh mb-1">

        <thead>
            <tr>
                <th scope="col" style="width:18%" class="pl-3">N&#186;</th>
                <th scope="col">Name</th>
                <th scope="col" style="width:15%">Qty</th>
                <th scope="col" style="width:15%">Amount</th>

            </tr>
        </thead>

        <!-- TYPE 1 -->
        <thead title="Food Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl1">
                    Food
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="print-type1-box">
            <!-- json  -->
        </tbody>

        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" style="text-align:right;">Total - Food</th>
                <th id="pqty1-db" scope="col"></th>
                <th scope="col">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="ptotal1-db" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>

        <!-- TYPE 2 -->
        <thead title="Drink Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl2">
                    Drink
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>
        <tbody id="print-type2-box">
            <!-- json  -->
        </tbody>
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" style="text-align:right;">Total - Drink</th>
                <th id="pqty2-db" scope="col"></th>
                <th scope="col" style="width:15%">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="ptotal2-db" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>


        <!-- TYPE 3 -->
        <thead title="Beer Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl3">
                    Beer
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>
        <tbody id="print-type3-box">
            <!-- json  -->
        </tbody>
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" style="text-align:right;">Total - Beer</th>
                <th id="pqty3-db" scope="col"></th>
                <th scope="col" style="width:15%">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="ptotal3-db" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>


        <!-- TYPE 4 -->
        <thead title="Hot-Cafe Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl4">
                    Hot Cafe
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="print-type4-box">
            <!-- json  -->
        </tbody>
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" style="text-align:right;">Total - Hot Cafe</th>
                <th id="pqty4-db" scope="col"></th>
                <th scope="col" style="width:15%">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="ptotal4-db" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>


        <!-- TYPE 5 -->
        <thead title="Ice-Cafe Category">
            <tr tyle="font-size: 110%;">
                <th scope="col" class="pl-3 cl5">
                    Ice Cafe
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="print-type5-box">
            <!-- json  -->
        </tbody>
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" style="text-align:right;">Total - Ice Cafe</th>
                <th id="pqty5-db" scope="col"></th>
                <th scope="col" style="width:15%">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="ptotal5-db" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>


        <!-- TYPE 6 -->
        <thead title="Frappe Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl6">
                    Frappe
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="print-type6-box">
            <!-- json  -->
        </tbody>
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" style="text-align:right;">Total - Frappe</th>
                <th id="pqty6-db" scope="col"></th>
                <th scope="col" style="width:15%">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="ptotal6-db" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>



        <!-- TYPE 7 -->
        <thead title="Khvet-Signature Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl7">
                    Khvet Signature
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="print-type7-box">
            <!-- json  -->
        </tbody>

        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col" style="text-align:right;">Total - Khvet Signature</th>
                <th id="pqty7-db" scope="col"></th>
                <th scope="col" style="width:15%">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="ptotal7-db" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>


        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Grand Total Amount</th>
                <th scope="col" style="width:15%">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:120%;"></i>
                    <span id="psumary-total" style="font-size:120%;"></Span>

                </th>
            </tr>

        </thead>

        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Grand Total Expenses</th>
                <th scope="col">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:130%;"></i>
                    <span id="psumary-expense" style="font-size:130%;"></Span>

                </th>
            </tr>

        </thead>
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col" class="pb-2">Grand Total Profit</th>
                <th scope="col">
                    <i class="fas fa-dollar-sign" style="font-weight:600;font-size:140%;"></i>
                    <span id="psumary-profit" style="font-size:140%;"></Span>

                </th>
            </tr>

        </thead>

    </table>

    <div class="mt-3" style="width: 100%">
        <p class="float-left mb-0 w-25">Prepared by</p>
        <p class="float-left mb-0 w-25">Check by</p>

        <div class="mb-0 float-left w-25">
            <p class="mb-0 float-right">Received by </p>
        </div>
        <div class="mb-0 float-left w-25">
            <p class="mb-0 float-right">Approved by</p>
        </div>
    </div>

</div>


<script type="text/javascript">
    function GetReportPrint() {
        $("#report-print").show();
        window.print();
        $("#report-print").hide();
    }


    function CheckTable2() {
        var id = JSON.parse(localStorage.getItem('idTable'));
        $.ajax({
            url: '../Table/CheckTable/' + id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
            }
        });
    }

    function getTable2() {
        $("#table-box").html('');
        $.ajax({
            url: '../Table/GetTable',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var table_color;
                var type_table;
                $.each(data, function(key, item) {
                    if (item.status == 1) {
                        table_color = 'dot-success';
                    } else {
                        table_color = 'dot-danger';
                    }
                    if (item.type == 1) {
                        type_table = '100';
                    } else if (item.type == 2) {
                        type_table = '200';
                    }
                    var data = `
                        <div class="p-1 float-left" onclick="GetTable(` + item.id + `,` + item.number + `)">
                            <div class="table-box bgh text-center" style="width: ` + type_table + `px;height: 100px;border-radius:15px">
                                <p id="tbname" class="mb-0 " style="font-size: 360%;">` + item.number + `</p>
                                <i id="tablecolor" class="fa fa-circle mr-2 ` + table_color + ` float-right" aria-hidden="true" style="font-size: 75%;margin-top: -4px"></i>
                            </div>
                        </div>`
                    document.getElementById("table-box").innerHTML += data;
                });
            }
        });
    }

    function getReport1(start, end) {

        document.getElementById("report-type1-box").innerHTML = '';
        var id = 1;
        $.ajax({
            url: "../Report/GetReport1/",
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            async: false,
            cache: false,
            beforeSend: function(data) {
                var data =
                    `<div id="loading" style=" display: flex;align-items: center;justify-content: center;">
							<div style="width: 150px;height: 150px;">
								<img src="../public/images/icons/loading.gif" style="max-width: 100%;border-radius:100px">
							</div>

						</div>
						`
                $('#loading-reports').html(data);
            },
            complete: function() {
                $('#loading').hide();
                $('.table-reports').show();
            },
            success: function(data) {
                $.each(data, function(key, item) {
                    var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id++ + `-</td>
                            <td class="khmer">` + item.product_name + `</td>
                            <td class="khmer">` + item.qty_sum + `</td>
                            <td class="khmer"><i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.amount + `</td>
                        </tr>

                        `

                    document.getElementById('report-type1-box').innerHTML += data;
                    document.getElementById('print-type1-box').innerHTML += data;
                })
            }
        })
    }

    function getReport2(start, end) {
        document.getElementById("report-type2-box").innerHTML = '';
        var id = 1;
        $.ajax({
            url: "../Report/GetReport2/",
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            async: false,
            cache: false,
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = `
                    <tr>
                        <td class="khmer pl-3" scope="row">` + id++ + `-</td>
                        <td class="khmer">` + item.product_name + `</td>
                        <td class="khmer">` + item.qty_sum + `</td>
                        <td class="khmer"><i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.amount + `</td>

                        </tr>

            `
                    document.getElementById('report-type2-box').innerHTML += data;
                    document.getElementById('print-type2-box').innerHTML += data;
                })
            }
        })
    }

    function getReport3(start, end) {
        document.getElementById("report-type3-box").innerHTML = '';
        var id = 1;
        $.ajax({
            url: "../Report/GetReport3/",
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            async: false,
            cache: false,
            success: function(data) {

                $.each(data, function(key, item) {

                    var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id++ + `-</td>
                            <td class="khmer">` + item.product_name + `</td>
                            <td class="khmer">` + item.qty_sum + `</td>
                            <td class="khmer"><i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.amount + `</td>

                        </tr>
                        `
                    document.getElementById('report-type3-box').innerHTML += data;
                    document.getElementById('print-type3-box').innerHTML += data;
                })
            }
        })
    }

    function getReport4(start, end) {
        document.getElementById("report-type4-box").innerHTML = '';
        var id = 1;
        $.ajax({
            url: "../Report/GetReport4/",
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            async: false,
            cache: false,
            success: function(data) {

                $.each(data, function(key, item) {

                    var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id++ + `-</td>
                            <td class="khmer">` + item.product_name + `</td>
                            <td class="khmer">` + item.qty_sum + `</td>
                            <td class="khmer"><i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.amount + `</td>

                        </tr>
                        `
                    document.getElementById('report-type4-box').innerHTML += data;
                    document.getElementById('print-type4-box').innerHTML += data;
                })
            }
        })
    }

    function getReport5(start, end) {
        document.getElementById("report-type5-box").innerHTML = '';
        var id = 1;
        $.ajax({
            url: "../Report/GetReport5/",
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            async: false,
            cache: false,
            success: function(data) {

                $.each(data, function(key, item) {

                    var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id++ + `-</td>
                            <td class="khmer">` + item.product_name + `</td>
                            <td class="khmer">` + item.qty_sum + `</td>
                            <td class="khmer"><i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.amount + `</td>

                        </tr>
                        `
                    document.getElementById('report-type5-box').innerHTML += data;
                    document.getElementById('print-type5-box').innerHTML += data;
                })
            }
        })
    }

    function getReport6(start, end) {
        document.getElementById("report-type6-box").innerHTML = '';
        var id = 1;
        $.ajax({
            url: "../Report/GetReport6/",
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            async: false,
            cache: false,
            success: function(data) {

                $.each(data, function(key, item) {

                    var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id++ + `-</td>
                            <td class="khmer">` + item.product_name + `</td>
                            <td class="khmer">` + item.qty_sum + `</td>
                            <td class="khmer"><i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.amount + `</td>

                        </tr>
                        `
                    document.getElementById('report-type6-box').innerHTML += data;
                    document.getElementById('print-type6-box').innerHTML += data;
                })
            }
        })
    }

    function getReport7(start, end) {
        document.getElementById("report-type7-box").innerHTML = '';
        var id = 1;
        $.ajax({
            url: "../Report/GetReport7/",
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            async: false,
            cache: false,
            success: function(data) {

                $.each(data, function(key, item) {

                    var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id++ + `-</td>
                            <td class="khmer">` + item.product_name + `</td>
                            <td class="khmer">` + item.qty_sum + `</td>
                            <td class="khmer"><i class="fa-regular fa-dollar-sign" style="font-size:95%"></i>` + item.amount + `</td>
                        </tr>
                        `
                    document.getElementById('report-type7-box').innerHTML += data;
                    document.getElementById('print-type7-box').innerHTML += data;
                })
            }
        })
    }

    function SumaryReport1(start, end) {
        document.getElementById('total1-db').innerHTML = '0';
        document.getElementById('qty1-db').innerHTML = '0';
        document.getElementById('ptotal1-db').innerHTML = '0';
        document.getElementById('pqty1-db').innerHTML = '0';

        $.ajax({
            url: '../Report/SumaryReport1/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = ` ` + item.sumary_report + ` `;
                    var data2 = ` ` + item.sumary_qty + ``;

                    if (item.sumary_report == null) {
                        $("#total1-db").text("0");
                        $("#qty1-db").text("0");
                        $("#ptotal1-db").text("0");
                        $("#pqty1-db").text("0");
                    } else {
                        document.getElementById('total1-db').innerHTML = data;
                        document.getElementById('qty1-db').innerHTML = data2;
                        document.getElementById('ptotal1-db').innerHTML = data;
                        document.getElementById('pqty1-db').innerHTML = data2;
                    }

                });
            }

        });
    }

    function SumaryReport2(start, end) {
        document.getElementById('total2-db').innerHTML = '0';
        document.getElementById('qty2-db').innerHTML = '0';
        document.getElementById('ptotal2-db').innerHTML = '0';
        document.getElementById('pqty2-db').innerHTML = '0';
        $.ajax({
            url: '../Report/SumaryReport2/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = ` ` + item.sumary_report + ` `;
                    var data2 = ` ` + item.sumary_qty + ``;

                    document.getElementById('total2-db').innerHTML = data;
                    document.getElementById('qty2-db').innerHTML = data2;
                    document.getElementById('ptotal2-db').innerHTML = data;
                    document.getElementById('pqty2-db').innerHTML = data2

                });
            }

        });
    }

    function SumaryReport3(start, end) {
        document.getElementById('total3-db').innerHTML = '0';
        document.getElementById('qty3-db').innerHTML = '0';
        document.getElementById('ptotal3-db').innerHTML = '0';
        document.getElementById('pqty3-db').innerHTML = '0';
        $.ajax({
            url: '../Report/SumaryReport3/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = ` ` + item.sumary_report + ` `;
                    var data2 = ` ` + item.sumary_qty + ``;


                    document.getElementById('total3-db').innerHTML = data;
                    document.getElementById('qty3-db').innerHTML = data2;
                    document.getElementById('ptotal3-db').innerHTML = data;
                    document.getElementById('pqty3-db').innerHTML = data2;


                });
            }

        });
    }

    function SumaryReport4(start, end) {
        document.getElementById('total4-db').innerHTML = '0';
        document.getElementById('qty4-db').innerHTML = '0';
        document.getElementById('ptotal4-db').innerHTML = '0';
        document.getElementById('pqty4-db').innerHTML = '0';
        $.ajax({
            url: '../Report/SumaryReport4/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = ` ` + item.sumary_report + ` `;
                    var data2 = ` ` + item.sumary_qty + ``;

                    document.getElementById('total4-db').innerHTML = data;
                    document.getElementById('qty4-db').innerHTML = data2;
                    document.getElementById('ptotal4-db').innerHTML = data;
                    document.getElementById('pqty4-db').innerHTML = data2;

                });
            }

        });
    }

    function SumaryReport5(start, end) {

        document.getElementById('total5-db').innerHTML = '0';
        document.getElementById('qty5-db').innerHTML = '0';
        document.getElementById('ptotal5-db').innerHTML = '0';
        document.getElementById('pqty5-db').innerHTML = '0';
        $.ajax({
            url: '../Report/SumaryReport5/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = ` ` + item.sumary_report + ` `;
                    var data2 = ` ` + item.sumary_qty + ``;

                    document.getElementById('total5-db').innerHTML = data;
                    document.getElementById('qty5-db').innerHTML = data2;
                    document.getElementById('ptotal5-db').innerHTML = data;
                    document.getElementById('pqty5-db').innerHTML = data2;

                });
            }

        });
    }

    function SumaryReport6(start, end) {
        document.getElementById('total6-db').innerHTML = '0';
        document.getElementById('qty6-db').innerHTML = '0';
        document.getElementById('ptotal6-db').innerHTML = '0';
        document.getElementById('pqty6-db').innerHTML = '0';
        $.ajax({
            url: '../Report/SumaryReport6/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = ` ` + item.sumary_report + ` `;
                    var data2 = ` ` + item.sumary_qty + ``;


                    document.getElementById('total6-db').innerHTML = data;
                    document.getElementById('qty6-db').innerHTML = data2;
                    document.getElementById('ptotal6-db').innerHTML = data;
                    document.getElementById('pqty6-db').innerHTML = data2;

                });
            }

        });
    }

    function SumaryReport7(start, end) {
        document.getElementById('total7-db').innerHTML = '0';
        document.getElementById('qty7-db').innerHTML = '0';
        document.getElementById('ptotal7-db').innerHTML = '0';
        document.getElementById('pqty7-db').innerHTML = '0';
        $.ajax({
            url: '../Report/SumaryReport7/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {


                    var data = ` ` + item.sumary_report + ` `;
                    var data2 = ` ` + item.sumary_qty + ``;

                    document.getElementById('total7-db').innerHTML = data;
                    document.getElementById('qty7-db').innerHTML = data2;
                    document.getElementById('ptotal7-db').innerHTML = data;
                    document.getElementById('pqty7-db').innerHTML = data2;

                });
            }

        });
    }


    function SumaryTotal(start, end) {
        document.getElementById('sumary-total').innerHTML = '0';
        document.getElementById('sumary-expense').innerHTML = '0';
        document.getElementById('sumary-profit').innerHTML = '0';

        document.getElementById('psumary-total').innerHTML = '0';
        document.getElementById('psumary-expense').innerHTML = '0';
        document.getElementById('psumary-profit').innerHTML = '0';
        $.ajax({
            url: '../Report/SumaryTotal/',
            type: 'post',
            dataType: 'json',
            data: {
                start: start,
                end: end,
            },
            success: function(data) {
                $.each(data, function(key, item) {

                    var data = ` ` + item.sumary_total + ` `
                    var data2 = ` ` + item.sumary_expense + ` `
                    var data3 = ` ` + item.sumary_profit + ` `

                    document.getElementById('sumary-total').innerHTML = data;
                    document.getElementById('sumary-expense').innerHTML = data2;
                    document.getElementById('sumary-profit').innerHTML = data3;

                    document.getElementById('psumary-total').innerHTML = data;
                    document.getElementById('psumary-expense').innerHTML = data2;
                    document.getElementById('psumary-profit').innerHTML = data3;

                });
            }

        });
    }


    $(document).ready(function() {
        var gettitlepage = localStorage.getItem("title_page");
        $('head > title').text('KhvetSiemreap | '+ gettitlepage);
        
        var get_toggle = localStorage.getItem("tgl-bar");
		if (get_toggle == 72) {
			$('.sidebar-1').removeClass("closed");
			$('.sidebar-2').removeClass("change");
			$('.link_name').addClass('hide');
			$('#logo1').hide();
			$('#logo2').show();
		} else {
			$('.sidebar-1').addClass("closed");
			$('.sidebar-2').addClass("change");
			$('.link_name').removeClass('hide');
		}


        var today = moment().format('YYYY-MM-DD');
        var getlocal_start = localStorage.getItem("local-rp-start");
        var getlocal_end = localStorage.getItem("local-rp-end");

        if (getlocal_start == null && getlocal_end == null) {
            $("#start-date").val(today);
            $("#end-date").val(today);

            getReport1(today, today);
            getReport2(today, today);
            getReport3(today, today);
            getReport4(today, today);
            getReport5(today, today);
            getReport6(today, today);
            getReport7(today, today);

            SumaryReport1(today, today);
            SumaryReport2(today, today);
            SumaryReport3(today, today);
            SumaryReport4(today, today);
            SumaryReport5(today, today);
            SumaryReport6(today, today);
            SumaryReport7(today, today);

            SumaryTotal(today, today);
        } else {
            $("#start-date").val(getlocal_start);
            $("#end-date").val(getlocal_end);

            getReport1(getlocal_start, getlocal_end);
            getReport2(getlocal_start, getlocal_end);
            getReport3(getlocal_start, getlocal_end);
            getReport4(getlocal_start, getlocal_end);
            getReport5(getlocal_start, getlocal_end);
            getReport6(getlocal_start, getlocal_end);
            getReport7(getlocal_start, getlocal_end);

            SumaryReport1(getlocal_start, getlocal_end);
            SumaryReport2(getlocal_start, getlocal_end);
            SumaryReport3(getlocal_start, getlocal_end);
            SumaryReport4(getlocal_start, getlocal_end);
            SumaryReport5(getlocal_start, getlocal_end);
            SumaryReport6(getlocal_start, getlocal_end);
            SumaryReport7(getlocal_start, getlocal_end);

            SumaryTotal(getlocal_start, getlocal_end);
        }


        $("#find-report").on('click', function() {

            $('.table-reports').hide();
            
            var start = $("#start-date").val();
            var end = $("#end-date").val();

            localStorage.setItem("local-rp-start", start);
            localStorage.setItem("local-rp-end", end)

            var getlocal_start = localStorage.getItem("local-rp-start");
            var getlocal_end = localStorage.getItem("local-rp-end");

            if (start != '' && end != '') {

                if (getlocal_start == null && getlocal_end == null) {
                    getReport1(start, end);
                    getReport2(start, end);
                    getReport3(start, end);
                    getReport4(start, end);
                    getReport5(start, end);
                    getReport6(start, end);
                    getReport7(start, end);

                    SumaryReport1(start, end);
                    SumaryReport2(start, end);
                    SumaryReport3(start, end);
                    SumaryReport4(start, end);
                    SumaryReport5(start, end);
                    SumaryReport6(start, end);
                    SumaryReport7(start, end);

                    SumaryTotal(start, end);
                } else {
                    getReport1(getlocal_start, getlocal_end);
                    getReport2(getlocal_start, getlocal_end);
                    getReport3(getlocal_start, getlocal_end);
                    getReport4(getlocal_start, getlocal_end);
                    getReport5(getlocal_start, getlocal_end);
                    getReport6(getlocal_start, getlocal_end);
                    getReport7(getlocal_start, getlocal_end);

                    SumaryReport1(getlocal_start, getlocal_end);
                    SumaryReport2(getlocal_start, getlocal_end);
                    SumaryReport3(getlocal_start, getlocal_end);
                    SumaryReport4(getlocal_start, getlocal_end);
                    SumaryReport5(getlocal_start, getlocal_end);
                    SumaryReport6(getlocal_start, getlocal_end);
                    SumaryReport7(getlocal_start, getlocal_end);

                    SumaryTotal(getlocal_start, getlocal_end);
                }


                $('#rp-date-start').text($("#start-date").val());
                $('#rp-date-end').text($("#end-date").val());
            } else {
                alert("Please Select The Date")
            }

        })
        $('#rp-date-start').text($("#start-date").val());
        $('#rp-date-end').text($("#end-date").val());


        $('#pos-button,#lgimg,#lgname').on('click', function() {
            CheckTable2();
            getTable2();
            window.location.href = "../Home";
        })

    });


    $("#rp-print-xls").click(function() {
        var start = $("#start-date").val();
        var end = $("#end-date").val();
        TableToExcel.convert(document.getElementById("report-print"), {
            name: "Report" + start + "To" + end + ".xlsx",
            sheet: {
                name: "Sheet1"
            }
        });
    });
</script>