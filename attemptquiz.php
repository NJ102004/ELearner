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
    if(!isset($_GET["course"])){
        header("Location: 404.php");
    }

    $course = $_GET["course"];

    $selectQuiz = "SELECT quiz_id FROM quiz_master WHERE quiz_for_course = $course";
    $selectQuizRes = mysqli_query($conn, $selectQuiz);
    $selectQuizRow = mysqli_fetch_assoc($selectQuizRes);

    $quiz = $selectQuizRow['quiz_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>EduCat</title>
</head>
<style>
    .quizcon{
        width: 97%;
        margin: auto;
        margin-top: 20px;
    }

    .quiz{
        background-color: white;
        padding: 17px;
        border-radius: 15px;
        box-shadow: 0px 0px 8px 1px gray;
        border: 3px solid transparent;
        transition: 0.3s all ease;
        margin-bottom: 20px;
    }
    
    .quiz:hover{
        border: 3px solid rgba(3, 3, 58, 0.562);
    }

    .quiz form h2{
        margin: 0;
    }

    .quiz form .quizleft{
        width: 3%;
    }

    .quiz form .quizright{
        width: 97%;
    }

    .quiz form{
        display: flex;
    }

    .optionquiz input,
    .optionquiz label{
        cursor: pointer;
    }

    .clear{
        width: fit-content;
        padding: 5px;
        border-radius: 9px;
        outline: none;
        border: 2px solid rgba(1, 1, 68, 0.562);
        cursor: pointer;
        box-shadow: 0px 0px 5px 1px gray;
        font-size: 1rem;
        transition: 0.3s all ease;
    }
    
    .clear:hover{
        box-shadow: 0px 0px 10px 1px gray;
    }

    .optionquiz label{
        font-size: 1.2rem;
    }

    .optionquiz{
        display: flex;
        gap: 7px;
        align-items: center;
        justify-content: center;
    }

    .optionquiz input{
        margin: 0;
    }
</style>
<body>

    <div class="quizcon">
        <div class="quizlist">
            <form action="" method="post">
                <?php
                    $select_data = "SELECT * FROM quiz_master WHERE quiz_id = $quiz AND quiz_for_course = $course";
                    $res_data = mysqli_query($conn, $select_data);
                    $row_data = mysqli_fetch_assoc($res_data);
                    
                    $question_count = $row_data['quiz_total_questions'];
                    for ($i = 1; $i <= $question_count; $i++) {
                        $select_data_for_quiz_question = "SELECT * FROM quiz_question_master WHERE quiz_id = $quiz";
                        $res_data_for_quiz_question = mysqli_query($conn, $select_data_for_quiz_question);
                        $row_data_for_quiz_question = mysqli_fetch_assoc($res_data_for_quiz_question);
                        ?>

                                <div class="quiz">
                                    <div class="quizright">
                                        <div class="quizque" style="display: flex; justify-content: space-between;"><h2><?php echo $i . ". " . $row_data_for_quiz_question["question"]. "?";?></h2></div>
                                        <div class="quizans" style="display: flex; gap: 30px; margin-top: 10px;">
                                            <div class="optionquiz">
                                                <input type="radio" name="option_1_question_" value="<?php echo $row_data_for_quiz_question['option_one'];?>" id="q1o1" required>
                                                <label for="q1o1"><?php echo $row_data_for_quiz_question["option_one"];?></label>
                                            </div>
                                            <div class="optionquiz">
                                                <input type="radio" name="option_2_question_" value="<?php echo $row_data_for_quiz_question['option_two'];?>" id="q1o2" required>
                                                <label for="q1o2"><?php echo $row_data_for_quiz_question["option_two"];?></label>
                                            </div>
                                            <div class="optionquiz">
                                                <input type="radio" name="option_3_question_" value="<?php echo $row_data_for_quiz_question['option_three'];?>" id="q1o3" required>
                                                <label for="q1o3"><?php echo $row_data_for_quiz_question["option_three"];?></label>
                                            </div>
                                            <div class="optionquiz">
                                                <input type="radio" name="option_4_question_" value="<?php echo $row_data_for_quiz_question['option_four'];?>" id="q1o4" required>
                                                <label for="q1o4"><?php echo $row_data_for_quiz_question["option_four"];?></label>
                                            </div>
                                            <input type="reset" value="Clear my choice" class="clear">
                                        </div>
                                    </div>
                                </div>
                                <?php
                    }
                    ?>
                    <input type="submit" value="Submit">
                    <a href="http://localhost/projects/EduCat/play.php?id=<?php echo $course;?>">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>