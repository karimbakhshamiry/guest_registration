<!DOCTYPE html>
<?php
    include('db_connection.php')
?>
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
            min-height: 100vh;
            color: white;
            font-family: sans-serif;
        }

        * {
            scroll-behavior: smooth;
            box-sizing: border-box;
            transition: all 250ms
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
            width: 40%;
            margin: 0 auto;
            padding: 0;
        }

        .title {
            font-size: 2.5rem;
        }

        .main__container form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        .main__container form input {
            padding: 1em;
            font-size: 1rem;
            border-radius: .5rem;
            border: 1px solid black;
        }

        input[type="submit"] {
            align-self: flex-start;
            background-color: rgb(65, 236, 65);
            font-weight: bold;
            border: 2px solid rgb(65, 236, 65) !important;
            font-size: 1.2rem !important;
        }

        input[type="submit"]:hover {
            opacity: .9;
            cursor: pointer;
            background: transparent;
            color: rgb(65, 236, 65);
        }
    </style>
    <title>Search Guests</title>
</head>
<body>
    <div class="container nav__container">
        <nav>
            <a href="./index.php">Register Visitors</a>
            <a href="./search.php">Search Visitors</a>
        </nav>
    </div>
    <main>
        <div class="container main__container">
            <h2 class="title">Search Visitors</h2>
            <form action="searchResult.php" method="POST">
                <input placeholder = "First Name" type="text" name="firstName" id="firstName">
                <input placeholder = "Last Name" type="text" name="lastName" id="lastName">
                <input placeholder = "Phone Number" type="text" name="phoneNumber" id="phoneNumber" pattern="[0-9]{10}">
                <input placeholder = "Job Title" type="text" name="jobTitle" id="jobTitle">
                <input placeholder = "Work Place" type="text" name="workPlace" id="workPlace">
                <input type="submit" value="search">
            </form>
        </div>
    </main>
</body>
</html>
