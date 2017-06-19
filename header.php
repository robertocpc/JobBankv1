<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="./css/style.css">
        
        <title>Esis</title>
    </head>
    <?php if($_SESSION['windows']==5){
                echo "<body class='theme1'>"; }
        else{
            echo "<body class='theme2'>";}
    ?>
        <header>    
            <div class="container">
                <div id="branding">  
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
                                
                                if(isset($_SESSION['logged_in'])){
                                    echo "<li><a href='index.php'>Inicio</a></li>
                                    <li><a href='./blog.php'>Blog</a></li>
                                    <li><a href='./session-index.php'>".$_SESSION['user']."</a></li>
                                    <li><a href='./account/p-logout.php'>Log out</a></li>";
                                }
                                else{
                                    echo "<li><a href='index.php'>Inicio</a></li>
                                    <li><a href='./web_login.php'>Log in</a></li>
                                    <li><a href='./blog.php'>Blog</a></li>";
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
