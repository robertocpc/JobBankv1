<?php
session_start(); 
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
                $querysel.="$each";            
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
            $fechaquery=" AND datediff(DATE(NOW()),col_fechapub)<=7 ";
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

    $separate=explode(" ",$tipem);
    $tipemquery.="";
    $j=0;
    if(isset($tipem)&&$tipem!=""){
        foreach($separate as $eachs){
            if($j!=0){
            if($j!=1)
                $tipemquery.=" OR ";
            if($eachs=='0')
                $tipemquery.="  col_tipoempleo=0 ";
            if($eachs=='1')
                $tipemquery.="  col_tipoempleo=1 ";
            if($eachs=='2')
                $tipemquery.="  col_tipoempleo=2 ";
            if($eachs=='3')
                $tipemquery.="  col_tipoempleo=3 ";
            if($eachs=='4')
                $tipemquery.="  col_tipoempleo=4 ";
            if($eachs=='5')
                $tipemquery.="  col_tipoempleo=5 ";
            if($eachs=='6')
                $tipemquery.="  col_tipoempleo=6 ";    
            }
            $j++;
        }
        $tipemquery=" AND(".$tipemquery.")";

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
            $disquery=" AND datediff(col_fechalim,DATE(NOW()))>=0 ";
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

    if($searchq!=''){
        if($searchq!='todos'){
            $query="SELECT  *,MATCH(col_ofnombre,col_empresa) AGAINST ('".$querysel."') as relevance 
            FROM tbl_oftrabajo WHERE ((match(col_ofnombre,col_empresa) AGAINST ('".$querysel."') )
            ".$querylike.")".$cargoquery.$empresaquery.$ciudadquery.$idiomaquery.$fechaquery.
            $tipemquery.$tippoquery.$disquery.$disvquery.$disrquery."    
            order by relevance desc";
            $querys=$mysqli->query($query);
            $nrows=$querys->num_rows;
            
            if($nrows>0){
                $output .="<div id='result2'><table width='100%' style='font-size:13px;'>";
                $i=0;
                while($row=$querys->fetch_assoc()){
                    //$rowegre=$mysqli->query("SELECT * FROM tbl_egresado 
                    //WHERE col_nombre='$row[col_nombre]' AND col_apellido='$row[col_apellido]'");
                    //$rowegres=$rowegre->fetch_assoc();

                    /*$estquery=$mysqli->query("SELECT GROUP_CONCAT(col_campest, '') as col_est 
                    FROM tbl_estudio WHERE cod_alumno='$row[cod_alumno]' GROUP BY tbl_estudio.cod_alumno");
                    $estrow=$estquery->fetch_assoc();*/
                    $i++;
                    $output.="<tr>
                    
                    <td width='5%' style='vertical-align:top;'>";
                    if($_SESSION['window']==5){
                        $output.="<p><input class='checkopt' type='checkbox' id='ck".$i."' value='".$row['cod_oftrabajo']."'/><label for='ck".$i."'></label></p>";
                    }            
                    $output .= "</td>
                    <td width='90%'>
                        <a class='result-a' style='cursor:pointer' data-code='".$row['cod_oftrabajo']."'>".$row['col_ofnombre']."</a><br>
                        ";
                    /*if(isset($row['col_cabecera'])){*/
                    $output.=" ".$row['col_empresa']."<br>";
                    $output.=" ".$row['col_ubicacion'];
                    //}
                    /*else{$output.= " Ingeniero en Informática y Sistemas";}*/
                    $output.=" <br>";
                    
                    $output.= $row['col_url']."<br></td>";
                    $output.="</tr>";
                }
                $output .="</table></div>";
                $i=0;
                echo $output;
            }
            else{
                echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallaron resultados, por favor asegúrese que escribió correctamente, 
        o intente con otro nombre o especialidad</span></center>";
            }

        }
        else{
            $query="SELECT  * 
            FROM tbl_oftrabajo";
            if(!empty($cargoquery)||!empty($empresaquery)||!empty($ciudadquery)||!empty($idiomaquery)||!empty($fechaquery)||!empty($tipemquery)||!empty($tippoquery)
            ||!empty($disquery)||!empty($disvquery)||!empty($disrquery)){
                $add1.=" WHERE ";
                 $add.=$cargoquery.$empresaquery.$ciudadquery.$idiomaquery.$fechaquery.
                $tipemquery.$tippoquery.$disquery.$disvquery.$disrquery."    
                order by col_ofnombre";
                
                if(substr($add, 0, 4)==" AND"){
                    $add=substr($add,4);
                    $add=$add1.$add;
                    $query=$query.$add;
                }

            }
            $query;
            $querys=$mysqli->query($query);
            $nrows=$querys->num_rows;
            
            if($nrows>0){
                $output .="<div id='result2'><table width='100%' style='font-size:13px;'>";
                $i=0;
                while($row=$querys->fetch_assoc()){
                    //$rowegre=$mysqli->query("SELECT * FROM tbl_egresado 
                    //WHERE col_nombre='$row[col_nombre]' AND col_apellido='$row[col_apellido]'");
                    //$rowegres=$rowegre->fetch_assoc();

                    /*$estquery=$mysqli->query("SELECT GROUP_CONCAT(col_campest, '') as col_est 
                    FROM tbl_estudio WHERE cod_alumno='$row[cod_alumno]' GROUP BY tbl_estudio.cod_alumno");
                    $estrow=$estquery->fetch_assoc();*/
                    $i++;
                    $output.="<tr>
                    
                    <th>";
                    if($_SESSION['window']==5){
                    echo"<p><input class='checkopt' type='checkbox' id='ck".$i."' value='".$row['cod_oftrabajo']."'/><label for='ck".$i."'></label></p>";

                    }            
                    $output .= "</th>
                    <td width='95%'>
                        <a class='result-a' style='cursor:pointer' data-code='".$row['cod_oftrabajo']."'>".$row['col_ofnombre']."</a><br>
                        ";
                    /*if(isset($row['col_cabecera'])){*/
                    $output.=" ".$row['col_empresa']."<br>";
                    $output.=" ".$row['col_ubicacion'];
                    //}
                    /*else{$output.= " Ingeniero en Informática y Sistemas";}*/
                    $output.=" <br>";
                    
                    $output.= $row['col_url']."<br></td>";
                    $output.="</tr>";
                }
                $output .="</table></div>";
                $i=0;
                echo $output;
            }
            else{
                echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallaron resultados, por favor asegúrese que escribió correctamente, 
        o intente con otro nombre o especialidad</span></center>";
            }

        }
    }
    else{
        echo "<input style='display:none' value=''>";
        echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallaron resultados, por favor asegúrese que escribió correctamente, 
        o intente con otro nombre o especialidad</span></center>";
    }

?>
<script>
    function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
    $(document).ready(function(){
		$('.result-a').click(function(){
            var txt=this.getAttribute("data-code");
            $.ajax({
			type: 'POST',
			url: './preview-oftrabajo.php',
			data: { 'id':txt},
			success: function(resp){
				$('#result2').html(resp);
			}
			})
        })
    })


	
</script>