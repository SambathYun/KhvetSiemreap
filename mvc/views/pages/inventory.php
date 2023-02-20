<?php include("./mvc/views/partials/theme.php"); ?>
<div id="inventory-wrapper" class="container-fluid p-0">
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
                } else {
                    include("./mvc/views/partials/home-menu-staff.php");
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
                        Inventorys~Manage
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
                        <input class="input-date form-control text-center" type="date" id="select-date" title="Select Date" />
                        <span class="date-button">
                            <button type="button"><i class="fa fa-calendar" style="cursor:pointer;color:#6f42c1;"></i></button>
                        </span>
                    </div>
                </div>

                <button id="find-inventory" class="btn btn-primary mx-2" style="border-radius:6px;" title="Find Inventory">

                    <div>
                        <i class="fa fa-search" aria-hidden="true" style="font-size: 90%;"></i>
                    </div>

                </button>

            </div>

            <div class="px-2" style=" height:calc(100vh - 140px);overflow-y: auto;">

                <div id="loading-inventorys"></div>
                <div id="no-inventorys"></div>
                <div class="table-inventorys p-0" style="display:none;width: 800px;margin:0 auto;font-size: 80%;">


                    <table class="table table-sm table-striped table-hover bgh mb-1">


                        <thead>
                            <tr>
                                <th scope="col" style="width:18%" class="pl-3">N&#186;</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width:10%">Stock</th>
                                <th scope="col" style="width:10%">In</th>
                                <th scope="col" style="width:10%">Sold Out</th>
                                <th scope="col" style="width:10%">Balance</th>

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
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="inventory-type1-box">
                            <!-- json  -->
                        </tbody>

                        <!-- TYPE 2 -->
                        <thead title="Drink Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl2">
                                    Drink
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="inventory-type2-box">
                            <!-- json  -->
                        </tbody>

                        <!-- TYPE 3 -->
                        <thead title="Beer Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl3">
                                    Beer
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="inventory-type3-box">
                            <!-- json  -->
                        </tbody>

                        <!-- TYPE 4 -->
                        <thead title="Hot Cafe Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl4">
                                    Hot Cafe
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="inventory-type4-box">
                            <!-- json  -->
                        </tbody>
                        <!-- TYPE 5 -->
                        <thead title="Ice Cafe Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl5">
                                    Ice Cafe
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="inventory-type5-box">
                            <!-- json  -->
                        </tbody>

                        <!-- TYPE 6 -->
                        <thead title="Frappe Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl6">
                                    Frappe
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="inventory-type6-box">
                            <!-- json  -->
                        </tbody>

                        <!-- TYPE 7 -->
                        <thead title="Khvet Signature Category">
                            <tr style="font-size: 110%;">
                                <th scope="col" class="pl-3 cl7">
                                    Khvet Signature
                                </th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>

                        </thead>

                        <tbody id="inventory-type7-box">
                            <!-- json  -->
                        </tbody>


                    </table>

                    <div id="inv-print-pdf" class="btn btn-danger p-1 float-right mb-3" style="width:100px;font-size: 100%" onclick="GetInventoryPrint()">
                        <span>
                            PDF
                        </span>
                    </div>
                    <div id="inv-print-xls" class="btn btn-success p-1 float-right mb-3 mr-2" style="width:100px;font-size: 100%">
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

<div id="inventory-print" class="table-checkout p-2" style="size:A4;margin:0 auto;font-size: 80%; display:none">

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

    <p class="mb-2 text-center font-weight-bold" style="font-size: 130%;">Daily Check Inventorys</p>
    <p class="mb-2 text-center font-weight-bold mt-0" style="font-size: 110%;">Date : <span id="inv-date-text"> </span></p>

    <table class="table table-sm table-striped table-hover bgh mb-1">

        <thead>
            <tr>
                <th scope="col" style="width:18%" class="pl-3">N&#186;</th>
                <th scope="col">Name</th>
                <th scope="col" style="width:10%">Stock</th>
                <th scope="col" style="width:10%">In</th>
                <th scope="col" style="width:10%">Sold Out</th>
                <th scope="col" style="width:10%">Balance</th>

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
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="pinventory-type1-box">
            <!-- json  -->
        </tbody>

        <!-- TYPE 2 -->
        <thead title="Drink Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl2">
                    Drink
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="pinventory-type2-box">
            <!-- json  -->
        </tbody>

        <!-- TYPE 3 -->
        <thead title="Beer Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl3">
                    Beer
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="pinventory-type3-box">
            <!-- json  -->
        </tbody>

        <!-- TYPE 4 -->
        <thead title="Hot Cafe Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl4">
                    Hot Cafe
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>

        </thead>

        <tbody id="pinventory-type4-box">
            <!-- json  -->
        </tbody>
        <!-- TYPE 5 -->
        <thead title="Ice Cafe Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl5">
                    Ice Cafe
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>

        </thead>

        <tbody id="pinventory-type5-box">
            <!-- json  -->
        </tbody>

        <!-- TYPE 6 -->
        <thead title="Frappe Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl6">
                    Frappe
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>

        </thead>

        <tbody id="pinventory-type6-box">
            <!-- json  -->
        </tbody>

        <!-- TYPE 7 -->
        <thead title="Khvet Signature Category">
            <tr style="font-size: 110%;">
                <th scope="col" class="pl-3 cl7">
                    Khvet Signature
                </th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>

        </thead>

        <tbody id="pinventory-type7-box">
            <!-- json  -->
        </tbody>


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
    function GetInventoryPrint() {
        // $("#inventory-wrapper").hide();
        $("#inventory-print").show();
        window.print();
        $("#inventory-print").hide();
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

    function getInventory(selectdate) {
        document.getElementById("inventory-type1-box").innerHTML = '';
        document.getElementById("inventory-type2-box").innerHTML = '';
        document.getElementById("inventory-type3-box").innerHTML = '';
        document.getElementById("inventory-type4-box").innerHTML = '';
        document.getElementById("inventory-type5-box").innerHTML = '';
        document.getElementById("inventory-type6-box").innerHTML = '';
        document.getElementById("inventory-type7-box").innerHTML = '';

        document.getElementById("pinventory-type1-box").innerHTML = '';
        document.getElementById("pinventory-type2-box").innerHTML = '';
        document.getElementById("pinventory-type3-box").innerHTML = '';
        document.getElementById("pinventory-type4-box").innerHTML = '';
        document.getElementById("pinventory-type5-box").innerHTML = '';
        document.getElementById("pinventory-type6-box").innerHTML = '';
        document.getElementById("pinventory-type7-box").innerHTML = '';

        var id1, id2, id3, id4, id5, id6, id7;
        id1 = id2 = id3 = id4 = id5 = id6 = id7 = 1;

        $.ajax({
            url: "../Inventory/GetInventory",
            type: 'post',
            dataType: 'json',
            data: {
                selectdate: selectdate,
            },
            beforeSend: function(data) {
                var data =
                    `<div id="loading" style="display: flex;align-items: center;justify-content: center;">
							<div style="width: 150px;height: 150px;">
								<img src="../public/images/icons/loading.gif" style="max-width: 100%;border-radius:100px">
							</div>

						</div>
						`
                $('#loading-inventorys').html(data);
            },

            success: function(data) {
                $('#loading').hide();

                if (data.length == '') {
                    var nosaleid = `
							<div class="alert alert-success" role="alert" style="width: 800px;margin: 0 auto;font-size: 80%;">
								No Inventory on that day ! Please select another day.
							</div>`
                    $("#no-inventorys").html(nosaleid);
                    $('.table-inventorys').hide();

                } else {

                    $("#no-inventorys").html("");
                    $('.table-inventorys').show();
                }

                $.each(data, function(key, item) {

                    if (item.typeproduct == 1) {
                        var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id1++ + `-</td>
                            <td class="khmer">` + item.name + `</td>
                            <td class="khmer">` + item.stock + `</td>
                            <td class="khmer">` + item.stock_in + `</td>
                            <td class="khmer">` + item.sold_out + `</td>
                            <td class="khmer">` + item.balance + `</td>
  
                                                
                        </tr>`
                        $('#inventory-type1-box').append(data);
                        $('#pinventory-type1-box').append(data);

                    } else if (item.typeproduct == 2) {
                        var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id2++ + `-</td>
                            <td class="khmer">` + item.name + `</td>
                            <td class="khmer">` + item.stock + `</td>
                            <td class="khmer">` + item.stock_in + `</td>
                            <td class="khmer">` + item.sold_out + `</td>
                            <td class="khmer">` + item.balance + `</td>

                                                
                        </tr>`
                        $('#inventory-type2-box').append(data);
                        $('#pinventory-type2-box').append(data);

                    } else if (item.typeproduct == 3) {
                        var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id3++ + `-</td>
                            <td class="khmer">` + item.name + `</td>
                            <td class="khmer">` + item.stock + `</td>
                            <td class="khmer">` + item.stock_in + `</td>
                            <td class="khmer">` + item.sold_out + `</td>
                            <td class="khmer">` + item.balance + `</td>

                                                
                        </tr>`
                        $('#inventory-type3-box').append(data);
                        $('#pinventory-type3-box').append(data);

                    } else if (item.typeproduct == 4) {
                        var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id4++ + `-</td>
                            <td class="khmer">` + item.name + `</td>
                            <td class="khmer">` + item.stock + `</td>
                            <td class="khmer">` + item.stock_in + `</td>
                            <td class="khmer">` + item.sold_out + `</td>
                            <td class="khmer">` + item.balance + `</td>

                                                
                        </tr>`
                        $('#inventory-type4-box').append(data);
                        $('#pinventory-type4-box').append(data);

                    } else if (item.typeproduct == 5) {
                        var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id5++ + `-</td>
                            <td class="khmer">` + item.name + `</td>
                            <td class="khmer">` + item.stock + `</td>
                            <td class="khmer">` + item.stock_in + `</td>
                            <td class="khmer">` + item.sold_out + `</td>
                            <td class="khmer">` + item.balance + `</td>

                                                
                        </tr>`
                        $('#inventory-type5-box').append(data);
                        $('#pinventory-type5-box').append(data);

                    } else if (item.typeproduct == 6) {
                        var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id6++ + `-</td>
                            <td class="khmer">` + item.name + `</td>
                            <td class="khmer">` + item.stock + `</td>
                            <td class="khmer">` + item.stock_in + `</td>
                            <td class="khmer">` + item.sold_out + `</td>
                            <td class="khmer">` + item.balance + `</td>

                                                
                        </tr>`
                        $('#inventory-type6-box').append(data);
                        $('#pinventory-type6-box').append(data);

                    } else if (item.typeproduct == 7) {
                        var data = `
                        <tr>
                            <td class="khmer pl-3" scope="row">` + id7++ + `-</td>
                            <td class="khmer">` + item.name + `</td>
                            <td class="khmer">` + item.stock + `</td>
                            <td class="khmer">` + item.stock_in + `</td>
                            <td class="khmer">` + item.sold_out + `</td>
                            <td class="khmer">` + item.balance + `</td>

                            
                                                
                        </tr>`
                        $('#inventory-type7-box').append(data);
                        $('#pinventory-type7-box').append(data);

                    }


                })
            }
        })
    }

    function GetSoldOut() {
        $.ajax({
            url: '../Order/AddInventory/',
            type: 'post',
            success: function(data) {}
        });
    }

    $(document).ready(function() {
        var gettitlepage = localStorage.getItem("title_page");
        $('head > title').text('KhvetSiemreap | ' + gettitlepage);

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


        GetSoldOut();
        var today = moment().format('YYYY-MM-DD');
        var getlocal_invdate = localStorage.getItem("local-inv-date");

        if (getlocal_invdate == null) {
            getInventory(today);
            $("#select-date").val(today);
        } else {
            getInventory(getlocal_invdate);
            $("#select-date").val(getlocal_invdate);
        }

        $("#find-inventory").on('click', function() {

            $('.table-inventorys').hide();
            $("#no-inventorys").html("");
            var selectdate = $("#select-date").val();
            localStorage.setItem("local-inv-date", selectdate);
            var getlocal_invdate = localStorage.getItem("local-inv-date");

            if (getlocal_invdate != '') {
                getInventory(getlocal_invdate);
                $('#inv-date-text').text($("#select-date").val());
            } else {
                alert("Please Select The Date")
            }
        })


        $('#pos-button,#lgimg,#lgname').on('click', function() {
            CheckTable2();
            getTable2();
            window.location.href = "../Home";
        })


        $('#inv-date-text').text($("#select-date").val());

        $("#inv-print-xls").click(function() {
            var selectdate = $("#select-date").val();
            TableToExcel.convert(document.getElementById("inventory-print"), {
                name: "Inventory" + selectdate + ".xlsx",
                sheet: {
                    name: "Sheet1"
                }
            });
        });


    });
</script>