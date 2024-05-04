<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/EduCat (4)_rm.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/videop.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Become an Instructor?</title>
</head>
<style>
    .container {
        display: flex;
        justify-content: center;
    }
    .boxins{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .boxins h1{
        color: black;
        font-size: 3rem;
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

    .bottominq select{
        width: 300px;
        padding: 8px 20px;
        border: 2px solid gray;
        transition: 0.5s all ease;
        border-radius: 10px;
        cursor: pointer;
        outline: none;
        font-weight: bold;
        font-size: 1rem;
    }

    .bottominq option{
        font-weight: bold;
    }

    .bottominq button{
        padding: 8px 20px;
        width: 80px;
        border: 2px solid gray;
        cursor: pointer;
        transition: 0.5s all ease;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: bold;
    }

    .bottominq button:hover{
        width: 100px;
        border: 2px solid orange;
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
                    <a href="addcourse1.php" class="buttons"><- Go back</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="boxins">
            <div class="topinq">
                <h1>What category best fits the knowledge you’ll share?</h1>
                <h3>If you’re not sure about the right category, you can change it later.</h3>
            </div>
            <div class="bottominq">
                <select name="" id="">
                    <option value="Frontend">Frontend</option>
                    <option value="Backend">Backend</option>
                    <option value="Database">Database</option>
                    <option value="UI / UX">UI / UX</option>
                </select>                
                <button>Next</button>
            </div>
        </div>
    </div>
</body>

</html>