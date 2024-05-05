<ul class="nav user-menu">

<li class="nav-item dropdown has-arrow main-drop">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-img"><img src='<?php echo "../" . $userdata["user_profile_photo"]?>' alt="">
            <span class="status online"></span></span>
    </a>
    <div class="dropdown-menu menu-drop-user">
    <div class="profilename">
        <div class="profileset">
            <span class="user-img"><img src='<?php echo "../" . $userdata["user_profile_photo"]?>' alt="">
                <span class="status online"></span></span>
            <div class="profilesets">
                <h6><?php echo $userdata["user_name"];?></h6>
                <h5><?php echo ($userdata["role"] == 1)? "Admin":"Instructor";?></h5>
            </div>
        </div>
        <hr class="m-0">
        <a class="dropdown-item" href="../myaccount.php"> <i class="me-2" data-feather="user"></i>Student Dashboard</a>
        <!-- <a class="dropdown-item" href="generalsettings.php"><i class="me-2"
                data-feather="settings"></i>Settings</a> -->
        <hr class="m-0">
        <a class="dropdown-item logout pb-0" href="../logout.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
    </div>
</div>
</li>
</ul>

<div class="dropdown mobile-user-menu">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="../myaccount.php">Student Dashboard</a>
        <!-- <a class="dropdown-item" href="generalsettings.php">Settings</a> -->
        <a class="dropdown-item logout pb-0" href="../logout.php">Logout</a>
    </div>
</div>

</div>