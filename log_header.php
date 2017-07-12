<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include './db.php';
include './header.php';
?>
        <div class="container">
        
            <div class="formulario">
                <?php if($_SESSION['window']==1){?>
                <div class="tab_izquierda shadow">
                    <?php  if($_SESSION['page']==1){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './session.php';" class="efex_button1 <?php echo $page;?>">Información Personal</button><br>
                    <?php
                    if($_SESSION['page']==2){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './inf-carrera.php';" class="efex_button1 <?php echo $page;?> ">Información de Carrera</button><br>
                    <?php
                    if($_SESSION['page']==3){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './listestudio.php';" class="efex_button1 <?php echo $page;?>">Especializaciones</button><br>
                    <?php
                    if($_SESSION['page']==4){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './work.php';" class="efex_button1 <?php echo $page;?>">Experiencia Laboral</button><br>
                    <?php
                    if($_SESSION['page']==5){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './addpublic.php';" class="efex_button1 <?php echo $page;?>">Publicaciones</button><br>
                    <?php
                    if($_SESSION['page']==6){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>

                </div>
                <?php }else{ ?>
                <div class="tab_izquierda shadow">
                    <?php  if($_SESSION['page']==1){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './session-admi.php';" class="efex_button1 <?php echo $page;?>">Egresados</button><br>
                    <?php
                    if($_SESSION['page']==2){$page='selected';}else{$page='';}
                    ?>
                    <button onclick="location.href = './bolsa-trabajo.php';" class="efex_button1 <?php echo $page;?> ">Bolsa de Trabajo</button><br>
                    
                </div>
                <?php }?>