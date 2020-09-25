<?php
//action.php
if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$form_data = array(
			'nombres'	=>	$_POST['nombres'],
			'descripcion'		=>	$_POST['descripcion'],
			'categoria'		=>	$_POST['categoria'],
			'lugar'		=>	$_POST['lugar'],
			'fregis'		=>	$_POST['fregis'],
			'cod'		=>	$_POST['cod'],
			'proveedor'		=>	$_POST['proveedor'],
			'cantidad'		=>	$_POST['cantidad']
		);
		$api_url = "http://localhost/api_rest/api/test_api.php?action=insert"; 
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else
			{
				echo 'error';
			}
		}
	}

	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/api_rest/api/test_api.php?action=fetch_single&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'nombres'	=>	$_POST['nombres'],
			'descripcion'		=>	$_POST['descripcion'],
			'categoria'		=>	$_POST['categoria'],
			'lugar'		=>	$_POST['lugar'],
			'fregis'		=>	$_POST['fregis'],
			'cod'		=>	$_POST['cod'],
			'proveedor'		=>	$_POST['proveedor'],
			'cantidad'		=>	$_POST['cantidad'],
			'id'			=>	$_POST['hidden_id']
		);
		$api_url = "http://localhost/api_rest/api/test_api.php?action=update";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);
		foreach($result as $keys => $values)
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}
	if($_POST["action"] == 'delete')
	{
		$id = $_POST['id'];
		$api_url = "http://localhost/api_rest/api/test_api.php?action=delete&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}


?>