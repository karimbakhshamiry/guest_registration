<?php
    include('db_connection.php');
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $jobTitle = $_POST['jobTitle'];
    $workPlace = $_POST['workPlace'];

    $sql = "SELECT * from info_visitor WHERE Name="."'".$firstName."'"." OR Last_Name="."'".$lastName."'"." OR Contact="."'".$phoneNumber."'"." OR Job_Title="."'".$jobTitle."'"." OR WORK_Place="."'".$workPlace."'";
    $result = ($link->query($sql));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLE -->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: linear-gradient(130deg, #333 70%, rgb(65, 236, 65) 70%,#333 90%, rgb(65, 236, 65) 90%);
            background-repeat: no-repeat;
            height: 100vh;
            color: white;
            font-family: sans-serif;
        }

        * {
            scroll-behavior: smooth;
            box-sizing: border-box;
            transition: all 250ms;
        }

        .nav__container {
            height: 10vh;
            display: flex;
            align-items: center;
            background: #222;
        }
        
        nav {
            width: 80%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .nav__container a {
            padding: 1em;
            display: inline-block;
            font-size: 1.5rem;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .nav__container a:hover {
            background: white;
            color: black;
        }

        .main__container {
            padding: 1em 3em;
            width: 90%;
            margin: 0 auto;
        }

        .title {
            font-size: 2.5rem;
        }

        .guests {
            background-color: rgba(255, 255, 255, .9);
            color: black;
            border-radius: 1rem;
            overflow: hidden;
        }

        .guest {
            display: flex;
            align-items: center;    
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            border-bottom: 2px solid black;
        }

        .table-heading {
            background-color: rgb(103, 102, 102);
            color: white;
            font-weight: bold;
        }

        .guest p, .guest a {
            padding: .5em 1em;
            font-size: 1rem;
            border-right: 3px solid #333;
        }

        .id {
            width: 70px;
        }

        .name,
        .last-name,
        .contact,
        .job-title,
        .work-place,
        .present,
        .present_title,
        .edit {
            width: 150px;
            text-align: center;
        }

        .present input {
            display: inline-block;
            height: 30px;
            width: 30px;
        }

        a#edit {
            color: #555;
            font-weight: bold;
            font-size: 1.2rem
        }

        a#edit:hover {
            color: darkred
        }
    </style>
    <title>Result</title>
</head>
<body>
    <main>
        <div class="container nav__container">
            <nav>
                <a href="./index.php">Register Visitors</a>
                <a href="./search.php">Search Visitors</a>
            </nav>
        </div>
        <div class="container main__container">
            <h2 class="title">Found the following visitors</h2>
            <div class="guests">
                <div class='table-heading guest'>
                    <p class='id'>ID</p>
                    <p class='name'>Name</p>
                    <p class='last-name'>Last Name</p>
                    <p class='contact'>Contact</p>
                    <p class='job-title'>Job_Title</p>
                    <p class='work-place'>Work_Place</p>
                    <p class='present_title'>Present</p>
                    <p class='edit'>Edit Info</p>
                </div>
                <?php    
                    $row = [];
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_all(MYSQLI_ASSOC);  
                    }

                    foreach($result as $guests) {
                        $checkbox = $guests['Present'] == 1 ? "<input type='checkbox' name='present' checked>" : "<input type='checkbox' name='present'>";
                        echo "
                        <div class='guest'>
                            <p class='id'>". $guests['ID']."</p>
                            <p class='name'>". $guests['Name']."</p>
                            <p class='last-name'>". $guests['Last_Name']."</p>
                            <p class='contact'>". $guests['Contact']."</p>
                            <p class='job-title'>". $guests['Job_Title']."</p>
                            <p class='work-place'>". $guests['Work_Place']."</p>
                            <a href='./setStatus.php?id=".$guests['ID']."' class='present'>".$checkbox."</a>
                            <a id='edit' href='./updateInfo.php?id=".$guests['ID']."&firstName=".$guests['Name']."&lastName=".$guests['Last_Name']."&phoneNumber=".$guests['Contact']."&jobTitle=".$guests['Job_Title']."&workPlace=".$guests['Work_Place']."' class='present'>Edit</a>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>