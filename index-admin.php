<?php
session_start();
$_SESSION['page']=1;
require './log_admin.php';
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">
                        <center>
                            <?php echo"<h2>Bienvenido de vuelta ".$_SESSION['user']." </h2>";?>
                        </center>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>