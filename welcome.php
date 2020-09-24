<?php

include 'count.php';
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		form{ width: 30%;  margin: 60px auto;  padding: 30px;  border: 1px solid #555;	}
		input{ width: 100%;  border: 1px solid #f1e1e1;  display: block; padding: 5px 10px; }
		button { border: none; padding: 10px; border-radius: 5px;}
		table {  width: 60%; border-collapse: collapse; margin: 60px auto;}
		th,	td {  height: 50px;  vertical-align: center; border: 1px solid black;}	
    </style>
</head>
<body>
    <div class="page-header">
        <h2>Welcome to my LampApp!</h2>
	<br>
        <h4>First Name: <?php echo htmlspecialchars($_SESSION["fname"]); ?> </h4>
	<h4>Last Name: <?php echo htmlspecialchars($_SESSION["lname"]); ?> </h4> 
	<h4>Your email is: <?php echo htmlspecialchars($_SESSION["email"]); ?></h4>
    </div>
	<div class="container">
      <div class="row">
        <form action="welcome.php" method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">Upload</button>
        </form>
      </div>
    </div>
	<a href="welcome.php" class="btn btn-success">Refresh Files</a>
	<div>
		<table>
		<thead>
			<th>ID</th>
			<th>Filename</th>
			<th>size (in mb)</th>
			<th>Word Count</th>
			<th>Action</th>
		</thead>
		<tbody>
		  <?php foreach ($files as $file): ?>
			<tr>
			  <td><?php echo $file['id']; ?></td>
			  <td><?php echo $file['name']; ?></td>
			  <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
			  <td><?php echo $file['word_count']; ?></td>
			  <td><a href="welcome.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
			</tr>
		  <?php endforeach;?>
		</tbody>
		</table>
	</div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</body>
</html>


