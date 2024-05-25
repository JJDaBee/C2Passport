<?php
    require_once 'common.php';
   

    $errors = [];

    // Get the data login.php
    $username=$_POST['username'];
    $password=$_POST['password'];
    // Create the DAO object to facilitate connection to the database.
    $dao=new UserDAO();
    $user=$dao->get($username);
    // Check if the username exists
    if ($user)
    {
        // If username exists
        // get the hashed password from the database
        // Match the hashed password with the one which user entered
        // if it does not match. -> error
     
        // check if the plain text password is valid
        
        // if valid get the user role, and redirect the user according to the role
        $hashed=$user->getPasswordHash();
        $status=password_verify($password,$hashed);
     
        if ($status){
            $_SESSION['username']=$username;
            $_SESSION['role']=$user->getRole();
            if ($user->getRole()=='user'){
                header("Location: welcome.php");
            }
            else{
                header("Location: welcome_admin.php");
                $_SESSION['welcome_admin']=$username;
            }
            exit();
        }
     
     
    
        else
        {
            // password not valid
            // return to login page and show error
            $errors[]="Invalid password.";
            $_SESSION['errors']=$errors;
            $_SESSION["login_page"] = $username;
            header("Location: login.php");
            exit();
        }
    
    }
    else
    {
        $errors[]="Username does not exist in the database.";
        $_SESSION['errors']=$errors;
        $_SESSION['login_page']=$username;
        header("Location: login.php");
        return;

        
    }

?>

