<?php  
class Calendario{
	//public $numDias=date('N');Número de días del mes dado 	28 hasta 31
	public $dia;
	public $mes;
	public $año;

	public function mostrar($mes){
		$dia = date('d');//dia 2 digitos
		//$mes = date('m');//mes 2 digitos
		$año = date('Y');//Año 4 digitos
		$semana = 1;
		for ($i=1;$i<=date('t',strtotime($año.'-'.$mes.'-'.$dia));$i++) {//Número de días del mes 28-31
			$diaDeLaSemana = date( 'N', strtotime($año.'-'.$mes.'-'.$i) );	
			$calendario[ $semana ][ $diaDeLaSemana ] = $i;
			//echo $calendario[ $semana ][ $diaDeLaSemana ];
			if ( $diaDeLaSemana == 7 )
				$semana++;			
		}
		return $calendario;
	}

}



?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Calendario</title>
</head>
<body>

	<table border="1">
	<thead>
		<tr>
			<td>Lunes</td>
			<td>Martes</td>
			<td>Miercoles</td>
			<td>Jueves</td>
			<td>Viernes</td>
			<td>Sabado</td>
			<td>Domingo</td>
		</tr>
	</thead>

	<?php
		$valor=date('m');
		$semanas = new Calendario;
		$var=$semanas->mostrar($valor);
		$i=1; 
		foreach($var as $algo){
	?>
	<tbody>
		<tr>
			<?php for ($j=1;$j<=7;$j++){ ?>
			<td>
			<?php
			if (isset($var[$i][$j])) 
				echo $var[$i][$j]; ?>
			</td>
			<?php }$i++; ?>
		</tr>
	<?php } ?>
	</tbody>
	</table>

	<?php
		$name='';
	?>
	<form action="" method="post">
		<button name="button" type="submit" value="<?php echo (int)$valor--; ?>">Mes Anterior</button>
		<button name="button" type="submit" value="<?php echo $valor++; ?>">mes Siguiente</button>
	</form>
	<?php
		echo $name;
	?>
</body>
</html>