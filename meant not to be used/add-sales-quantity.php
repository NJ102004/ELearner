<?php
include("includes/database/connection.php");
   
session_start();
   if(isset($_SESSION['id']) && (trim ($_SESSION['id']) !== '')){
       $userid = $_SESSION['id'];
   }else{
		header('location:signin.php');
   }
    $query = "SELECT * FROM user_master WHERE user_id = $userid";
    $result = mysqli_query($conn, $query);
    $userdata = mysqli_fetch_assoc($result);
   $user_name = $userdata["user_name"];

       // Checking weather company details are inserted or not
       $queryForCompany = "SELECT * FROM company_master WHERE company_owner_id = $userid";
       $resultForCompany = mysqli_query($conn, $queryForCompany);
       if (mysqli_num_rows($resultForCompany) == 0) {
           $_SESSION['message'] = "Please fill company details first.";
           header("Location: company.php");
       }
   
       // Checking weather Barcode details are inserted or not
       $queryForBarcodeDetails = "SELECT * FROM barcode_format WHERE barcode_for = $userid";
       $resultForBarcodeDetails = mysqli_query($conn, $queryForBarcodeDetails);
       if (mysqli_num_rows($resultForBarcodeDetails) == 0) {
           $_SESSION['message'] = "Please set barcode format first.";
           header("Location: barcode-details.php");
       }

       
        $selectedProducts = $_POST['selectedProducts'];
        if(empty($selectedProducts)){
        $_SESSION['message'] = "All fields are required.";
        header("location: add-sales.php");
        }

    //        $cname = $_POST["c_name"];
    //        $cemail = $_POST["c_email"];
    //     $sql="INSERT INTO `customer_master` (`customer_name`, `customer_email`,`customer_added_by`) VALUES ('$cname', '$cemail', '$userid')";
    //     $selectedCustomer = mysqli_insert_id($conn);
    //     $result = mysqli_query($conn, $sql);
       
    //    }else{
    //         $selectedCustomer = $_POST['customerId'];
    //    }
//    $selectedSupplier = $_POST['supplierId'];
// $selectedCustomer = $_POST['customerId'];
    $date = $_POST['selectedDate'];
    $ymd = date("Y-m-d", strtotime($date));
   $selectedDate = $ymd;
   $selectedProducts = $_POST['selectedProducts'];

   $_SESSION['selectedCustomer'] = $_POST['selectedCustomer'];
//    $_SESSION['selectedSupplier'] = $_POST['supplierId'];


//    $estimateddate = $_POST['selectedEstimatedDate'];
//    $cmd =  date("Y-m-d", strtotime($estimateddate));
//    $SelectedEstimateDate = $cmd ;     

//    $_SESSION['selectedEstimatedDate'] = $cmd;
   $_SESSION['selectedDate'] = $ymd;
   $_SESSION['selectedProducts'] = $_POST['selectedProducts'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Add sale</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style>
        #selectionList {
            width: 100%;
            height: 300px;
            margin: 1%;
            border-color: orange;
        }
        #selectionList option{
            margin: 1%;
        }
    </style>
</head>

<body>
    <!-- <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div> -->

    <div class="main-wrapper">

        <div class="header bor">

            <div class="header-left active">
            <a href="index.php" class="logo" style="font-size:35px; color:red; font-weight:bold; margin-left:23px;">
                    Simplify
                </a>
                <a href="index.php" class="logo-small" style="font-size:32px; color:red; font-weight:bold;">
                    S
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

<li class="nav-item">
    <div class="top-nav-search">
        <a href="javascript:void(0);" class="responsive-search">
            <i class="fa fa-search"></i>
        </a>
        <form action="#">
            <div class="searchinputs">
                <input type="text" placeholder="Search Here ...">
                <div class="search-addon">
                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                </div>
            </div>
            <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
        </form>
    </div>
</li>
<li class="nav-item dropdown has-arrow main-drop">
    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-img"><img src="<?php echo $userdata["user_profile"]?>" alt="">
            <span class="status online"></span></span>
    </a>
    <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
            <div class="profileset">
                <span class="user-img"><img src="<?php echo $userdata["user_profile"]?>" alt="">
                    <span class="status online"></span></span>
                <div class="profilesets">
                    <h6>
                        <?php echo $userdata["user_name"]?>
                    </h6>
                    <h5>
                        <?php echo $userdata["user_role"]?>
                    </h5>
                </div>
            </div>
            <hr class="m-0">
            <a class="dropdown-item" href="profile.php"> <i class="me-2" data-feather="user"></i> My Profile</a>
            <!-- <a class="dropdown-item" href="generalsettings.php"><i class="me-2"
                    data-feather="settings"></i>Settings</a>
            <hr class="m-0"> -->
            <a class="dropdown-item logout pb-0" href="logout.php"><img
                    src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
        </div>
    </div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="profile.php">My Profile</a>
    <!-- <a class="dropdown-item" href="generalsettings.php">Settings</a> -->
    <a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>

</div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                        <li>
                            <a href="index.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>
                                    Product</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="productlist.php">Products</a></li>
                                <!-- <li><a href="addproduct.php">Add Product</a></li> -->
                                <li><a href="categorylist.php">Categories</a></li>
                                <!-- <li><a href="addcategory.php">Add Category</a></li> -->
                              
                                <li><a href="brandlist.php">Brands</a></li>
                                <!-- <li><a href="addbrand.php">Add Brand</a></li> -->
                                <li><a href="importproduct.php">Import & Export</a></li>
                                <li><a href="barcode.php">Print Barcode</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/sales1.svg" alt="img"><span>
                                    Sales</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="saleslist.php" class="active">Sales</a></li>
                                <li><a href="pos.php">POS</a></li>
                                <!-- <li><a href="add-sales.php">New Sales</a></li> -->
                                <!-- <li><a href="salesreturnlists.php">Sales Return List</a></li>
                                <li><a href="createsalesreturns.php">New Sales Return</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/purchase1.svg" alt="img"><span>
                                    Purchase</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="purchaselist.php">Purchases</a></li>
                                <!-- <li><a href="addpurchase.php">Add Purchase</a></li> -->
                                <!-- <li><a href="importpurchase.php">Import Purchase</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/expense1.svg" alt="img"><span>
                                    Expense</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="expenselist.php">Expenses</a></li>
                                <!-- <li><a href="createexpense.php">Add Expense</a></li> -->
                                <!-- <li><a href="expensecategory.php">Expense Category</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/quotation1.svg" alt="img"><span>
                                    Quotation</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="quotationList.php">Quotations</a></li>
                                <!-- <li><a href="addquotation.php">Add Quotation</a></li> -->
                            </ul>
                        </li>
                        <!-- <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/transfer1.svg" alt="img"><span>
                                    Transfer</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="transferlist.php">Transfer List</a></li>
                                <li><a href="addtransfer.php">Add Transfer </a></li>
                                <li><a href="importtransfer.php">Import Transfer </a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"><span>
                                    Return</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="salesreturnlist.php">Sales Return List</a></li>
                                <li><a href="createsalesreturn.php">Add Sales Return </a></li>
                                <li><a href="purchasereturnlist.php">Purchase Return List</a></li>
                                <li><a href="createpurchasereturn.php">Add Purchase Return </a></li>
                            </ul>
                        </li> -->
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                                    People</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="customerlist.php">Customers</a></li>
                                <!-- <li><a href="addcustomer.php">Add Customer </a></li> -->
                                <li><a href="supplierlist.php">Suppliers</a></li>
                                <!-- <li><a href="addsupplier.php">Add Supplier </a></li> -->
                                <!-- <li><a href="userlist.php">User List</a></li>
                                <li><a href="adduser.php">Add User</a></li>
                                <li><a href="storelist.php">Store List</a></li>
                                <li><a href="addstore.php">Add Store</a></li> -->
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/places.svg" alt="img"><span>
                                    Places</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <!-- <li><a href="newcountry.php">New Country</a></li> -->
                                <li><a href="countrieslist.php">Countries</a></li>
                                <!-- <li><a href="newstate.php">New State </a></li> -->
                                <li><a href="statelist.php">States</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/time.svg" alt="img"><span>
                                    Report</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <!-- <li><a href="purchaseorderreport.php">Purchase order report</a></li> -->
                                <li><a href="inventoryreport.php">Inventory Report</a></li>
                                <li><a href="salesreport.php">Sales Report</a></li>
                                <!-- <li><a href="invoicereport.php">Invoice Report</a></li> -->
                                <li><a href="purchasereport.php">Purchase Report</a></li>
                                <!-- <li><a href="supplierreport.php">Supplier Report</a></li>
                                <li><a href="customerreport.php">Customer Report</a></li> -->
                            </ul>
                        </li>
                        <!-- <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>
                                    Users</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="newuser.php">New User </a></li>
                                <li><a href="userlists.php">Users List</a></li>
                            </ul>
                        </li>-->
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/settings.svg" alt="img"><span>
                                    Settings</span> <span class="menu-arrow"></span></a>
                            <ul>
                                  <!-- <li><a href="subcategorylist.php">Sub-Categories</a></li> -->
                                  <li><a href="barcode-setting.php">Barcode</a></li>
                                  <li><a href="company-details.php">Company details</a></li>
                                <!-- <li><a href="subaddcategory.php">Add Sub Category</a></li> -->
                            </ul>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
   
        <div class="page-wrapper">
            <div class="content">
             <!-- alert-box -->
            <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
            <!-- alert-box End -->
            <form action="add-sales-confirm.php" method="post">
                <div class="row">
                    <div class="col-lg-2 ">
                        Name:
                    </div>
                    <div class="col-lg-2 ">
                        Quantity:
                    </div>
                    <div class="col-lg-2 ">
                        Price:
                    </div>
                    <div class="col-lg-2 ">
                        Select Quantity:
                    </div>
                </div>
                <?php

                foreach ($selectedProducts as $productIdfromArray) {
                    $txtboxname = "textbox_" . $productIdfromArray;
                    $txtpriceboxname = "price_" . $productIdfromArray;
                    $sqlofarray="SELECT * FROM `product` WHERE product_id = $productIdfromArray";
                    $resultofarray=mysqli_query($conn,$sqlofarray);
                    while($data=mysqli_fetch_array($resultofarray)){
                        $maxvalue = $data['product_quantity'];
                        // echo $cmd;
                    ?>
                    <br>
                    <div class="row">
                    <div class="col-lg-2 ">
                        <?php echo $data['product_name'];?>
                    </div>
                    <div class="col-lg-2 ">
                        <?php echo $data['product_quantity'];?>
                    </div>
                    <div class="col-lg-2 ">
                       <input type="number" min="0" value= "<?php echo $data['product_price']?>" class="form-control" name="<?php echo $txtpriceboxname?>">
                    </div>
                    <div class="col-lg-2 ">
                        <input type="number" min="1" max="<?php echo $maxvalue;?>"value= "1" class="form-control" name="<?php echo $txtboxname?>">
                    </div>
                </div>
                <?php
                    }
                }
                ?>
                <br><br><br>
                <div class="row">
                    <div class="col-lg-2 ">
                        <label>Discount</label>
                        <input type="number" value="0" min="0" max="100" class="form-control" placeholder="Enter discount" name="discountTextBox">
                    </div>
                    <div class="col-lg-2 ">
                        <label>Tax</label>
                        <input type="number" value="0" min="0" max="100" class="form-control" placeholder="Enter Tax" name="taxTextBox">
                    </div>
                </div>
               <br> 
               <input type="submit" value="Save and continue" class="btn btn-submit me-2">
                </div>
            </form>
            </div>
        </div>
    </form>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script>



    </script>
</body>

</html>