<?php
	require_once("Clases/persona.php");
	$array=Persona::ToArray();
	$archivo=fopen("personas.php", "w");
	
	$tabla="<table border=1>
				<th>Nombre</th><th>Apellido</th><th>Legajo</th><th>Foto</th>";
		$renglon="";
		//var_dump($array);
		 foreach ($array as $per)
		 {
			$renglon=$renglon."<tr> <td>".$per[0]."</td>  <td>".$per[1]."</td>  <td>".$per[2]."</td>  <td><img src=".$per[3]."></td></tr>";
		 }

		$tabla=$tabla.$renglon."</table>";
		fwrite($archivo, $tabla);

		echo $tabla;
	 

	
?>
<a href="index.html"> Principal</a>