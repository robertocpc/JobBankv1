<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="./css/style.css">
        <title>Esis</title>
    </head>
    <body onload='doOnLoad();'>
        
        <header>    
            <div class="container">
                <div id="branding">
                    <img src="./img/unjbg.png" heigth="45px" width="45px">  
                    <img src="./img/logo_50.png">
                </div>
                <nav>
                    <div class="contacto">
                        <p><img src="./img/phone.png" height="13" width="13"> 583000</p>
                        <p>anexo: 2005</p>
                        <p><img src="./img/email.png"  height="13" width="13"> esis@unjbg.edu.pe</p>
                    </div>
                    <ul>
                        <div class="indices marco">
                            <?php
                                
                                if(isset($_SESSION['logged_in'])&&$_SESSION['window']!=5){
                                    echo "<li><a href='index.php'>Inicio</a></li>
                                    
                                    <li><a href='./session-index-s.php'>".$_SESSION['user']."</a></li>
                                    <li><a href='./account/p-logout.php'>Log out</a></li>";
                                }
                                else if($_SESSION['window']==5){
                                    echo "<li><a href='index.php'>Inicio</a></li>
                                    <li><a href='./session-admi.php'>".$_SESSION['nombre']."</a></li>
                                    <li><a href='./account/p-logout.php'>Log out</a></li>";
                                }else{
                                    echo "<li><a href='index.php'>Inicio</a></li>
                                    <li><a href='./web_login.php'>Log in</a></li>
                                    <li><a href='https://www.facebook.com/Ingenier%C3%ADa-en-Inform%C3%A1tica-y-Sistemas-UNJBG-1933587416925656/'>Blog</a></li>";

                                }
                            ?>
                        </div>
                        <div class="indices marco_logo">
                            <li><a href="./index.php"><img src="./img/fblogo1.png" height="18" width="18"></a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </header>
