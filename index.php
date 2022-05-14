<?php
// include file-
include 'model.php';
$obj = new Model();
// insert records-
if(isset($_POST['submit'])){
   $obj->insertRecords();
//    print_r($obj);
}
// $data = $obj->displayRecord();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="text-center text-info">Crud operation in php using oops</h1>
    <div class="container">
        <!-- success message -->
        <?php
        if(isset($_GET['msg']) && $_GET['msg'] == 'ins'){
            echo '<div class="alert alert-primary" role="alert">
            Record inserted successfully..!!
            </div>';
        }
        ?>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter your name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Enter your email" class="form-control">
            </div>
            <div class="form-group">            
                <input type="submit" name="submit" value="submit" class="btn btn-info">
            </div>
        </form><br>
        <h4 class="text-center text-danger">Display Records</h4>
        <table class="table table-bordered">
            <tr class="bg-primary text-center">
                <th>S.no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            //display records-
            $data = $obj->displayRecord();
            $sno = 1;
            foreach($data as $value)
            {
                var_dump($value);
                ?>
                <tr class="text-center">
                    <td><?php echo $sno++;?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td>
                    <a href="index.php" class="btn btn-info">Edit</a>
                    <a href="index.php" class="btn btn-danger">Delete</a>
                </td>
                </tr>
               
                <?php
            }
            ?>
        
        </table>
    </div>
</body>
</html>