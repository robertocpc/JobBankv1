<?php
include './db.php';

$output = '';
$result=$mysqli->query("SELECT distinct cod_alumno FROM tbl_estudio WHERE col_campest LIKE '%".$_POST['search']."%'");
if($result->num_rows>0){
    //$output .= '<h3>Resultados de la búsqueda '.$_POST['search'].'</h3>';
    $output .="<table width='100%'>";
    while($row=$result->fetch_assoc()){
        $output.="<tr><th>";
        $resultesp=$mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$row[cod_alumno]'");
        $rowesp=$resultesp->fetch_assoc();
        if(isset($rowesp['col_imgperfil'])){
            $output.= "<img class='search-size' src='data:image/jpg;base64,".base64_encode($rowesp['col_imgperfil'])."' height='200px' width='190px'>";
        }
        else{
            $output .= "<img class='search-size' src='./img/profimage.png' height='160px'>";
        }
        $camp=$mysqli->query("SELECT * FROM tbl_estudio WHERE cod_alumno='$row[cod_alumno]'");
        $rowcamp=$camp->fetch_assoc();
        
        $output .= "</th>
        <td width='90%'>
            <a class='result-a' href='./show-perfil.php?id=".$rowesp['cod_alumno']."''>".$rowesp['col_apellido'].", ".$rowesp['col_nombre']."</a><br>
            ".$rowesp['col_ciudadorigen']."<br>
            ".$rowcamp['col_campest']." -".$rowesp['col_email']."
        </td>";
        $output.="</tr>";
    }
    $output .="</table>";
    echo $output;
}
else{
    echo '<h3>No se hallo información referente</h3>';
    
}

?>