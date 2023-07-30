<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission

    // Redirect back to index.php
    header('Location: index.php');
    exit;
}

// Connect to MySQL database
require 'dbh.inc.php';
$servername = "localhost";
$dBUsername = "root";
$dBPwd = "";
$dBName = "register";

$conn = mysqli_connect($servername , $dBUsername  , $dBPwd , $dBName);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form fields
    $errors = array();
    if (empty($_POST['name'])) {
        $errors[] = 'Name is required';
    }
    if (empty($_POST['email'])) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }
    if (empty($_POST['description'])) {
        $errors[] = 'Description is required';
    }

    // If there are no errors, insert bug report into database
    if (empty($errors)) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $sql = "INSERT INTO bug_reports (name, email, description) VALUES ('$name', '$email', '$description')";
        if (mysqli_query($conn, $sql)) {
            echo '<p>Your bug report has been submitted. Thank you for your help!</p>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Display errors
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Report Form</title>
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }
        
        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }
        
        form {
            margin: 0 auto;
            max-width: 600px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-size: 18px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background-color: #f1f1f1;
            font-size: 16px;
        }
        
        textarea {
            height: 200px;
        }
       /* Style for the buttons */
button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

/* Style for the "Submit" button */
button[type="submit"] {
  background-color: #008CBA;
}

/* Style for the "Back" button */
button[type="button"] {
  background-color: #f44336;
}

/* Align the "Back" button to the right */
button[type="button"] {
  float: right;
}

        
        button[type="submit"]:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <h1>Bug Report Form</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="description">Bug Description:</label>
        <textarea name="description" id="description" required></textarea>
        
       <button type="submit">Submit</button>
       
            <button type="button" onclick="window.location.href='index.php'">Back</button>

    </form>
</body>
</html>
