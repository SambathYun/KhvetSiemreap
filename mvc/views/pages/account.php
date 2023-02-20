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
                            <p class="khmer-font cl" style="font-size:140%">ខ្វិត សៀមរាប</p>
                        </div>
                    </div>
                </div>

                <div id="menu-box" class="row m-0">

                    <div class="col-12 p-0">
                        <div class="p-2" style="width: 100%;height: 55px;">
                            <div class="float-left" style="width: 50px;height: 40px;">
                                <img src="../public/images/profile/<?php echo $_SESSION['profile'] ?>" width="40px" height="40px;" style="object-fit: cover;max-width: 100%;border-radius:100px;">
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
                            Accounts~Manage
                        </p>
                    </div>

                    <div id="pos-button" class="btn bgh float-right" title="Back to Home">
                        <span class="pos-text">
                            POS
                        </span>
                    </div>
                    <div style="clear: both;"></div>

                </div>

                <!--  -->

                <a href="../Account/GetAddAccount" style="color: black;text-decoration: none;">
                    <div class="text-center p-2">
                        <button class="btn btn-primary btn-all"><i class="fa-solid fa-plus mr-1"></i>Add Account</button>
                    </div>
                </a>

                <!--  -->

                <div class="px-2" style="height: calc(100vh - 132px);overflow-y: auto;">

                    <div class="table-accounts">
                        <table id="table" class="table table-striped table-hover bgh mb-1 ">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%; ">Profile</th>
                                    <th scope="col" style="width: 15%;">NameDisplay</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col" class="col-action">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($data["AccountsManage"])) {
                                    echo '
                                <tr>
                                    <th style="vertical-align: middle;">
                                        <div style="width:60px; height:60px;">
                                            <img src="../public/images/profile/' . $row["profile"] . '" style="border-radius:5px;max-width: 100%;max-height:100%;"> 
                                        </div>
                                    </th>
                                	    <td style="vertical-align: middle;">' . $row["namedisplay"] . ' </td>
                                	    <td style="vertical-align: middle;">' . $row["username"] . ' </td>
                                        <td style="vertical-align: middle;">' . $row["role"] . ' </td>
                                        <td style="vertical-align: middle;">' . $row["phone"] . ' </td>
                                        <td style="vertical-align: middle;">' . $row["gender"] . ' </td>
                                	    <td style="vertical-align: middle;">
                                            <a href="../Account/GetEditAccount/' . $row["id"] . '" style="text-decoration: none;color:black;">
                                                <div class="btn btn-success float-left mr-2 btn-croud" style="font-size: 90%">
                                                    <i class="fa fa-pencil-square-o mr-1" aria-hidden="true"></i>
                                                    <span class="text-croud"> Edit </span>
                                                </div>
                                            </a>

                                            <a style="text-decoration: none;color:black;display:block" onclick="DeleteAccount(`' . $row["id"] . '`,`' . $row["namedisplay"] . '`)">
                                                <div class="btn btn-danger btn-croud" style="font-size: 90%">
                                                    <i class="fa fa-trash-o mr-1" aria-hidden="true"></i>
                                                    <span class="text-croud"> Delete </span>
                                                </div>
                                            </a>
                                        </td>
                                </tr>';
                                }
                                ?>

                            </tbody>

                        </table>
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

    function DeleteAccount(id, namedisplay) {
        if (confirm('Are you sure you want to delete  ' + namedisplay + '  ?')) {
            $.post("../Account/DeleteAccount/", {
                id: id,
                namedisplay: namedisplay,
            }, function(data) {
                window.location.href = "../Account/AccountsManage";
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


        localStorage.removeItem("local-add-namedisplay");
        localStorage.removeItem("local-add-username");
        localStorage.removeItem("local-add-password");
        localStorage.removeItem("local-add-role");
        localStorage.removeItem("local-add-phone");
        localStorage.removeItem("local-add-gender");


        localStorage.removeItem("eda-check");

        $('#pos-button,#lgimg,#lgname').on('click', function() {
            CheckTable2();
            getTable2();
            window.location.href = "../Home";
        })

    });
</script>