<?php 
	include('db_connection.php');
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$contact = $_POST['contact'];
	$jobTitle = $_POST['jobTitle'];
	$workPlace = $_POST['workPlace'];
    
	if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['contact']) && isset($_POST['jobTitle']) && isset($_POST['workPlace'])) {
        // $sql = "INSERT INTO info_visitor(Name, Last_Name, Contact, Job_Title, Work_Place, Present) VALUES ('$firstName','$lastName', $contact,'$jobTitle', '$workPlace', false)";
        $sql = "UPDATE info_visitor SET Name="."'".$firstName."'".",Last_Name="."'".$lastName."'".",Contact="."'".$contact."'".",Job_Title="."'".$jobTitle."'".",Work_Place="."'".$workPlace."'  WHERE ID=".$_GET['id']."";
		$link->query($sql);
        header('location: search.php');
	}
    // echo $sql;
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
	<title>Registration Form</title>
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
		<h3 class="title">Registration From</h3>
		<form action="" method="POST">
			<input value = '<?php echo $_GET['firstName']?>' type="text" name="firstName" id="firstName" placeholder="Enter visitor's first name" required>
			<input value = '<?php echo $_GET['lastName']?>' type="text" name="lastName" id="lastName" placeholder="Enter visitor's last name" required>
			<input value = '<?php echo $_GET['phoneNumber']?>' type="text" name="contact" id="contact" placeholder="WhatsApp number" pattern="[0]{1}[0-9]{9}" minlength="10" maxlength="10" required>
			<input value = '<?php echo $_GET['jobTitle']?>' type="text" name="jobTitle" id="jobTitle" placeholder="Enter visitor's job title" required>
			<input value = '<?php echo $_GET['workPlace']?>' type="text" name="workPlace" id="workPlace" placeholder="Enter visitor's work place" required>
			<input  type="submit" value="Update Visitor Info">
		</form>
    </div>
	</main>
</body>
</html>