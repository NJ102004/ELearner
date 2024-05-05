<?php
// Assuming you have already established a MySQL connection
require 'includes/scripts/connection.php';  

$course = 5;

// Function to convert numerical value to English words
function numberToWords($number) {
    $words = array(
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five'
    );

    return isset($words[$number]) ? $words[$number] : '';
}

// Function to calculate weighted average
function calculateWeightedAverage($ratings) {
    $totalWeight = 0;
    $weightedSum = 0;

    foreach ($ratings as $key => $value) {
        $weight = $key + 1; // Weight is the star rating itself (1 for 1 star, 2 for 2 stars, etc.)
        $totalWeight += $weight;
        $weightedSum += $weight * $value;
    }

    if ($totalWeight == 0) {
        return 0; // Return 0 if there are no ratings
    }

    return $weightedSum / $totalWeight;
}

// Query to fetch ratings and number of people for each star rating
$sql = "SELECT rating_one, rating_two, rating_three, rating_four, rating_five, number_of_total_people FROM course_rating WHERE course = $course";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $totalRatings = mysqli_fetch_assoc($result);
    
    // Calculate weighted average
    $ratings = array(
        $totalRatings['rating_one'],
        $totalRatings['rating_two'],
        $totalRatings['rating_three'],
        $totalRatings['rating_four'],
        $totalRatings['rating_five']
    );

    $courseRating = calculateWeightedAverage($ratings);

    // Output the course rating
    echo "Course Rating: " . number_format($courseRating, 2);
} else {
    echo "No ratings found.";
}


// To give rating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST["rating"];
    $englishNumber = numberToWords($rating);
    
    // Check data is already found or not
    $checkDataSql = "SELECT id FROM course_rating WHERE course = $course";
    $checkRes = mysqli_query($conn, $checkDataSql);
    if ($checkRes) {
        if(mysqli_num_rows($checkRes) != 0){
            $insertSql = "INSERT INTO `course_rating` (`rating_one`, `rating_two`, `rating_three`, `rating_four`, `rating_five`,  `number_of_total_people`, `course`) VALUES (0 , 0, 0, 0, 0, 0, $course)";
            $insertRes = mysqli_query($conn, $insertSql);
            if ($insertRes) {
                // Update the corresponding rating column and increase the number of total people
                $sql = "UPDATE course_rating SET rating_$englishNumber = rating_$englishNumber + 1, number_of_total_people = number_of_total_people + 1 WHERE course = $course";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Rating submitted successfully.";
                } else {
                    echo "Error updating rating: " . mysqli_error($conn);
                }
            }
        }else{
            // Update the corresponding rating column and increase the number of total people
            $sql = "UPDATE course_rating SET rating_$englishNumber = rating_$englishNumber + 1, number_of_total_people = number_of_total_people + 1 WHERE course = $course";
            
            if (mysqli_query($conn, $sql)) {
                echo "Rating submitted successfully.";
            } else {
                echo "Error updating rating: " . mysqli_error($conn);
            }
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Star Rating</title>
<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
    }

    .rating input {
        display: none;
    }

    .rating label {
        cursor: pointer;
        width: 40px;
        height: 40px;
        position: relative;
        background-color: transparent;
    }

    .rating label::before {
        content: "\2605";
        font-size: 2em;
        color: #ccc;
        position: absolute;
        top: 0;
        left: 0;
    }

    .rating input:checked ~ label::before {
        color: #ffcc00;
    }
</style>
</head>
<body>

<form method="post" action="">
    <div class="rating">
        <input type="radio" name="rating" id="star5" value="5"><label for="star5"></label>
        <input type="radio" name="rating" id="star4" value="4"><label for="star4"></label>
        <input type="radio" name="rating" id="star3" value="3"><label for="star3"></label>
        <input type="radio" name="rating" id="star2" value="2"><label for="star2"></label>
        <input type="radio" name="rating" id="star1" value="1"><label for="star1"></label>
    </div>

    <input type="submit" value="Submit Rating">
</form>

</body>
</html>
