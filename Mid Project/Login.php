<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>



 img{
      float: left;
    }


</style>
</head>
<body>
  
<link rel="stylesheet" type="text/css" href="style.css">

<p></p>

<div class="header side" style=" color:blueviolet; background-color: lightskyblue;">
      <h2>LOGIN</h2>
</div>
<div class="header middle" style=" color:blueviolet;">
   


     <span style="color: darkviolet; text-align:center; font-style: Arial;"><b> <h1>SHOP MANAGEMENT SYSTEM</h1></b></span>
  <span style="text-align:right;"> <a href="Home.php">Home </a> </span>

     
    

</div>
<div class="row">
  <div class="column side" style="background-color:white; font-size: 18px; text-align: left; padding-left: 80px;  width: 25%; ">
    
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  
    <span style="text-align:center; margin-bottom: 20px;">
        
<html>
<head>
 
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
</head>

<body>
    <div style=" color:darkblue;

      ">
   <br>
   <br><b>
   <h2 id="date"></h2>
   <h3 id="time"></h3></b>
</div>
 </body>
</html>
    </span>


      
    
    <hr>

<br>
  <span style="text-align: center;"> <a href="createaccount.php"><h2>Create New Account</h2></a></span>
   

</form>
     
      
    
  </div>

  
 
  <div class="columnr middle" style="background-color:white; text-align: left; padding-left: 300px; width: 75%; " >

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           
<?php


$cookie_name = $cookie_pass = "";
if (isset($_POST['submit'])) {

    $inp = file_get_contents('data.json');
    $temp = json_decode($inp, true);

    if (!empty($_COOKIE["$cookie_name"])) {
        echo "$_COOKIE[$cookie_name]";
    }

    if (empty($_POST['uname']) || empty($_POST['pass']))
     {
        echo "Field cannot be empty";

    } else {

        $bool = 0;


        foreach ($temp as $key1 => $value1)
         {
            if ($temp[$key1]["username"] == $_POST['uname'] and $temp[$key1]["password"] == $_POST['pass']) {
                $bool = 1;
                $_SESSION['name'] = $temp[$key1]["name"];
                $_SESSION['email'] = $temp[$key1]["e-mail"];
                $_SESSION['gender'] = $temp[$key1]["gender"];
                $_SESSION['password'] = $temp[$key1]["password"];
            }
        }
        if ($bool == 1) {
            $_SESSION['flag'] = true;
            $uname = $_POST['uname'];
            $_SESSION['uname'] = $uname;
            if (!empty($_POST['remember'])) {
                setcookie("uname", $_POST['uname'], time() +300);
                setcookie("pass", $_POST['pass'], time() +300);
            }else{
                setcookie("uname","");
                setcookie("pass","");
            }
            header('location:dashboard.php');
        } else {
            echo "Not a vaild user";
        }
    }
}


?>
       
       <form method="post" action="">
    <fieldset style="width:400px">
        <legend><b>LOGIN</b></legend>
        <table>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="uname" value="<?php if (isset($_COOKIE["uname"])) {
                                                                echo $_COOKIE["uname"];
                                                            } ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="Password" name="pass" value="<?php if (isset($_COOKIE["pass"])) {
                                                                echo $_COOKIE["pass"];
                                                            } ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="remember" id="">Remember me
                </td>
            </tr>
            <tr>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td>
                <br>
                    <input type="submit" name="submit" value="Log In">
                    <a href="Forgotten_password.php"> Forgot Password?</a>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
    
<br><a href='createaccount.php'>Dont have an account?</a><br> 
 
</div>

<div class="footer" style="border-style: groove; color:blueviolet;">
  <p>Copyright © 2021</p>
</div>

</body>
</html>
