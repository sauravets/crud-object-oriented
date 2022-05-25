<?php
include 'Query.php';
$obj->insertData($_POST);
$obj->delete_data($_GET);
$obj->update_data($_GET);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Crud with oops</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<h1 class="text-center text-info">Crud operation in php using oops</h1>
	<div class="container">
		
	
	<?php
	//fetch record for update-
if(isset($_GET['editid'])){
	$myrecord = $obj->displayRecordbyId($editid);	
	?>
	<!-- Update form -->
	<form action="" method="POST">
		<div class="form-group">
	<label>Name</label>
	<input type="text" name="name" class="form-control" value ="<?php echo $myrecord['name']; ?>" placeholder="enter your name"><br>
</div>
<div class="form-group">
	<label>Email</label>
	<input type="text" name="email" class="form-control" value ="<?php echo $myrecord['email']; ?>" placeholder="enter your mail"><br>
</div>
<div class="form-group">
	<label>Password:</label>
	<input type="text" name="pass"  class="form-control" value="<?php echo $myrecord['pass'];?>"><br>
</div>

	<input type="hidden" name="hid" value="<?php echo $myrecord['id'];?>">
	<div class="form-group">
	<button type="submit" name="update" class="btn btn-info">Update</button>
</div>
</form>
<?php
}
else
{
?>

<form action="index.php" method="POST">
	<div class="form-group">
	<label>Name:</label>
	<input type="text" name="name" placeholder="Enter your name" class="form-control"><br>
</div>
<div class="form-group">
	<label>Email:</label>
	<input type="text" name="email" placeholder="Enter your mail" autocomplete="off" class="form-control"><br>
</div>
<div class="form-group">
	<label>Password:</label>
	<input type="password" autocomplete="new-password" name="pass" placeholder="Enter your password" class="form-control"><br>
</div>
<div class="form-group">
	<label>Gender:</label><br>
	<label>Male</label>
	<input type="radio" name="gender" id="male" value="male" checked ><br>
	<label>Female</label>
	<input type="radio" name="gender" id="female"  value="female"><br>
</div>
<!-- <div class="form-group">
	<label>Choose your skills:</label><br>
	<label>HTML</label>
	<input type="checkbox" name="skills" id="html" checked ><br>
	<label>CSS</label>
	<input type="checkbox" name="skills" id="css"><br>
	<label>PHP</label>
	<input type="checkbox" name="skills" id="php"><br>
</div> -->
<!-- <div class="form-group">
<input type="image" src="img_submit.gif" alt="image" width="48" height="48"> 
</div> -->
<div class="form-group">
	<button type="submit" name="submit" class="btn btn-info">Submit</button>
</div>
</form>
<?php
}
?>
<h2>Display User Records</h2>
<table class="table table-bordered">
	<thead>
		<tr class="bg-primary text-center">
		<th>Sno.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
		
			<?php
			//display records
			$data = $obj->select_data();
			$sno = 1;
			foreach($data as $value){
				
				?>
				<tr class="text-center">
					<td><?php echo $sno++;?></td>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $value['email'];?></td>
					<td><?php echo $value['pass'];?></td>
					<td>
					<a href = "index.php?editid=<?php echo $value['id'];?>" class="btn btn-info">edit</a>
					<a href = "index.php?deleteid=<?php echo $value['id'];?>" class="btn btn-danger">delete</a>
					</td>
				</tr>
				<?php
			}
			?>
		
	</tbody>
</table>
</div>
</body>
</html>