<?php
$con = mysqli_connect('localhost','root','','my_exercise');

function addUser(){
  global $con;
  $UserName = $_POST['txtname'];
  $UserPassword = $_POST['txtpassowrd'];
  if($UserName=="")
  {
    echo '<script>window.alert("Please Enter User Name ! ")</script>';
  }
  elseif($UserPassword=="" || is_numeric($UserPassword)==false)
  {
    echo '<script>window.alert("Please Enter Numeric Password ! ")</script>';
  }

  elseif($UserName!="")
  {
      $query = "Select * from user where Name='$UserName'";
      $ch_query=mysqli_query($con,$query);
      $count = mysqli_num_rows($ch_query);
      if($count>0)
      {
        echo '<script>window.alert("This record was filled !")</script>';
      }
      else
      {
          $query = "insert into user(Name,Password)";
          $query.="values('$UserName','$UserPassword')";
          $go_query = mysqli_query($con,$query);
          if(!$go_query)
            {
              die("Query Failed".mysqli_error($con));
            }
          else
            {
              echo"<script>window.alert('Successfully Saved')</script>";
            }
      }

  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar bg-info">
        <div class="container-fluid">
          <a class="navbar-brand mx-5" href="#">
            Bootstrap
          </a>
        </div>
      </nav>
      <div class="container">
          <h1 class="text-center text-primary-emphasis"> Welcome for my page</h1>
      </div>
        <?php
          if(isset($_POST['btnconfirm']))
          {
            addUser();
          }
        ?>
        <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name" name="txtname">          
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="formGroupExampleInput" class="form-label">password</label>
                    <input type="text" class="form-control" placeholder="Enter you password" name="txtpassowrd">          
                </div>
            </div>
            <div class="row">
                <div class="col-auto mt-3">
                    <button type="submit" class="btn btn-primary mb-3" name="btnconfirm">Confirm</button>
                </div>
            </div>
        </form>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>