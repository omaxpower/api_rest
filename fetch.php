<?php

//fetch.php

$api_url = "http://localhost/api_rest/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->nombres.'</td>
			<td>'.$row->descripcion.'</td>
			<td>'.$row->categoria.'</td>
			<td>'.$row->lugar.'</td>
			<td>'.$row->fregis.'</td>
			<td>'.$row->proveedor.'</td>
			<td>'.$row->cod.'</td>
			<td>'.$row->cantidad.'</td>
				
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Editar</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Borrar</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;

?>