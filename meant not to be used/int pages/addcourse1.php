<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <link rel="stylesheet" href="./assets/css/videop.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Become an Instructor?</title>
</head>
<style>
    .container {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    

    /* .boxins{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .boxins h1{
        color: black;
        font-size: 4rem;
        margin-bottom: 20px;
    }
    .boxins h3{
        color: rgb(58, 58, 58);
    }
    .topinq{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 4rem;
    }

    .bottominq input{
        width: 200px;
        padding: 8px 20px;
        border: 2px solid gray;
        transition: 0.5s all ease;
        border-radius: 10px;
    }

    .bottominq input:focus{
        width: 300px;
        border: 2px solid orange;
        outline: none;
    }

    .bottominq button{
        padding: 8px 20px;
        width: 80px;
        border: 2px solid gray;
        cursor: pointer;
        transition: 0.5s all ease;
        border-radius: 10px;
        font-weight: bold;
    }

    .bottominq button:hover{
        width: 100px;
        border: 2px solid orange;
    } */

    .insinputs{
        width: 98%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
    .inputsins {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-top: 24px;
        align-items: center;
    }   


    .inputsins label{
        font-weight: bold;
        width: 95%;
        font-size: 1.1rem;
    }

    .l1,
    .l2,
    .l3,
    .l4,
    .l5{
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .l3 .inputsins label,
    .l4 .inputsins label{
        width: 98%;
    }

    .insinput{
        width: 95%;
        padding: 8px 6px;
        margin-top: 3px;
        transition: all 0.5s ease;
        border-radius: 6px;
        outline: none;
        border: 1px solid gray;
    }
    .insinput:focus{
        border: 1px solid orange;
    }
    .btnins{
        padding: 10px 40px;
        border-radius: 15px;
        outline: none;
        border: 1px solid gray;
        transition: all 0.5s ease;
        font-weight: bold;
        font-size: 1rem;
        cursor: pointer;
    }
    .btnins:hover{
        box-shadow: 0px 0px 12px 2px rgb(170, 170, 170);
    }
    .b1{
        background-color: orange;
    }
    .b1:hover{
        background-color: rgb(7, 7, 59);
        color: white;
    }
    .b2{
        color: white;
        background-color: rgb(7, 7, 59);
    }
    .b2:hover{
        color: black;
        background-color: orange;
    }
    .l5{
        margin-bottom: 24px;
    }
</style>

<body>
    <header>
        <nav class="navigation">
            <div class="logo">
                <a href="index.php"><img src="assets/img/EduCat (3).png" alt="Logo"></a>
            </div>
            <button class="menu-btn">☰</button>
            <div class="sidebar">
                <div class="menu-content">
                    <a href="intdash.php" class="buttons"><- Go back</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <!-- <div class="boxins">
            <div class="topinq">
                <h1>How about a working title?</h1>
                <h3>It’s ok if you can’t think of a good title now. You can change it later.</h3>
            </div>
            <div class="bottominq">
                <input type="text">&nbsp;<button>Next</button>
            </div>
        </div> -->

        <h1 style="color: black;">| FILL THE DETAILS OF YOUR COURCE |</h1>
        <form action="" class="insinputs">
                <div class="l1">
                    <div class="inputsins">
                        <label for="title">Title:</label>
                        <input type="text" name="" id="title" class="insinput" required>
                    </div>
                    <div class="inputsins">
                        <label for="lang">Language Name:</label>
                        <select class="insinput" id="" required>
                            <option value="">--</option>
                            <option value="">Javascript</option>
                            <option value="">Java Programming</option>
                            <option value="">Python</option>
                            <option value="">C Programming</option>
                            <option value="">C++</option>
                            <option value="">PHP</option>
                        </select>
                    </div>
                    <div class="inputsins">
                        <label for="">Chapters:</label>
                        <input type="number" name="" id="" class="insinput" required>
                    </div>
                </div>
                <div class="l2">
                    <div class="inputsins">
                        <label for="">Price:</label>
                        <input type="number" name="" id="" class="insinput" required>
                    </div>
                    <div class="inputsins">
                        <label for="">Category:</label>
                        <select class="insinput" id="" required>
                            <option value="">--</option>
                            <option value="">Basics</option>
                            <option value="">Average</option>
                            <option value="">Expert</option>
                            <option value="">Basic to Expert</option>
                        </select>
                    </div>
                    <div class="inputsins">
                        <label for="">Hours:</label>
                        <input type="number" name="" id="" class="insinput" required>
                    </div>
                </div>
                <div class="l3">
                    <div class="inputsins">
                        <label for="">Course Description:</label>
                        <textarea name="" id="" cols="30" rows="5" class="insinput" style="width: 98%;" required></textarea>
                    </div>
                </div>
                <div class="l4">
                    <div class="inputsins">
                        <label for="">Course Thumbnail:</label>
                        <input type="file" name="" id="" class="insinput" style="width: 98%; font-weight: bold;" required>
                    </div>
                </div>
                <div class="l5">
                    <div class="inputsins">
                        <input type="submit" value="Submit" class="btnins b1">
                    </div>
                    <div class="inputsins">
                        <input type="reset" value="Reset" class="btnins b2">
                    </div>
                </div>
        </form>
    </div>
</body>

</html>