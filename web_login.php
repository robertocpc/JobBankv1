<?php
session_start();
$_SESSION['windows']=5;
include './header.php';
?>
    <div id="showcase">
        <div class="container">
            <div class="login access">
                <form action="./account/p-login.php" method="post">
                    <div>
                        <input name="username" type="text" placeholder="Codigo">
                    </div>
                    <div>
                        <input name="password" type="password" placeholder="Contraseña">
                    </div>
                    <div>
                        <input type="submit" value="Ingresar">
                    </div>
                </form>
            </div>
            <div class="login inf">
                <h3>El acceso es solamente para egresados de la Universidad Nacional Jorge Basadre Grohman que pertenecen a la Escuela Profesional de Ingeniería en Informática y Sistemas</h3>
            </div>
        </div>
    </div>
  
</body>
</html>