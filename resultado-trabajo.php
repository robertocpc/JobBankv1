<?php
$searchq=$_REQUEST['search'];
$searchciq=$_REQUEST['searchc'];

$cargoq=$_REQUEST['cargo'];
include './db.php';

    
    
    //$searchq=preg_replace("#[^0-9A-Za-z]#i","",$searchq);
    //$query="SELECT * FROM tbl_egresado WHERE ";
    
    $i=0;
    $terms=explode(" ",$searchq);
    $querysel.="";
    foreach($terms as $each){
        $i++;
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $each))
        {
            $querylike.=" OR col_ofnombre like '%".$each."%' ";
            $querylike.=" OR col_empresa like '%".$each."%' ";
            $querylike.=" OR col_ubicacion like '%".$each."%' ";
            $querylike.=" OR col_idiomas like '%".$each."%' ";
            $querysel.=" $each ";
        }
        else{
            if($i==1){
                $querysel.=" $each ";            
            }
            else
                $querysel.=" $each";
        }
            
    }
    //Para Nombre
    $cargoq = ltrim($cargoq);
    if(!empty($cargoq)){
        $cargoquery=" AND MATCH(col_ofnombre) AGAINST ('".$cargoq."') ";
    }
    else{
        $cargoquery="";
    }
    //Para empresa
    $empresaq=$_REQUEST['empresa'];
    $empresaq = ltrim($empresaq);
    if(!empty($empresaq)){
        $empresaquery=" AND MATCH(col_empresa) AGAINST ('".$empresaq."') ";
    }
    else{
        $empresaquery="";
    }
    //Para Ciudad
    $ciudadq=$_REQUEST['searchc'];
    $ciudadq = ltrim($ciudadq);
    if(!empty($ciudadq)){
        $ciudadquery=" AND MATCH(col_ubicacion) AGAINST ('".$ciudadq."') ";
    }
    else{
        $ciudadquery="";
    }
    //Para Instituto/Universidad
    
    //Para Lugar
    
    //Para Idiomas
    $idiomaq=$_REQUEST['idioma'];
    $idiomaq = ltrim($idiomaq);
    if(!empty($idiomaq)){
        $idiomaquery=" AND MATCH(col_idiomas) AGAINST ('".$idiomaq."') ";
    }
    else{
        $idiomaquery="";
    }
    //Para fechali
    $fechaq=$_REQUEST['fechali'];
    if(isset($fechaq)){
        if($fechaq==0)
            $fechaquery=" AND datediff(DATE(NOW()),col_fechapub)<=1 ";
        elseif($fechaq==1)
            $fechaquery=" AND datediff(MONTH(DATE(NOW())),MONTH(col_fechapub))<=7 ";
        elseif($fechaq==2)
            $fechaquery=" AND (MONTH(date(now()))- MONTH(col_fechapub) )<=1";
        elseif($fechaq==3)
            $fechaquery="";
    }
    else{
        $fechaquery="";
    }
    //para tipo de empleo
    $tipem=$_REQUEST['tipem'];
    if(isset($tipem)){
        if($tipem==0)
            $tipemquery=" AND col_tipoempleo=0 ";
        elseif($tipem==1)
            $tipemquery=" AND col_tipoempleo=1 ";
        elseif($tipem==2)
            $tipemquery=" AND col_tipoempleo=2 ";
        elseif($tipem==3)
            $tipemquery=" AND col_tipoempleo=3 ";
        elseif($tipem==4)
            $tipemquery=" AND col_tipoempleo=4 ";
        elseif($tipem==5)
            $tipemquery=" AND col_tipoempleo=5 ";
        elseif($tipem==6)
            $tipemquery=" AND col_tipoempleo=6 ";
    }
    else{
        $tipemquery="";
    }
    //Tipo post
    $tippo=$_REQUEST['tippo'];
    if(isset($tippo)){
        if($tippo==0){
            $tippoquery=" AND col_tipopost=0 ";
        }elseif($tippo==1)
            $tippoquery=" AND col_tipopost=1 ";
        
    }
    else{
        $tippoquery="";
    }
    //disponi
    $disq=$_REQUEST['dis'];
    if(isset($disq)){
        if($disq==1)
            $disquery=" AND disponible=1 ";
        else{
            $disquery="";
        }
    }
    else{
        $disquery="";
    }
    //disponi vv
    $disvq=$_REQUEST['disv'];
    if(isset($disvq)){
        if($disvq==1)
            $disvquery=" AND col_dispviaje=1 ";
        else{
            $disvquery="";
        }
    }
    else{
        $disvquery="";
    }
    //disponi vv
    $disrq=$_REQUEST['disr'];
    if(!empty($disrq)){
        if($disrq==1)
            $disrquery=" AND col_dispresid=1 ";
        else{
            $disrquery="";
        }
    }
    else{
        $disrquery="";
    }

    if($searchq!=''){$query="SELECT  *,MATCH(col_ofnombre,col_empresa) AGAINST ('".$querysel."') as relevance 
    FROM tbl_oftrabajo WHERE ((match(col_ofnombre,col_empresa) AGAINST ('".$querysel."') )
    ".$querylike.")".$cargoquery.$empresaquery.$ciudadquery.$idiomaquery.$fechaquery.
    $tipemquery.$tippoquery.$disquery.$disvquery.$disrquery."    
    order by relevance desc";
    $querys=$mysqli->query($query);
    $nrows=$querys->num_rows;
    
    if($nrows>0){
        $output .="<table width='100%' style='font-size:13px;'>";
        while($row=$querys->fetch_assoc()){
            //$rowegre=$mysqli->query("SELECT * FROM tbl_egresado 
            //WHERE col_nombre='$row[col_nombre]' AND col_apellido='$row[col_apellido]'");
            //$rowegres=$rowegre->fetch_assoc();

            /*$estquery=$mysqli->query("SELECT GROUP_CONCAT(col_campest, '') as col_est 
            FROM tbl_estudio WHERE cod_alumno='$row[cod_alumno]' GROUP BY tbl_estudio.cod_alumno");
            $estrow=$estquery->fetch_assoc();*/
            $output.="<tr><th>";
            
            $output .= "</th>
            <td width='90%'>
                <a class='result-a' href='./preview-perfil.php?id=".$row['cod_ofnombre']."'>".$row['col_empresa'].", ".$row['col_ubicacion']."</a><br>
                ";
            /*if(isset($row['col_cabecera'])){*/
            $output.=" ".$row['col_fechalim'];
            //}
            /*else{$output.= " Ingeniero en Informática y Sistemas";}*/
            $output.=" <br>";
            $output.= $row['col_url']."<br></td>";
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
    /*else{
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
    }*/
    }
    else{
        echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallo resultado, por favor asegurese que escribio correctamente, 
        o intente con otro nombre o especialidad</span></center>";
    }

?>