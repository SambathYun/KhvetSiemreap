<?php include("./mvc/views/partials/theme.php"); ?>
<div class="container-fluid p-0">
    <div class="row m-0">
        <!-- side1 -->
        <div id="side1" class="sidebar-1 closed p-2 bg2 scroll_hide">

            <div id="logo1" class="col-12 p-0">
                <div class="d-flex justify-content-center" style="width: 100%;height: 100px;">
                    <div style="width: 65px; height:65px;margin-top:6px;">
                        <img id="lgimg" src="../../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;cursor:pointer;">
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
                        <img src="../../public/images/logo/khvetsiemreap1.jpg" style="object-fit: cover;border-radius:5px;max-width: 100%;">
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
                            <img src="../../public/images/profile/<?php echo $_SESSION['profile'] ?>" width="40px" height="40px;" style="object-fit: cover;border-radius:100px;">
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
        <!-- side 2 -->
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
                        Account / Edit~Account
                    </p>
                </div>

                <div id="back-button" class="btn bgh float-right" title="Cancel">
                    <span class="pos-text">
                    </span>
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </div>

                <div style="clear: both;"></div>

            </div>

            <!--  -->


            <div class="p-2" style="height: calc(100vh - 78px);overflow-y: auto;">

                <!--  -->

                <div class="py-2 px-4 bgh table-editaccount">


                    <form id="save_order" action="../SetEditAccount" method="post" enctype='multipart/form-data' onsubmit="return confirm('Do you really want to edit your account?')">

                        <?php
                        $hideRole;
                        $hideGender;
                        while ($row = mysqli_fetch_array($data["account"])) {


                            if ($row["role"] == "Cashier") {
                                $hideRole = "
								<option value='Accountant'>Accountant</option>
								<option value='Administrator'>Administrator</option>
	
								";
                            } else if ($row["role"] == "Accountant") {
                                $hideRole = "
								<option value='Cashier'>Cashier</option>
                                <option value='Administrator'>Administrator</option>

								";
                            } else if ($row["role"] == "Administrator") {
                                $hideRole = "
								<option value='Cashier'>Cashier</option>
                                <option value='Accountant'>Accountant</option>

								";
                            }

                            if ($row["gender"] == 'Male') {
                                $hideGender = '
                                    <input type="radio" id="male" name="gender" value="Male" checked="checked">
                                    <label class="w-50 ml-1" for="male">Male</label>

                                    <input type="radio" id="female" name="gender" value="Female" >
                                    <label class="ml-1" for="female">Female</label><br>
                                ';
                            } else if ($row["gender"] == "Female") {
                                $hideGender = '
                                    <input type="radio" id="male" name="gender" value="Male">
                                    <label class="w-50 ml-1" for="male">Male</label>
        
                                    <input type="radio" id="female" name="gender" value="Female" checked="checked">
                                    <label class="ml-1" for="female">Female</label><br>
                                ';
                            }

                            echo '
                                <input value="' . $row["id"] . '" name="idaccount" style="display:none">
                                <p id="submit" class="text-center font-weight-bold" style="font-size: 130%">Edit a New Account</p>

                                <label>NameDisplay</label>
                                <input type="text" class="form-control" style="background: none;" name="namedisplay" value ="' . $row['namedisplay'] . '">

                                <label class="mt-2">Username</label>
                                <input type="text" class="form-control" style="background: none;" name="username" value ="' . $row['username'] . '">

                                <label class="mt-2">Password</label>
                                <input type="password" class="form-control" style="background: none;" name="password" step="any">

                                <label class="mt-2">Role</label>
                                <select class="form-control" id="exampleFormControlSelect1" style="background: none;" name="role">
                                    <option  value ="' . $row['role'] . '">' . $row['role'] . '</option>
                                    ' . $hideRole . '

                                </select>

                                <label class="mt-2">Phone</label>
                                <input type="number" class="form-control" style="background: none;" name="phone" step="any" value ="' . $row['phone'] . '">

                                <div class="mt-3">
                                    ' . $hideGender . '
                                </div>


                                <label class="mt-2">Image</label><br>
                                <input type="file" name="upload" accept="image/png, image/gif, image/jpeg">

                                <div class="text-center mt-3 mb-3">
                                    <button type="submit" class="btn btn-success" style="font-size:110%">Edit Account</button>
                                </div>
                                

                         
                            ';
                        }
                        ?>

                        <p id="eda-status" class="text-center text-danger"></p>

                    </form>


                </div>



            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('head > title').text('KhvetSiemreap | EditAccount');

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


        var status = localStorage.getItem('eda-check');
        $('#eda-status').text(status);

        $('#back-button').on('click', function() {
            window.location.href = "../../Account/AccountsManage";
        })
        $('#lgimg,#lgname').on('click', function() {
            window.location.href = "../../Home";
        })


    });
</script>