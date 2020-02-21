<?php
include 'conexion.php';


$id_gasto = $_POST['id_gasto'];

try
{

	$query = "delete from gastos where id_gasto = '".$id_gasto."' ";

	$resul = mysqli_query($conexion,$query);

	if($resul==false)
	{	
		$msjError = mysqli_error($conexion);
	    throw new Exception();
	}

	$resultado_query = array(
							'error'=> false,
							'mensaje'=>'Gasto eliminado correctamente'
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