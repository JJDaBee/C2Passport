<?php
require_once "common.php";


    $errors = [];
    $status=false;

    // Get the data from form processing
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm=$_POST['confirmPassword'];


    // Check if username is already taken
    if ($password!=$confirm){
        $errors[]="Passwords are not the same";
    }
    if ($username==''){
        $errors[]="Name cannot be empty nor blank.";
    }
    if ($password==''){
        $errors[]="Password cannot be empty nor blank.";
    }
    
    if ($username!=''){
        $dao=new UserDAO();
        $user=$dao->get($username);
        if ($user){
            $errors[]= "Username is already taken";
        }
        if (count($errors)>0){
            $_SESSION['errors']=$errors;
            $_SESSION['register_fail']=$username;
            header ("Location: register.php");
            return;
        }
        else{
            $role=$_POST['role'];
            $hashed=password_hash($password, PASSWORD_DEFAULT);
            
            $user=new User($username,$hashed,$role);
            $dao=new UserDAO();
            $status=$dao->create($user);
        }
    }   

    // If one or more fields have validation error
    

    // if everything is checked. Create user Object and write to database
    
    

if ( $status ) {
    // success; redirect page
    $_SESSION["login_page"] = $username;
    header("Location: login.php");
    exit();
}
else{
    $_SESSION['register_fail']=$username;
    header("Location: register.php");
    return;
}
    
?>

