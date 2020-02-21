<?php
include 'conexion.php';


$id_venta = $_POST['id_venta'];

try
{

	$query = "delete from ventas where id_venta = '".$id_venta."' ";

	$resul = mysqli_query($conexion,$query);

	if($resul==false)
	{	
		$msjError = mysqli_error($conexion);
	    throw new Exception();
	}

	$resultado_query = array(
							'error'=> false,
							'mensaje'=>'Venta eliminada correctamente'
						);

    echo json_encode($resultado_query);


}
catch(Exception $e){
	

	$resultado_query = array(
							'error'=> true,
							'resultado'=> $msjError,
							'mensaje'=>'Ocurrió un error a la hora de guardar los datos favor de contactar al programador'
						);

    echo json_encode($resultado_query);


}



?>