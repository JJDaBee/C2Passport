<?php
require_once "common.php";
    $errors=[];
    $user=false;
    $valid=false;
    $status=false;
    $password=$_POST['originalpassword'];
    $newpw=$_POST['newPassword'];
    $confirmnew=$_POST['newconfirmPassword'];

    // email and name cannot be blank nor empty string
    if ($_POST['username']==''){
        $errors[]="Username cannot be blank";
    }
    $username=$_POST['username'];
    $dao=new UserDAO();
    $user=$dao->get($username);
    if (!$user){
        $errors[]="Username is invalid.";
    }
    
    // Get the data from form processing and check data
    else{
    
    
    // Check if password is valid
    if ($password==''){
        $errors[]="Original Password cannot be empty nor blank.";
    }
    else{
        if ($user){
            $valid=password_verify($password, $user->getPasswordHash());
        }
    }
    if ($newpw==''){
        $errors[]="New Password cannot be empty nor blank.";
    }
    if ($confirmnew==''){
        $errors[]="Confirmed New Password cannot be empty nor blank.";
    }
    if ($newpw!='' && $confirmnew!='' && $newpw!=$confirmnew){
        $errors[]="The NEW passwords are different.";
    }
    }

    // Errors to show in change_password.php
    // update the hashed password in the database
    if ($newpw!='' && $confirmnew!='' && $newpw==$confirmnew && $valid){
        $hashednew=password_hash($newpw, PASSWORD_DEFAULT);
        $user->setPasswordHash($hashednew);
        $status=$dao->update($user);
    }
    // if password is successfully changed, redirect to login.php
    // else reload the page



    if ( $status ) {
    // success; redirect
        $_SESSION["login_page"] = $username;
        header("Location: login.php");
        exit();
    }
    else {
        $_SESSION["pwd_change_fail"]= $username;
        $errors[] = "Error in update user.";
        header("Location: change_password.php");
    }
    if (count($errors)>0){
        $_SESSION['errors']=$errors;
        $_SESSION["pwd_change_fail"]= $username;

    }
?>