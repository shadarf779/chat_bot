<?php 
$question = $_POST['question'];
$answer = $_POST['answer'];
$student = $_POST['Student'];
$picture = $_FILES['picture']['name'];
$lecture = $_FILES['lecture']['name'];

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
    if (empty($_POST['question'])) {
        $errors[] = 'question is required';
    }
    
    if (empty($_POST['answer'])) {
        $errors[] = 'answer is required';
    }if (empty($_POST['Student'])) {
        $errors[] = 'Student is required';
    }

    // If there are no errors, insert bug report into database
    if (empty($errors)) {
        $name = mysqli_real_escape_string($conn, $_POST['question']);
        $email = mysqli_real_escape_string($conn, $_POST['answer']);
        $description = mysqli_real_escape_string($conn, $_POST['Student']);

        $sql = "INSERT INTO questions (question	,answer,	student	) VALUES ('$question', '$answer', '$student')";
        if (mysqli_query($conn, $sql)) {
            header("Location:Admin.php?Question=seccuss");
            exit(); 
        } 
        header("Location:Admin.php?Question=Error");
        exit(); 
    }
}
?>
