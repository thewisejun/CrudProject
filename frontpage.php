<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello</title>
  </head>
  <body>
  <?php
  $mysql = mysqli_connect('localhost','root','','teachers');
  
  if ($mysql == false){
	   echo "Failed to Load database";
  } 
	  
	 if (isset($_POST['submit'])){
		 $name =  $_POST['name'];
		 $age = $_POST['age'];
		 $number = $_POST['phone'];
		 $city = $_POST['city'];
		 
		 $sql = "INSERT INTO supply (name,age,number,city) VALUES ('$name','$age','$number','$city')";
		 
		 mysqli_query($mysql,$sql);
		 
		 header("location: frontpage.php");
	 }
	 
	 if (isset($_GET['delete'])) {
		 $id = $_GET['delete'];
		 
		 $deletesql = "DELETE FROM supply WHERE id=$id";
		 
		 mysqli_query($mysql,$deletesql);
	 }
  
  
  ?>
  
  
  
  <div class="container">
    <form action ="frontpage.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name ="name"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required>
    <small id="emailHelp" class="form-text text-muted">Just your name</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">age</label>
    <input type="number" name="age" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">phone nunmber</label>
    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter yournumber" required>
    <small id="emailHelp" class="form-text text-muted">Just your number</small>
  </div>
 
 <div class="form-group">
<input type="text" class="form-control" name="city" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your City" required>
 </div>
  <input type="submit" name="submit"/>
</form>
</div>

</br>
<div class="container">

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">age</th>
      <th scope="col">Phone Number</th>
	  <th scope="col">City</th>
	  <th scope="col"> Action </th>
    </tr>
  </thead>
  <tbody>
  
    
  <?php
  
  $lookup = "SELECT * FROM supply";
  
  $query = mysqli_query ($mysql,$lookup);
  
  while($result= mysqli_fetch_assoc($query)): 
	
	   

  
  ?>

   
     <td> <?php echo $result['name'] ?></td>
	 <td> <?php echo $result['age'] ?></td>
	 <td><?php echo $result['number'] ?> </td>
	 <td><?php echo $result['city'] ?> </td>
	 <td> 
	 <a href="frontpage.php?delete=<?php echo $result['id']; ?>"
	 class ="btn btn-danger"> Delete </a>
	 </td>
     
 
   
  </tbody>
<?php endwhile;?>
</table>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>