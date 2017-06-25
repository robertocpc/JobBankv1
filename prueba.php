<?php
include './db.php';
include './header.php';
?>
      
                 <div class="container tab_panel">          
                            <label for="box">
                                <span class="stag">Fecha </span>
                                <input id="box" name="fecha" type="date" class="sinput datepicker" onchange="sendd()">
                            </label><br>
                </div>
                           

    <script type="text/javascript">
        
    function sendd(){
        alert("funcionaa");
    var input = document.getElementById( 'box' ).value;
var d = new Date( input );

if ( !!d.valueOf() ) { // Valid date
    year = d.getFullYear();
    month = d.getMonth();
    month++;
    day = d.getDate();
    day++;
} else { /* Invalid date */ }
    window.location.href = "print.php?name=" + day; 
    //alert(day);
    }
    </script>

    <script src="./scriptw.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
    
   

</html>