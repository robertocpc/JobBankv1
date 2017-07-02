<?php
include './db.php';

$output = '';
$result=$mysqli->query("SELECT * FROM tbl_egresado WHERE col_nombre LIKE '%".$_POST['search']."%' ORDER BY col_nombre");
if($result->num_rows>0){
    $output .= '<h4 align="center">Resultados de la búsqueda</h4>';
    $output .= '<div class="table-responsive">
                    <table class="table table bordered">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Especializacion</th>
                        </tr>';
    while($row=$result->fetch_assoc()){
        $output .= '
            <tr>
                <td>'.$row['col_nombre'].$_POST['search'].'HHHHH'.'</td>
                <td>'.$row['col_apellido'].'</td>
                <td>'.$row['col_nombre'].'</td>
            </tr>
        ';
    }
    echo $output;
}
else{
    echo 'No se hallo información referente';
}

?>