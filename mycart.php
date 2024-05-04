<?php
    require 'includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['educat_logedin_user_id']) && (trim ($_SESSION['educat_logedin_user_id']) !== '')){
        $user_id = $_SESSION['educat_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["role"];
    }

    // check user getin via get method or direct
    if(isset($_GET["id"])){

        $id = $_GET["id"];
        $currentDate = date('d-m-Y');
        
        $sql1 = "SELECT course_id, user_id FROM user_cart_master WHERE course_id = $id AND user_id = $user_id";
        $result1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result1) > 0){
            $_SESSION["educat_error_message"] = "Error: Course already in cart.";
            header("Location: course-overview.php?id=" . $id);
        }else{
            $sql = "SELECT course_price FROM `course_master` WHERE `course_id` = $id";
            $result = mysqli_query($conn,$sql);
            $rowdata = mysqli_fetch_assoc($result);
            $coursePrice = $rowdata['course_price'];
    
            $sqlToInsertInCart = "INSERT INTO `user_cart_master`(`course_id`, `user_id`, `course_price`, `date`) VALUES ('$id','$user_id','$price','$currentDate')";
            $result = mysqli_query($conn, $sqlToInsertInCart);
            if($result){
                $_SESSION["educat_success_message"] = "Course added to cart.";
                header("Location: course-overview.php?id=" . $id);
            }else{
                $_SESSION["educat_error_message"] = "Error while adding course into cart.";
                header("Location: course-overview.php?id=" . $id);
            }
        }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
</head>
<body>
    <?php
        include("includes/components/header.php");
    ?>
    <div style=" margin:auto; width: 97%; margin-bottom: 40px;">
        <h1 style="color: black;">My Cart</h1>
    </div>
    <div class="scourseconadd" style="margin-bottom: 40px;">
        <div class="searchedvideoadd slefts">
            <h3 style="padding-bottom: 10px; border-bottom: 2px solid gray; margin-bottom: 20px;"> Course in cart</h3>
            <?php
                $sno = 1;
                $total_price = 0;

                $sql0 = "SELECT * FROM `user_cart_master` WHERE user_id = $user_id";
                if($result0 = mysqli_query($conn,$sql0)){
                    if(mysqli_num_rows($result0) > 0){
                        while($data0 = mysqli_fetch_assoc($result0)){
                            $cid = $data0['course_id'];
                            $sql2 = "SELECT * FROM `course_master` WHERE course_id = $cid";
                            if ($result2 = mysqli_query($conn,$sql2)) {
                                if (mysqli_num_rows($result2) > 0) {
                                    $rowdata = mysqli_fetch_assoc($result2);
                                    $price = $rowdata["course_price"];
                                    $total_price+= $price;
                                    // course instructor
                                    $instructor = $rowdata['course_instructor'];
                                    $sql1 = "SELECT * FROM `user_master` WHERE `user_id` = $instructor";
                                    if ($result1 = mysqli_query($conn,$sql1)) {
                                        if(mysqli_num_rows($result1) > 0){
                                            $rowdata1 = mysqli_fetch_assoc($result1);
                                            ?>
                                            <div class="addedcourse" style="display: flex; width: 100%; justify-content: space-between;">
                                                <div class="searchladd searchmadd">
                                                    <img src="<?php echo $rowdata["course_image"];?>" alt="">
                                                </div>
                                                <div class="searchcadd searchmadd">
                                                    <h2 style="margin: 0;"><?php echo $rowdata['course_name'];?>:</h2>
                                                    <p style="font-size: 1.1rem;">By <?php echo $rowdata1['user_name'];?></p>
                                                    <h3 style="font-size: 1.6rem;"><span style="color: rgb(255, 187, 0); font-size: 1.7rem;">
                                                    <?php
                                                    if($rowdata["course_rating"] == 0){
                                                        echo "No rating yet!";
                                                    }
                                                    else{
                                                        for ($i=0; $i < $rowdata["course_rating"]; $i++) { 
                                                            echo "&starf;";
                                                        }
                                                    }
                                                ?>
                                                </span><span style="font-size: 1rem;"></span></h3>
                                                    <ul style="display: flex; gap: 30px; margin: 0; padding: 0; overflow: hidden;"><p style="font-size: 1.5rem; margin:0; margin-top:-8px; font-weight:bold; color:red; text-align:left; width:36%">&#8377; <?php echo $rowdata['course_price'];?></p></ul>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        ?>
                            <h3 style="color:red;">Your cart is empty.</h3>
                        <?php
                    }
                }

            ?>
        </div>
        <div class="searchedvideoadd srights">
            <div class="searchradd searchmadd" style="overflow-y:scroll;">
                <table>
                    <tr>
                        <th>Sub-total</th>
                        <th>Price</th>
                    </tr>
                    <?php
                        $sno = 1;
                        $total_price = 0;

                        $sql0 = "SELECT * FROM `user_cart_master` WHERE user_id = $user_id";
                        if($result0 = mysqli_query($conn,$sql0)){
                            if(mysqli_num_rows($result0) > 0){
                                while($data0 = mysqli_fetch_assoc($result0)){
                                    $cid = $data0['course_id'];
                                    $sql2 = "SELECT * FROM `course_master` WHERE course_id = $cid";
                                    if ($result2 = mysqli_query($conn,$sql2)) {
                                        if (mysqli_num_rows($result2) > 0) {
                                            $rowdata = mysqli_fetch_assoc($result2);
                                            $price = $rowdata["course_price"];
                                            $total_price+= $price;
                                            // course instructor
                                            $instructor = $rowdata['course_instructor'];
                                            $sql1 = "SELECT * FROM `user_master` WHERE `user_id` = $instructor";
                                            if ($result1 = mysqli_query($conn,$sql1)) {
                                                if(mysqli_num_rows($result1) > 0){
                                                    $rowdata1 = mysqli_fetch_assoc($result1);
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td class="prisecheckout"><p>&#8377; <?php echo $price;?></p></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                    ?>
                    <!-- Total -->
                    <tr>
                        <th style="border-top:1px dashed gray;">Total</th>
                        <td class="prisecheckout" style="color:red; font-weight:bold; border-top:1px dashed gray;"><p>&#8377; <?php echo $total_price;?></p></td>
                    </tr>
                </table>
                <div id="rzp-button1" class="checkout"><button type="submit" style="cursor: pointer;">Checkout</button></div>
                <!-- <p style="display: flex; flex-direction: column;">
                    <b style="font-size: 1.2rem;">Pormotions</b>
                </p>
                <div class="search"><input type="text" placeholder="Enter Coupon..."><button>Apply</button></div> -->
            </div>
        </div>
    </div>

    <?php 
        include("includes/components/footer.php");
    ?>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    var options = {
        "key": "rzp_test_rv4pDcdZOwyhIS", // Enter the Key ID generated from the Dashboard
        "amount": "<?php echo  $total_price * 100?>",
        "currency": "INR",
        "name": "EduCat",
        "image": "https://i.ibb.co/QK5xyg0/Edu-Cat-4.png",
        config: {
            display: {
            blocks: {
                banks: {
                name: 'All payment methods',
                instruments: [
                    {
                    method: 'upi'
                    },
                    {
                    method: 'card'
                    },
                    {
                        method: 'wallet'
                    },
                    {
                        method: 'netbanking'
                    }
                ],
                },
            },
            sequence: ["block.banks"],
            preferences: {
                show_default_blocks: true,
            },
            },
        },
        "handler": function (response) {
            window.location.href = "includes/scripts/purchase_course.php?id=<?php echo $_GET["id"];?>";
        },
        "modal": {
        "ondismiss": function () {
            if (confirm("Are you sure, you want to close the payment?")) {
            txt = "You pressed OK!";
            console.log("Checkout form closed by the user");
            } else {
            txt = "You pressed Cancel!";
            console.log("Complete the Payment")
            }
        }
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();
    }
    </script>

</body>
</html>


