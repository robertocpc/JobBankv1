<?php
/* Database connection settings */
/* User login process, checks if user exists and password is correct */
session_start();
include '../db.php';

// Escape email to protect against SQL injections
$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM tbl_oasa WHERE cod_alumno='$username'");


if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Usuario con ese código no existe!";
    header("location: ../error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
    $tblegr = $mysqli->query("SELECT * FROM tbl_egresado WHERE codigo='$username'");
    if($tblegr->num_rows>0)
    {
        $egre = $tblegr->fetch_assoc();
        $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
         if ( password_verify($_POST['password'], password_hash($egre['psw_alumno'], PASSWORD_BCRYPT))) {
            $_SESSION['registered']=true;
            $_SESSION['user']=$egre['col_nombre'];
            $_SESSION['pass']=$egre['psw_alumno'];
            $_SESSION['cod']=$egre['cod_alumno'];
            $_SESSION['ape']=$egre['col_apellido'];
            $_SESSION['email']=$egre['col_email'];
            $_SESSION['telf']=$egre['col_telf'];
            $_SESSION['message']="Parte if 1";
            $_SESSION['window']=1;
            header("location: ../index.php");
        }
        else{
            $_SESSION['message']="Ha ingresado una contraseña incorrecta, intente denuevo..";
            header("location: ../error.php");
        }
    }
    else{
    if ( password_verify($_POST['password'], password_hash($user['psw_alumno'],PASSWORD_BCRYPT)) ) {
        
        $_SESSION['cod'] = $user['cod_alumno'];
        $_SESSION['user']=$user['col_nombre'];
        $_SESSION['ape']=$user['col_apellido'];
        $_SESSION['psw'] = password_hash($user['psw_alumno'],PASSWORD_BCRYPT);
        $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $_SESSION['pass']=$password;
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['message']="Parte if 2";
        $_SESSION['window']=1;
        header("location: ../index.php");
    }
    else {
        $_SESSION['message'] = "Has ingresado una contraseña incorrecta, intenta denuevo..";
		header("location: ../error.php");
        
    }
    }
}
?>