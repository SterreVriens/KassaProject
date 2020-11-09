<?php 
require('config.php');

$file = 'iplog.txt';

if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }

if($_POST['formType'] == "register"){
    //register.php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

 

    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $conn ->prepare($sql);
    $query-> execute(['email' => $email]);
    $user = $query->rowCount(); // amount of var email in db 1 = already exists
    if ($user) { //user already exists
        exit('user already exists');
    }

 

    $sql = "INSERT INTO users (email, password) VALUES(:email, :password)";
    $query = $conn->prepare($sql);
    $query->execute(['email' => $email, 'password' => $hashedPassword ]);

 

    exit('user registered');

 

}else if($_POST['formType'] == "login"){
     //login.php
     $email = $_POST['email'];
    $password = $_POST['password'];

 

    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $conn->prepare($sql);
    $query->execute(['email' => $email]);

 

    $userExists = $query->rowCount();
    if ($userExists) {
        $user = $query->fetch();
        $verified = password_verify($password, $user['password']);
        if ($verified) {
            file_put_contents($file," Gebruiker met ip: ". $ip_address. " heeft succes vol ingelogd als: ".$email."\n", FILE_APPEND);
        }
        
       
        //from here you are logged in
        if(!$verified){
            file_put_contents($file," Gebruiker met ip: ". $ip_address. " heeft geprobeerd in te loggen "."\n", FILE_APPEND);
            exit('email/password do not match');
            
        }
 

        $_SESSION['id'] = $user['id'];
        header('Location: ../index.php');
        exit();
    }
    
}