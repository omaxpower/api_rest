<?php

//Api.php

class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}

	function database_connection()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=php_insertarpdo", "root", "");
	}

	function fetch_all()
	{
		$query = "SELECT * FROM producto ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["nombres"]))
		{
			$form_data = array(
				':nombres'	=>	$_POST['nombres'],
				':descripcion'	=>	$_POST['descripcion'],
				':categoria'	=>	$_POST['categoria'],
				':lugar'	=>	$_POST['lugar'],
				':fregis'	=>	$_POST['fregis'],
				':cod'	=>	$_POST['cod'],
				':proveedor'	=>	$_POST['proveedor'],
				':cantidad'	=>	$_POST['cantidad']
			);
			$query = "
			INSERT INTO producto 
			(nombres, descripcion, categoria, lugar, fregis, cod, proveedor, cantidad) VALUES 
			(:nombres, :descripcion, :categoria, :lugar, :fregis, :cod, :proveedor, :cantidad)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM producto WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['nombres'] = $row['nombres'];
				$data['descripcion'] = $row['descripcion'];
				$data['categoria'] = $row['categoria'];
				$data['lugar'] = $row['lugar'];
				$data['fregis'] = $row['fregis'];
				$data['cod'] = $row['cod'];
				$data['proveedor'] = $row['proveedor'];
				$data['cantidad'] = $row['cantidad'];

			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["nombres"]))
		{
			$form_data = array(
				':nombres'	=>	$_POST['nombres'],
				':descripcion'	=>	$_POST['descripcion'],
				':categoria'	=>	$_POST['categoria'],
				':lugar'	=>	$_POST['lugar'],
				':fregis'	=>	$_POST['fregis'],
				':cod'	=>	$_POST['cod'],
				':proveedor'	=>	$_POST['proveedor'],
				':cantidad'	=>	$_POST['cantidad'],
				
				':id'			=>	$_POST['id']
			);
			$query = "			UPDATE producto 
			SET nombres = :nombres, descripcion = :descripcion, categoria = :categoria, lugar = :lugar,fregis = :fregis,cod = :cod, proveedor = :proveedor,cantidad = :cantidad
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM producto WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>