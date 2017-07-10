<?php
include './db.php';

$output = '';
$result=$mysqli->query("SELECT * FROM tbl_egresado WHERE col_nombre LIKE '%".$_POST['search']."%' ORDER BY col_nombre");
if($result->num_rows>0){
    //$output .= '<h3>Resultados de la búsqueda '.$_POST['search'].'</h3>';
    $output .="<table width='100%'>";
    while($row=$result->fetch_assoc()){
        $output.="<tr><th>";
        if(isset($row['col_imgperfil'])){
            $output.= "<img class='search-size' src='data:image/jpg;base64,".base64_encode($row['col_imgperfil'])."' height='200px' width='190px'>";
        }
        else{
            $output .= "<img class='search-size' src='./img/profimage.png' height='160px'>";
        }
        $output .= "</th>
        <td width='90%'>
            <a class='result-a' href='./show-perfil.php?id=".$rowesp['cod_alumno']."'>".$row['col_apellido'].", ".$row['col_nombre']."</a><br>
            ".$row['col_ciudadorigen']."<br>
            ".$row['col_email']."
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