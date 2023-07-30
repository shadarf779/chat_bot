<?php
session_start();
if ($_SESSION['UserName']=='shad') { 

?>

</body>
</html>

<?php }?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Form</title>
    <!-- Import custom CSS stylesheet for the chatbot --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"> 
   
	<style>

		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		h1 {
			color: #ff9900;
			text-align: center;
		}
		form {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			margin: 50px auto;
			max-width: 800px;
			padding: 50px;
			width: 90%;
		}
		label {
			display: block;
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 10px;
			color: #333;
		}
		input[type="text"], textarea {
			border: 2px solid #ccc;
			border-radius: 5px;
			display: block;
			font-size: 16px;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
		}
		input[type="file"] {
			margin-bottom: 20px;
		}
		.button {
			background-color: #ff9900;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			font-size: 18px;
			font-weight: bold;
			padding: 10px 20px;
		}
		.button:hover {
			background-color: #ffcc66;
		}
		.success {
			background-color: #ccffcc;
			border: 2px solid #00cc00;
			border-radius: 5px;
			color: #006600;
			font-size: 16px;
			margin-top: 20px;
			padding: 10px;
			text-align: center;
		}
		.error {
			background-color: #ffcccc;
			border: 2px solid #ff0000;
			border-radius: 5px;
			color: #990000;
			font-size: 16px;
			margin-top: 20px;
			padding: 10px;
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Admin Panel</h1>
	<form action="Submit-Question.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="question">Question:</label>
		<textarea id="question" name="question" rows="4" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="answer">Answer:</label>
		<textarea id="answer" name="answer" rows="4" class="form-control"></textarea>
	</div>
    <div class="form-group">
    <label for="answer">Is that Only For Student ? </label>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="Student" id="yes" value=1>

            Yes
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="Student" id="no" value=0>
            No
    </div>
</div>

	<div class="form-group">
		<label for="picture">Picture:</label>
		<input type="file" id="picture" name="picture" class="form-control-file">
	</div>
	<div class="form-group">
		<label for="lecture">Lecture:</label>
		<input type="file" id="lecture" name="lecture" class="form-control-file">
	</div>
	<button type="submit" name="Admin-Sumited" class="button">Add</button>
</form>
</body>
</html>