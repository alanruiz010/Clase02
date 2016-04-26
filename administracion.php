<?php
	require_once("Clases/persona.php");
	var_dump($_POST['frm']);
	
	switch ($_POST['frm']) 
	{
		case 'Enviar':
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$legajo=$_POST['legajo'];
		$foto=$_FILES['foto']['name'];
		$temporal=$_FILES['foto']['tmp_name'];
		move_uploaded_file($temporal, $foto);

		$persona=new Persona($nombre,$apellido,$legajo,$foto);
		$pers=Persona::Guardar($persona);
		?>
		<a href="listar.php">Listar</a>
		<?php	break;
		
		case 'Eliminar':
		$legajo=$_POST['legajo'];
		//$persona=new Persona();
		//$persona->setlegajo($legajo);
		$pers=Persona::sacarPersona($legajo);
		?>
		<a href="index.html">principal</a>
		<?php
		default:
			# code...
			break;
	}
		
		
	
	

?>
