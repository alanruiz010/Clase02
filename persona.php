<?php
/**
* 
*/
class Persona
{
	private $_nombre;
	private $_apellido;
	private $_legajo;
	private $_foto;
	public function getnombre()
	{
		return $this->_nombre;
	}
	public function setnombre($valor)
	{
		$this->_nombre=$valor;
	}
	public function getapellido()
	{
		return $this->_apellido;
	}
	public function setapellido($valor)
	{
		$this->_apellido=$valor;
	}
	public function getlegajo()
	{
		return $this->_legajo;
	}
	public function setlegajo($valor)
	{
		$this->_legajo=$valor;
	}
	public function getfoto()
	{
		return $this->_foto;
	}
	public function setfoto($valor)
	{
		$this->_foto=$valor;
	}
	public function __construct($ape,$nom,$leg,$foto)
	{
		$this->_nombre=$nom;
		$this->_apellido=$ape;
		$this->_legajo=$leg;
		$this->_foto=$foto;
	}
	public function ToString()
	{
		return $this->_nombre.",".$this->_apellido.",".$this->_legajo.",".$this->_foto;
	}
	public static function Guardar($pers)
	{
		$archivo=fopen("persona.txt", "a");
		fwrite($archivo, $pers->ToString()."\r\n");
		//return true;
		fclose($archivo);
	}
	public static function ToArray()
	{
		$lista=array();
		$archivo=fopen("persona.txt", "r");
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			$person=explode(",", $renglon);
			$person[0]=trim($person[0]);
			if($person[0]!="")
				$lista[]=$person;
		}
		fclose($archivo);
		return $lista;
	}
	public static function sacarPersona($legajo)
	{
		$listado=Persona::ToArray();
		$ListadoAdentro=array();
		$estaLaPersona=false;
		foreach ($listado as $pers) 
		{
			if($pers[2]!=$legajo)
			{
			$estaLaPersona=true;
			$ListadoAdentro[]=$pers;
						Persona::GuardarListado($ListadoAdentro);
			}
	    }
	    if(!$estaLaPersona)
		{
			$mensaje= "no esta la persona!!!";
		}
	}

		public static function GuardarListado($listado)
	{
		$archivo=fopen("persona.txt", "w"); 	

		foreach ($listado as $persona) 
		{
	 		  if($persona[0]!=""){
	 		  		$dato=$persona[0] .",".$persona[1].",".$persona[2].",".$persona[3]."\n" ;
					fwrite($archivo, $dato);
	 		  }	 	
		}
		fclose($archivo);

	}

	
	

}
?>