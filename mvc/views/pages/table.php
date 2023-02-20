<?php include("./mvc/views/partials/theme.php");
if ($_SESSION['role'] == "Administrator" || $_SESSION['role'] == "Accountant") {
?>
    <div class="container-fluid p-0">
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
                            <span class="cl mb-0 eng_name khmer">Khvet Siemreap</apan>
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
                                <img src="../public/images/profile/<?php echo $_SESSION['profile'] ?>" width="40px" height="40px;" style="object-fit: cover;border-radius:100px;" title='Your Profile'>
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

            <!-- side2 -->
            <div class="sidebar-2 change p-0 bg1">

                <!--  -->
                <div class="head-content py-3 mx-3 bg1" style="border-bottom: 1px solid rgba(0,0,0,.125);">

                    <div id="toggle-bar">
                        <a class="toggle float-left btn mr-3 bgh ">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="float-left pt-1" style="height:45px">
                        <p class="float-left font-weight-bold mb-0 header-text">
                            Tables~Manage
                        </p>
                    </div>

                    <div id="pos-button" class="btn bgh float-right">
                        <span class="pos-text">
                            POS
                        </span>
                    </div>

                    <div style="clear: both;"></div>

                </div>

                <!--  -->

                <a style="color: black;text-decoration: none;">
                    <div class="text-center p-2">
                        <div id="add-btn" class="btn btn-primary btn-all"><i class="fa-solid fa-plus mr-1"></i>Add Table</div>
                    </div>
                </a>

                <!--  -->

                <div class="px-2" style="height: calc(100vh - 132px);overflow-y: auto;">

                    <div class="table-tables">

                        <table id="table" class="table table-striped table-hover bgh mb-1 ">
                            <thead>
                                <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col" style="width: 38%;">Type</th>
                                    <th scope="col" class="col-action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $typeText;
                                while ($row = mysqli_fetch_array($data["TablesManage"])) {
                                    if ($row["type"] == 1) {
                                        $typeText = "Small";
                                    } else if ($row["type"] == 2) {
                                        $typeText = "Medium";
                                    } else if ($row["type"] == 3) {
                                        $typeText = "Large";
                                    } else if ($row["type"] == 4) {
                                        $typeText = "Circle";
                                    }

                                    echo '<tr>
                                        <td style=" vertical-align: middle;">#' . $row["number"] . '</td>
                                        <td style=" vertical-align: middle;">' . $typeText . '</td>
                                        <td style=" vertical-align: middle;">
                                            <a style="text-decoration: none;color:black;" onclick="EditTable(' . $row["id"] . ',' . $row['number'] . ',' . $row['type'] . ')">
                                                <div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
                                                    <i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
                                                    <span class="text-croud"> Edit </span>
                                                </div>
                                            </a>

                                            <a style="text-decoration: none;color:black;" onclick="DeleteTable(' . $row["id"] . ')">
                                                <div class="btn btn-danger btn-croud" style="font-size: 90%">
                                                    <i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
                                                    <span class="text-croud"> Delete </span>
                                                </div>
                                            </a>
                                        </td>
                                    ';
                                }
                                ?>
                            </tbody>
                        </table>

                        <div id="modalDialog" class="modal">
                            <div class="modal-content animate-top">

                                <!-- form add table -->
                                <form id="form-addtable" class="form-add-table">
                                    <div class="modal-header">
                                        <h5 class="modal-title">...</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="display: flex;">

                                            <div class="px-2" style="width: 50%">
                                                <label>Number</label><br>
                                                <input id="number-table" type="number" class="form-control" name="numberTable">
                                            </div>

                                            <div class="px-2" style="width: 50%">
                                                <label>Type</label><br>
                                                <select id="type-table" class="form-control" name="typeTable">
                                                    <option value="1">Small</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">Large</option>
                                                    <option value="4">Circle</option>
                                                </select>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="modal-footer  d-flex justify-content-between">
                                        <p id="adt-status" class="text-danger mb-0 ml-2"></p>
                                        <button type="submit" class="btn btn-primary  modal-btn">Add Table</button>
                                    </div>

                                </form>

                                <!-- form edit table -->
                                <form id="form-edittable" class="form-edit-table" style="display: none;">
                                    <div class="modal-header">
                                        <h5 class="modal-title">...</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div style="display: flex;">

                                            <input id="idTable" type="" name="idTable" style="display: none;">
                                            <div class="px-2" style="width: 50%">
                                                <label>Number</label><br>
                                                <input id="numberTable" type="number" class="form-control" name="numberTable">
                                            </div>

                                            <div class="px-2" style="width: 50%">
                                                <label>Type</label><br>
                                                <select id="typeTable" class="form-control" name="typeTable">
                                                    <option value="1">Small</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">Large</option>
                                                    <option value="4">Circle</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="modal-footer d-flex justify-content-between">

                                        <p id="edt-status" class="text-danger mb-0 ml-2"></p>
                                        <button type="submit" class="btn btn-primary modal-btn float-right">Edit Table</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php
} else {
    include("./mvc/views/partials/notfound.php");
}
?>

<script type="text/javascript">
    // When the user clicks anywhere outside of the modal, close it
    $('body').bind('click', function(e) {
        if ($(e.target).hasClass("modal")) {
            $('#modalDialog').hide();
        }
    });

    $(document).ready(function() {
        // When the user clicks the button, open the modal 
        $("#add-btn").on('click', function() {
            $("#adt-status").text("");
            $('#modalDialog').show();
            $(".modal-title").text("Create a New Table");
            $(".form-add-table").show();
            $(".form-edit-table").hide();
        });

        // When the user clicks on  (x), close the modal
        $(".close").on('click', function() {
            $('#modalDialog').hide();
        });
    });
    $(document).ready(function() {

        $('#form-edittable').submit(function(e) {
            e.preventDefault();
            var idtable = $("#idTable").val();
            var numbertable = $("#numberTable").val();
            var typetable = $("#typeTable").val()

            if (confirm('Are you sure ?')) {
                if (numbertable == "") {
                    $("#edt-status").text("Table number cannot be empty!");
                } else {
                    $.ajax({
                        type: "POST",
                        url: '../Table/EditTable/',
                        data: {
                            idTable: idtable,
                            numberTable: numbertable,
                            typeTable: typetable,
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#edt-status").text("Duplicate Table number!");
                            } else {
                                window.location.href = "../Table/TablesManage";
                            }

                        }
                    });

                }

            }
        });

        $('#form-addtable').submit(function(e) {
            e.preventDefault();

            var numbertable = $("#number-table").val();
            var typetable = $("#type-table").val()
            if (confirm('Are you sure ?')) {
                if (numbertable == "") {
                    $("#adt-status").text("Table number cannot be empty!");
                } else {
                    $.ajax({
                        type: "POST",
                        url: '../Table/AddTable/',
                        data: {
                            numbertable: numbertable,
                            typetable: typetable,
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#adt-status").text("Duplicate Table number!");
                            } else {
                                window.location.href = "../Table/TablesManage";
                            }
                        }
                    });

                }

            }
        });

    });

    function EditTable(id, number, type) {
        $("#edt-status").text("");
        $('#modalDialog').show();
        $(".modal-title").text("Edit a New Table");
        $(".form-add-table").hide();
        $(".form-edit-table").show();
        $("#numberTable").val(number);
        $("#typeTable").val(type);
        $("#idTable").val(id);

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

    function DeleteTable(id) {

        if (confirm('Are you sure ?')) {
            $.post("../Table/DeleteTable/", {
                id: id
            }, function(data) {
                window.location.href = "../Table/TablesManage";
            })
        }

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

        $('#pos-button,#lgimg,#lgname').on('click', function() {
            CheckTable2();
            getTable2();
            window.location.href = "../Home";
        })

    });
</script>