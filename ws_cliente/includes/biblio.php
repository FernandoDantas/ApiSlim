<?php
	function mostraPaginacao($url, $ordem, $lpp,$total){
						
		$paginas = ceil($total / $lpp-1);
		$paginas_mostradas = ceil($total / $lpp); //Páginas que são mostradas realmente		
		
		
		$ordem_mostrada = $ordem + 1; //Especifica um valor para a variável ordem mostrada		
		
		if($ordem ==0){
			$mais = $ordem+1;
			$url_mais = "$url&ordem=$mais";
			$paginacao="<div><p>Página $mais de $paginas_mostradas</p><br>
			<a href=$url_mais>Próxima</a> | 
			<a href=$url&ordem=$paginas>Última</a></div>";				
		}
		if($ordem > 0){
			$mais = $ordem+1;
			$url_mais = "$url&ordem=$mais";
			$menos = $ordem - 1;
			$url_menos = "$url&ordem=$menos";
			$paginacao="<div><p>Página $mais de $paginas_mostradas</p><br>
			<a href=$url&ordem=0>Primeira</a> | 
			<a href=$url_menos>Anterior</a> | 
			<a href=$url_mais>Próximo</a> | 
			<a href=$url&ordem=$paginas>Última</a></div>";				
		}
		if($ordem ==$paginas){
			$menos = $ordem - 1;
			$url_menos = "$url&ordem=$menos";
			$paginacao="<div><p>Página $mais de $paginas_mostradas</p><br>
			<a href=$url&ordem=0>Primeira</a> |				
			<a href=$url_menos>Anterior</a>  </div>";
		}
		if($paginas <=0 ){					
			$paginacao="<div><p>Página 1 de 1 </p> </div>";
		}
		
		return $paginacao;
}

function databr($data, $opcao)
{
	if ($opcao==1)
	{
		$dia = substr($data,0,2);
		$mes = substr($data,3,2);
		$ano = substr($data,6,4);
		
		$databr = $ano . "-" .$mes ."-" .$dia;	
	}
	else
	{
		$dia = substr($data,8,2);
		$mes = substr($data,5,2);
		$ano = substr($data,0,4);
		
		$databr = $dia . "/" .$mes ."/" .$ano;	
	}
	return $databr;
}

		
function somarData($data, $dias=0, $meses=0, $ano=0){
  $data = explode("/", $data);
  $resData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses, $data[0] + $dias, $data[2] + $ano));
  return $resData;
}

function somarDataMysql($data, $ano, $meses, $dias ){
  $data = explode("-", $data);
  $resData2 = date("Y-m-d", mktime(0, 0, 0,$data[1] + $meses,   $data[2] + $dias, $data[0] + $ano));
  return $resData2;
}

function diasemanaExtenso($data) {
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	switch($diasemana) {
		case"0": $diasemana = "Domingo";       break;
		case"1": $diasemana = "Segunda-Feira"; break;
		case"2": $diasemana = "Terça-Feira";   break;
		case"3": $diasemana = "Quarta-Feira";  break;
		case"4": $diasemana = "Quinta-Feira";  break;
		case"5": $diasemana = "Sexta-Feira";   break;
		case"6": $diasemana = "Sábado";        break;
	}

	echo "$diasemana";
}

function diasemana($data) {
	$ano =  substr("$data", 0, 4);
	$mes =  substr("$data", 5, -3);
	$dia =  substr("$data", 8, 9);

	$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

	return $diasemana;
}

function imprimeMes($valor) {
	switch($valor) {
		
		case"1": $ano = "Janeiro"; break;
		case"2": $ano = "Fevereiro";   break;
		case"3": $ano = "Março";  break;
		case"4": $ano = "Abril";  break;
		case"5": $ano = "Maio";   break;
		case"6": $ano = "Junho";        break;
		case"7": $ano = "Julho";        break;
		case"8": $ano = "Agosto";        break;
		case"9": $ano = "Setembro";        break;
		case"10": $ano = "Outubro";        break;
		case"11": $ano = "Novembro";        break;
		case"12": $ano = "Dezembro";        break;
	}

	echo "$ano";
}

 function ultimoDiaMes($data){
       $dia = date("d",$data);
       $mes = date("m",$data);
       $ano = date("Y",$data);
    
    $data = mktime(0, 0, 0, $mes, 1, $ano);
    return date("d",$data-1);
   }
   
  function CorBimestre($dia, $mes, $ano){
	$sql ="select * from calendario_escolar where ano='$ano' and mes='$mes' and dia ='$dia' ";
	//echo $sql;
	$qry = mysql_query($sql);
	$linha = mysql_fetch_array($qry);
	$bim = $linha[bimestre];
	
	switch($bim) {
		
		case"1": $cor="azul"; break;
		case"2": $cor="amarelo";   break;
		case"3": $cor="verde";  break;
		case"4": $cor="vermelho";  break;
		default: $cor="padrao";
	}
	
	return $cor;
  } 	