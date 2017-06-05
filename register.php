

<?php
$connection = mysql_connect("localhost", "pcallaha_callp2", "BANlec123"); // Establishing connection with server..

$db = mysql_select_db("pcallaha_xtra_credit", $connection); // Selecting Database.

$name=$_POST['name1']; // Fetching Values from URL.
$email=$_POST['email1'];
$password= sha1($_POST['password1']); // sha1 Encryption
$photo=$_POST['photo'];
$bio=$_POST['bio'];
// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid Email.......";
    }
    else{
        $result = mysql_query("SELECT * FROM registration WHERE email='$email'");
        $data = mysql_num_rows($result);
        if(($data)==0){
            $query = mysql_query("insert into registration(name, email, password, photo, bio) values ('$name', '$email', '$password','$photo', '$bio')"); // Insert query
            if($query){
                echo "You have Successfully Registered.....";
            }
            else{
                echo "Error....!!";
            }
        }
        else{
            echo "This email is already registered, Please try another email...";
        }
    
    }
    mysql_close ($connection);
?>

