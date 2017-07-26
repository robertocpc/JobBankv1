<?php
/* Database connection settings */
/* User login process, checks if user exists and password is correct */
session_start();
include '../db.php';

// Escape email to protect against SQL injections
$username = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM tbl_oasa WHERE cod_alumno='$username'");


if(substr($username,0,-6)=='admin'){
    $adm = $mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$username'");
    $row = $adm->fetch_assoc();
    if ( $adm->num_rows == 0 ){ // User doesn't exist
        $_SESSION['message'] = "Datos Invalidos";
        echo substr($username,0,-6);
        header("location: ../error.php");
    }
    else{
        if ( $_POST['password']==$row['psw_alumno'] ) {
            
            $_SESSION['cod'] = $row['cod_alumno'];
            $_SESSION['pass']=$_POST['password'];
            $_SESSION['nombre'] = $row['col_nombre'];
            $_SESSION['apellido']=$_POST['col_apellido'];
            $_SESSION['user']='Administrador';
            // This is how we'll know the user is logged in
            $_SESSION['logged_in'] = true;
            $_SESSION['message']="Parte if 2";
            $_SESSION['window']=5;
            //$mysqli->query("INSERT INTO tbl_egresado (cod_alumno,psw_alumno) VALUES('$_SESSION[cod]','$_SESSION[pass]')");
            header("location: ../session-admi.php");
        }
    }
}

else{

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Usuario con ese código no existe!";
    header("location: ../error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
    $tblegr = $mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$username'");
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
            $_SESSION['logged_in'] = true;
            $_SESSION['telf']=$egre['col_telf'];
            $_SESSION['message']="Parte if 1";
            $_SESSION['window']=1;

            header("location: ../session-index-s.php");
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
        $_SESSION['email']=$user['col_email'];
        $_SESSION['telf']=$user['col_telf'];
        $_SESSION['psw'] = password_hash($user['psw_alumno'],PASSWORD_BCRYPT);
        $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $_SESSION['pass']=$_POST['password'];
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['message']="Parte if 2";
        $_SESSION['window']=1;
        if(empty($user['col_tipodoc']))
            echo $tipodoc='NULL';
        else
            $tipodoc=$user['col_tipodoc'];

        if(empty($user['col_fechafin']))
            echo $fechafin='NULL';
        else
            $fechafin=$user['col_fechafin'];

        if(empty($user['col_telf']))
            echo $telf='NULL';
        else
            $telf=$user['col_telf'];

        if(empty($user['col_fechaing']))
            echo $fechaing='NULL';
        else
            $fechaing=$user['col_fechaing'];

        if(empty($user['col_promedio']))
            echo $promedio='NULL';
        else
            $promedio=$user['col_promedio'];

        echo $sentence="INSERT INTO tbl_egresado (cod_alumno,psw_alumno,col_nombre,col_apellido,col_email,col_tipodoc,col_numide,col_telf,
        col_ciudadorigen,col_direccion,col_fechaing,col_fechafin,col_promedio,cod_tesis,col_tesis,col_urltesis)
         VALUES('$_SESSION[cod]','$_SESSION[pass]','$user[col_nombre]','$user[col_apellido]','$user[col_email]',$tipodoc,'$user[col_numide]'
         ,$telf,'$user[col_ciudadorigen]','$user[col_direccion]',$fechaing,$fechafin,$promedio
         ,'$user[cod_tesis]','$user[col_tesis]','$user[col_urltesis]')";
        $mysqli->query($sentence);
        header("location: ../session-index-s.php");
    }
    else {
        $_SESSION['message'] = "Has ingresado una contraseña incorrecta, intenta denuevo..";
		header("location: ../error.php");
        
    }
    }
}
}
?>