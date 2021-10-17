
<?php
session_start();

if (isset($_SESSION['flag'])) 
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<style>



 img{
      float: left;
    }


</style>
<style>
		
	</style>
</head>
<body>
    <script type="text/javascript">
    window.onload = setInterval(clock,1000);

    function clock()
    {
      var d = new Date();
      
      var date = d.getDate();
      
      var month = d.getMonth();
      var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
      month=montharr[month];
      
      var year = d.getFullYear();
      
      var day = d.getDay();
      var dayarr =["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
      day=dayarr[day];
      
      var hour =d.getHours();
      var min = d.getMinutes();
      var sec = d.getSeconds();
    
      document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
      document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
    }
  </script>
  
<link rel="stylesheet" type="text/css" href="style.css">

<p></p>

<div class="header" style="text-align:right;" >

 

  <h1 style="text-align: center;">SHOP MANAGEMENT SYSTEM</h1>
  <span style="background-color:; color: white; text-align:right; font-size: 20px;">        
              Logged in as <a href="myProfile.php" style="color:blue;"> <?php echo  $_SESSION['uname']; ?> 

              <br>
               <a href="logout.php" style=" color: blue; ">Logout</a>  
               <a href="home.php" style=" color: blue; ">Home</a> </span>

</div>
   
<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
        
      <span  style="text-align:center; " >
     
   <li><a href="addProduct.php" style="text-align:center; color: blue; "><h2>Add Products</h2></a></li>
   <li><a href="searchProduct.php" style="text-align:center; color: blue; "> <h2> Search Products </h2>
   <li><a href="editProduct.php" style="text-align:center; color: blue; "><h2> Update Products</h2></a></li>
   <li><a href="showAllProducts.php" style="text-align:center; color: blue; "> <h2> Show Products </h2>
   <li><a href="dashboard.php" style="text-align:center; color: blue; "> <h2> Dashboard </h2>



   </a></li>
        
   </span>
    </ul>
  </div>


   

      
 <span style="text-align:center;">
 <div class="col-6 col-s-9">

    <h1 style="text-align: center; color: blue;"> <?php echo $_SESSION['uname'] ?> </h1><br>
    <span style="photo:right; text-align:center;">



	



<table>
	<thead>
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedProducts as $i => $product): ?>
			<tr>
				<td><a href="../showProduct.php?id=<?php echo $product['Id'] ?>"><?php echo $product['Id'] ?></a></td>
				<td><?php echo $product['Productname'] ?></td>

				
				<td><img width="100px" src="Picture/<?php echo $product['image'] ?>" alt="<?php echo $product['Productname'] ?>"></td>
				<td><a href="editProduct.php?id=<?php echo $product['Id'] ?>">Edit</a>&nbsp<a href="Controller/deleteProduct.php?id=<?php echo $product['Id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>

 
  
</span>
  </div>
  </span>
  <div class="col-3 col-s-12">
    <div class="aside">
     <span style="text-align:center">
      <h2 id="date"></h2>
   <h3 id="time"></h3></b>
  
   </span>
    </div>
  </div>
</div>

<div class="footer">
  <p>Copyright © 2021.</p>
</div>


</body>
</html>

