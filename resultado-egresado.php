<?php
$searchq=$_REQUEST['search'];
$nombreq=$_REQUEST['nombre'];
include './db.php';

    
    
    //$searchq=preg_replace("#[^0-9A-Za-z]#i","",$searchq);
    //$query="SELECT * FROM tbl_egresado WHERE ";
    

    $i=0;
    $terms=explode(" ",$searchq);
    $querysel.="";
    foreach($terms as $each){
        $i++;
        if($i==1){
            $querysel.=" $each ";            
        }
        else
            $querysel.=" $each";
            
    }
    //Para Nombre
    $nombreq = ltrim($nombreq);
    if(!empty($nombreq)){
        $nombrequery=" AND MATCH(col_nombre,col_apellido) AGAINST ('".$nombreq."') ";
    }
    else{
        $nombrequery="";
    }
    //Para Titulo
    $tituloq=$_REQUEST['titulo'];
    $tituloq = ltrim($tituloq);
    if(!empty($tituloq)){
        $tituloquery=" AND MATCH(col_grado) AGAINST ('".$tituloq."') ";
    }
    else{
        $tituloquery="";
    }
    //Para Empresa
    $empresaq=$_REQUEST['compania'];
    $empresaq = ltrim($empresaq);
    if(!empty($empresaq)){
        $empresaquery=" AND MATCH(col_empresa) AGAINST ('".$empresaq."') ";
    }
    else{
        $empresaquery="";
    }
    //Para Instituto/Universidad
    $uniq=$_REQUEST['uni'];
    $uniq = ltrim($uniq);
    if(!empty($uniq)){
        $uniquery=" AND MATCH(col_school) AGAINST ('".$uniq."') ";
    }
    else{
        $uniquery="";
    }
    //Para Lugar
    $lugarq=$_REQUEST['lugar'];
    $lugarq = ltrim($lugarq);
    if(!empty($lugarq)){
        $lugarquery=" AND MATCH(col_ciudadactual) AGAINST ('".$lugarq."') ";
    }
    else{
        $lugarquery="";
    }
    //Para EmpresaActual
    $empactq=$_REQUEST['empresa'];
    $empactq = ltrim($empactq);
    if(!empty($empactq)){
        $empactquery=" AND MATCH(col_empresa) AGAINST ('".$empactq."') AND col_actualtrab=1 ";
    }
    else{
        $empactquery="";
    }
    //Para EmpresaPas
    $emppasq=$_REQUEST['empresap'];
    $emppasq = ltrim($emppasq);
    if(!empty($emppasq)){
        $emppasquery=" AND MATCH(col_empresa) AGAINST ('".$emppasq."') AND col_actualtrab=0 ";
    }
    else{
        $emppasquery="";
    }
    //Para Idiomas
    $idiomaq=$_REQUEST['idioma'];
    $idiomaq = ltrim($idiomaq);
    if(!empty($idiomaq)){
        $idiomaquery=" AND MATCH(col_idioma) AGAINST ('".$idiomaq."') ";
    }
    else{
        $idiomaquery="";
    }

    if($searchq!=''){$query="SELECT DISTINCT col_nombre,col_apellido,MATCH(col_nombre,col_apellido,col_posactual,col_cabecera) 
    AGAINST ('".$querysel."') as relevance 
    FROM tbl_egresado left join tbl_estudio on tbl_egresado.cod_alumno=tbl_estudio.cod_alumno
    LEFT JOIN tbl_workexp ON tbl_workexp.cod_alumno=tbl_egresado.cod_alumno
    WHERE (match(col_nombre,col_apellido,col_posactual,col_cabecera) 
    AGAINST ('".$querysel."') )
    ".$nombrequery.$tituloquery.$empresaquery.$uniquery.$lugarquery.$empactquery.$emppasquery.$idiomaquery."    
    order by relevance desc ";
    $querys=$mysqli->query($query);
    $nrows=$querys->num_rows;
    
    if($nrows>0){
        $output .="<table width='100%' style='font-size:13px;'>";
        while($row=$querys->fetch_assoc()){
            $rowegre=$mysqli->query("SELECT * FROM tbl_egresado 
            WHERE col_nombre='$row[col_nombre]' AND col_apellido='$row[col_apellido]'");
            $rowegres=$rowegre->fetch_assoc();

            /*$estquery=$mysqli->query("SELECT GROUP_CONCAT(col_campest, '') as col_est 
            FROM tbl_estudio WHERE cod_alumno='$row[cod_alumno]' GROUP BY tbl_estudio.cod_alumno");
            $estrow=$estquery->fetch_assoc();*/
            $output.="<tr><th>";
            if(isset($rowegres['col_imgperfil'])){
                $output.= "<img class='search-size' src='data:image/jpg;base64,".base64_encode($rowegres['col_imgperfil'])."' height='200px' width='190px'>";
            }
            else{
                $output .= "<img class='search-size ' src='./img/profimage.png' height='160px'>";
            }
            $output .= "</th>
            <td width='90%'>
                <a class='result-a' href='./preview-perfil.php?id=".$rowegres['cod_alumno']."'>".$rowegres['col_apellido'].", ".$rowegres['col_nombre']."</a><br>
                ";
            if(isset($rowegres['col_cabecera'])){$output.=" ".$rowegres['col_cabecera'];}
            else{$output.= " Ingeniero en Informática y Sistemas";}
            $output.=" <br>";
            $output.= $rowegres['col_ciudadorigen']."<br></td>";
            $output.="</tr>";
        }
        $output .="</table>";
        echo $output;
    }
    else{
        echo "parte 2";
        echo $searchq;
        $i=0;
        $terms=explode(" ",$searchq);
        $querysel="";
        foreach($terms as $each){
            $i++;
            if($i==1){
                $querysel.=" $each ";            
            }
            else
                $querysel.=" $each";
                
        }
    //    $query=$mysqli->query("SELECT * FROM tbl_egresado WHERE col_nombre LIKE '%searchq%'")
        
        $querysel.="  ' in boolean mode) ";
        $query="SELECT DISTINCT col_nombre,col_apellido 
        FROM tbl_egresado LEFT JOIN tbl_estudio ON tbl_egresado.cod_alumno=tbl_estudio.cod_alumno
         WHERE MATCH(col_nombre,col_apellido) AGAINST('".$querysel."
          AND MATCH(col_campest) AGAINST('".$querysel;
        echo $query .=$querysel; 
        $querys=$mysqli->query($query);
        $nrows=$querys->num_rows;
        if($nrows>0){
            
            $output .="<table width='100%' style='font-size:13px;'>";
            while($row=$querys->fetch_assoc()){
                $estquery=$mysqli->query("SELECT GROUP_CONCAT(col_campest, '') as col_est 
                FROM tbl_estudio WHERE cod_alumno='$row[cod_alumno]' GROUP BY tbl_estudio.cod_alumno");
                $estrow=$estquery->fetch_assoc();

                $rowegre=$mysqli->query("SELECT * FROM tbl_egresado 
                WHERE cod_alumno='$row[cod_alumno]'");
                $rowegres=$rowegre->fetch_assoc();

                $output.="<tr><th>";
                if(isset($row['col_imgperfil'])){
                    $output.= "<img class='search-size' src='data:image/jpg;base64,".base64_encode($row['col_imgperfil'])."' height='200px' width='190px'>";
                }
                else{
                    $output .= "<img class='search-size ' src='./img/profimage.png' height='160px'>";
                }
                $output .= "</th>
                <td width='90%'>
                    <a class='result-a' href='./preview-perfil.php?id=".$row['cod_alumno']."'>".$rowegres['col_apellido'].", ".$rowegres['col_nombre']."</a><br>
                    ";
                if(isset($estrow['col_est'])){$output.=" ".$estrow['col_est'];}
                else{$output.= " Ingeniero en Informática y Sistemas";}
                $output.=" <br>";
                $output.= $rowegres['col_ciudadorigen']."<br></td>";
                $output.="</tr>";
            }
            $output .="</table>";
            echo $output;
        }
        else{
        echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallo resultado, por favor asegurese que escribio correctamente, 
        o intente con otro nombre o especialidad</span></center>";
    }
    }
    }
    else{
        echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallo resultado, por favor asegurese que escribio correctamente, 
        o intente con otro nombre o especialidad</span></center>";
    }

?>