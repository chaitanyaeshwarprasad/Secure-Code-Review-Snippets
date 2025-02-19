<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
//The code you provided is performing some sanitization and escaping on the $username and $password variables before using them in a MySQL query. Here's what each line does:

//$username = stripcslashes($username);

//This removes any escape slashes (\) from the $username string, which could have been added previously (e.g., when data was inserted or passed through certain processes).

//$password = stripcslashes($password);

//Similar to the first line, this removes any escape slashes from the $password string.

//$username = mysqli_real_escape_string($con, $username);

//This escapes special characters in $username (like quotes, backslashes, etc.) to prevent SQL injection when the string is inserted into a MySQL query. The $con variable represents the database connection.

//$password = mysqli_real_escape_string($con, $password);

//Same as the previous line, but this escapes special characters in the $password string.

//Notes:

//Why use stripcslashes?

//It’s important to understand that stripcslashes only affects backslashes. If the input data was encoded in some way (e.g., by adding slashes for escaping), this would remove those slashes. However, this function alone doesn't fully prevent SQL injection, as it doesn't account for all forms of malicious input.

//Why use mysqli_real_escape_string?

// This is crucial for escaping user input before embedding it into an SQL query. Without it, malicious input could compromise the security of your database, such as through SQL injection.
    

        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql); 
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  