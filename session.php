<?php
include './header.php';
?>
        <div class="container">
            <div class="formulario">
                <!--nav class="tab_izquierda">
                    <ul>
                    <li><a href="./panel_inf.php" class="efx_button1">Información Personal</a></li>
                    <li><a href="./panel_cap.php" class="efx_button1">Capacitaciones</a></li>
                    <li><a href="./panel_esp.php" class="efx_button1">Especializaciones</a></li>
                    <li><a href="./panel_bdt.php" class="efx_button1">Bolsa de Trabajo</a></li>
                    </ul>
                </nav-->
                <div class="tab_izquierda">
                    <button onclick="location.href = './index.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel">
                        <p>Primer Parrafo</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>