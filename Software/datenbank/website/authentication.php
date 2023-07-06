<?php 
    session_start();     
    include('config.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($link, $username);  
        $password = mysqli_real_escape_string($link, $password);
      
        $sql = "select * from Website where Username = '$username'";  
        $result = mysqli_query($link, $sql);  
        $row = mysqli_fetch_array($result);
        $access = $row[6];
        //$decodedPassword = $password;
        $decodedPassword = password_verify($password, $row["Password"]);
        $count = mysqli_num_rows($result);  
       

        if (($count == 1) && ($decodedPassword == $password))
        { 
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username;
           $_SESSION['password'] = $password;
           $_SESSION['access'] = $access;
           header('Location: portal.php');
           exit;  
        }  
        else
        {  
            header( "refresh:2; url=index.php" );
            echo "<h1> Login failed. Invalid username or password.</h1>";
            exit;
        }     
?> 
